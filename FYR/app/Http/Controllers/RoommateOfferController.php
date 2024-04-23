<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citie;
use App\Models\HousingType;
use App\Models\Roommateoffer;
use App\Models\User;
use App\Http\Requests\RoommateOfferRequest;





class RoommateOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('text');
        $roommateOffers = Roommateoffer::where('user_id', auth()->user()->id)->get();
        $user = User::where('id',auth()->user()->id)->first();
        // dd($user->gender);
        $cities = Citie::get();
        

        // dd($roommateOffers[0]);
        return view('dashboardRoommate', compact(['roommateOffers', 'user','cities']));
    }



     public function create(){
        $cities = Citie::get();
        $housingtypes = Housingtype::get();
        return view('addOfferRoommate', compact([ 'cities','housingtypes']));
     }


    /**
     * Store a newly created resource in storage.
     */
    public function store(RoommateOfferRequest $request)
    {
        $dataValidator = $request->validated();

        $ObjectRoommate = new Roommateoffer;

        $dataValidator['user_id']= auth()->user()->id;
        $dataValidator['isactive']= 1;
        $ObjectRoommate->fill($dataValidator);
        $ObjectRoommate->save();

        return redirect()->route('dashboardRoommates.index')->with('success', 'Your offer has been added successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $roommate= Roommateoffer::where('id', $id)->first();


        return view('detailsRoommate', compact(['roommate']));
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
            if($offer->isactive == 1){
                return  redirect()->back()->with('success','Your offer is activited successfully');
            }else{
                return  redirect()->back()->with('success','Your offer has been deactivited successfully');
 
            }
        
        }

    
}
