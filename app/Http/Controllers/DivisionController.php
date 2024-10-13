<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Division;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DivisionController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $divisions = Division::orderBy('created_at', 'DESC')->get();
        $countries = Country::orderBy('created_at', 'DESC')->get();
        return view('admin.division.index', compact('divisions', 'countries'));
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
        $validateData = $request->validate([
            'country_id' => ['required'],
            'name' => ['required', 'max:20'],
        ]);

        $division = new Division();
        $division->name = $request->name;
        $division->slug = Str::slug($request->name);
        $division->country_id = $request->country_id;
        $division->save();

        toastr()->addSuccess("Division has been stored.");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show( Division $division ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Division $division ) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Division $division ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request ) {
        $slug = $request->slug;
        $division = Division::where('slug', $slug)->first();
        toastr()->addSuccess("Division has been Deleted");
        return redirect()->back();
    }
}
