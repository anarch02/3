<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Group;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::get();
        // $group = Group::all();

        // foreach($group as $group)
        // {
        //     $group->users()->attach($users->random(rand(1, 100))->pluck('id')->toArray());
        // }

        $info = [
            'name' => 'Groups',
            'info_title' =>
            [
                'group.index' => 'Groups',
            ],
            'create' => 
            [
                'route' => 'group.create',
                'class' => 'btn btn-primary bi bi-plus',
                'name' => 'New group'
            ],
            'table' =>
            [
                'thead' => ['Name', 'Started', 'Action'],
                'tbody' => ['name', 'startDate'],
                'show' => 
                [
                    'class' => 'bi bi-eye text-secondary p-2',
                    'route' => 'group.show'
                ],
                'edit' => [
                    'class' => 'bi bi-pencil-square text-dark',
                    'route' => 'group.edit',
                ],
                'delete' => [
                    'class' => 'bi bi-trash text-danger',
                    'route' => 'group.destroy',
                ],
            ]
        ];
        
        return view('pages.list', 
        [
            'info' => $info,
            'array' => Group::orderBy('name')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info = 
            [
                'name' => 'New group',
                'route' => 'group.store',
                'submit' => 'Create',
                'inputs' => 
                [
                    [
                        'label' => 'Name',
                        'id' => 'name',
                        'name' => 'name',
                        'type' => 'text',
                        'placeholder' => 'Please, write name of new user'
                    ]
                ],
                'selects' => 
                [
                    [
                        'label' => 'Branch',
                        'array' => Branch::orderBy('name')->get(),
                        'name' => 'branch_id',
                        'id' => 'branch_id'
                    ],
                    [
                        'label' => 'Subject',
                        'array' => Subject::orderBy('name')->get(),
                        'name' => 'subject_id',
                        'id' => 'branch_id'
                    ],
                    [
                        'label' => 'Teacher',
                        'array' => User::where('isTeacher', 'true')->orderBy('name')->get(),
                        'name' => 'user_id',
                        'id' => 'branch_id'
                    ],
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
        $group = Group::findOrFail($id);
        $info = [
            'name' => 'Show',
            'type' => 'Group',
            'info_title' =>
            [
                'group.index' => 'Groups',
            ],
            'tabs' => 
            [
                'nav' => 
                    [
                        [
                            'id' => 'overview',
                            'name' => 'Overview'
                        ],
                        [
                            'id' => 'students',
                            'name' => 'Students',
                        ]
                    ],
                'content' => 
                    [
                        [
                            'id' => 'overview',
                            'type' => 'info_with_key',
                            'content' =>
                                [
                                    'Branch' => $group->branch->name,
                                    'Subject' => $group->subject->name,
                                    'Teacher' => $group->user->name,
                                ]
                        ],
                        [
                            'id' => 'students',
                            'type' => 'table',
                            'content' => 
                                [
                                    'list' => [$group->users],
                                    'thead' => ['name', 'contact'],
                                    'tbody' => ['name', 'phone_number']
                                ]
                        ]
                    ]
                // [
                //     'id' => 'overview',
                //     'title' => 'Overview',
                //     'tabs_inner' =>
                //     [
                //         'Branch' => $group->branch->name,
                //         'Subject' => $group->subject->name,
                //         'Teacher' => $group->user->name,
                //         'Students amount' => 0,
                //     ]
                // ],
                // [
                //     'id' => 'more',
                //     'title' => 'More',
                //     'tabs_inner' =>
                //     [
                //         'Branch' => $group->branch->name,
                //         'Subject' => $group->subject->name,
                //         'Teacher' => $group->user->name,
                //         'Students amount' => 0,
                //     ]
                // ],

            ]
        ];

        return view('pages.show', [
            'info' => $info,
            'object' => $group
        ]);
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
                        'id' => 'name',
                        'name' => 'name',
                        'type' => 'text',
                        'placeholder' => 'Please, write name of new user'
                    ]
                ],
            'selects' => 
                [
                    [
                        'label' => 'Branch',
                        'array' => Branch::orderBy('name')->get(),
                        'name' => 'branch_id',
                        'id' => 'branch_id'
                    ],
                    [
                        'label' => 'Subject',
                        'array' => Subject::orderBy('name')->get(),
                        'name' => 'subject_id',
                        'id' => 'branch_id'
                    ],
                    [
                        'label' => 'Teacher',
                        'array' => User::where('isTeacher', 'true')->orderBy('name')->get(),
                        'name' => 'user_id',
                        'id' => 'branch_id'
                    ],
                ]
        ];

    return view('pages.action', [
        'object' => Group::findOrFail($id),
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
