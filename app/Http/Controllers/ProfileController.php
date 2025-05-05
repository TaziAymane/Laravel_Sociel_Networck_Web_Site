<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
   public function profile()
   {
      return view('components.Profile');
   }
   public function index()
   {
      $profiles =  Profile::latest()->paginate(15);
      return view('components.Profiles', compact('profiles'));
   }
   public function show(Request $request)
   {
      $id = $request->id;
      $profile = Profile::findOrFail($id);
      return view('components.show', compact('profile'));
   }
   public function create()
   {
      return view('components.create');
   }
   public function store(Request $request)
   {
      $name = $request->name;
      $email = $request->email;
      $bio = $request->bio;
      $password = $request->password;

      // Validation 
      $request->validate([
         'name' => 'required|min:3|max:20',
         'email' => 'required|email|unique:profiles',
         'password' => 'required|min:8|confirmed'
      ]);
      //Insertion 
      Profile::create([
         'name' => $name,
         'email' => $email,
         'password' => Hash::make($password),
         'bio' => $bio,

      ]);
      return redirect()->route('profiles.index')->with('success', "$name. your  Profile Created white success.");
   }
   // public function destroy(Request $request){
   //    $id = $request->id ;
   //    $profile = Profile::findOrFail($id);
   //    $profile->delete();
   //    return redirect()->route('profiles.index')->with('success','profile deleted white success');
   //    // dd($profile);
   // }
   public function destroy(Request $request)
   {
      $id = $request->id;
      // dd($id);
      $profile = Profile::findOrfail($id);
      // dd($profile);
      $profile->delete();
      return redirect()->route('profiles.index')->with('success', 'Profile delete with success');
   }
   public function edit(Profile $profile)
   {
      // $id = $request->id;
      // dd($id);
      // $profile = Profile::findOrfail($id);
      // dd($profile);
      return view('components.update', compact('profile'));
   }
   public function update(Request $request,$id)
   {
     $profile = Profile::findOrfail($id);
     $validateDate = $request->validate([
         'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'bio' => 'nullable|string',
     ]);
     $profile->update($validateDate);
     return redirect()->route('profiles.index');
    
   }
}
