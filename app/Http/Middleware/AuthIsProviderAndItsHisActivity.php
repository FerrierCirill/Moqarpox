<?php

namespace App\Http\Middleware;

use App\Activity;
use App\Company;
use Closure;

class AuthIsProviderAndItsHisActivity
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
        if (\Auth::check() && \Auth::user()->admin != \App\User::ADMIN) {
            return $next($request);
        }

        if (!\Auth::check() || \Auth::user()->state != \App\User::PROVIDER) {
            return back();
        } else {
            $companies = Company::where('user_id',\Auth::id())->get();
            foreach ($companies as $company) {
                $activities = $company->activities;
                foreach ($activities as $activity) {
                    if ($request->route('activity_id') == $activity->id){
                        return $next($request);
                    }
                }
            }
            return redirect()->back();
        }
    }
}
