<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function getUserApi(){
        $user=User::all();
        return response()->json($user);
    }
    public function getUserApiById($id){
        $user=User::find($id);
        return response()->json($user);
    }

}
