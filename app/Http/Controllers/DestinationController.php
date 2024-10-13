<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\District;
use App\Models\Division;
use App\Models\Destination;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class DestinationController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $destinations = Destination::all();
        return view( 'admin.destination.index', compact( 'destinations' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $countries = Country::all();
        return view( 'admin.destination.create', compact( 'countries' ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $validateData = $request->validate( [
            'title'       => 'required',
            'subtitle'    => 'required',
            'country_id'  => 'required',
            'district_id' => 'required',
            'division_id' => 'required',
            'description' => 'required',
            'image'       => 'required|image|mimes:jpg,jpeg,png',
        ] );

        try {
            $destination = new Destination();
            $destination->title = $request->title;
            $destination->slug = Str::slug($request->title).time();
            $destination->subtitle = $request->subtitle;
            $destination->country_id = $request->country_id;
            $destination->division_id = $request->division_id;
            $destination->district_id = $request->district_id;
            $destination->description = $request->description;

            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $path = public_path('/uploads/images');
            $image->move($path, $imageName);
            $destination->image = $imageName;

            $destination->save();
            toastr()->addSuccess('Destination has been Stored');
            return redirect()->route('destination.index');
        } catch ( \Throwable $error ) {
            toastr()->addSuccess($error);
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show( Destination $destination ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request) {
        $countries = Country::all();
        $divisions = Division::all();
        $districts = District::all();
        $destination = Destination::where('slug', $request->slug)->first();
        return view('admin.destination.edit', compact('destination', 'countries', 'divisions', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Destination $destination ) {
        $validateData = $request->validate( [
            'title'       => 'required',
            'subtitle'    => 'required',
            'country_id'  => 'required',
            'district_id' => 'required',
            'division_id' => 'required',
            'description' => 'required',
            'image'       => 'image|mimes:jpg,jpeg,png',
        ] );

        try {
            $destination = Destination::where('slug', $request->slug)->first();
            $destination->title = $request->title;
            $destination->slug = Str::slug($request->title).time();
            $destination->subtitle = $request->subtitle;
            $destination->country_id = $request->country_id;
            $destination->division_id = $request->division_id;
            $destination->district_id = $request->district_id;
            $destination->description = $request->description;

            //image upload
            if ($request->image) {
                $path = public_path("/uploads/images/").$destination->image;
                if(File::exists($path)){
                    File::delete($path);
                }
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $path = public_path('/uploads/images');
                $image->move($path, $imageName);
                $destination->image = $imageName;
            }

            $destination->save();
            toastr()->addSuccess('Destination has been Updated');
            return redirect()->route('destination.index');
        } catch ( \Throwable $error ) {
            toastr()->addSuccess($error);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Destination $destination, $slug ) {
        $destination = Destination::where('slug', $slug)->first();
        $path = public_path("/uploads/images/").$destination->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $destination->delete();

        toastr()->addSuccess('Delete has been successful');
        return redirect()->back();
    }
}
