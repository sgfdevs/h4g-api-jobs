<?php

use App\Http\Resources\Employer as EmployerResource;
use App\Http\Resources\EmployerCollection;
use App\Http\Resources\Event as EventResource;
use App\Http\Resources\EventCollection;
use App\Http\Resources\Job as JobResource;
use App\Http\Resources\JobCollection;
use App\Http\Resources\Location as LocationResource;
use App\Http\Resources\LocationCollection;
use App\Models\Employer;
use App\Models\Event;
use App\Models\Job;
use App\Models\Location;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/employer', function (Request $request) {
    return new EmployerCollection(Employer::all());
});

Route::middleware('auth:api')->get('/employer/{id}', function (Request $request) {
    return new EmployerResource(Employer::find($request->id));
});

Route::middleware('auth:api')->get('/event', function (Request $request) {
    return new EventCollection(Event::all());
});

Route::middleware('auth:api')->get('/event/{id}', function (Request $request) {
    return new EventResource(Event::find($request->id));
});

Route::middleware('auth:api')->get('/job', function (Request $request) {
    return new JobCollection(Job::all());
});

Route::middleware('auth:api')->get('/job/{id}', function (Request $request) {
    return new JobResource(Job::find($request->id));
});

Route::middleware('auth:api')->get('/location', function (Request $request) {
    return new LocationCollection(Location::all());
});

Route::middleware('auth:api')->get('/location/{id}', function (Request $request) {
    return new LocationResource(Location::find($request->id));
});
