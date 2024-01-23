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
    public function index()
    {
        /*try { 
            $users = User::with('name', 'email')->get(); 
 
            return view('user.index', compact('users')); // Assuming you have a Blade file named 'index.blade.php' 
        } catch (\Exception $ex) { 
            return back()->withInput()->withErrors(['error' => 'Failed to fetch users.']); 
        }*/

        /*try { 
            $users = User::select('name', 'email')->get(); // Fetch only 'name' and 'email' columns
            /*dd($users);*/
            /*return view('user.index', compact('users')); 
        } catch (\Exception $ex) { 
            return back()->withInput()->withErrors(['error' => 'Failed to fetch users.']); 
        }*/

        /*$users = User::with('users')->get();
        return view('users.index', ['users' => $users]);*/

        /*try { 
            // Fetch users using the User model
            $users = User::all(); // Change this line to fetch all users
    
            // Check if there are users to display
            if (count($users) < 1) {
                return view('user.index', ['users' => []]); // Pass an empty array of users to the view
            }
    
            // Return the view with the users
            return view('user.index', compact('users'));
        } catch (\Exception $ex) { 
            return back()->withInput()->withErrors(['error' => 'Failed to fetch users.']); 
        }*/

        /*try { 
            // Fetch users along with their related issues
            $users = User::with('issues')->get();
    
            // Check if there are users to display
            if ($users->isEmpty()) {
                return view('user.index', ['users' => []]); // Pass an empty array of users to the view
            }
    
            // Return the view with the users
            return view('user.index', compact('users'));
        } catch (\Exception $ex) { 
            return back()->withInput()->withErrors(['error' => 'Failed to fetch users.']); 
        }*/

        try{
            $users = User::with('projects')->get();
            return view('users.index', compact('users'));
        } catch (Exception $ex){
            return back()-> withInput()->withErrors(['error'=> 'Failed to ferch users.']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
