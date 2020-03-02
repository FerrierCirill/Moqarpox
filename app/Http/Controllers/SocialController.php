<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        if(
            strlen('given_name') < 1 ||
            strlen('family_name') < 1 ||
            strlen('email'      ) < 1 ||
            strlen('provider'   ) < 1 ||
            strlen('provider_id') < 1 )
            return redirect()->to('/')->withErrors(['Profil'.$provider.' incomplet. Nécessite un nom, prénom, mail']);

        var_dump($provider);
        $getInfo = Socialite::driver($provider)->user();
        var_dump($getInfo);
        $user = $this->createUser($getInfo,$provider);

        auth()->login($user);

        return redirect()->to('/home');

    }
    function createUser( $getInfo,$provider){
        $user = User::where('provider_id', $getInfo->id)->first();

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

        return $user;
    }
}
