<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Chefs;



class HomeController extends Controller
{
    public function index(){

        $data=food::all(); 

        $chefdata=chefs::all(); 

        return view('home', compact("data","chefdata"));
    }

    public function redirects(){

        $usertype=Auth::user()->usertype;

        if($usertype == '1'){

            return view('admin.home');
        }

        else{
            
            $data=food::all();
            return view('home', compact('data'));
        }
    }

    public function reservation(Request $request){


        $data= new reservation;

        $data->name=$request->name;

        $data->email=$request->email;

        $data->phone=$request->phone;

        $data->guest=$request->guest;

        $data->date=$request->date;

        $data->time=$request->time;

        $data->message=$request->message;

        $data->save();


        return redirect()->back()->with('message','Reservation successfully Made');



    }




}
