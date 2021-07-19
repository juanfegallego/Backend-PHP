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

        $games = Game::all();

        if(!$games){

            return response() ->json([
                'success' => false,
                'message' => 'Game not found',
            ], 400);

        }

        return response() ->json([
            'success' => true,
            'data' => $games,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $this->validate( $request , [
                'title' => 'required',
                'image_url' => 'required',
                'url' => 'required',

            ]);
    
            $game = Game::create ([
    
                'title' => $request -> title,
                'image_url' => $request -> image_url,
                'url' => $request -> url,
            ]);
    
            if(!$game){
                
                return response() ->json([
                    'success' => false,
                    'message' => 'Game not added',
                ], 500);
            }

            return response() ->json([
                'success' => true,
                'data' => $game
            ], 200);
    
            


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        {
            $game = Game::where('id', $id)->get();
            return response()->json([
                'success' => true,
                'data' => $game,
            ], 200);
        }             
    }

    public function bytitle($title)
    {       
        $game = Game::where('title', '=', $title)->get();

        if(!$game){

            return response() ->json([
                'success' => false,
                'message' => 'Game not found',
            ], 400);

        } else if ($game->isEmpty()) {
            
            return response() ->json([
                'success' => false,
                'message' => 'Game not found',
                ], 400);

        } 

        return response() ->json([
            'success' => true,
            'data' => $game,
        ], 200);
    
             
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
