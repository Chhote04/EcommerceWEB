<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialiteController extends Controller
{
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function handleProviderCallback($service)
    {
        $data= new User();

        // dd($data);
        // die;
        try {

            if($service=='twitter'){
                $user = Socialite::driver($service)->user();
            }else{
                $user = Socialite::driver($service)->stateless()->user();
            }

            // $accessTokenResponseBody = $user->accessTokenResponseBody;
            $finduser = User::where('email', $user->getEmail())->first();

            if($finduser){


                Auth::login($finduser,true);

                return redirect('/');


            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => encrypt('12345')
                ]);


                Auth::login($newUser);

                return redirect('/');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
