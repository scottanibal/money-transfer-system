<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AdminTransactionRepository;

class StatisticTransactionController extends Controller
{
    protected $transactionRepository;

    public function __construct(AdminTransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }
    public function getStats()
    {
        $stats = $this->transactionRepository->getStats();

        return $stats;
    }
}
