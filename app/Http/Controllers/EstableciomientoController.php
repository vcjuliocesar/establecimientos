<?php

namespace App\Http\Controllers;

use App\Estableciomiento;
use Illuminate\Http\Request;

class EstableciomientoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "desde create";
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
     * @param  \App\Estableciomiento  $estableciomiento
     * @return \Illuminate\Http\Response
     */
    public function show(Estableciomiento $estableciomiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estableciomiento  $estableciomiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Estableciomiento $estableciomiento)
    {
        return "desde edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estableciomiento  $estableciomiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estableciomiento $estableciomiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estableciomiento  $estableciomiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estableciomiento $estableciomiento)
    {
        //
    }
}
