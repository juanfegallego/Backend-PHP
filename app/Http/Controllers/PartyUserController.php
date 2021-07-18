<?php

namespace App\Http\Controllers;

use App\Models\PartyUser;
use Illuminate\Http\Request;

class PartyUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        if($user->id === 1){

            $partyuser = PartyUser::all();

            return response() ->json([
                'success' => true,
                'data' => $partyuser,
            ]);

        } else {

            return response() ->json([
                'success' => false,
                'message' => 'You do not have permision.',
            ], 400);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $this->validate( $request , [
            'party_id' => 'required',
        ]);

        $partyuser = PartyUser::create ([
            'user_id' => $user -> id,
            'party_id' => $request -> party_id,
        ]);

        if ($partyuser) {

            return response() ->json([
                'success' => true,
                'data' => $partyuser
            ], 200);
    
        }

        return response() ->json([
            'success' => false,
            'message' => 'Party-User not added',
        ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PartyUser  $partyUser
     * @return \Illuminate\Http\Response
     */
    public function show(PartyUser $partyUser)
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

    public function byuser()
    {
        $user = auth()->user();

        $partyuser = PartyUser::where('user_id', '=', $user->id)->get();

        if($user->id){

            return response() ->json([
                'success' => true,
                'data' => $partyuser,
            ]);

        } else {

            return response() ->json([
                'success' => false,
                'message' => 'You do not have permision.',
            ], 400);

        }
    }

    public function byparty(Request $request)
    {
        $user = auth()->user();

        $partyuser = PartyUser::where('party_id', '=',  $request -> party_id)->get();

        if($user->id){

            return response() ->json([
                'success' => true,
                'data' => $partyuser,
            ]);

        } else {

            return response() ->json([
                'success' => false,
                'message' => 'You do not have permision.',
            ], 400);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PartyUser  $partyUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PartyUser $partyUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PartyUser  $partyUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(PartyUser $partyUser)
    {
        //
    } 
}
