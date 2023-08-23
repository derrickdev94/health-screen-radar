<?php

namespace App\Http\Controllers;

use App\Models\CervicalCancer;
use Illuminate\Http\Request;

class CervicalCancerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('cervica-cancer.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CervicalCancer $cervicalCancer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CervicalCancer $cervicalCancer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CervicalCancer $cervicalCancer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CervicalCancer $cervicalCancer)
    {
        //
    }

    public function preview(Request $request){
        $formData = $request->all();
        session(['formData'=>$formData]);
        return view('cervical-cancer.preview');
    }
}
