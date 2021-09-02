<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FundsTransferApiController;
use App\Http\Requests\VisaPullRequest;
use App\Http\Requests\TransactionRequest;

use App\Repositories\OfficeRepository;
use App\Repositories\CurrencyRepository;
use App\Repositories\CountryRepository;
use App\Repositories\RecipientRepository;
use App\Repositories\SenderRepository;
use App\Repositories\TransactionRepository;

use App\Visa\model\PullfundspostPayload;
use App\Visa\model\PushfundspostPayload;
use App\Visa\api\ExchangeRateApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class VisaPullController extends Controller
{
    protected $fundsTransferApi;
    protected $pullfundspost_payload;
    protected $pushfundspost_payload;
    protected $officeRepository;
    protected $currencyRepository;
    protected $countryRepository;
    protected $transactionRep;
    protected $senderRep;
    protected $recipientRep;
    protected $nbrPerPage = 8;
    /**
     * Systems Trace Audit Number for VISA
     * Pull and Push funds
     */
    const AUDIT_NUMBER = "100620";

//[{"bin_country": "840", "acquiring_country": "408999", "card_number": "4957030420210496", "exp_date": "2021-10", "rec_country": "124", "name": "rohan"}]

public function __construct(OfficeRepository $officeRepository,
                                FundsTransferApiController $fundsTransferApi,
                                CurrencyRepository $currencyRepository, CountryRepository $countryRepository,
                                SenderRepository $senderRep, RecipientRepository $recipientRep, TransactionRepository $transactionRepository)
    {
        $this->officeRepository = $officeRepository;
        $this->fundsTransferApi = $fundsTransferApi;
        $this->currencyRepository = $currencyRepository;
        $this->countryRepository = $countryRepository;
        $this->senderRep = $senderRep;
        $this->recipientRep = $recipientRep;
        $this->transactionRep = $transactionRepository;
    }
    /**
     * @param TransactionRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function postTrans(TransactionRequest $request)
    {
        $this->setAdmin($request);
        $rate = 1.0;
        $offices = $this->officeRepository->getPaginate($this->nbrPerPage);
        $links = $offices->render();
        $request = $request->all();
        $currency = $this->currencyRepository->getById((int)$request['send_currency']);
        $from = $this->countryRepository->getCountryWithCurrency((int)$request['country_from']);
        $to = $this->countryRepository->getCountryWithCurrency((int)$request['country_to']);

        $currencies = File::get(config('exchangerate.path') . "/exchangerate.json");
        $data = json_decode($currencies, true);
        foreach($data as $key => $value)
        {
            if($value['currency'] == $currency[0]->alpha_code){
                $rate = floatval($value[$to[0]->alpha_code]);
                break;
            }
        }
        $total_amount = floatval($request['amount']);
        $fees_transfer = $total_amount * 0.07;
        $to_receive = $total_amount - $fees_transfer;
        $to_receive = $to_receive * $rate;
        $request['total_amount'] = $total_amount;
        $request['to_receive'] = $to_receive;
        $request['fees_transfer'] = $fees_transfer;
        $request['currency'] = $currency[0]->alpha_code;

        return view('mode_payment')->with(['request' => $request,'from' => $from, 'to' => $to, 'offices' => $offices]);
    }

    /**
     * @param \App\Http\Requests\VisaPullRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function postForm(VisaPullRequest $request)
    {
        $visainfo= File::get(config('settings.path') . "/visa.json");
        $visadata = json_decode($visainfo, true);


        $country_code = $visadata[0]["bin_country"]; // to change with the code's country of BIN
        $ac_code = $visadata[0]["acquiring_bin"]; // to change with the BIN provide during enrollment

        $acc_number = $visadata[0]["account_number"]; // the card ID of the recipient
        $ex_date = $visadata[0]["expiring_date"]; // card expiring date
        $rec_count_code = $visadata[0]["rec_country"]; //recipient code county
        $rec_name = $visadata[0]["rec_name"];

        $request = $request->all();
        $offices = $this->officeRepository->getPaginate($this->nbrPerPage);
        $exp_date = explode('/', $request['expiring_date']);
        $data = [];

        $data['amount'] = $request['tamount'];
        $data['sender_currency_code'] = $request['currencyname'];
        $data['systems_trace_audit_number'] = self::AUDIT_NUMBER;
        $data['retrieval_reference_number'] = "330000" . self::AUDIT_NUMBER; //format ydddhhnnnnnn
        $data['sender_primary_account_number'] = $request['card_number'];
        $data['acquirer_country_code'] = $country_code;
        $data['sender_card_expiry_date'] = "20" . $exp_date[1] . "-" . $exp_date[0];
        $data['local_transaction_date_time'] = date('Y-m-d\TH:i:s');
        $data['acquiring_bin'] = $ac_code;
        $data['business_application_id'] = "PP"; # AA for the same persons PP for different persons
        $data['merchant_category_code'] = "6012";
        $data['card_acceptor'] = [
            'address' => [
                'country' => "USA",
                "zipCode" => "94404",
                "county" => "081",
                "state" => "CA"
            ],
            'idCode' => "ABCD1234ABCD123",
            'name' => "Visa Inc. USA-Foster City",
            'terminalId' => "ABCD1234",
        ];
        $data['point_of_service_data'] = [
            'panEntryMode' => "00",
            'posConditionCode' => "00",
            'motoECIIndicator' => "0"
        ];
        $this->pullfundspost_payload = new PullfundspostPayload($data);

        $pull_response = $this->fundsTransferApi->postpullfunds($this->pullfundspost_payload);
        $transaction_identifier = $pull_response['transaction_identifier'];
        $approval_code = $pull_response['approval_code'];
        $sender_name = $request['tfirst_name'].' ' .$request['tlast_name'];
        $sender_country_code = $request["country_code"];

        $push_data['recipient_primary_account_number'] = $acc_number;
        $push_data['transaction_identifier'] = $transaction_identifier;
        $push_data['acquiring_bin'] = $ac_code;
        $push_data['retrieval_reference_number'] = "330000" . self::AUDIT_NUMBER; //format ydddhhnnnnnn;
        $push_data['recipient_card_expiry_date'] = $ex_date;
        $push_data['systems_trace_audit_number'] = self::AUDIT_NUMBER;
        $push_data['recipient_country_code'] = $rec_count_code;
        $push_data['sender_name'] = $sender_name;
        $push_data['business_application_id'] = "PP";
        $push_data['transaction_currency_code'] = $request['currencyname'];
        $push_data['recipient_name'] = $rec_name;
        $push_data['sender_country_code'] = $sender_country_code;
        $push_data['amount'] = $request['tamount'];
        $push_data['local_transaction_date_time'] = date('Y-m-d\TH:i:s');
        $push_data['acquirer_country_code'] = $country_code; // BIN country
        $push_data['sender_account_number'] = $request['card_number'];
        $push_data['sender_state_code'] = "CA"; //Required if senderCountryCode is either 124(CAN) or 840(USA)
        $push_data['card_acceptor'] = [
            'address' => [
                'country' => 'USA',
                'zipCode' => '94404',
                'state' => 'CA'
            ],
            'idCode' => 'CA-IDCode-77765',
            'name' => 'Visa Inc. USA-Foster City',
            'terminalId' => 'TID-9999'
        ];
        $this->pushfundspost_payload = new PushfundspostPayload($push_data);
        $push_response = $this->fundsTransferApi->postpushfunds($this->pushfundspost_payload);

        $ar = explode('---',$request['taddress']);
        $sender = [
            'first_name' => $request['tfirst_name'],
            'last_name' => $request['tlast_name'],
            'phone_number' => $request['tphone_number'],
            'email' => $request['temail'],
            'address' => $ar[1],
            'country' => $ar[0]
        ];
        $sender_id = $this->senderRep->save($sender);
        $recipient = [
            'first_name' => $request['trec_first_name'],
            'last_name' => $request['trec_last_name'],
            'phone_number' => $request['trec_phone_number'],
            'email' => $request['trec_email'],
            'country' => $request['tcountry_to'],
        ];
        $recipient_id = $this->recipientRep->save($recipient);
        $mode = "Visa";
        $code = substr($approval_code, 0, 9);

        $transaction = $this->transactionRep->save($sender_id, $recipient_id, $request['tamount'],
            $request['currencyname'], $request['treceive'], $request['tcurrencyname'], $mode, $code, $request['withdrawal']);
        $content = [
            'title' => trans('transaction.confirmed_great'),
            'content' => trans('transaction.confirmed_msg'),
            'content1' => trans('transaction.confirmed_msg1'),
            'content2' => trans('transaction.confirmed_msg2'),
            'codetext' => trans('transaction.codetext'),
            'summary' => trans('transaction.transaction_summary'),
            'textlink' => trans('transaction.confirmed_link'),
            'senderinfo' => trans('transaction.sender'),
            'recipientinfo' => trans('transaction.recipient'),
            'amount' => $request['tamount'],
            'currency' => $request['currencyname'],
            'status' => trans('transaction.status'),
            'code' => $code,
            'recipient' => $recipient,
            'sender' => $sender];

        Mail::send('transaction.send_confirm', $content, function($message) use ($request, $code){
            $message->to($request['temail'], 'World Money Transfer')->subject("Transaction ". $code ." confirmed");
            $message->from("contact@worldlypayments.com", 'World Money Transfer');
        });

        return view('transaction.trans_confirm', compact('offices', 'pull_response', 'push_response'));
    }
    public function calculateFees(Request $request)
    {
        $fees = File::get(config('settings.path') . "/fees.json");
        $fees_data = json_decode($fees, true);

        $currencies = File::get(config('exchangerate.path') . "/exchangerate.json");
        $data = json_decode($currencies, true);

        $request = $request->all();
        $total_amount = (int)$request['total_amount'];
        $from_currency = $request['from_currency'];
        $to_currency = $request['to_currency'];
        $rate = 1.0;
        foreach($data as $key => $value)
        {
            if($value['currency'] == $from_currency){
                $rate = floatval($value[$to_currency]);
                break;
            }
        }
        $tfr = 0;

        switch (true){
            case ($total_amount >= 1 and $total_amount <= 100):
                $tfr = $fees_data[0]["1"];
                break;
            case ($total_amount > 100 and $total_amount <= 500):
                $tfr = $fees_data[0]["101"];
                break;
            case ($total_amount > 500 and $total_amount <= 1000):
                $tfr = $fees_data[0]["501"];
                break;
            case ($total_amount > 1000 and $total_amount <= 5000):
                $tfr = $fees_data[0]["1001"];
                break;
            case ($total_amount > 5000 and $total_amount <= 10000):
                $tfr = $fees_data[0]["5001"];
                break;
            case ($total_amount > 10000):
                $tfr = $fees_data[0]["10000"];
                break;
            default:
                $tfr = $fees_data[0]["1"];
        }
        $fees_transfer = $total_amount * floatval($tfr);
        $to_receive = $total_amount - $fees_transfer;
        $to_receive = $to_receive * $rate;

        $object_response = $total_amount . '-' . $fees_transfer . '-'. $from_currency . '-' . $to_receive . '-' . $to_currency;
        return $object_response;
    }
    private function setAdmin($request)
    {
        if(!$request->has('withdrawal'))
        {
            $request->merge(['withdrawal' => 0]);
        }
        else {
            $request['withdrawal'] = 1;
        }
    }
}
