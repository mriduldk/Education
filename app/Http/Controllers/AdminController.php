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
        

        $admin = Admin::where('email', $request->email)->first();
        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::guard('admin')->login($admin);
            return $admin;
        }

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return view('admin/login/adminLogin');
    }
}