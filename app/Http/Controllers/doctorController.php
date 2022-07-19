<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctor;
use App\Models\patient;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendInvitation;

class doctorController extends Controller
{
    function home(){
        return view("doctor.home");
    }
    public function list(Request $req){
        $search=$req['search'] ?? "";
        if ($search  != "") {
            $doctors = Dcotor::where('name','=',$search)->get(); 
        }
        else{
            $doctors = Doctor::paginate(5);
        }
        return view('doctor.list')->with('doctors',$doctors);

    }
    public function pList(){
        $patients = Patient::paginate(10);  
        return view('patient.list')->with('patients',$patients);

    }
    public function makePescription(){
        $patients = Patient::all();  
        return view('pescription.make')->with('patients',$patients);

    }
    public function makePescriptionSubmit(Request $req,$id){
    $patients=Patient::where('id',$id)->first();
    $patients->pescription = $req->pescription;
    $patients->save();
    return "Pescription Created!";
    }
    public function editPescription(){
        $patients = Patient::all();  
        return view('pescription.edit')->with('patients',$patients);

    }
    public function editPescriptionSubmit(Request $req,$id){
    $patients=Patient::where('id',$id)->first();
    $patients->pescription = $req->pescription;
    $patients->update();
    return "Pescription Updated!";
    }
    public function viewPescription(Request $req,$id){
        $patients=Patient::where('id',$id)->first();
        return view('pescription.view')->with('patients',$patients);
    
        }
    function create(){
        return view('doctor.create');
    }
    function createSubmit(Request $req){
        $this->validate($req,
            [
                "name"=>"required|min:3|max:20",
                "email"=>"required",
                "phone"=>"required",
                "qualification"=>"required",
                "speciality"=>"required",
                "experience"=>"required",
                "password"=>"required|min:8",
                "cpassword"=>"required|same:password",
                "photo"=>"mimes:jpg,png,jpeg"
            ],        
            [
                "name.required"=>"Please provide your name",
                "email.required"=>"Please provide your email",
                "phone.required"=>"Please provide your phone number",
                "qualification.required"=>"Please provide your qualification",
                "speciality.required"=>"Please provide your Speciality",
                "email.required"=>"Please provide your email",
                "experience.required"=>"Please provide your Experience",
                "password.min"=>"Password must be more than 8 characters",
                "cpassword.same"=>"Passwords doesn't match",
                "photo.mimes"=>"File type invalid",      
            ]);
            
            //$photoName = $req->file('photo')->getClientOriginalName();
            $photoName = $req->name.".".$req->file('photo')->getClientOriginalExtension();
            $req->file('photo')->storeAs('Doctor Photos', $photoName);
            
            $dr = new Doctor();
            $dr->name = $req->name;
            $dr->email = $req->email;
            $dr->phone = $req->phone;
            $dr->qualification = $req->qualification;
            $dr->speciality =$req->speciality;
            $dr->experience = $req->experience;
            $dr->password =$req->password;
            $dr->cpassword = $req->cpassword;
            $dr->photo = $photoName;         
            $dr->save();
            
        return "Account Created! <br> Your Id: ".$dr->id;
        
    }
    function edit(){
        $dr = Doctor::where('id',session()->get('logged'))->first();
        return view('doctor.edit')->with('dr', $dr);
    }
    function editSubmit(Request $req)
    {
        $this->validate($req,
        [
            "name"=>"required|max:20|min:3",
            "email"=>"required|unique:user,email",
            "password"=>"required|min:8",
            "cpassword"=>"same:password"
        ],
        [
            "name.required"=>"Provide your name",
            "password.required"=>"Provide Password",
            "cpassword.same"=>"Confirm password and password don't match"
        ]
    );
    $dr=Doctor::where('id',session()->get('logged'))->first();
    //return $user;
    $dr ->name = $req->name;
    $dr ->email =$req->email;
    $dr ->phone =$req->phone;
    $dr ->qualification =$req->qualification;
    $dr ->speciality =$req->speciality;
    $dr ->experience =$req->experience;
    $dr ->password =$req->password;
    $dr ->cpassword =$req->cpassword;
    $dr->update();
    return view('doctor.dashboard')->with('dr', $dr);
    }
    
    function login(){
        return view('doctor.login');
    }
    function loginSubmit(Request $req)
    {
        $this->validate($req,[
            "id"=>"required",
            "password"=>"required"
        ]);
        $dr = Doctor::where('id',$req->id)
                            ->where('password',$req->password)->first();

        if($dr){
            session()->put('logged',$dr->id);
            return redirect()->route('doctor.dash');

        }
        else {
            session()->flash('msg','Invalid Id or Password');
        return back();
        }

    }
    function dashboard(){

        $dr = Doctor::where('id',session()->get('logged'))->first();
        return view('doctor.dashboard')->with('dr',$dr);
    }
    function mail(){
        Mail::to(['khaliduzzaman.mredul@hotmail.com'])->send(new SendInvitation("Hello", "1234", "Mredul"));
    }
}