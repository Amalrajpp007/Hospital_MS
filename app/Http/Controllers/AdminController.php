<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Notification;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function addDoctors(){
        return view('admin.addDoctor');
    }
    public function uploadDoctor(Request $request){
        $doctor=new Doctor;
        $image=$request->file;
        $image_name=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctor_image',$image_name);
        $doctor->image=$image_name;
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;
        $doctor->save();
        return redirect()->route('add_doctors_view')->with('message',"Doctor added successfully");
    }
    public function viewAppontments(){
        if(Auth::id()){
         if(Auth::user()->userType=='1')
      
        $appointments=Appointment::all();
        return View('admin.appointments',compact('appointments'));
        }
        else{
            return redirect('/');
        }
        }
    
    public function cancelAppoint($id){
     $data=Appointment::find($id);
     $data->status='Canceled';
     $data->save();
     return back();
    }
    public function approveAppoint($id){
        $data=Appointment::find($id);
     $data->status='Approved';
     $data->save();
     return back();
    }
    public function viewDoctors(){

        $doctors=Doctor::all();
        return View('admin.doctors',compact("doctors"));
    }
    public function deleteDoctor($id){
        $data=Doctor::find($id);
        $data->delete();

        return back();
    }
    public function updateDoctor($id){
        $doctor=Doctor::find($id);
        
        return view('admin.updo',compact('doctor'));
    }
    public function saveUpdate(Request $request){
        $id=$request->id;
       
       
        $doctor=Doctor::find($id);
        $doctor->name=$request->name;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;
        $doctor->phone=$request->phone;
        $image=$request->file;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->file->move('doctor_image',$imagename);
            $doctor->image=$imagename;
        }
        $doctor->update();
        
        return redirect()->route('admin.view_doctors');
    }
    public function viewEmail($id){
        $data=Appointment::find($id);
        return view('admin.email',compact('data'));
    }
    public function sendEmail($id,Request $request){
        $data=Appointment::find($id);
        $details=['greeting'=>$request->greeting,
                'text'=>$request->text,
                'body'=>$request->body,
                'url'=>$request->url,
                'end'=>$request->end
    ];
    Notification::send($data,new SendEmailNotification($details));

        return redirect()->back()->with('message','Email send is successfull');
    }
    
}
