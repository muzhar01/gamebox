<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::paginate(10);
        return view('admin.game.index', ['games' => $games]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required',
            'short_name' => 'required',
            'description' => 'required',
            'start_path' => '',
            'status' => ''
        ]);

        $game = new Game();
        $game->fill($inputs);
        $game->save();
        $notifiction=array('message'=>'Game Added Successfully','alert-type'=>'success');
        return redirect()->route('game.index')->with($notifiction);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        if($game->id){
            return view('admin.game.create', ['game' => $game]);
        }

        return redirect()->route('game.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $inputs = $request->validate([
            'title' => 'required',
            'short_name' => 'required',
            'description' => 'required',
            'start_path' => '',
            'status' => ''
        ]);

        if($game->id){
            $game->fill($inputs);
            $game->update();

        }else{
            dd($game);
        }
        
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        Game::destroy($game);

        return back()->with('success', 'Game deleted successfully.');
    }

}
