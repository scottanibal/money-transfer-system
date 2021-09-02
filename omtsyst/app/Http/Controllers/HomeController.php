<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OfficeRepository;

class HomeController extends Controller
{
    protected $officeRepository;
    protected $nbrPerPage = 4;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(OfficeRepository $officeRepository)
    {
//        $this->middleware('auth');
        $this->officeRepository = $officeRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $offices = $this->officeRepository->getPaginate($this->nbrPerPage);
        $links = $offices->render();
        return view('home', compact('offices', 'links'));
    }
    public function home()
    {
        $offices = $this->officeRepository->getPaginate($this->nbrPerPage);
        $links = $offices->render();
        return view('home', compact('offices', 'links'));
    }
    public function language($lang)
    {
        session()->put('locale', $lang);

        return redirect()->back();
    }
}
