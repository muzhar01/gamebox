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
        $new_games = Game::latest()->active()->take(20)->get();
        $papular_games = Game::active()->take(20)->get();
        // $foryou_games = Game::active()->take(15)->get();
        $sliders = Slider::where('status', 1)->get();
        $cat_games = Category::active()->with(['games' => function($q){
                return $q->active();
            }])
            ->whereHas('games')->take(7)->get();

        return view('front.index', ['sliders' => $sliders, 'new_games' => $new_games, 'papular_games' => $papular_games, 'cat_games' => $cat_games]);
    }
    
    /**
     * Show category specific resource.
     */
    public function category($id)
    {
        $cat = Category::findOrFail($id);
        $cat_name = $category->title ?? 'Game';
        $cat_games = Game::whereCategoryId($cat->id)->get();
        return view('front.category',['cat_name' => $cat_name, 'cat_games' => $cat_games]);
    }

    /**
     * Game play page
     */
    public function play($id)
    {
        $game = Game::findOrFail($id);
        return view('front.game', ['game' => $game]);
    }

    /**
     * Change Language
     */
    public function language($language)
    {
        if($language == 'ar'){
            session()->put('lang', 'ar');
        }else{
            session()->put('lang', 'en');    
        }

        return back();

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
