<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Arr;

class TransactionRepository
{
    protected $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }
    public function save($sender, $recipient, $amount, $currency, $rec_amount, $rec_currency, $mode, $code, $withdrawal)
    {
        $transaction = new Transaction;
        $transaction->sender = $sender;
        $transaction->recipient = $recipient;
        $transaction->amount = $amount;
        $transaction->currency = $currency;
        $transaction->rec_amount = $rec_amount;
        $transaction->rec_currency = $rec_currency;
        $transaction->mode = $mode;
        $transaction->code = $code;
        $transaction->withdrawal = $withdrawal;

        $transaction->save();
        return $transaction;
    }
}
