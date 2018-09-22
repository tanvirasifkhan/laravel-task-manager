<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Projects;
use Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_projects=Projects::all();
        return view('projects',['projects'=>$all_projects]);
    }

    //show all ongoing projects
    public function ongoing(){
        $ongoing_projects=Projects::where('status','pending')->get();
        return view('pending_projects',['projects'=>$ongoing_projects]);
    }

    //show all completed projects
    public function completed(){
        $completed_projects=Projects::where('status','completed')->get();
        return view('completed_projects',['projects'=>$completed_projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_categories=Categories::all();
        $count_categories=Categories::count();
        return view('add_project',['categories'=>$all_categories,'count'=>$count_categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validators=Validator::make($request->all(),[
            'project_title'=>'required',
            'project_category'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'description'=>'required'            
        ]);
        if($validators->fails()){
            return redirect()->route('project.create')->withErrors($validators)->withInput();
        }else{
            $project=new Projects();
            $project->title=$request->project_title;
            $project->category_id=$request->project_category;
            $project->start_date=date_format(date_create($request->start_date),'Y-m-d');
            $project->end_date=date_format(date_create($request->end_date),'Y-m-d');
            $project->description=$request->description;
            $project->save();
            return redirect()->route('project.all')->with('message','Project created successfully !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find_project=Projects::where('id',$id)->get();
        $all_categories=Categories::all();
        return view('edit_project',['project'=>$find_project,'categories'=>$all_categories]);
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
        $validators=Validator::make($request->all(),[
            'project_title'=>'required',
            'project_category'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'description'=>'required'            
        ]);
        if($validators->fails()){
            return redirect()->route('project.edit',$id)->withErrors($validators)->withInput();
        }else{
            $project=Projects::find($id);
            $project->title=$request->project_title;
            $project->category_id=$request->project_category;
            $project->start_date=date_format(date_create($request->start_date),'Y-m-d');
            $project->end_date=date_format(date_create($request->end_date),'Y-m-d');
            $project->description=$request->description;
            $project->save();
            return redirect()->route('project.all')->with('message','Project updated successfully !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find_project=Projects::find($id);
        $find_project->delete();
        return redirect()->route('project.all')->with('message','Project removed successfully !');
    }

    // mark a specific project as completed
    public function makeCompleted($id){
        $find_project=Projects::find($id);
        $find_project->status='completed';
        $find_project->save();
        return redirect()->route('project.all')->with('message','Project marked as completed successfully !');
    }

    // mark a specific project as pending
    public function makePending($id){
        $find_project=Projects::find($id);
        $find_project->status='pending';
        $find_project->save();
        return redirect()->route('project.all')->with('message','Project marked as pending successfully !');
    }
}
