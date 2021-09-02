<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OfficeRepository;
use App\Repositories\AdminTransactionRepository;

class AdminTransactionController extends Controller
{
    protected $officeRepository;
    protected $transactionRepository;
    protected $nbrPerPage = 10;

    public function __construct(
        AdminTransactionRepository $transactionRepository,
        OfficeRepository $officeRepository)
    {
        $this->transactionRepository = $transactionRepository;
        $this->officeRepository = $officeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country = 0;
        if(session()->has('role') and session()->get('role') < 2)
        {
            $country = session()->get('country');
            $transactions = $this->transactionRepository->getPaginate($this->nbrPerPage, $country);
            $offices = $this->officeRepository->getPaginate(5);
            $links = $transactions->render();

            return view('transaction.transaction', compact('offices', 'transactions', 'links'));
        }
        $transactions = $this->transactionRepository->getPaginate($this->nbrPerPage, $country);
        $offices = $this->officeRepository->getPaginate(5);
        $links = $transactions->render();

        return view('transaction.transaction', compact('offices', 'transactions', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $offices = $this->officeRepository->getPaginate($this->nbrPerPage);
        $transaction = $this->transactionRepository->getById($id);

        return view('transaction.trans_show', compact('transaction', 'offices'));
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
        //
        $request = $request->all();
        $uid = (int)$request['uid'];

        $update = $this->transactionRepository->update($id, $uid);

        return redirect()->route('transact.index');
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
