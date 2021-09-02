<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class AdminTransactionRepository
{
    protected $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }
    public function getById($id)
    {
        $transaction = $this->transaction
            ->join('senders', 'transactions.sender', '=', 'senders.id')
            ->join('recipients', 'transactions.recipient', '=', 'recipients.id')
            ->select('transactions.id as id', 'transactions.amount', 'transactions.currency',
                'transactions.state as state','rec_amount','rec_currency','transactions.code as code',
                'transactions.created_at as send_date', 'transactions.withdrawal as withdrawal',
                'senders.first_name as sfirst_name', 'senders.last_name as slast_name',
                'senders.phone_number as sphone_number', 'senders.email as semail',
                'senders.address as saddress', 'senders.country as scountry', 'recipients.first_name as rfirst_name',
                'recipients.last_name as rlast_name', 'recipients.phone_number as rphone_number',
                'recipients.email as remail', 'recipients.country as rcountry', 'transactions.updated_at as receive_date',
                DB::raw("(SELECT name FROM countries WHERE countries.id = scountry) as scountry_name"),
                DB::raw("(SELECT name FROM countries WHERE countries.id = rcountry) as rcountry_name"))
            ->where('transactions.id', '=', $id)
            ->get();

        return $transaction;
    }
    public function getPaginate($nbr, $country)
    {
        if($country == 0)
        {
            $transaction = $this->transaction
                ->join('senders', 'transactions.sender', '=', 'senders.id')
                ->join('recipients', 'transactions.recipient', '=', 'recipients.id')
                ->join('countries', 'senders.country', '=', 'countries.id')
                ->select('transactions.id as id', 'transactions.amount', 'transactions.currency',
                    'transactions.state','rec_currency', 'rec_amount', 'mode','transactions.withdrawal as withdrawal',
                    'transactions.created_at as send_date', 'senders.first_name as sfirst_name',
                    'senders.last_name as slast_name',
                    'recipients.first_name as rfirst_name', 'recipients.last_name as rlast_name',
                    'countries.name as country', 'countries.flag as flag')
                ->paginate($nbr);

            return $transaction;
        }
        $transaction = $this->transaction
            ->join('senders', 'transactions.sender', '=', 'senders.id')
            ->join('recipients', 'transactions.recipient', '=', 'recipients.id')
            ->join('countries', 'senders.country', '=', 'countries.id')
            ->select('transactions.id as id', 'transactions.amount', 'transactions.currency',
                'transactions.state','rec_currency', 'rec_amount', 'mode',
                'transactions.created_at as send_date', 'transactions.withdrawal as withdrawal',
                'senders.first_name as sfirst_name', 'senders.last_name as slast_name',
                'recipients.first_name as rfirst_name', 'recipients.last_name as rlast_name',
                'countries.name as country', 'countries.flag as flag')
            ->where('senders.country', '=', $country)
            ->orWhere('recipients.country', '=', $country)->distinct('transactions.id')
            ->paginate($nbr);

        return $transaction;

    }
    public function update($id, $uid)
    {
        $update = $this->transaction
            ->where('id', '=', $id)
            ->update([
                'state' => 'received',
                'uid' => $uid
            ]);
        return $update;
    }
    public function getStats()
    {
        $sender = $this->transaction
            ->join('senders', 'transactions.sender', '=', 'senders.id')
            ->join('countries', 'senders.country', '=', 'countries.id')
            ->select('countries.id as id','countries.name as name', DB::raw('count(*) as nbr'))
            ->groupBy('id', 'name')
            ->get();

        $recipient = $this->transaction
            ->join('recipients', 'transactions.recipient', '=', 'recipients.id')
            ->join('countries', 'recipients.country', '=', 'countries.id')
            ->select('countries.id as id','countries.name as name', DB::raw('count(*) as nbr'))
            ->groupBy('id', 'name')
            ->get();

        return [$sender, $recipient];
    }
}
