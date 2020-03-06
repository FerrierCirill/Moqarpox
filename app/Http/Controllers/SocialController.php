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
        $getInfo = Socialite::driver($provider)->user();

        if(
            !isset($getInfo['given_name'])  ||
            !isset($getInfo['family_name']) ||
            !isset($getInfo['email'      ]) ||
            !isset($provider) ||
            !isset($getInfo['id']) )
            return redirect()->to('/register')->withErrors(['Profil'.$provider.' incomplet. Nécessite un nom, prénom, mail']);

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
                'civility' => 'other',
                'provider_id' => $getInfo->id,
                'password' => $getInfo->id,
                'email_verified_at' => date(now()),
            ]);

        }

        return $user;
    }
}
