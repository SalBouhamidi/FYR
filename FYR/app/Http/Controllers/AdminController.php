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
        return view('dashboard', compact(['statisticUser', 'statisticProprety', 'statisticRoommates','Rommates', 'Propreties', 'Propreties']));
    }
    public function users(){
        $users = User::all();
        return view('dashboardUsers', compact(['users']));
    }

    public function changerole(string $id){
        // dd('hello');
        $user= User::where('id', $id)->first();
        if($user->role_id == 2){
            $user->update([
                'role_id'=> 3
            ]); 
            // dd($user);
            return back()->with('success', 'the user is Lessor now');
        }elseif($user->role_id == 3){
            $user->update([
                'role_id'=> 2
            ]); 
            return back()->with('success', 'the role of user is roommate now');
        }

    }


    public function statistics(){
        $propreties = Propretie::all()->count();
        $azrouPropreties = Propretie::where('citie_id', '1')->get()->count();
        $meknesPropreties = Propretie::where('citie_id', '2')->get()->count();
        $TangerPropreties = Propretie::where('citie_id', '3')->get()->count();
        // dd($meknesPropreties);


        return view('dashboardStatistics');
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
