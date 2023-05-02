<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $info = [
            'name' => 'Users',
            'route' => 'user.index',
            'create' => 
            [
                'route' => 'user.create',
                'class' => 'btn btn-primary bi bi-plus',
                'name' => 'New user'
            ],
            'table' =>
            [
                'thead' => ['Name', 'Contact', 'Action'],
                'tbody' => ['name', 'phone_number'],
                'edit' =>[
                        'class' => 'bi bi-pencil-square text-secondary',
                        'route' => 'user.edit',
                    ],
                'delete'=>[
                        'class' => 'bi bi-trash text-danger',
                        'route' => 'user.destroy',
                    ],
            ]
            
        ];
        
        return view('pages.list', 
        [
            'info' => $info,
            'array' => User::orderBy('name')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info = 
            [
                
                'name' => 'New user',
                'route' => 'user.store',
                'submit' => 'Create',
                'inputs' => 
                [
                    [
                        'label' => 'Name',
                        'id' => 'name',
                        'name' => 'name',
                        'type' => 'text',
                        'placeholder' => 'Please, write name of new user'
                    ],
                    [
                        'label' => 'Login',
                        'id' => 'login',
                        'name' => 'login',
                        'type' => 'text',
                        'placeholder' => 'Please, write login of new user'
                    ],
                    [
                        'label' => 'Password',
                        'name' => 'password',
                        'id' => 'password',
                        'type' => 'password',
                        'placeholder' => 'Please, write password of new user'
                    ]
                ]
            ];

        return view('pages.action', [
            'info' => $info
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
