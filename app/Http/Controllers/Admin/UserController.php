<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Branch;
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
            'info_title' =>
            [
                'user.index' => 'User',
            ],
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
                'show' => 
                [
                    'class' => 'bi bi-eye text-secondary p-2',
                    'route' => 'user.show'
                ],
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
                        'label' => 'Contact',
                        'id' => 'phone_number',
                        'name' => 'phone_number',
                        'type' => 'text',
                        'placeholder' => '+998 (00)... '
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
                ],
                'selects' => 
                [
                    [
                        'label' => 'Branch',
                        'array' => Branch::orderBy('name')->get(),
                        'name' => 'branch_id',
                        'id' => 'branch_id'
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
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        
        User::create($data);

        return redirect(route('user.idex'))->with('message', 'success');
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
        $info = [
            'name' => 'Edit',
            'submit' => 'Save',
            'route' => 'user.update',
            'inputs' => 
            [
                [
                    'label' => 'Name',
                    'name' => 'name',
                    'id' => 'up_name',
                    'type' => 'text',
                    'placeholder' => 'Please, write name of new branch',
                ],
                [
                    'label' => 'Contact',
                    'id' => 'up_phone_number',
                    'name' => 'phone_number',
                    'type' => 'text',
                    'placeholder' => '+998 (00)... '
                ],
                [
                    'label' => 'Login',
                    'name' => 'login',
                    'id' => 'up_login',
                    'type' => 'text',
                    'placeholder' => 'Please, write login of new branch',
                ],
                [
                    'label' => 'Password',
                    'name' => 'password',
                    'id' => 'up_password',
                    'type' => 'password',
                    'placeholder' => 'Please, write password of new branch'
                ]
            ],
            'selects' => 
            [
                [
                    'label' => 'Branch',
                    'array' => Branch::orderBy('name')->get(),
                    'name' => 'branch_id',
                    'id' => 'branch_id'
                ]
            ]
        ];

    return view('pages.action', [
        'object' => User::findOrFail($id),
        'info' => $info
    ]);
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
