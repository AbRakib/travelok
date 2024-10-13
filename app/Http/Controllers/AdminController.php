<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\District;
use App\Models\Division;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {
    public function index() {
        return view('admin.dashboard');
    }

    // profile
    public function profile() {
        $profile = User::findOrFail(Auth::user()->id);
        $countries = Country::all();
        $divisions = Division::all();
        $districts = District::all();
        return view('admin.profile.index', compact('profile', 'countries', 'divisions', 'districts'));
    }
}
