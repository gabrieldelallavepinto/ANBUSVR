<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Validator;

//Models
use App\Project;
use App\Item;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = Project::where('user_id', Auth::user()->id)->get();
        $params['projects'] = $projects;

        return view('project.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;


        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        $project = Project::where('user_id', $request['user_id'])->where('name', $request['name'])->exists();

        if($project){
            $validator->after(function ($validator) {
                $validator->errors()->add('name', 'Ya existe un proyecto con el mismo nombre');
            });
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        //generamos el token key
        $request['token_key'] = Str::random(60);

        $newProject = new Project($request->all());
        $newProject->save();
        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);

        return view('project.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);

        if($project->gazes->count() || $project->grabbs->count()){

        }

        Project::destroy($id);
        return redirect()->route('project.index');
    }


    public function project(Request $request, $project)
    {
        // obtenemos el proyecto
        $request['project'] = $project = Project::where('name', $project)->first();

        // si no existe el proyecto lanzamos error
        if(!$request['project']) abort(403, 'project no create');

        return view('project.project',$request);

        // $request['items'] = $items = $project->items()->get();
    }


    public function wineVR(Request $request)
    {
        $project = 'wineVR';
        $request['project'] = $project = Project::where('name','like', $project)->first();

        if(!$request['project']) abort(403, 'project no create');

        $request['items'] = $items = $project->items()->get();
        return view('project.wineVR',$request);
    }
}
