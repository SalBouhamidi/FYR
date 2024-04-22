<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citie;
use App\Models\Housingtype;
use App\Models\Specificfourniture;
use App\Models\Roommateoffer;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Propretie;
use \Carbon\Carbon;
use App\models\propretie_specificfourniture;


class RentOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user() == null){
            $Rommates= Roommateoffer::where('isactive', '1')
            ->with('User')
            ->get()->random(3);
        }else{
            if(auth()->user()->gender == 0){
                $Rommates= Roommateoffer::where('isactive', '1')
                ->where('gender', 0)
                ->with('User')
                ->get()->random(3);
            }elseif(auth()->user()->gender == 1){
                $Rommates= Roommateoffer::where('isactive', '1')
                ->where('gender', 1)
                ->with('User')
                ->get()->random(3);
            }

        }
        $cities = Citie::all();
        $Propreties= Propretie::where('isactive', '1')
        ->with('images')
        ->with('citie')
        ->get()
        ->random(3);
        
        return view('home', compact(['Rommates', 'cities','Propreties']));
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



    public function reservation(string $id,Request $request){

        $dataValidator = $request->validate([
            'started'=> 'date|required',
            'ended' => 'date|required'
        ]);
        // $start

        
        $resultsOfValidation =$this->validationDate($dataValidator['started'],$dataValidator['ended']);
        // dd($resultsOfValidation);
        if($resultsOfValidation == false){
            return redirect()->back()->with('error', 'the date of reservation is not valid');
        }elseif($resultsOfValidation == true){
                $reservationCheck = Reservation:: where('id', $id)
                // ->where()
                ->get();
                $objectReservation= new Reservation;
                $dataValidator['propretie_id']= $id;
                $dataValidator['user_id']= auth()->user()->id;
                $objectReservation->fill($dataValidator);
                // $objectReservation->save();
        }
        





    }








    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proprety= Propretie::where('id', $id)
        ->with('images')
        ->with('citie')
        ->with('Housingtype')
        ->first();
        // dd($proprety->Specificfournitures);
        return view('detailsProprety', compact(['proprety']));

    }
    public function validationDate($startDate, $endDate){
        // dd('fcghjkljhgf');
        $dateNow = Carbon::now()->toDateString();
        $parsedCurrentDate = Carbon::parse($dateNow);
        $parsedStartingDate = Carbon::parse($startDate);
        $parsedEndingDate = Carbon::parse($endDate);
        $currentYear = $parsedCurrentDate->year;
        $startedYear = $parsedStartingDate->year;
        $endedYear = $parsedEndingDate->year;

        if($startedYear < $currentYear || $endedYear < $startedYear){
            return false;
        }
        if($startedYear == $endedYear){
            $startedMonth = $parsedStartingDate->month;
            $endedMonth = $parsedEndingDate->month;
            if($endedMonth < $startedMonth){
                return false;
            }elseif($endedMonth == $startedMonth){
                $startedDay= $parsedStartingDate->day;
                $endedDay= $parsedEndingDate->day;
                if($endedDay <= $startedDay){
                    return false;
                }else{
                    return true;
                }
            }
    }else{
        return true;
    }
}
   

}
