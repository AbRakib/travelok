<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Country;
use App\Models\Package;
use App\Models\District;
use App\Models\Division;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PackageController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $packages = Package::orderBy('created_at', 'DESC')->get();
        return view('admin.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $countries = Country::all();
        return view( 'admin.package.create', compact( 'countries' ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $validateData = $request->validate( [
            'title'          => 'required',
            'details'        => 'required',
            'country_id'     => 'required',
            'division_id'    => 'required',
            'district_id'    => 'required',
            'start_date'     => 'required',
            'end_date'       => 'required',
            'available_seat' => 'required',
            'total_cost'     => 'required',
            'image'          => 'required',
        ] );
        $package = new Package();
        $package->title = $request->title;
        $package->slug = Str::slug($request->title).time();
        $package->details = $request->details;
        $package->user_id = Auth::user()->id;
        $package->country_id = $request->country_id;
        $package->division_id = $request->division_id;
        $package->district_id = $request->district_id;
        $package->start_date = $request->start_date;
        $package->end_date = $request->end_date;
        $package->available_seat = $request->available_seat;
        $package->total_cost = $request->total_cost;
        
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $path = public_path('/uploads/images');
        $image->move($path, $imageName);
        $package->image = $imageName;
        $package->save();

        $images = $request->file('images');
        if ($images) {
            foreach ($images as $imag) {
                $image = new Image(); // new model instance
                $image->package_id = $package->id;
                $imagName = time().'.'.$imag->getClientOriginalExtension();
                $path = public_path('/uploads/images');
                $imag->move($path, $imagName);
                $image->image = $imagName;
                $image->save();
           }
        }
        toastr()->addSuccess('Package has been stored');
        return redirect()->route('package.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( Package $package ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Request $request ) {
        $package = Package::where('slug', $request->slug)->first();
        $countries = Country::all();
        $divisions = Division::all();
        $districts = District::all();
        return view('admin.package.edit', compact('package', 'countries', 'divisions', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Package $package ) {
        $validateData = $request->validate( [
            'title'          => 'required',
            'details'        => 'required',
            'country_id'     => 'required',
            'division_id'    => 'required',
            'district_id'    => 'required',
            'start_date'     => 'required',
            'end_date'       => 'required',
            'available_seat' => 'required',
            'total_cost'     => 'required',
        ] );
        $package = Package::where('slug', $request->slug)->first();
        $package->title = $request->title;
        $package->slug = Str::slug($request->title);
        $package->details = $request->details;
        $package->user_id = Auth::user()->id;
        $package->country_id = $request->country_id;
        $package->division_id = $request->division_id;
        $package->district_id = $request->district_id;
        $package->start_date = $request->start_date;
        $package->end_date = $request->end_date;
        $package->available_seat = $request->available_seat;
        $package->total_cost = $request->total_cost;
        
        // image upload
        if($request->image){
            $path = public_path("/uploads/images/").$package->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $path = public_path('/uploads/images');
            $image->move($path, $imageName);
            $package->image = $imageName;
        }
        $package->update();

        toastr()->addSuccess('Package has been update');
        return redirect()->route('package.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Package $package, $slug ) {
        $package = Package::where('slug', $slug)->first();
        $package->delete();

        toastr()->addSuccess('Package Delete Successfully');
        return redirect()->back();
    }
}
