<?php

namespace App\Http\Controllers;

use App\Models\TourRequest;
use Illuminate\Http\Request;

class TourRequestController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $tourRequests = TourRequest::orderBy('created_at', 'DESC')->get();
        return view('admin.requests.tour_requests', compact('tourRequests'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( TourRequest $tourRequest ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( TourRequest $tourRequest ) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, TourRequest $tourRequest ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( TourRequest $tourRequest ) {
        //
    }
}
