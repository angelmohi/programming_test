<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Invitation;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function registration_view($token){
        $invitation = Invitation::where('token', $token)->first();

        if($invitation==null || $invitation=="" || $invitation->status=="used"){
            return redirect('/login');
        }
        return view('auth.register',['invitation' => $invitation]);
    }


    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|confirmed|min:8',
        ]);


        //Update user
        Auth::login($user = User::where('email', $request->email)->first());
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->save();

        //update invitation
        $invitation = Invitation::where('token', $request->invitation)->first();
        $invitation->status = 'used';
        $invitation->save();

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
