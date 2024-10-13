<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    public function index() {
        return view('admin.pages.login');
    }

    public function access(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempt to log in the user
        if (Auth::attempt($credentials)) {
            if(Auth::user()->is_admin == 1){
                toastr()->addSuccess('You Logged In Successfully Done.');
                return redirect()->route('dashboard'); 
            } elseif(Auth::user()->is_admin == 2) {
                toastr()->addSuccess('You Logged In Successfully Done.');
                return redirect()->route('dashboard');
            } else {
                toastr()->addSuccess('<strong>We’re sorry</strong>, you are not Admin');
                return redirect()->route('home');
            }
        } else {
            toastr()
            ->escapeHtml(false)
            ->addError('<strong>We’re sorry</strong>, but an error occurred.');
            return redirect()->back();
        }
    }

    public function logout() {
        Auth::logout();
        toastr()->addSuccess('You Log Out Successfully Done.');
        return redirect()->route('login');
    }
}
