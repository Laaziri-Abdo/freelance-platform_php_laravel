<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\project;
use App\Models\client;
use App\Models\freelancer;
use App\Models\competance;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    function login(){
        return view('freelancer.auth.login');
    }
    function register(){
        return view('freelancer.auth.register');
    }
    function save(Request $request){
        
        //Validate requests
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:freelancers',
            'password'=>'required|min:5|max:12'
        ]);

         //Insert data into database
         $freelancer = new freelancer;
         $freelancer->name = $request->name;
         $freelancer->email = $request->email;
         $freelancer->password = Hash::make($request->password);
         $save = $freelancer->save();

         if($save){

            $request->session()->put('LoggedUser',  $freelancer->id);
            return redirect('freelancer/dashboard')->with('success','New User has been successfuly added to database');

            // return back()->with('success','New User has been successfuly added to database');
         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
    }
    public function update(Request  $request, $id){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'experience'=>'required'
        ]);
        $freelancer = freelancer::find($id);
        $freelancer->name = $request->input('name');
        $freelancer->email = $request->input('email');
        if($request->image){
            $imageName = date('mdYHis').uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('img/'), $imageName);
            $freelancer->image = $imageName;
        }
        $freelancer->experience = $request->input('experience');
        $save= $freelancer->save();
        if ($save) {
            return redirect('/freelancer/profile')->with('success','You have successfuly update your profile');
        }elseif(!$save){
            return back()->with('danger','Something went wrong');
        }
      
   }

    function check(Request $request){
        //Validate requests
        $request->validate([
             'email'=>'required|email',
             'password'=>'required|min:5|max:12'
        ]);

        $userInfo = freelancer::where('email','=', $request->email)->first();

        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('freelancer/dashboard');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }

    function dashboard(){

    $data = ['LoggedUserInfo'=>freelancer::where('id','=', session('LoggedUser'))->first()
    ,'projectArr'=>project::all(),
    'freelancerArr'=>freelancer::all(),
    'clientArr'=>client::all(),
    'countfreelancers'=>freelancer::count(),
    'countprojects'=>project::count(),
    'countclients'=>client::count()];
        return view('freelancer.dashboard', $data);
    }

    function settings(){
        $data = ['LoggedUserInfo'=>freelancer::where('id','=', session('LoggedUser'))->first() ,'projectArr'=>project::all()];
        return view('freelancer.category', $data);
    }

    function profile(){
        $data = ['LoggedUserInfo'=>freelancer::where('id','=', session('LoggedUser'))->first(),'CompetanceArr'=>competance::all()];
        return view('freelancer.profile', $data);
    }

    // competance---------------------------
    public function deleteCompetance($id){
        competance::destroy(array('id',$id));
        return back();
    }

    public function createCompetance(Request $req){  
        $competance = new competance;
        $competance->name = $req->input('name');
        $competance->freelancer_id = session()->get('LoggedUser');
        $competance->save();
        return back();
    }
    // end of competance---------------------------

    function staff(){
        $data = ['LoggedUserInfo'=>freelancer::where('id','=', session('LoggedUser'))->first()
        ,'myProjects'=>project::all()];
        return view('freelancer.staff', $data);
    }
    
}
