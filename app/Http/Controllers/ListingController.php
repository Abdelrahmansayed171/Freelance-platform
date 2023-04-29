<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    public function index() {
        // dd(request()->tag);
        // dd(request('tag'));

        
        return view('listings.index',[
            
            //// ## dd in paginate is different from get ##
            
            // 'listings' => Listing::latest()->
            // filter(request(['tag', 'search']))->get()
            
            
            // 'listings' => Listing::latest()->
            // filter(request(['tag', 'search']))->simplePaginate(2)

            'listings' => Listing::latest()->
            filter(request(['tag', 'search']))->Paginate(6)
        ]);


        // latest()->get() to get the latest first (Sorted)
        // instead of all()
    }


    // Show Specific Listing
    public function showById(Listing $listing) {
        return view('listings.show',[
            'listing' => $listing
        ]);
    }


    // Show Create Form
    public function create(){
        return view('listings.create');
    }


     // Store Listing Data
    public function store(Request $request){
        // dd($request->all());
        // dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($formFields);

    //    Session::flash('message', 'Listing Created!');
        
    // with message is a type of messages and there are error ana many different messages
        return redirect('/')->with('message', 'Listing created successfully!');
    }

    public function edit(Listing $listing){
        // dd($listing);
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update Listing
    public function update(Request $request,Listing $listing){
        // dd($request->all());
        // dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        //    Session::flash('message', 'Listing Created!');
        
         // with message is a type of messages and there are error ana many different messages
        return back()->with('message', 'Listing Updated successfully!');
    }
    
    // Delete Listing
    public function delete(Listing $listing){
        $listing->delete();
        return redirect('/')->with('message', 'Listing Deleted Successfully!');

    }

}
