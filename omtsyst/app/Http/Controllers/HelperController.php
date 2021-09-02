<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OfficeRepository;
use App\Repositories\CurrencyRepository;

class HelperController extends Controller
{
    protected $officeRepository;
    protected $nbrPerPage = 5;
    //
    public function __construct(OfficeRepository $officeRepository)
    {
        $this->officeRepository = $officeRepository;
    }
    public function helper(CurrencyRepository $currencyRepository)
    {
        $currencies = $currencyRepository->getActiveCurrency();
        $offices = $this->officeRepository->getPaginate($this->nbrPerPage);
        $links = $offices->render();
        return view('help', compact('offices', 'links', 'currencies'));
    }
}
