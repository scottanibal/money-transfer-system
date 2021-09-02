<?php

namespace App\Repositories;

use App\Models\RequestLogs;
use Illuminate\Support\Facades\DB;

class RequestLogRepository
{
    protected $requestLog;

    public function __construct(RequestLogs $requestLog)
    {
        $this->requestLog = $requestLog;
    }
    public static function create(Array $data)
    {
        $requestLog = new RequestLogs();
        $requestLog->ip = $data['id'];
        $requestLog->country = $data['country'];
        $requestLog->city = $data['city'];
        $requestLog->page = $data['page'];
        $requestLog->method = $data['method'];
        $requestLog->user_agent = $data['user_agent'];
        $requestLog->requested_on = $data['requested_on'];

        return $requestLog->save();
    }
    public function getRequestLogsByCountry()
    {
        $request = $this->requestLog
            ->join('countries', 'countries.alpha2', '=', 'requests_logs.country')
            ->select('countries.id as id', DB::raw('count(*) as nbr'), 'countries.name as name', 'countries.flag as flag', 'countries.alpha2')
            ->groupBy('id','name','flag','alpha2')
            ->get();

        return $request;
    }
    public function getPageVue()
    {
        $page = $this->requestLog
            ->select('page', 'method', DB::raw('count(*) as nbr'))
            ->groupBy('page', 'method')
            ->get();

        return $page;
    }
}
