<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BranchRequest;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $info = [
            'name' => 'Branch',
            'route' => 'branch.index',
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
        
        return view('pages.list', 
        [
            'info' => $info,
            'array' => Branch::orderBy('name')->paginate(25)
        ]);
    }

    public function create()
    {
        $info = 
            [
                'name' => 'New branch',
                'route' => 'branch.store',
                'submit' => 'Create',
                'inputs' => 
                [
                    [
                        'label' => 'Name',
                        'id' => 'name',
                        'name' => 'name',
                        'type' => 'text',
                        'placeholder' => 'Please, write name of new branch'
                    ],
                    [
                        'label' => 'Address',
                        'name' => 'address',
                        'id' => 'address',
                        'type' => 'text',
                        'placeholder' => 'Please, write address of new branch'
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
    public function store(BranchRequest $request)
    {
        $data = $request->validated();
        Branch::create($data);
        
        // return redirect(route('branch.index'))->with('message', "New branch created");
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
            'route' => 'branch.update',
            'inputs' => 
            [
                [
                    'label' => 'Name',
                    'name' => 'name',
                    'id' => 'up_name',
                    'type' => 'text',
                    'placeholder' => 'Please, write name of new branch',
                    'value' => '$item->name'
                ],
                [
                    'label' => 'Address',
                    'name' => 'address',
                    'id' => 'up_address',
                    'type' => 'text',
                    'placeholder' => 'Please, write address of new branch'
                ]
            ]
        ];

        return view('pages.edit', [
            'object' => Branch::findOrFail($id),
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
        Branch::destroy($id);

        return redirect(route('branch.index'))->with('message', 'Deleted');
    }
}
