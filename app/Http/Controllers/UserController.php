<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
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
    public function __construct(){
        $this->user = new User();
        $this->roles = new Roles();
        $this->event = new Event();
        $this->ctgr = new Category();

    }

    // partie Admin
    public function dashboardpage(){
        
        return view('dashboard.index');
    }
    public function userspage(){
        $users = $this->user->with("role")->paginate(10);
        $count = $this->user->count();
        $roles = $this->roles->all();
        // dd($count);
        return view('dashboard.layouts.users' , compact('users' , 'count' , "roles"));
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

        $events = $this->event->latest()->get();
        $ctrgs = $this->ctgr->all();
  
        return view('/user.index' , compact('events' , 'ctrgs'));
    }
    public function getevent(Request $request)
    {   $id = $request->id;
        $event = $this->event->find($id);
        $ctgr = $this->ctgr->find($event->category_id);
        $admin = $this->user->find($event->user_id);
        $id = Session::get('user_id');
        $user = $this->user->find($id);
        
        return view('user.soloevent', compact('event' , 'ctgr' , 'user' , 'admin'));        
    }

}