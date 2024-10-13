<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $abouts = About::all();
        return view('admin.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $validateData = $request->validate([
            'title' => 'required|unique:abouts|max:45',
            'details' => 'required|max:500',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2024'
        ]);

        try {
            $about = new About();
            $about->title = $request->title;
            $about->slug = Str::slug($request->title);
            $about->details = $request->details;
            // image save
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $path = public_path('uploads/images');
            $image->move($path, $imageName);
            $about->image = $imageName;
            $about->save();
            toastr()->addSuccess('Data has been stored');
            return redirect()->route('about.index');
        } catch (\Throwable $th) {
            toastr()->addError($th);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( About $about ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Request $request ) {
        $about = About::findOrFail($request->id);
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request ) {
        
        try {
            $id = $request->id;
            $about = About::findOrFail($id);
            $about->title = $request->title;
            $about->slug = Str::slug($request->title);
            $about->details = trim($request->details);
            // image upload
            if ($request->image) {
                $path = public_path("/uploads/images/").$about->image;
                if(File::exists($path)){
                    File::delete($path);
                }
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $path = public_path('/uploads/images');
                $image->move($path, $imageName);
                $about->image = $imageName;
            }
            $about->save();
            toastr()->addSuccess("Data has been updated");
            return redirect()->route('about.index');
        } catch (\Throwable $th) {
            toastr()->addError($th);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( About $about, $id ) {
        $about = About::findOrFail($id);
        $path = public_path("/uploads/images/").$about->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $about->delete();
        toastr()->addSuccess('Data has been Deleted');
        return redirect()->back();
    }
}
