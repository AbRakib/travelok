<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ThemeController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $themes = DB::table( 'themes' )->orderBy( 'created_at', 'DESC' )->get();
        return view( 'admin.theme.index', compact( 'themes' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view( 'admin.theme.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $validateData = $request->validate( [
            'tag'   => 'required|max:15',
            'title' => 'required|max:50',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2024',
        ] );

        $theme = new Theme();
        $theme->tag = $request->tag;
        $theme->title = $request->title;
        $image = $request->file( 'image' );
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path( '/uploads/images' );
        $image->move( $path, $imageName );
        $theme->image = $imageName;
        $theme->save();

        toastr()->addSuccess( 'Theme has been stored' );
        return redirect()->route( 'theme.index' );
    }

    /**
     * Display the specified resource.
     */
    public function show( Theme $theme ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Request $request ) {
        $theme = DB::table( 'themes' )->find( $request->id );
        return view( 'admin.theme.edit', compact( 'theme' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Theme $theme ) {
        $id = $request->id;
        $theme = Theme::findOrFail($id);

        $validateData = $request->validate( [
            'tag'   => 'required|max:15',
            'title' => 'required|max:50',
        ] );

        $theme->tag = $request->tag;
        $theme->title = $request->title;
        //image upload
        if ($request->image) {
            $path = public_path("/uploads/images/").$theme->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $path = public_path('/uploads/images');
            $image->move($path, $imageName);
            $theme->image = $imageName;
        }
        $theme->update();

        toastr()->addSuccess('Theme has been update');
        return redirect()->route('theme.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Theme $theme ) {
        //
    }
}
