<?php

namespace App\Http\Controllers;

use App\Repositories\OfficeRepository;
use Illuminate\Http\Request;

class PaypalConfirmController extends Controller
{
    protected $officeRepository;
    protected $nbrPerPage = 5;

    public function __construct(OfficeRepository $officeRepository)
    {
        $this->officeRepository = $officeRepository;
    }
    public function confirm()
    {
        $offices = $this->officeRepository->getPaginate($this->nbrPerPage);

        return view('transaction.trans_confirm', compact('offices'));
    }
}
