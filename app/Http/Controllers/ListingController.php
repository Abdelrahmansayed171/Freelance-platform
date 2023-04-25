<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show all listings
    public function index() {
        // dd(request()->tag);
        // dd(request('tag'));

        
        return view('listings.index',[
            'listings' => Listing::latest()->
            filter(request(['tag']))->get()
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
}
