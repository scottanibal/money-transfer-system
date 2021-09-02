<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OfficeRepository;
use App\Repositories\RequestLogRepository;
use App\Repositories\CountryRepository;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $countries;
    protected $requestLog;

    public function __construct(RequestLogRepository $requestLog, CountryRepository $countryRepository)
    {
        $this->middleware('auth');
        $this->requestLog = $requestLog;
        $this->countries = $countryRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $requestLog = $this->requestLog->getRequestLogsByCountry();
        $pages = $this->requestLog->getPageVue();

        return view('admin', compact('requestLog', 'pages'));
    }
    public function getFeesForm()
    {
        $fees = File::get(config('settings.path') . "/fees.json");
        $data = json_decode($fees, true);
        return view('settings.fees_form')->with('fees', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postFeesForm(Request $request)
    {
        $fees = File::get(config('settings.path') . "/fees.json");
        $data = json_decode($fees, true);
        $request = $request->all();
        unset($request['_token']);

        foreach($data as $key => $value)
        {
            $data[$key] = $request;
        }
        file_put_contents(config('settings.path') . "/fees.json", json_encode($data));

        return redirect()->back()->with('msg', 'Update successfully');
    }
    public function getVisaForm()
    {
        $visa = File::get(config('settings.path') . "/visa.json");
        $data = json_decode($visa, true);
        $countries = $this->countries->getAll();
        return view('settings.visa_form', compact('countries', 'data'));
    }
    public function postVisaForm(Request $request)
    {
        $visa = File::get(config('settings.path') . "/visa.json");
        $data = json_decode($visa, true);
        $request = $request->all();
        $exp_date = explode('/', $request['expiring_date']);
        $exp_date = "20" . $exp_date[1] . "-" . $exp_date[0];
        $request['expiring_date'] = $exp_date;
        unset($request['_token']);

        foreach($data as $key => $value)
        {
            $data[$key] = $request;
        }
        file_put_contents(config('settings.path') . "/visa.json", json_encode($data));

        return redirect()->back()->with('msg', 'Update successfully');
    }
    public function getPaypalForm()
    {
        $paypal = file_get_contents(config('settings.path'). "/paypal.json");
        $data = json_decode($paypal, true);

        return view('settings.paypal_form')->with('client_id', $data[0]['client_id']);
    }
    public function postPaypalInfo(Request $request)
    {
        $paypal = File::get(config('settings.path') . "/paypal.json");
        $data = json_decode($paypal, true);
        $request = $request->all();
        unset($request['_token']);

        foreach($data as $key => $value)
        {
            $data[$key] = $request;
        }
        file_put_contents(config('settings.path') . "/paypal.json", json_encode($data));

        return redirect()->back()->with('msg', 'Update successfully');
    }
    public static function getClientID()
    {
//        $paypal = file_get_contents("storage/app/public/settings/visa.json");
//        $data = json_decode($paypal, true);

//        if(count($data) > 0)
//        {
//            return $data[0]['client_id'];
//        }
        return "12";
    }
}
