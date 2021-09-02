<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OfficeRepository;
use App\Repositories\CountryRepository;

class OfficeController extends Controller
{
    protected $officeRepository;
    protected $countryRepository;
    protected $nbrPerPage = 10;

    public function __construct(OfficeRepository $officeRepository, CountryRepository $countryRepository)
    {
        $this->officeRepository = $officeRepository;
        $this->countryRepository = $countryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $offices = $this->officeRepository->getPaginate($this->nbrPerPage);
        $links = $offices->render();

        return view('office.office', compact('offices', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $countries = $this->countryRepository->getAll();

        return view('office.office_create')->with(['countries' => $countries]);
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
        $office = [
            'address' => $request['address'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
            'country' => $request['country']
        ];
        $this->officeRepository->save($office);
        $offices = $this->officeRepository->getPaginate($this->nbrPerPage);
        $links = $offices->render();

        return view('office.office', compact('offices', 'links'));
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
        $office = $this->officeRepository->getById($id);

        return view('office.office_show',compact('office'));
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
        $office = $this->officeRepository->getById($id);
        $countries = $this->countryRepository->getAll();

        return view('office.office_edit', compact('office', 'countries'));
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

        $office = [
            'address' => $request['address'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
            'country' => $request['country'],
        ];
        $update = $this->officeRepository->update($id, $office);

        return redirect()->route('office.index');
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
