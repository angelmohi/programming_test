<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Policy;

use Carbon\Carbon;
Use Session;
Use Redirect;

class PolicyController extends Controller
{
    //


    public function index($id)
    {

        $id_policy = $id;

        $policy = DB::table('policies')->where('id', $id)->get()->first();

        return view('policy', compact('policy'));
    }


    public function updatePolicy(Request $req){

        $user = User::find($req->id_staff);

        $date = Carbon::now();

        if($user->status != 'disabled'){

            $user->last_operation = $date;
            $user->save();

            $data=Policy::find($req->id_policy);
            $data->user_id = $req->id_staff;
            $data->last_operation = $date;

            $data->save();

        }else{
            Session::flash('delete','User is disabled');
            return Redirect::to("/stafflist/".$req->id_staff);
        }

        
        
        return redirect("/stafflist/".$req->id_staff);
    }



    public function removePolicy(Request $req){
        
        $date = Carbon::now();

        $user = User::find($req->id_staff);
        $user->last_operation = $date;
        $user->save();

        $data=Policy::find($req->id_policy);
        $data->user_id = null;
        $data->last_operation = $date;
        $data->save();
        
        return redirect("/stafflist/".$req->id_staff);
    }

}
