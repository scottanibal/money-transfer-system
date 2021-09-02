<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TrackRequest;
use App\Repositories\TransactionRepository;

class TransactionController extends Controller
{
    protected $transactionRepository;
    protected $paginate = 10;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }
    public function postTrack(TrackRequest $request)
    {
        $request = $request->all();

        $transaction = $this->transactionRepository->getTransaction($request['code'], $request['email']);

        return view('transaction', compact('transaction'));
    }
    public function getTransactions($token, $email)
    {
        $transactions = $this->transactionRepository->getTransactionByEmail($email, $this->paginate);
        $links = $transactions->render();

        return view('transaction_list', compact('transactions', 'links'));
    }
}
