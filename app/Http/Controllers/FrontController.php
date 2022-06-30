<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Game;
use App\Models\Slider;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $new_games = Game::latest()->take(20)->get();
        $papular_games = Game::take(20)->get();
        $foryou_games = Game::take(15)->get();
        $sliders = Slider::where('status', 1)->get();

        return view('front.index', ['sliders' => $sliders, 'new_games' => $new_games, 'papular_games' => $papular_games, 'foryou_games' => $foryou_games]);
    }
    
    /**
     * Show category specific resource.
     */
    public function category($category)
    {
        $cat = Category::whereTitle($category)->first();
        $cat_name = $category ?? 'Game';
        $cat_games = Game::whereCategoryId($cat->id)->get();
        return view('front.category',['cat_name' => $cat_name, 'cat_games' => $cat_games]);
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
