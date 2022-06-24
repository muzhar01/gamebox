<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::paginate(10);
        return view('admin.game.index', ['games' => $games]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.game.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required',
            'short_name' => 'required',
            'description' => 'required'
        ]);

        $game = new Game();
        $game->fill($inputs);
        $game->save();
        $notifiction=array('message'=>'Game Added Successfully','alert-type'=>'success');
        return redirect()->route('game.index')->with($notifiction);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game, Request $request)
    {
        $request->validate([
            'status' => 'required|integer'
        ]);

        if($game->id){
            $game->update(['status'=> $request->status]);
            return back()->with('success', 'Status changed');
        }else{
            return back()->with('error', 'Some error, status not changed');
        }
    }

    /**
     * Show the form for editing the specified resource.
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
        if($game->id){
            Game::destroy($game->id);
            return back()->with('success', 'Game deleted successfully.');
        }
        
        return back()->with('error', 'Error: Something wrong.');
    }

}
