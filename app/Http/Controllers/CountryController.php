<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CountryController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $countries = Country::orderBy('created_at', 'DESC')->get();
        return view('admin.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( Country $country ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Country $country ) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Country $country ) {
        $validateData = $request->validate([
            'name' => ['required']
        ]);

        $country = Country::where('slug', $request->slug)->first();
        $country->name = $request->name;
        $country->slug = Str::slug($request->name);
        $country->update();

        toastr()->addSuccess('Country has been updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Country $country ) {
        //
    }
}
