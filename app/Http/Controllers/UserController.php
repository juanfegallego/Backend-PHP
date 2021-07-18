<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    // Find all users (only user with id=1)

    public function index()
    {

    }

    public function all()
    {
        $user = auth()->user();

        $users = User::all();

        if($user->isAdmin == true){

            return response() ->json([
                'success' => true,
                'data' => $users,
            ]);

        } else {

            return response() ->json([
                'success' => false,
                'message' => 'You do not have permision.',
            ], 400);

        }
    }

    // public function myProducts()
    // {
    //     $user_id = Auth::id();
    //     // dd($user_id);
    //     $products = Product::where('user_id', $user_id)->with('categories', 'seller')->get();
    //     return $products;
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    // Find one user by id (user profile)
    public function show($id)
    {
        $user = auth()->user()->find($id);

        if(!$user){

            return response() ->json([
                'success' => false,
                'message' => 'User not found',
            ], 400);

        } else if ($user->isEmpty()) {
            
            return response() ->json([
                'success' => false,
                'message' => 'User not found',
                ], 400);

        } 

        return response() ->json([
            'success' => true,
            'data' => $user,
        ], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    // One user update his information
    public function update(Request $request, $id)
    {
        $user = auth()->user()->find($id);

        if(!$user){

            return response() ->json([
                'success' => false,
                'message' => 'User not found',
            ], 400);

        }    
        
        $updated = $user->update([
            'name' => $request->input('name'),
            'streamUsername' => $request->input('streamUsername'),
            'email' => $request->input('email'),
        ]);

        if($updated){
            return response() ->json([
                'success' => true,
            ]);
        } else {
            return response() ->json([
                'success' => false,
                'message' => 'User can not be updated',
            ], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

     // Delete user
    public function destroy($id)
    {
        $user = auth()->user()->find($id);

        if(!$user){

            return response() ->json([
                'success' => false,
                'message' => 'User not found',
            ], 400);

        }
        if($user -> delete()){
            return response() ->json([
                'success' => true,
                'message' => 'User deleted',
            ], 200);
            
        } else {
            return response() ->json([
                'success' => false,
                'message' => 'User can not be deleted',
            ], 500);
        }

    }
}