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

    public function search(Request $request){
        $searchName = $request->input('searchstring');
        $results = Roommateoffer::where('name','like', '%'.$searchName.'%')->get();
        $response = '';
        foreach ($results as $result) {
            $response .= '<div>' . $result->name . '</div>';
        }
        return $response;
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
            }elseif($endedMonth > $startedMonth){
                return true;
            }
    }else{
        return true;
    }
}

    public function ReservationDuration($stated, $ended){
        $parsedStartingDate = Carbon::parse($stated);
        $parsedEndingDate = Carbon::parse($ended);
        // $duration = $parsedEndingDate->diffInDays($parsedStartingDate);
        $duration = $parsedStartingDate->diffInDays($parsedEndingDate);
        // dd($duration);
        if ($duration < 28){
            return false;
        }elseif ($duration >= 28){
            return true;
        }
    }



    public function reservation(string $id,Request $request){


        if(auth()->user()->id  == null){
            return redirect()->route('loginview')->with('error', 'Dear User, You have to register before making a reservation');

        }else{
        $dataValidator = $request->validate([
            'started'=> 'date|required',
            'ended' => 'date|required'
        ]);
        $resultsOfValidation =$this->validationDate($dataValidator['started'],$dataValidator['ended']);
        // dd($resultsOfValidation);
        if($resultsOfValidation == false){
            return redirect()->back()->with('error', 'the date of reservation is not valid');
        }elseif($resultsOfValidation == true){
            $durationResult=$this->ReservationDuration($dataValidator['started'],$dataValidator['ended']);
            if($durationResult == false){
                return redirect()->back()->with('error', 'You have to reserve minimum 1 month');
            }elseif($durationResult == true){
                $checkAvialability = Reservation::where('propretie_id', $id)
                ->where('started', '<=', $dataValidator['started'])
                ->where('ended', '>', $dataValidator['started'])
                ->orWhere('started', '>',$dataValidator['started'])
                ->where('started', '<',$dataValidator['ended'])
                ->first();
                // dd($checkAvialability);
                if($checkAvialability !== null){
                    return redirect()->back()->with('error', 'This appartement is already reserved');
                }else{
                    $objectReservation= new Reservation;
                    $dataValidator['propretie_id']= $id;
                    // dd(auth()->user());
                    $dataValidator['user_id']= auth()->user()->id;
                    $objectReservation->fill($dataValidator);
                    $objectReservation->save();
                    // dd($objectReservation);
                    return redirect()->back()->with('success', 'Your reservation is made successfully');

                }
            }
        }


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

   

}
