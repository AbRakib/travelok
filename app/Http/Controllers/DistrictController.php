<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DistrictController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $districts = District::orderBy( 'created_at', 'DESC' )->get();
        $divisions = Division::orderBy( 'created_at', 'DESC' )->get();
        return view( 'admin.district.index', compact( 'districts', 'divisions' ) );
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
        $validateData = $request->validate( [
            'name'        => ['required'],
            'division_id' => ['required'],
        ] );

        $district = new District();
        $district->division_id = $request->division_id;
        $district->name = $request->name;
        $district->slug = Str::slug( $request->name );
        $district->save();

        toastr()->addSuccess( 'District has been Stored.' );
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show( District $district ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( District $district ) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, District $district ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request ) {
        $slug = $request->slug;
        $district = District::where( 'slug', $slug )->first();
        $district->delete();

        toastr()->addSuccess( 'District has been Deleted.' );
        return redirect()->back();
    }
}
