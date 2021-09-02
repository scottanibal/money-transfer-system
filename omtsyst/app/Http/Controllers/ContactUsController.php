<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OfficeRepository;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    //
    protected $officeRepository;
    protected $nbrPerPage = 5;

    public function __construct(OfficeRepository $officeRepository)
    {
        $this->officeRepository = $officeRepository;
    }
    public function getForm()
    {
        $offices = $this->officeRepository->getPaginate($this->nbrPerPage);
        $links = $offices->render();

        return view('contact_us', compact('offices', 'links'));
    }
    public function postForm(Request $request)
    {
        $request = $request->all();

        Mail::send('welcome', ['message' => $request['message']], function($message) use ($request){
            $message->to("contact@worldlypayments.com", 'World Money Transfer')->subject($request['subject']);
            $message->from($request['email'], 'Contact WMT');
        });
        return redirect()->back()->with('msg', trans('contactus.msg_report'));
    }
}
