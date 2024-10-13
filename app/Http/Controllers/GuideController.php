<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\District;
use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class GuideController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $guides = User::where('is_admin', 2)->get();
        return view('admin.guide.index', compact('guides'));
    }

    /**
     * Display a active listing of the resource.
     */
    public function active() {
        //
    }

    /**
     * Display a pending listing of the resource.
     */
    public function pending() {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $countries = Country::all();
        $divisions = Division::all();
        $districts = District::all();
        return view('admin.guide.create', compact('countries', 'divisions', 'districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validateData = $request->validate([
            'name'           => ['required'],
            'father_name'    => ['required'],
            'email'          => ['required', 'unique:users'],
            'password'       => ['required', 'min:6'],
            'phone'          => ['required'],
            'birth_date'     => ['required'],
            'nid'            => ['required'],
            'profession'     => ['required'],
            'country_id'     => ['required'],
            'division_id'    => ['required'],
            'district_id'    => ['required'],
            'marital_status' => ['required'],
            'visited_places' => ['required'],
            'image'          => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:2024'],
        ]);

        try {
            $user                 = new User();
            $user->name           = $request->name;
            $user->slug           = Str::slug($request->name);
            $user->father_name    = $request->father_name;
            $user->email          = $request->email;
            $user->password       = Hash::make($request->password);
            $user->phone          = $request->phone;
            $user->birth_date     = $request->birth_date;
            $user->nid            = $request->nid;
            $user->profession     = $request->profession;
            $user->country_id     = $request->country_id;
            $user->division_id    = $request->division_id;
            $user->district_id    = $request->district_id;
            $user->marital_status = $request->marital_status;
            $user->visited_places = $request->visited_places;
            $user->is_admin       = 2;

            $image     = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path      = public_path('/uploads/images');
            $image->move($path, $imageName);

            $user->image = $imageName;
            $user->save();

            toastr()->addSaved("Guide Stored Successfully");
            return redirect()->route('guide.index');
        } catch (\Throwable $th) {
            toastr()->addSaved($th);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show() {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug) {
        $countries = Country::all();
        $divisions = Division::all();
        $districts = District::all();
        $user      = User::where('slug', $slug)->first();
        return view('admin.guide.edit', compact('user', 'countries', 'divisions', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $user         = User::findOrFail($id);
        $validateData = $request->validate([
            'name'           => ['required'],
            'father_name'    => ['required'],
            'email'          => ["required", Rule::unique('users')->ignore($user->id, 'id')],
            'phone'          => ['required'],
            'birth_date'     => ['required'],
            'nid'            => ['required'],
            'profession'     => ['required'],
            'country_id'     => ['required'],
            'division_id'    => ['required'],
            'district_id'    => ['required'],
            'marital_status' => ['required'],
            'visited_places' => ['required'],
        ]);

        try {
            $user->name           = $request->name;
            $user->slug           = Str::slug($request->name);
            $user->father_name    = $request->father_name;
            $user->email          = $request->email;
            $user->phone          = $request->phone;
            $user->birth_date     = $request->birth_date;
            $user->nid            = $request->nid;
            $user->profession     = $request->profession;
            $user->country_id     = $request->country_id;
            $user->division_id    = $request->division_id;
            $user->district_id    = $request->district_id;
            $user->marital_status = $request->marital_status;
            $user->visited_places = $request->visited_places;

            if ($request->image) {
                $path = public_path("/uploads/images/") . $user->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $image     = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $path      = public_path('/uploads/images');
                $image->move($path, $imageName);
                $user->image = $imageName;
            }

            $user->update();
            toastr()->addSuccess("Guide Update Successful");
            return redirect()->route('guide.index');
        } catch (\Throwable $th) {
            toastr()->addSuccess($th);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug) {
        $user = User::where('slug', $slug)->first();
        $path = public_path("/uploads/images/") . $user->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $user->delete();

        toastr()->addSuccess('Guide has been deleted');
        return redirect()->back();
    }

    public function getDivision(Request $request) {
        $country_id = $request->country_id;
        $divisions  = Division::where('country_id', $country_id)->orderBy('name', 'ASC')->get();
        return response()->json([
            "divisions" => $divisions,
        ]);
    }

    public function getDistrict(Request $request) {
        $division_id = $request->division_id;
        $districts   = District::where('division_id', $division_id)->orderBy('name', 'ASC')->get();
        return response()->json([
            "districts" => $districts,
        ]);
    }
}
