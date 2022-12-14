<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogInController extends Controller
{
    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('login.login', ['formAction' => '/login']);
    }

    public function attempt()
    {
        if (Auth::attempt(['name' => request('name'), 'email' => request('email'), 'password' => request('password')])) {
            return redirect('/dashboard')->with('success', 'You are logged in!');
        }

        return redirect('/login')->with('error', 'Invalid credentials!');
    }

    /**
     * Log out func.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function logOut()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
