<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
      $imagePath = null;
      if ($request->hasFile('image')) {
         $imagePath = $request->file('image')->store('profile', 'public');
      }

      // Validation 
      $request->validate([
         'name'     => 'required|min:3|max:20',
         'email'    => 'required|email|unique:profiles',
         'password' => 'required|min:8|confirmed',
         'bio'      => 'nullable|string',
         'image'    => 'nullable|image|mimes:png,jpg,svg|max:5000'
      ]);

      //Create new Profile 
      Profile::create([
         'name'     =>  $name,
         'email'    =>  $email,
         'password' =>  Hash::make($password),
         'bio'      =>  $bio,
         'image'    =>  $imagePath

      ]);

      return redirect()->route('profiles.index')
         ->with('success', "$name. your  Profile Created white success.");
   }

   public function destroy(Request $request)
   {
      $id = $request->id;
      $profile = Profile::findOrfail($id);
      $profile->delete();
      return redirect()->route('profiles.index')->with('success', 'Profile delete with success');
   }
   public function edit(Profile $profile)
   {
      return view('components.update', compact('profile'));
   }
   public function update(Request $request, $id)
   {
      $profile = Profile::findOrfail($id);
      // Handle image upload if present
      if ($request->hasFile('image')) {
         // Delete old image if it exists
         if ($profile->image) {
            Storage::disk('public')->delete($profile->image);
         }

         // Store new image
         $validatedData['image'] = $request->file('image')->store('profile_images', 'public');
      }
      $validateDate = $request->validate([

         'name'   =>  'required|string|max:255',
         'email'  =>  'required|email|max:255',
         'bio'    =>  'nullable|string',
         'image'  =>  'nullable|image|mimes:png,jpg,svg|max:5000'
      ]);
      $validateDate['image'] = $request->file('image')->store('profile', 'public');
      $profile->update($validateDate);
      return redirect()->route('profiles.show', $id)
         ->with('success', 'profile updated with success ');
   }
}
