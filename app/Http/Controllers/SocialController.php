<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Laravel\Socialite\Facades\Socialite;
use App\User;
class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        var_dump($provider);
        $getInfo = Socialite::driver($provider)->user();
        var_dump($getInfo);
        $user = $this->createUser($getInfo,$provider);

        auth()->login($user);

        return redirect()->to('/home');

    }
    function createUser($getInfo,$provider){
        $user = User::where('provider_id', $getInfo->id)->first();
       if($provider=='google')
        var_dump($this->validate ($getInfo, [
            'given_name' => 'required',
            'family_name' => 'required',
            'email' => 'required',
            'provider' => 'required',
            'provider_id' => 'required',
        ]));

        if (!$user) {
            $user = User::create([
                'first_name'     => $getInfo['given_name'],
                'second_name'  =>$getInfo['family_name'],
                'email'    => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id,
                'password' => $getInfo->id,
                'email_verified_at' => date(now()),
            ]);

        }
        die();
      //  return $user;
    }
}
