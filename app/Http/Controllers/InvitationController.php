<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Invitation;
use App\Models\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

use App\Notifications\InviteNotification;
Use Session;
Use Redirect;

class InvitationController extends Controller
{
    //


    public function process_invites(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email'
        ]);

        $validator->after(function ($validator) use ($request) {
            if (Invitation::where('email', $request->input('email'))->exists()) {
                Session::flash('email','There exists an invite with this email!');
            }
        });
        
        if ($validator->fails()) {
            return Redirect::to('/stafflist');
        }

        do {
            $token = Str::random(20);
        } while (Invitation::where('token', $token)->first());


        Invitation::create([
            'token' => $token,
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'status' => 'invited'
        ]);

        $url = URL::temporarySignedRoute(
 
            'register', now()->addMinutes(300), ['token' => $token], ['name' => $request->input('name')], ['email' => $request->input('email')]
        );

        \Notification::route('mail', $request->input('email'))->notify(new InviteNotification($url));

        Session::flash('success','The Invite has been sent successfully');
        return Redirect::to('/stafflist');

    }


}
