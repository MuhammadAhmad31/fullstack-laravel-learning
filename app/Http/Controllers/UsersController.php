<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $card = [
            [
                'header' => 'ini adalah header card 1',
                'content' => 'ini adalah content card 1',
                'footer' => 'ini adalah footer card 1',
            ],
            [
                'header' => 'ini adalah header card 2',
                'content' => 'ini adalah content card 2',
                'footer' => 'ini adalah footer card 2',
            ],
            [
                'header' => 'ini adalah header card 3',
                'content' => 'ini adalah content card 3',
                'footer' => 'ini adalah footer card 3',
            ],
        ];

        $dataTable = [
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'photo' => 'https://randomuser.me/api/portraits/men/1.jpg',
                'balance' => 1000000,
                'status' => 'active',
                'birth' => '2023-01-15',
            ],
            [
                'id' => 2,
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'photo' => 'https://randomuser.me/api/portraits/men/2.jpg',
                'balance' => 200000,
                'status' => 'inactive',
                'birth' => '2023-02-20',
            ],
            [
                'id' => 3,
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'photo' => 'https://randomuser.me/api/portraits/men/3.jpg',
                'balance' => '2000000',
                'status' => 'active',
                'birth' => '2023-03-10',
            ],
        ];

        $user = [
            'id' => 1,
            'name' => 'John Doe',
            'age' => 28,
            'email' => 'john@example.com',
            'role' => 'editor',
            'permissions' => ['read', 'write'],
            'gender' => 'M',
            'bio' => 'This is John’s bio.',
            'avatar' => 'john.png'
        ];

        $roleOptions = [
            'admin' => 'Admin',
            'editor' => 'Editor',
            'user' => 'User',
        ];


        return view('welcome', compact('card', 'dataTable', 'user', 'roleOptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
