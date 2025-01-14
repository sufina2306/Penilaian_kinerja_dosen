<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AtasanController extends Controller
{
    public function dashboard()
    {
        return view('pages.atasan.dashboard');
    }
}
