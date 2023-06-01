<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function calendar($id)
    {
        $info = [
            'name' => 'Branch',
            'info_title' =>
            [
                'branch.index' => 'Branchs',
            ],
            'create' => 
            [
                'route' => 'branch.create',
                'class' => 'btn btn-primary bi bi-plus',
                'name' => 'New branch'
            ],
            'table' =>
            [
                'thead' => ['Name', 'Address', 'Action'],
                'tbody' => ['name', 'address'],
                'show' => 
                [
                    'class' => 'bi bi-eye text-secondary p-2',
                    'route' => 'branch.show'
                ],
                'edit' => [
                    'class' => 'bi bi-pencil-square text-secondary',
                    'route' => 'branch.edit',
                ],
                'delete' => [
                    'class' => 'bi bi-trash text-danger',
                    'route' => 'branch.destroy',
                ],
            ]
            
        ];

        
        
        $users = Group::findOrFail($id)->users;
        $dates = Attendance::where('group_id', $id)->distinct('date')->pluck('date');
        
        return view('pages.calendar', compact('users', 'dates', 'info'));
    }
}
