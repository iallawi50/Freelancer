<?php

use App\Http\Controllers\RatingController;
use App\Models\Rating;
use App\Models\User;
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
    return redirect('/freelancer');
});


Route::get('/freelancer', function () {
    $users = User::where("job", "!=", "عميل")->whereNotNull('body')->withAvg('ratings', 'stars')->orderByDesc('ratings_avg_stars')->paginate(10);
    $job = null;

    return view('freelancer', compact(['users', 'job']));
})->name('freelancer')->middleware('auth');


Route::get('freelancer/{job}', function ($job) {
    $users = User::where("job", "!=", "عميل")->whereNotNull('body')->where("job", $job)->paginate(10);
    return view('freelancer', compact(['users', 'job']));
});


Route::get('user/profile/{id}', function ($id) {
    $user = User::find($id);
    $isRated = (bool)Rating::where('user_id', auth()->user()->id)->where('worker_id', $id)->count();

    return view('profile.username', compact(['user', 'isRated']));
})->middleware('auth');

Route::get('user/profile/{id}/rate',[RatingController::class, 'create']);
Route::post('user/profile/{id}/rate',[RatingController::class, 'store']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/freelancer');
    })->name('dashboard');
});
