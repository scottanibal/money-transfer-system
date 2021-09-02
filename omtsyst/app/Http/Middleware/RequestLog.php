<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Repositories\RequestLogRepository;
use Illuminate\Support\Carbon;

class RequestLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if($request->routeIs('admin/'))
        {
            return $request;
        }

        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = @$_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else{
            $ip = $remote;
        }
        $ip = '14.248.84.66';
        $ip_data = @json_decode(file_get_contents('http://www.geoplugin.net/json.gp?ip='. $ip));
        if($ip_data AND $ip_data->geoplugin_countryName != null)
        {
            $country = $ip_data->geoplugin_countryCode;
            $city = $ip_data->geoplugin_city;
            $data = [
                'id' => $ip,
                'page' => $request->getPathInfo(),
                'requested_on' => $_SERVER['REQUEST_TIME'],
                'method' => $request->method(),
                'user_agent' => $request->userAgent(),
                'country' => $country,
                'city' => $city,
            ];
            $request = RequestLogRepository::create($data);
        }
        return $response;
    }
}
