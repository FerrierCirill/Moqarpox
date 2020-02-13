<?php

namespace App\Http\Middleware;

use App\Company;
use Closure;

class AuthIsProviderAndItsHisCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!\Auth::check() || \Auth::user()->state != \App\User::PROVIDER) {
            return back();
        } else {
            $companies = Company::where('user_id',\Auth::id())->get();
            foreach ($companies as $company) {
                if ($request->route('company_id') == $company->id){
                    return $next($request);
                }
            }
            return redirect('/company/'.$request->route('company_id'));
        }
    }
}
