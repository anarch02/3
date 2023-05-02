<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admin_message = true;
        return view('auth.login', [
            'admin_message' => $admin_message
        ]);
    }

    public function login(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'login' => ['required'],
            'password' => ['required']
        ]);

        if(auth('admin')->attempt($data)){
            return redirect('/admin/dashboard');
        };

        return 'test';
    }
}
