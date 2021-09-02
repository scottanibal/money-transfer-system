<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionRepository
{
    protected $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }
    public function getTransaction($code, $email)
    {
        $transaction = $this->transaction
            ->join('senders', 'transactions.sender', '=', 'senders.id')
            ->join('recipients', 'transactions.recipient', '=', 'recipients.id')
            ->select('transactions.id as id', 'transactions.amount', 'transactions.currency',
                'transactions.state as status','rec_amount','rec_currency','transactions.code as code',
                'transactions.created_at as send_date', 'transactions.withdrawal as withdrawal',
                'senders.first_name as sfirst_name', 'senders.last_name as slast_name',
                'senders.phone_number as sphone_number', 'senders.email as semail',
                'senders.address as saddress', 'senders.country as scountry', 'recipients.first_name as rfirst_name',
                'recipients.last_name as rlast_name', 'recipients.phone_number as rphone_number',
                'recipients.email as remail', 'recipients.country as rcountry', 'transactions.updated_at as receive_date',
                DB::raw("(SELECT name FROM countries WHERE countries.id = scountry) as scountry_name"),
                DB::raw("(SELECT name FROM countries WHERE countries.id = rcountry) as rcountry_name"))
            ->where([['transactions.code', '=', $code], ['senders.email', '=', $email]])
            ->get();

        return $transaction;
    }
    public function getTransactionByEmail($email, $paginate)
    {
        $transactions = $this->transaction
            ->join('senders', 'transactions.sender', '=', 'senders.id')
            ->join('recipients', 'transactions.recipient', '=', 'recipients.id')
            ->join('countries', 'senders.country', '=', 'countries.id')
            ->select('transactions.id as id', 'transactions.amount','transactions.mode', 'transactions.currency',
                'transactions.state as status','rec_amount','rec_currency','transactions.code as code',
                'transactions.created_at as send_date', 'transactions.withdrawal as withdrawal',
                'senders.first_name as sfirst_name', 'senders.last_name as slast_name',
                'senders.phone_number as sphone_number', 'senders.email as semail',
                'senders.address as saddress', 'senders.country as scountry', 'recipients.first_name as rfirst_name',
                'recipients.last_name as rlast_name', 'recipients.phone_number as rphone_number',
                'countries.name as country', 'countries.flag as flag',
                'recipients.email as remail', 'recipients.country as rcountry', 'transactions.updated_at as receive_date',
                DB::raw("(SELECT name FROM countries WHERE countries.id = scountry) as scountry_name"),
                DB::raw("(SELECT name FROM countries WHERE countries.id = rcountry) as rcountry_name"))
            ->where('senders.email', '=', $email)
            ->paginate($paginate);

        return $transactions;
    }
}
