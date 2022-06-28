<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomizeController extends Controller
{
    public function editHomePage()
    {
        return view('admin.customize.homepage');
    }
}
