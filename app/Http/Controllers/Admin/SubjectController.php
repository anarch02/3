<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $info = [
            'name' => 'Subjects',
            'info_title' =>
            [
                'subject.index' => 'Subject',
            ],
            'create' => 
            [
                'route' => 'subject.create',
                'class' => 'btn btn-primary bi bi-plus',
                'name' => 'New subject'
            ],
            'table' =>
            [
                'thead' => ['Name', 'Action'],
                'tbody' => ['name'],
                'show' => 
                [
                    'class' => 'bi bi-eye text-secondary p-2',
                    'route' => 'subject.show'
                ],
                'edit' => [
                    'class' => 'bi bi-pencil-square text-secondary',
                    'route' => 'subject.edit',
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
            'array' => Subject::orderBy('name')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info = 
            [
                'name' => 'New subject',
                'route' => 'subject.store',
                'submit' => 'Create',
                'inputs' => 
                [
                    [
                        'label' => 'Name',
                        'id' => 'name',
                        'name' => 'name',
                        'type' => 'text',
                        'placeholder' => 'Please, write name of new branch'
                    ]
                ],
                'selects' => []
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
        $info = [
            'name' => 'Edit',
            'submit' => 'Save',
            'route' => 'subject.update',
            'inputs' => 
            [
                [
                    'label' => 'Name',
                    'name' => 'name',
                    'id' => 'up_name',
                    'type' => 'text',
                    'placeholder' => 'Please, write name of new branch',
                    'value' => '$item->name'
                ]
            ],
            'selects' => []

        ];

        return view('pages.edit', [
            'object' => Subject::findOrFail($id),
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
