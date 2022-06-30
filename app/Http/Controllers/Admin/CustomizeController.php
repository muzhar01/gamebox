<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class CustomizeController extends Controller
{
    public function editHomePage()
    {
        $sliders = Slider::all();
        return view('admin.customize.homepage', compact('sliders'));
    }
}
