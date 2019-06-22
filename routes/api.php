<?php

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\User as UserResource;

use App\Project;
use App\Http\Resources\Project as ProjectResource;

use App\Item;
use App\Http\Resources\Item as ItemResource;

use App\Participant;
use App\Http\Resources\Participant as ParticipantResource;

use App\Gaze;
use App\Http\Resources\Gaze as GazeResource;

use App\Grab;
use App\Http\Resources\Grab as GrabResource;

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


Route::get('/project/{token}', function ($token, Request $request) {
    $project = Project::where('token_key', $token)->first();
    return $project;
});

Route::get('/item', function (Request $request) {
    $item = Item::where('project_id', $request->project_id)->where('name', $request->name)->first();
    return $item;
});

Route::post('/item', function (Request $request) {
    $item = Item::firstOrCreate( ['project_id' => $request['project_id'], 'name' => $request['name']], $request->all() );
    return $item;
});

Route::post('/participant', function (Request $request) {
    $participant = new Participant( $request->all() );
    $participant->save();
    return $participant;
});

Route::post('/gaze', function (Request $request) {
    $gaze = new Gaze( $request->all() );
    $gaze->save();
    return $gaze;
});

Route::post('/grab', function (Request $request) {
    $grab = new Grab( $request->all() );
    $grab->save();
    return $grab;
});
