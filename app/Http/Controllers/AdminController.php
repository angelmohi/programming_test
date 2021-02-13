<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class AdminController extends Controller
{
    //




    public function allStaff(){

        $users = DB::table('users')->where('id', '<>', 1)->get();

        return view('stafflist', ['users' => $users]);

    }



    public function detailsStaff($id){
        //Staff id
        $id_staff = $id;

        //Details staff
        $user = DB::table('users')->where('id', $id)->get()->first();


        //All policies
        $policies = DB::table('policies')->where('user_id', null)->get();

        //Staff policies
        $policies_staff = DB::table('policies')->where('user_id', $id)->get();

        return view('editstaff', compact('policies_staff', 'policies', 'id_staff', 'user'));
    }


    
    
}
