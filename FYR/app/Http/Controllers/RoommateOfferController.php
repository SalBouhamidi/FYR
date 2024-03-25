<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citie;
use App\Models\HousingType;
use App\Models\Roommateoffer;



class RoommateOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboardRoommate');
    }


    public function viewaddoffer()
    {
        $cities = Citie::get();
        $housingtypes = Housingtype::get();
        return view('addOfferRoommate', compact([ 'cities','housingtypes']));

    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ObjectRoommate = new Roommateoffer;
        $ObjectRoommate->address = $request->address;
        $ObjectRoommate->roomtype = $request->roomtype ;
        $ObjectRoommate->budget = $request->budget ;
        $ObjectRoommate->numberofroommates = $request->numberofroommates;
        $ObjectRoommate->petperson = $request->petperson ;
        $ObjectRoommate->smoker = $request->smoker ;
        $ObjectRoommate->gender = $request->gender ;
        $ObjectRoommate->user_id = $request->user_id;
        $ObjectRoommate->citie_id = $request->citie_id ;
        $ObjectRoommate->housingtype_id = $request->housingtype_id;

        $ObjectRoommate->save();

        return redirect()->back()->with('success', 'Your offer has been added successfuly');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
