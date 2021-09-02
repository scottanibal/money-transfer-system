<?php

namespace App\Http\Controllers;

use App\Repositories\CountryRepository;
use App\Repositories\CurrencyRepository;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class CountryController extends Controller
{
    protected $countryRepository;
    protected $currencyRepository;
    protected $nbrPerPage = 10;

    public function __construct(CountryRepository $countryRepository, CurrencyRepository $currencyRepository)
    {
        $this->countryRepository = $countryRepository;
        $this->currencyRepository = $currencyRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countries = $this->countryRepository->getPaginate($this->nbrPerPage);
        $links = $countries->render();

        return view('country.country')->with(['countries' => $countries, 'links' => $links]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('country.country_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->all();
        $path = config('flag.path');
        $flag = $request->file('flag');

        $country = [
            'name' => $request['name'],
            'code_name' => $request['code_name'],
            'code_numeric' => $request['code_numeric'],
            'phone_code' => $request['phone_code'],
            'flag' => $request['flag_name'],
        ];
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
        $activeCurrencies = $this->currencyRepository->getActiveCurrency();

        $country = $this->countryRepository->getById($id);

        return view('country.edit', compact('country', 'activeCurrencies'));
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
        if(!isset($request['flag_name']) and count($request) == 0 ){
            $request['flag_name'] = $request['alpha2'] . '.png';
        }
        $update = $this->countryRepository->update($id, $request);
        return redirect()->route('country.index');
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
