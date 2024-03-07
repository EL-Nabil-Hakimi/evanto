<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    protected $user;
    protected $roles;
    public function __construct(){
        $this->user = new User();
        $this->roles = new Roles();

    }
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



}
