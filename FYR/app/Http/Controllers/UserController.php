<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register');
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

        $request->validate([
            'name' => 'required', 'max:50',
            'email' => 'required', 'unique:User',
            'password' =>'required',
            'role_id'=> 'required',
            'gender' => 'required'

        ]);



            $user= User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
                'gender' =>$request->gender

            ]);
            // dd($user);

            session([
                'name' => $user->name,
                'role_id' =>$user->role_id,
                'id' =>$user->id,

            ]);
            // dd(session());
            if($user){
                return redirect('/home')->with('succes', 'you have been registred successfully');
            }else{
                return redirect('/register')->with('error', 'something went wrong');
            }
    
       
        
        

    }

    /**
     * Display the specified resource.
     */
    public function loginview()
    {
        return view('Login');

    }
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        // if($user == null){
        //     dd('user');
        //     return redirect('login')->with('Error', 'The email is not registered,check it agian or create an account if you don\'t have one');
        // }
  
            $validatedata = $request->validate([
                'email' => 'required',
                'password' =>'required',
            ]);

        if(Auth::attempt($validatedata)){
            session([
                'name' => $user->name,
                'role_id' =>$user->role_id,
                'id' =>$user->id,
            ]);
            // dd($user->role_id);
            if($user->role_id == 2){
                return redirect()->route('home.index')->with('succesRoommate', 'You have been logged in');
            }else if($user->role_id == 3){
                return redirect()->route('home.index')->with('succesRoommate', 'You have been logged in');
            }

        }else{
            dd('im in else');
            return back()->with('Error','Invalid email or password');
        }

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
