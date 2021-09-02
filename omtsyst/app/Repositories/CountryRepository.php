<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository
{
    protected $country;

    public function __construct(Country $country)
    {
        $this->country = $country;
    }
    public function getPaginate($nbr)
    {
        $countries = $this->country->paginate($nbr);

        return $countries;
    }
    public function getAll()
    {
        $countries = $this->country->select('id', 'name', 'alpha2',
            'alpha3', 'phone_code', 'num', 'flag', 'currency')
            ->get();
        return $countries;
    }
    public function getById($id)
    {
        return $this->country
            ->select('id','name', 'phone_code', 'alpha3', 'flag',
                'alpha2', 'num', 'currency')
            ->where('id', '=', $id)
            ->get();
    }
    public function getCountryWithCurrency($id)
    {
        return $this->country
            ->leftJoin('currencies', 'currencies.id', '=', 'countries.currency')
            ->select('countries.name as name','countries.num as num_code', 'currencies.symbol as symbol',
                'currencies.alpha_code as alpha_code', 'currencies.numeric_code as numeric_code', 'currencies.symbol_native')
            ->where('countries.id', '=', $id)
            ->get();
    }
    public function update($id, Array $country)
    {
        $update = $this->country
            ->where('id', '=', $id)
            ->update([
                'name' => $country['name'],
                'phone_code' => $country['phone_code'],
                'alpha3' => $country['alpha3'],
                'alpha2' => $country['alpha2'],
                'num' => $country['numeric_code'],
                'currency' => $country['currency'],
                'flag' => $country['flag_name'],
            ]);
        return $update;
    }
}
