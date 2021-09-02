<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CurrencyRepository;

class ExchangeRateController extends Controller
{
    protected $currencyRepository;
    protected $nbrPerPage = 10;

    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = $this->currencyRepository->getPaginate($this->nbrPerPage);
        $activeCurrencies = $this->currencyRepository->getActiveCurrency();
        $links = $currencies->render();
        return view('exchange.exchangerate', compact('currencies', 'links', 'activeCurrencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('exchange.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $currency = $this->currencyRepository->getById($id);

        return view('exchange.edit', compact('currency'));
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
        $request = $request->all();

        $currency = [
            'name' => $request['name'],
            'symbol' => $request['symbol'],
            'alpha_code' => $request['alpha_code'],
            'numeric_code' => $request['numeric_code'],
            'status' => $request['status']
        ];
        $update = $this->currencyRepository->update($id, $currency);

        return redirect()->route('exchange.index');
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
