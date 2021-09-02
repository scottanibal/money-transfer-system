<?php

namespace App\Repositories;

use App\Models\Office;

class OfficeRepository
{
    protected $office;

    public function __construct(Office $office){

        $this->office = $office;
    }
    /**
     * @param Office $office
     * @param array $inputs
     */
    public function save(Array $inputs){

        $office = new $this->office;
        $office->address = $inputs['address'];
        $office->email = $inputs['email'];
        $office->phone_number = $inputs['phone_number'];
        $office->country = $inputs['country'];

        $office->save();
    }

    /**
     * @param $n
     * @return mixed
     */
    public function getPaginate($n){
        $offices = $this->office
            ->join('countries', 'offices.country', '=', 'countries.id')
            ->select('offices.id', 'offices.address', 'offices.email as email',
                'countries.name as country', 'offices.phone_number as phone_number')
            ->paginate($n);

        return $offices;
    }
    /**
     * get all offices
     * @return mixed
     */
    public function getAll(){
        $offices = $this->office
            ->join('countries', 'offices.country', '=', 'countries.id')
            ->select('offices.id', 'offices.address', 'countries.name as country', 'offices.phone_number as phone_number')
            ->get();

        return $offices;
    }
    public function getById($id)
    {
        return $this->office
            ->join('countries', 'offices.country', '=', 'countries.id')
            ->select('offices.id as id','offices.address as address', 'offices.email as email', 'offices.phone_number as phone_number',
            'countries.name as country', 'offices.country as id_country')
            ->where('offices.id', '=', $id)
            ->get();
    }
    public function update($id, Array $office)
    {
        $update = $this->office
            ->where('id', '=', $id)
            ->update([
                'address' => $office['address'],
                'email' => $office['email'],
                'phone_number' => $office['phone_number'],
                'country' => $office['country']
            ]);
        return $update;
    }
}
