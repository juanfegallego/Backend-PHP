<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parties = Party::all();

        return response()->json([
            'success' => true,
            'data' => $parties
        ], 200);
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
            'name' => 'required',
            'game_id' => 'required',
        ]);

        $party = Party::create ([
            'name' => $request -> name,
            'game_id' => $request -> game_id,
        ]);

        if ($party) {

            return response() ->json([
                'success' => true,
                'data' => $party
            ], 200);
    
        }

        return response() ->json([
            'success' => false,
            'message' => 'Party not added',
        ], 500);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $party = Party::where('id', '=', $id)->get();

            if(!$party){
    
                return response() ->json([
                    'success' => false,
                    'message' => 'Party not found',
                ], 400);
    
            } else if ($party->isEmpty()) {
            
                return response() ->json([
                    'success' => false,
                    'message' => 'Party not found',
                    ], 400);
    
            } 

            return response() ->json([
                'success' => true,
                'data' => $party,
            ], 200);
    }

    public function byname($name)
    {
        $party = Party::where('name', '=', $name)->get();

            if(!$party){
    
                return response() ->json([
                    'success' => false,
                    'message' => 'Party not found',
                ], 400);
    
            } else if ($party->isEmpty()) {
            
                return response() ->json([
                    'success' => false,
                    'message' => 'Party not found',
                    ], 400);
    
            } 

            return response() ->json([
                'success' => true,
                'data' => $party,
            ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $party = Party::where('id', '=', $id);

        if(!$party){

            return response() ->json([
                'success' => false,
                'message' => 'Party not found',
            ], 400);

        }

        $updated = $party -> update ([
            'name' => $request->input('name'),
        ]);

        if($updated){
            return response() ->json([
                'success' => true,
            ]);
        } else {
            return response() ->json([
                'success' => false,
                'message' => 'Party can not be updated',
            ], 500);
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $party = Party::where('id', '=', $id);

        if(!$party){

            return response() ->json([
                'success' => false,
                'message' => 'Party not found',
            ], 400);

        }

        if($party -> delete()) {
            return response() ->json([
                'success' => true,
                'message' => 'Party deleted',
            ], 200);
            
        } else {
            return response() ->json([
                'success' => false,
                'message' => 'Party can not be deleted',
            ], 500);
        }
    }
}