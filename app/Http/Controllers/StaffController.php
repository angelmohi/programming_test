<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
Use Session;
Use Redirect;

class StaffController extends Controller
{
    //




    public function policiesStaff(){

        $user=Auth::user();

        $id_user = $user->id;

        $policies = DB::table('policies')->where('user_id', $id_user)->get();

        return view('dashboard', ['policies' => $policies]);


    }



    public function updateStaff(Request $req){

        $data=User::find($req->user_id);
        $data->name = $req->firstname;

        $data->save();
        
        return redirect("/stafflist/".$req->user_id);

    }


    public function removeStaff(Request $req){

        $policies = DB::table('policies')
                    ->where('user_id', $req->user_id)
                    ->update(['user_id' => null]);

        
        $user = DB::table('users')
                ->where('id', $req->user_id)
                ->update(['status' => 'disabled']);

        Session::flash('delete','User is disabled');
        return Redirect::to("/stafflist/".$req->user_id);

    }



}
