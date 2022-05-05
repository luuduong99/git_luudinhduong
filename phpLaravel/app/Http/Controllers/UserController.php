<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index ()
    {
        // \Debugbar::info($array);
        \Debugbar::error('Error!');
        \Debugbar::warning('Watch out…');
        \Debugbar::addMessage('Another message', 'mylabel');

        return view('users.list', ['user'=>'Bot']);
    }
}
