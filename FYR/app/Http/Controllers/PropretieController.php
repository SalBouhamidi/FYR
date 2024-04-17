<?php

namespace App\Http\Controllers;

use App\Models\propretie;
use App\Models\Citie;
use App\Models\Housingtype;
use App\Models\Specificfourniture;
use App\Http\Requests\StorepropretieRequest;


class PropretieController extends Controller
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
        $cities= Citie::get();
        $houstingTypes= Housingtype::get();
        $specialFeatures = Specificfourniture::get();
        return view('createLessoroffer', compact(['cities','houstingTypes','specialFeatures']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepropretieRequest $request)
    {
        dd('text');
        $dataValidator = $request->validated();
        $objectProprety = new propretie;
        $dataValidator['user_id']=auth()->user()->id;
        $objectProprety->fill($dataValidator);
        $objectProprety->save();
        dd($objectProprety);


    }

    /**
     * Display the specified resource.
     */
    public function show(propretie $propretie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(propretie $propretie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepropretieRequest $request, propretie $propretie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(propretie $propretie)
    {
        //
    }
}
