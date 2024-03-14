<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    protected $user;
    protected $roles;
    protected $event;
    protected $ctgr;
    protected $res;
    public function __construct(){
        $this->user = new User();
        $this->roles = new Roles();
        $this->event = new Event();
        $this->ctgr = new Category();
        $this->res = new Reservation();

    }

    // partie Admin
    public function dashboardpage(){
        $users = $this->user->count();
        $event = $this->event->count();
        $ctgr = $this->ctgr->count();   

        return view('dashboard.index' , compact( 'ctgr', 'event' , 'users' ));
    }
    public function dashboardpageOrg(){
        
        $event = $this->event::where('user_id', Session::get('user_id'))->count();

        $res = $this->event::where('user_id', Session::get('user_id'))->withCount('reservations')->first();

        return view('dashboard.layouts.static' , compact( 'event', 'res' ));    
    }

    public function userspage(){
        $users = User::with("role")->paginate(10);
        $roles = $this->roles->all();   
        return view('dashboard.layouts.users' , compact('users'  , "roles"));
    }

    public function usersedit(Request $request){
        $user = $this->user->find($request->id);
        // dd($user);
        if(!empty($user)){

            $user->role_id = $request->role_id;
            $user->update();
             return redirect()->back()->with("msg", "Role is update with succesfly");        

        }      

    }

    public function usersdelete($id){

        $user = $this->user->find($id);
        // dd($user);
        if(!empty($user)){

            $user->delete();
             return redirect()->back()->with("delmsg", "User is delete with succesfly");        

        }
    }


    // partie user
    public function index(){

        $events = $this->event->where('status' , 2)->latest()->paginate(9);
        $ctrgs = $this->ctgr->all();
  
        return view('/user.index' , compact('events' , 'ctrgs'));
    }
    public function getevent(Request $request)


    {
        try{
        $id = $request->id;

        $event = Event::with('category', 'user')->where('id', $id)->where('status', 2)->first();

        
        return view('user.soloevent', compact('event' ));        
    }
    catch(\Exception $e){
        return redirect()->back()->with("msg", "error");
    }
    }

}