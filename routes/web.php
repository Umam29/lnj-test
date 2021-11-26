<?php

use App\Http\Controllers\CarpController;
use App\Models\Carp;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data['sidebar'] = 'dashboard';
    $data['card_draft'] = Carp::where('stage', 'Draft')->count();
    $data['card_submitted'] = Carp::where('stage', 'Submitted')->count();
    $data['card_open'] = Carp::where('stage', 'Open')->count();
    $data['card_responded'] = Carp::where('stage', 'Responded')->count();
    $data['card_verified'] = Carp::where('stage', 'Verified')->count();
    $data['card_closed'] = Carp::where('stage', 'Closed')->count();
    $data['card_re_open'] = Carp::where('stage', 'Re-Open')->count();
    $data['card_voided'] = Carp::where('stage', 'Voided')->count();
    return view('pages.index', $data);
});

Route::get('carp', [CarpController::class, 'index']);
Route::get('carp/{id}', [CarpController::class, 'show']);
Route::get('carp/load/data', [CarpController::class, 'loadDataTable']);
Route::get('carp/data/get-dashboard', [CarpController::class, 'loadDashboard']);
Route::post('carp/save', [CarpController::class, 'store']);
Route::post('carp/delete', [CarpController::class, 'destroy']);
