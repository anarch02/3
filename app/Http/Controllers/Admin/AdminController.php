<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\AdminUser;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $info = [
            'name' => 'Admin',
            'route' => 'admin.index',
            'create' => [
                'route' => 'admin.create',
                'class' => 'btn btn-primary bi bi-plus',
                'name' => 'New admin'
            ],
            'table' =>
            [
                'thead' => ['Name', 'login', 'Action'],
                'tbody' => ['name', 'login'],
                'edit' =>[
                        'class' => 'bi bi-pencil-square text-secondary',
                        'route' => 'admin.edit',
                    ],
                'delete'=>[
                        'class' => 'bi bi-trash text-danger',
                        'route' => 'admin.destroy',
                    ],
            ]
            
        ];
        
        return view('pages.list', 
        [
            'info' => $info,
            'array' => AdminUser::orderBy('name')->paginate(25)
        ]);
    }

    public function create()
    {
        $info = 
            [
                'name' => 'New admin',
                'route' => 'admin.store',
                'submit' => 'Create',
                'inputs' => 
                [
                    [
                        'label' => 'Name',
                        'id' => 'name',
                        'name' => 'name',
                        'type' => 'text',
                        'placeholder' => 'Please, write name of new admin'
                    ],
                    [
                        'label' => 'Login',
                        'id' => 'login',
                        'name' => 'login',
                        'type' => 'text',
                        'placeholder' => 'Please, write login of new admin'
                    ],
                    [
                        'label' => 'Password',
                        'name' => 'password',
                        'id' => 'password',
                        'type' => 'password',
                        'placeholder' => 'Please, write password of new admin'
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
    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);

        AdminUser::create($data);

        return response()->json(['success' => 'Success!']);
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
                'route' => 'admin.update',
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
                ]
        ];

        return view('pages.edit', [
            'object' => AdminUser::findOrFail($id),
            'info' => $info
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUser $request, string $id)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);

        AdminUser::findOrFail($id)->update($data);

        return response()->json(['success' => 'Success!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AdminUser::destroy($id);

        return redirect(route('admin.index'))->with('message', 'DELETED');
    }
}
