<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SocialiteController extends Controller
{
    /*
    This code is for github login
    */
    public function githubRedirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubHandleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        if(User::where('email', $user->getEmail())->exists()){
            $userData = User::where('email', $user->getEmail())->first();
            Auth::guard()->login($userData);
            return redirect('home')->with('status', 'Login Successfull with Github Account!');
        }else{
            $githubUser = new User();
            $githubUser->name = $user->getName();
            $githubUser->email = $user->getEmail();
            $githubUser->email_verified_at = Carbon::now();
            $githubUser->password = bcrypt('123');
            $githubUser->save();
            $userData = User::find($githubUser->id);
            Auth::guard()->login($userData);
            return redirect('home')->with('status', 'Login Successfull with Github Account!');
        }

        // $user->token;
        // $user->getId();
        // $user->getNickname();
        // $user->getName();
        // $user->getEmail();
        // $user->getAvatar();
    }

    // protected function guard(){
    //     return Auth::guard();
    // }


    /*
    This code is for facebook login
    */
    public function facebookRedirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookHandleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        if(User::where('email', $user->getEmail())->exists()){
            $userData = User::where('email', $user->getEmail())->first();
            Auth::guard()->login($userData);
            return redirect('home')->with('status', 'Login Successfull with facebook Account!');
        }else{
            $facebookUser = new User();
            $facebookUser->name = $user->getName();
            $facebookUser->email = $user->getEmail();
            $facebookUser->email_verified_at = Carbon::now();
            $facebookUser->password = bcrypt('123');
            $facebookUser->save();
            $userData = User::find($facebookUser->id);
            Auth::guard()->login($userData);
            return redirect('home')->with('status', 'Login Successfull with facebook Account!');
        }
    }


    /*
    This code is for google login
    */
    public function googleRedirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleHandleProviderCallback()
    {
        $user = Socialite::driver('google')->user();

        if(User::where('email', $user->getEmail())->exists()){
            $userData = User::where('email', $user->getEmail())->first();
            Auth::guard()->login($userData);
            return redirect('home')->with('status', 'Login Successfull with google Account!');
        }else{
            $googleUser = new User();
            $googleUser->name = $user->getName();
            $googleUser->email = $user->getEmail();
            $googleUser->email_verified_at = Carbon::now();
            $googleUser->password = bcrypt('123');
            $googleUser->save();
            $userData = User::find($googleUser->id);
            Auth::guard()->login($userData);
            return redirect('home')->with('status', 'Login Successfull with google Account!');
        }
    }
}
