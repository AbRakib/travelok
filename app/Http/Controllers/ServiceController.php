<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $services = Service::orderBy('created_at', 'DESC')->get();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Display a pending listing of the resource
     */
    public function pending() {
        $services = Service::where('status', '0')->orderBy('created_at', 'DESC')->get();
        return view('admin.service.pending', compact('services'));
    }

    /**
     * Display a active listing of the resource
     */
    public function active() {
        $services = Service::where('status', '1')->orderBy('created_at', 'DESC')->get();
        return view('admin.service.active', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:services', 'max:20'],
            'details' => ['required'],
            'icon' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
        try {
            $service = new Service();
            $service->name = $request->name;
            $service->slug = Str::slug($request->name);
            $service->details = $request->details;

            $icon = $request->file('icon');
            $iconName = time().'.'.$icon->getClientOriginalExtension();
            $path = public_path('/uploads/images');
            $icon->move($path, $iconName);

            $service->icon = $iconName;
            $service->save();

            toastr()->addSuccess('Your service has been stored.');
            return redirect()->route('service.index');
        } catch (\Throwable $error) {
            toastr()->addSuccess($error);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( Request $request, Service $service ) {
        $service = Service::where('slug', $request->slug)->first();
        return view('admin.service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Request $request, Service $service ) {
        $service = Service::where('slug', $request->slug)->first();
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Service $service ) {
        $service = Service::where('slug', $request->slug)->first();
        try {
            $service->name = $request->name;
            $service->slug = Str::slug($request->name);
            $service->details = $request->details;
            //image upload
            if ($request->icon) {
                $path = public_path("/uploads/images/").$service->icon;
                if(File::exists($path)){
                    File::delete($path);
                }
                $icon = $request->file('icon');
                $iconName = time().'.'.$icon->getClientOriginalExtension();
                $path = public_path('/uploads/images');
                $icon->move($path, $iconName);
                $service->icon = $iconName;
            }
            $service->save();

            toastr()->addSuccess('Service has been Updated.');
            return redirect()->route('service.index');
        } catch (\Throwable $error) {
            toastr()->addSuccess($error);
            return redirect()->back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request, Service $service ) {
        $service = Service::findOrFail($request->id);
        $path = public_path("/uploads/images/").$service->icon;
        if(File::exists($path)){
            File::delete($path);
        }
        $service->delete();

        toastr()->addSuccess('Service has been Deleted.');
        return redirect()->back();
    }
}
