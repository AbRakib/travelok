<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SettingController extends Controller {
    /**
     * Display a settings of the resource.
     */
    public function settings() {
        $setting = DB::table('settings')->where('id', 1)->first();
        return view('admin.settings.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function contact() {
        $contacts = DB::table('contacts')->orderBy('created_at', 'DESC')->get();
        return view('admin.settings.contact', compact('contacts'));
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
    public function show( Setting $setting ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Setting $setting ) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Setting $setting ) {
        $setting = Setting::where('id', 1)->first();

        $setting->title = $request->title;
        $setting->sub_title = $request->sub_title;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->address = $request->address;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->youtube = $request->youtube;
        $setting->linkedin = $request->linkedin;
        $setting->instagram = $request->instagram;
        $setting->developer = $request->developer;

        //icon upload
        if ($request->icon) {
            $path = public_path("/uploads/images/").$setting->icon;
            if(File::exists($path)){
                File::delete($path);
            }
            $icon = $request->file('icon');
            $iconName = time().'.'.$icon->getClientOriginalExtension();
            $path = public_path('/uploads/images');
            $icon->move($path, $iconName);
            $setting->icon = $iconName;
        }

        //image upload
        if ($request->image) {
            $path = public_path("/uploads/images/").$setting->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $path = public_path('/uploads/images');
            $image->move($path, $imageName);
            $setting->image = $imageName;
        }
        $setting->save();
        toastr()->addSuccess('Settings has been updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Setting $setting ) {
        //
    }

    public function contactDestroy(Request $request, $id) {
        $contact = Contact::findOrFail($request->id);
        $contact->delete();

        toastr()->addSuccess("Contact Deleted");
        return redirect()->back();
    }
}
