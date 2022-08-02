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
    public static function show()
    {
        return view('login.login', ['formAction' => '/login']);
    }

    public function attempt(){
        if(Auth::attempt(['name' => request('name'), 'email' => request('email'), 'password' => request('password')])) {
            return redirect('/dashboard');
        }

        return redirect('/login');
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
