<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Propretie;
use App\Models\Roommateoffer;
use App\Models\citie;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statisticUser= User::all()->count();
        $statisticProprety = Propretie::all()->count();
        $statisticRoommates = User::where('role_id', '2')->count();

        $Rommates = Roommateoffer::orderBy('id', 'DESC')
        ->with('user')->with('citie')->limit(3)->get();
        // dd($Rommates);
        $Propreties = Propretie::orderBy('id', 'DESC')
        ->with('citie')->limit(3)->get();
        // dd($Propreties);
        return view('dashboard', compact(['statisticUser', 'statisticProprety', 'statisticRoommates','Rommates', 'Propreties', 'Propreties']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
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
