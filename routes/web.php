<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/hello', function(){
//     return '<h1>Hello World!</h2>';
// });

// Route::get('/hello', function(){
//     return response('<h1>Hello World!</h1>', 200)
//     ->header('Content-Type', 'application/json')
//     -> header('elEsm', 'Orcawy');
// });

// Route::get('/posts/{id}', function($id){
//     // dd($id);
//     ddd($id);
//     return response('Post ' . $id);
// })->where('id','[0-9]+');

// Route::get('/search', function(Request $request){
//     // dd($request);
//     return $request->name . ' Lives In ' . $request->city;
// });

// Show All Listings
Route::get('/', [ListingController::class, 'index']);

// Single Listing

// Route::get('/listing/{id}', function($id){
//     $listing = Listing::find($id);
//     if($listing){
//         return view('listing',[
//             'listing' => $listing
//         ]);
//     }
//     else{
//         abort('404');
//     }
// });

// you can pass to eloquent a whole listing which will be as an indicator to id also
// and it do all the if and abort 404 automatically




// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create']);


// Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);


// Edit Listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);


// Show Single listing
Route::get('/listing/{listing}', [ListingController::class, 'showById']);