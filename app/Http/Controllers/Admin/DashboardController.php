<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $category_count = Category::count() ?? 0;
        $game_count = Game::count() ?? 0;
        $user_count = User::count() ?? 0;
        return view('admin.index', compact('category_count', 'game_count', 'user_count'));
    }
}
