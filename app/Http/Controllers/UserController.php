<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getAllUser(){
        $users= DB::table('users')->get();
        return view('admin.users.UserManagement', compact('users'));
    }
}
