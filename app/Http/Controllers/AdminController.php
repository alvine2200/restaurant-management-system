<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Chefs;

class AdminController extends Controller
{
    public function users(){

        $data=user::all();

        return view('admin.users', compact('data'));
    }

    public function delete_user($id){

        $data=user::find($id);

        $data->delete();

        return redirect()->back()->with('message','User Successfully Deleted');

    }

    public function foodmenu(){

        $data=food::all();

        return view('admin.foodmenu', compact('data'));
    }

    public function add_foodmenu(Request $request){

        $data=new food;



        $image=$request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('foodimage',$imagename);

        $data->image=$imagename;


        $data->title=$request->title;

        $data->price=$request->price;

        $data->description=$request->description;

        $data->save();

        return redirect()->back()->with('message', 'Food Successfully Added');





    }


    public function delete_menu($id){

        $data=food::find($id);

        $data->delete();

        return redirect()->back()->with('message','Food Successfully Deleted');
    }


    public function update_menu($id){

        $data=food::find($id);

        return view('admin.update_foodmenu', compact('data'));

    }


    public function update_food(Request $request, $id){

        $data=food::find($id);


    
        $image=$request->image;

        if ($image) {
            

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('foodimage',$imagename);

        $data->image=$imagename;


        }


        $data->title=$request->title;

        $data->price=$request->price;

        $data->description=$request->description;




        $data->save();

        return redirect()->back()->with('message','Food Successfully Updated');

  }


    public function viewreservation(){

        $data=reservation::all();


        return view('admin.reservation', compact('data'));
    }


    public function addchefs(){

        $data=chefs::all();

        return view('admin.addchefs', compact('data'));
    }

    public function uploadchef(Request $request){

        $data=new chefs;


        $image=$request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('chefsimage',$imagename);

        $data->image=$imagename;


        $data->name=$request->name;

        $data->speciality=$request->speciality;

        $data->phone=$request->phone;


        $data->save();


        return redirect()->back()->with('message','New Chef Successfully Added');


    }

}
