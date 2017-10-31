<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all();
        return view('home')->with(['users'=>$user]);
    }
    public function editRole($id){
        $user=User::find($id);
        $role=Role::all();
        return view('updateRole')->with(['user'=>$user])->with(['roles'=>$role]);
    }
    public function updateRole(Request $request){
        $userId=$request['user_id'];
        $userRole=$request['userRole'];

        $user=User::find($userId);
        $user->syncRoles($userRole);

        return redirect()->route('home');
    }
}
