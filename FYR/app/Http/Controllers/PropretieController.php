<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propretie;
use App\Models\Citie;
use App\Models\Housingtype;
use App\Models\Specificfourniture;
use App\Models\propretie_specificfourniture;
use App\Models\Image;
use Illuminate\Support\File;


use DB;


class PropretieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user() == null){
            return redirect()->route('loginview');
        }else{
            $proporeties= Propretie::where('user_id', auth()->user()->id)->get();
            return view('dashboardLessor', compact(['proporeties']));
        }
        
        
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
    public function store(Request $request)
    {
        $dataValidator = $request->validate([
            'name'=> 'required|string',
            'description' => 'required|string|min:5',
            'address'=> 'required|string',
            'price'=> 'required',
            'equipped'=>'required',
            'surfacearea'=> 'required',
            'citie_id'=>'required',
            'housingtype_id'=> 'required',

        ]);

        $objectProprety = new propretie;
        $dataValidator['user_id']=auth()->user()->id;
        $dataValidator['isactive']= 1;
        $objectProprety->fill($dataValidator);
        $objectProprety->save();

            $specialFeatures = $request->input('specialFeatures');
            foreach($specialFeatures as $specialFeature){
                $objectPSpecificfourniture = new propretie_specificfourniture;
                $objectPSpecificfourniture->propretie_id = $objectProprety->id;
                $objectPSpecificfourniture->specificfourniture_id = $specialFeature;
                $objectPSpecificfourniture->save();
            }
  
        foreach($request->file('images') as $image){
            $objectImage= new Image;
            $objectImage->propretie_id = $objectProprety->id;
            $objectImage->image= $image->store('/images/resource', ['disk' => 'my_files']);
            $objectImage->save();
        }

        if($objectProprety !== null ){
            return redirect()->route('dashboardLessor.index')->with('success', 'Your offer added successfully');
        }else{
            return redirect()->route('dashboardLessor.index')->with('error', 'Something wrong happened please try to add your offer again');
        }

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
    public function edit(string $id)
    {
        $cities= Citie::get();
        $houstingTypes= Housingtype::get();
        $specialFournitures = Specificfourniture::get();
        $proporetie= Propretie::where('id', $id)->first();
        $fournituresofPropritie= propretie_specificfourniture::where('propretie_id', $id)->get();
        $images= Image::where('propretie_id', $id)->get();
        return view('modifyProprety', compact('cities','houstingTypes','specialFournitures','proporetie','images','fournituresofPropritie'));

    }

    public function activation($id){
        $proprety = Propretie::where('id', $id)->first();
        $proprety->update([
            'isactive' => !($proprety->isactive),
        ]);
        if($proprety->isactive == 1){
            return back()->with('success', 'your offer is active');
        }else{
            return back()->with('sucess', 'your offer is inactive');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id,Request $request)
    {
       
        $dataValidator = $request->validate([
            'name'=> 'required|string',
            'description' => 'required|string|min:5',
            'address'=> 'required|string',
            'price'=> 'required',
            'equipped'=>'required',
            'surfacearea'=> 'required',
            'citie_id'=>'required',
            'housingtype_id'=> 'required',
        ]);
        $dataValidator['user_id']=auth()->user()->id;
        $dataValidator['isactive']= 1;
        $proprety = Propretie::find($id);
        $proprety->update(
            $dataValidator
        );
        $proprety->save();
        
        $speacialFournitures = $request->input('specialFourniture');
        $PreviousSpecialFournitures= propretie_specificfourniture::where('propretie_id',$id)->get();
        foreach($PreviousSpecialFournitures as $previous){
            $previous->delete();
        }
        // dd($speacialFournitures);
        $specialFeatures = $request->input('specialFournitures');
        foreach($specialFeatures as $specialFeature){
            $objectPSpecificfourniture = new Propretie_specificfourniture;
            $objectPSpecificfourniture->propretie_id = $proprety->id;
            $objectPSpecificfourniture->specificfourniture_id = $specialFeature;
            $objectPSpecificfourniture->save();
        }
              
        return redirect()->route('dashboardLessor.index')->with('success', 'Your Offer updated successfully');
        
    }

    public function deleteImage($idImg, $id){
        $image= Image::find($idImg);
        if($image && $image->propretie_id == $id){
            $image->delete();
        }
        return back()->with('you have delete your image');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proporetie = Propretie::find($id);
        $proporetie->delete();
        if($proporetie->trashed() == false){
            return back()->with('error', 'something went wrong please try again');
        }else{
            return back()->with('success', 'Proprety was deleted successfully');
        }
    }
}
