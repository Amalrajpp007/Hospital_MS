<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;


class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id()){

           if(Auth::user()->userType=='0'){
             
            $doctors=Doctor::all();

        return view("user.home",compact("doctors"));

           }
           else
           {
            
            return view("admin.home");
           }
        }
        else{
            return redirect()->route('user.index');
        }
    }
    public function index(){
        if(Auth::id()){

            return redirect('/home');
    }
    else{
        $doctors=Doctor::all();

        return view("user.home",compact("doctors"));
    }
}
public function postAppointment(Request $request){
    $status='In progress';
    $appointment= new Appointment;
    $appointment->username= $request->username;
    $appointment->email= $request->email;
    $appointment->doctor= $request->doctor;
    $appointment->date=$request->date;
    $appointment->status= $status;
    $appointment->phone=$request->phone;
    $appointment->user_id=$request->user_id;
    $appointment->message=$request->message;
    
    if(Auth::id()){
        $appointment->user_id=Auth::user()->id;}
   
        $appointment->save();
      return back()->with('message',"Application submited successfully. we will contact you son");
}
public function viewAppointment(Request $request){
   $user_id=Auth::user()->id;
    $appointments=Appointment::where('user_id',$user_id)->get();
   
    
    return view('user.appointmentView',compact('appointments'));
}
public function deleteAppointment($id){
   
   $data=Appointment::find($id);
   $data->delete();
    return back();
}
}
