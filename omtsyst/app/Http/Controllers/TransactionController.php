<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TransactionRequest;
use App\Repositories\OfficeRepository;
use App\Repositories\CountryRepository;
use App\Repositories\SenderRepository;
use App\Repositories\RecipientRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\CurrencyRepository;

use App\Http\Requests\VisaPullRequest;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    protected $officeRepository;
    protected $senderRep;
    protected $recipientRep;
    protected $transactionRep;
    protected $nbrPerPage = 8;

    public function __construct(OfficeRepository $officeRepository,
                                SenderRepository $senderRep,
                                RecipientRepository $recipientRep,
                                TransactionRepository $transactionRep)
    {
        $this->officeRepository = $officeRepository;
        $this->senderRep = $senderRep;
        $this->recipientRep = $recipientRep;
        $this->transactionRep = $transactionRep;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CountryRepository $countryRepository, CurrencyRepository $currencyRepository)
    {
        //
        $offices = $this->officeRepository->getPaginate($this->nbrPerPage = 5);
        $links = $offices->render();
        $countries = $countryRepository->getAll();
        $currencies = $currencyRepository->getActiveCurrency();
        return view('transaction')->with(['offices' => $offices, 'countries'=> $countries, 'currencies' => $currencies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Requests\TransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $offices = $this->officeRepository->getPaginate(3);
        $request = $request->all();
        $ar = explode('---',$request['address']);
        $sender = [
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone_number' => $request['phone_number'],
            'email' => $request['email'],
            'address' => $ar[1],
            'country' => $ar[0]
        ];
        $sender_id = $this->senderRep->save($sender);
        $recipient = [
            'first_name' => $request['rec_first_name'],
            'last_name' => $request['rec_last_name'],
            'phone_number' => $request['rec_phone_number'],
            'email' => $request['rec_email'],
            'country' => $request['country_to'],
        ];
        $recipient_id = $this->recipientRep->save($recipient);

        $transaction = $this->transactionRep->save($sender_id,
            $recipient_id, $request['amount'],
            $request['currency'], $request['rec_amount'],
            $request['rec_currency'], $request['mode'],
            $request['code'], $request['withdrawal']);

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
            'amount' => $request['amount'],
            'currency' => $request['currency'],
            'status' => trans('transaction.status'),
            'code' => $request['code'],
            'recipient' => $recipient,
            'sender' => $sender];

        Mail::send('transaction.send_confirm', $content, function($message) use ($request){
            $message->to($request['email'], 'World Money Transfer')->subject("Transaction ". $request['code'] ." confirmed");
            $message->from("contact@worldlypayments.com", 'World Money Transfer');
        });
        return $transaction;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
