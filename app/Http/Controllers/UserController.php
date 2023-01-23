<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $users=User::latest()->paginate();
        return view('users.index')->with('users',$users);
    }

    
    public function create()
    {
        return view('users.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name'=>  $request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password) 
       ]);

       $profile=Profile::create([
        'province'=>'Mansoura',
        'user_id'=>$user->id,
        'gender'=>'Male',
        'bio'=>'Karim Elomgy',
        'facebook'=>'https://www.facebook.com'
    ]);

       return redirect()->route('users')->with('success','User added successfully');
    }


    
    public function destroy($id)
    {
        $user =User::find( $id);
        $user->profile->delete($id);
        $user->delete();
        return redirect()->back()->with('success','User Delete successfully');
    }
}
