<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::latest()->paginate(15);
        return view('components.publication.index',compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('components.publication.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(Auth::id());
        $title = $request->title ;
        $body = $request->body ;
        $profile_id = Auth::id();
        $imagePath = null;
      if ($request->hasFile('image')) {
         $imagePath = $request->file('image')->store('publication', 'public');
      }
        // dd($request);
        $request->validate([
            'title' => 'required',
            'body'  => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:10240'
        ]);
        Publication::create([
            'title' => $title ,
            'body'  => $body ,
            'image' => $imagePath,
            'profile_id' => $profile_id
        ]);
        // dd($request);
        return redirect()->route('publication.index')->with('success','your publication is pulish now');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $publication = Publication::findOrFail($id);
        return view('components.publication.update',compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $publication = Publication::findOrFail($id);
        
        $validateData = $request->validate([
            'title' => 'required',
            'body'  => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:10240'
        ]);

        // Handle image upload if present
        if($request->hasFile('image')){
            // Delete old image if it exists
            if($publication->image){
                Storage::disk('public')->delete($publication->image);
            }
            // Store new image
            $validateData['image'] = $request->file('image')->store('publication', 'public');
        } else {
            // Keep the existing image if no new image is uploaded
            $validateData['image'] = $publication->image;
        }

        $publication->update($validateData);
        return redirect()->route('publication.index')->with('success','publication updated with success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id ;
        $publication = Publication::findOrFail($id);
        $publication->delete() ;
        return redirect()->route('publication.index')
                   ->with('success', 'Publication deleted successfully');
    }
}
