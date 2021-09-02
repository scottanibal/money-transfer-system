<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\OfficeRepository;

class CheckRole
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
        if(auth()->check())
        {
            $role = UserRepository::getRole(auth()->id());

            if(count($role) > 0)
            {
                if($role[0]->role >= 0)
                {
                    session()->put('role', $role[0]->role);
                    session()->put('country', $role[0]->country);
                    session()->put('office', $role[0]->office);
                }
                return $next($request);
            }
            else {
                auth()->logout();
                return redirect('/login');
            }
        }
        return $next($request);

    }
}
