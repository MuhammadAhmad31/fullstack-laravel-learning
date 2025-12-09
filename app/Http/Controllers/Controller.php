<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public $data = [];

    public function __construct()
    {
        $this->data['nav'] = [
            ['label' => 'Posts', 'route' => 'posts.list'],
            ['label' => 'Users', 'route' => 'users.list']
        ];
    }
}
