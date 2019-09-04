<?php

namespace App\Http\Controllers;

use App\Arrive;
use Illuminate\Http\Request;

class ArrivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Arrive  $arrive
     * @return \Illuminate\Http\Response
     */
    public function show(Arrive $arrive)
    {
        return view('courriers/arrives.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Arrive  $arrive
     * @return \Illuminate\Http\Response
     */
    public function edit(Arrive $arrive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Arrive  $arrive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arrive $arrive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Arrive  $arrive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arrive $arrive)
    {
        //
    }
}
