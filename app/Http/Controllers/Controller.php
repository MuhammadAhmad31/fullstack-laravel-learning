<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public $data = [];

    public function __construct()
    {
        $this->data['nav'] = [
            ['name' => 'Posts', 'route' => 'posts.list'],
            ['name' => 'Users', 'route' => 'users.list'],
        ];
    }
}
