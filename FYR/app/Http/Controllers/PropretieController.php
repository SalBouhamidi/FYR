<?php

namespace App\Http\Controllers;

use App\Models\Propretie;
use App\Models\Citie;
use App\Models\Housingtype;
use App\Models\Specificfourniture;
use App\Models\Propreties_specificfourniture;
use App\Models\Image;
use Illuminate\Support\File;
use DB;




use Illuminate\Http\Request;



class PropretieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proporeties= Propretie::where('user_id', auth()->user()->id)->get();
        dd($proporeties[0]->Images);
        return view('dashboardLessor', compact(['proporeties']));
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
        $objectProprety->fill($dataValidator);
        $objectProprety->save();

            $specialFeatures = $request->input('specialFeatures');
            foreach($specialFeatures as $specialFeature){
                $objectPSpecificfourniture = new Propreties_specificfourniture;
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
