<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\Welcome;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationsRequest;

class RegistrationsController extends Controller
{
    public function create()
    {
        return view('registrations.create');
    }

    /**
     * Register a User -> Typehint validation request
     * @return [type] [description]
     */
    public function store(RegistrationsRequest $request)
    {
        // Validate the form -> moved to RegistrationsRequest class. When we typehint the registration request, Laravel is going to detect it and off the bat it will validate the form
        // $this->validate(request(), [
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|confirmed'
        // ]);
        
        // Create and save the user
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
        
        // Sign them in
        auth()->login($user);
        // Send registration email
        \Mail::to($user)->send(new Welcome($user));
        
        // Flash message
        session()->flash('message', 'Thanks so much for signing up!');

        // Redirect to home page
        return redirect()->home();
    }
}
