<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citie;
use App\Models\HousingType;
use App\Models\Roommateoffer;
use App\Models\User;





class RoommateOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('text');
        $roommateOffers = Roommateoffer::where('user_id', session('id'))->get();
        $user = User::where('id',session('id'))->first();
        // dd($user);
        $cities = Citie::get();
        

        // dd($roommateOffers[0]);
        return view('dashboardRoommate', compact(['roommateOffers', 'user','cities']));
    }



    /**
     * Show the form for creating a new resource.
     */

     public function create(){
        $cities = Citie::get();
        $housingtypes = Housingtype::get();
        return view('addOfferRoommate', compact([ 'cities','housingtypes']));
     }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataValidator = $request->validate([
                'citie_id' => ['required'],
                'address' => ['required','string'],
                'housingtype_id' => ['required'],
                'roomtype' => ['required'],
                'budget' => ['required'],
                'numberofroommates' => ['required'],
                'petperson' => ['required'],
                'smoker' => ['required'],
                'gender' => ['required']
            ]);
        $ObjectRoommate = new Roommateoffer;
        $ObjectRoommate->citie_id = $request->citie_id ;
        $ObjectRoommate->address = $request->address;
        $ObjectRoommate->housingtype_id = $request->housingtype_id;
        $ObjectRoommate->roomtype = $request->roomtype ;
        $ObjectRoommate->budget = $request->budget ;
        $ObjectRoommate->numberofroommates = $request->numberofroommates;
        $ObjectRoommate->petperson = $request->petperson ;
        $ObjectRoommate->smoker = $request->smoker ;
        $ObjectRoommate->gender = $request->gender ;
        $ObjectRoommate->user_id = session('id');
        $ObjectRoommate->isactive = 1;
        $ObjectRoommate->save();
        // dd($ObjectRoommate);


        return redirect()->route('dashboardRoommates.index')->with('success', 'Your offer has been added successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('dashboardRoommate');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $offer = Roommateoffer::where('id', $id)->first();
        $cities = Citie::all();
        $housingtypes = Housingtype::get();
      
        return view('modifyOfferRoommate', compact('offer', 'cities', 'housingtypes'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateOffer= Roommateoffer::find($id);
        if($updateOffer !== null){
            $updateOffer->update([
                'citie_id' => $request->input('citie_id'),
                'address' => $request->input('address'),
                'housingtype_id' => $request->input('housingtype_id'),
                'roomtype' => $request->input('roomtype'),
                'budget' => $request->input('budget'),
                'numberofroommates' => $request->input('numberofroommates'),
                'petperson' => $request->input('petperson'),
                'smoker'=> $request->input('smoker'),
                'gender' => $request->input('gender'),
                'isactive'=> 1,
            ]);
            return redirect()->route('dashboardRoommates.index')->with('success','Offer Updated Successfully');
        }else{
            return redirect()->back()->with('Errorupdate','Something Went wrong please try again');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd('text');
        $offer = Roommateoffer::find($id);
        $offer->delete();
        // dd($offer);
        return redirect()->back()->with('success','item was deleted successfuly');
    }

    public function activation(string $id){
        $offer = Roommateoffer::find($id);
            $offer->update([
                'isactive'=> !$offer->isactive,
            ]); 
            if($offer->isactive){
                return  redirect()->back()->with('success','Your offer is activited successfully');
            }else{
                return  redirect()->back()->with('success','Your offer has been deactivited successfully');
 
            }
        
        }

    
}
