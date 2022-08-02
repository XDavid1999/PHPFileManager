<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public static function show()
    {
        return view('login.login', ['formAction' => '/register']);
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        $request = request() -> validate([
            'email' => 'required|email:rfc,dns|unique:users,email',
            'name' => 'required|unique:users,name',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = User::create($request);
        auth()->login($user);
        return redirect('/dashboard');
    }
}
