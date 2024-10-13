<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $blogs = Blog::orderBy('created_at', 'DESC')->get();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $validateData = $request->validate([
            'tag' => 'required|max:30',
            'title' => 'required|max:50',
            'details' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $blog = new Blog();
        $blog->tag = $request->tag;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title).time();
        $blog->details = $request->details;
        $blog->user_id = Auth::user()->id;

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $path = public_path('/uploads/images');
        $image->move($path, $imageName);

        $blog->image = $imageName;
        $blog->save();

        toastr()->addSuccess('Blog has been store successfully');
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( Blog $blog, $id ) {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Blog $blog ) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Blog $blog ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Blog $blog ) {
        //
    }
}
