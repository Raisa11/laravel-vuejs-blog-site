<?php

namespace App\Http\Controllers;

use App\RegisterPublic;
use Illuminate\Http\Request;
use App\Exports\RegisterExport;
use Maatwebsite\Excel\Facades\Excel;

class RegisterUserController extends Controller
{
    public function registeredUsers(){
        $user = RegisterPublic::all();
        return view('admin.registerUser.registerUser',[
            'user'=>$user
        ]);
    }

    public function export(){
        return Excel::download(new RegisterExport, 'users.xlsx');
    }
}
