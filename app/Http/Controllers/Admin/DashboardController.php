<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $info = [
            'name' => 'Dashbord',
            'info_title' =>
            [
                'admin.dashboard' => 'Dashboard'
            ] 
        ];
        return view('admin.home', [
            'info' => $info
        ]);
    }
}
