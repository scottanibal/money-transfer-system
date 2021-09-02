<?php

namespace App\Repositories;

use App\Models\Currency;

class CurrencyRepository
{
    protected $currency;

    public function __construct(Currency $currency)
    {
        $this->currency = $currency;
    }
    public function getPaginate($nbr)
    {
        $currency = $this->currency->paginate($nbr);

        return $currency;
    }
    public function getById($id)
    {
        return $this->currency
            ->select('id','symbol', 'symbol_native', 'decimal_digits', 'name',
                'rounding', 'alpha_code', 'numeric_code', 'name_plural', 'status')
            ->where('id', '=', $id)
            ->get();
    }

    /**
     * @param $id
     * @param array $currency
     * @return mixed
     */
    public function update($id, Array $currency)
    {
        $update = $this->currency
            ->where('id', '=', $id)
            ->update([
                'name' => $currency['name'],
                'symbol' => $currency['symbol'],
                'alpha_code' => $currency['alpha_code'],
                'numeric_code' => $currency['numeric_code'],
                'status' => (int)$currency['status']
            ]);
        return $update;
    }
    public function getActiveCurrency()
    {
        $currencies = $this->currency
            ->select('id','symbol', 'symbol_native', 'decimal_digits', 'name',
                'rounding', 'alpha_code', 'numeric_code', 'name_plural', 'status')
            ->where('status', '=', 1)
            ->get();

        return $currencies;
    }
}
