<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function registerView()
    {
        return view('register');
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function show(){
        $user = User::find(session('id'));
        return view('viewprofil', compact(['user']));

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
            session([
                'name' => $user->name,
                'role_id' =>$user->role_id,
                'id' =>$user->id,

            ]);
            if($user){
                return redirect('/login')->with('succes', 'you have been registred successfully, Please log in');
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
        if($user == null){
            return back()->with('error', 'Make sure you register before login');
        }else{

        $validatedata = $request->validate([
            'email' => 'required',
            'password' =>'required',
        ]);
                if(Auth::attempt($validatedata) == true){
                    session([
                        'name' => $user->name,
                        'role_id' =>$user->role_id,
                        'id' =>$user->id,
                    ]);
                    if($user->role_id == 2){
                        return redirect()->route('home.index')->with('success', 'You have been logged in');
                    }else if($user->role_id == 3){
                        return redirect()->route('dashboardLessor.index')->with('success', 'You have been logged in');
                    }
                }else{
                    return redirect()->back()->with('Error', 'Invalid email or password');
                }
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
    public function update(UserRequest $request, string $id)
    {

        $user= User::findOrFail($id);
        $dataValidator = $request->validated();
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('uploads', 'public');
            $dataValidator['image'] = $imagePath;
        }
        // dd($request->image);
        $user->fill($dataValidator);
        // dd($user);
        $user->save();
        // dd( $user);
        return back()->with('Success', 'Your profil has been updated');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
