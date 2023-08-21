<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class AdminController extends Controller
{
    //login page
    public function login_page()
    {
        if(Auth::check()){
            return redirect('/');
        }else{
            return view('auth.login');
        }
    }
    //check login
    public function login(Request $request)
    {
        $Datavalidate = $request->validate([
            'email'=> 'required',
            'password'=> 'required',
        ]);

        $user = User::where('email', request()->email)->first();

        if ($user && Auth::attempt(['email' => $request->email, 'password' => $request->password , 'status' => true]))  {
            return redirect()->route('control');
        } else {
            return back()->withErrors(['Incorrect password or email']);
        }
    }
    //check role user
    public function chackrole()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            if ($role == 'admin') {
                return view('back.control');
            }

            if ($role == 'user') {
                flash('There is no user control panel available at this time')->warning();
                return back();
            }
        }
        return redirect()->route('login.page');
    }
    //log out
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect('/');
    }

    public function allUser()
    {
        $allUser = User::where('role','user')->orderByDesc('created_at')->paginate(20);
        return view('back.all-user',compact('allUser'));
    }
}
