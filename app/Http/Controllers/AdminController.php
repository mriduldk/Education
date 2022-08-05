<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Auth::logout();
        return view('admin/login/adminLogin');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // $teacher = User::create([
        //     'name' => "Admin",
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'type' => 1
        // ]);


        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return $user;
        }

    }

    public function logout()
    {
        Auth::logout();
        return view('admin/login/adminLogin');
    }
}