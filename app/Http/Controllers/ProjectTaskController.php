<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\ProjectTasks;
use Validator;

class ProjectTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $all_project_tasks=ProjectTasks::all();
        return view('project_tasks',['project_tasks'=>$all_project_tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_projects=Projects::all();
        $count_projects=Projects::count();
        return view('add_project_task',['projects'=>$all_projects,'count'=>$count_projects]);
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
            'project_task_title'=>'required',
            'task_project'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'description'=>'required'            
        ]);
        if($validators->fails()){
            return redirect()->route('project_task.create')->withErrors($validators)->withInput();
        }else{
            $project_task=new ProjectTasks();
            $project_task->title=$request->project_task_title;
            $project_task->project_id=$request->task_project;
            $project_task->start_date=date_format(date_create($request->start_date),'Y-m-d');
            $project_task->end_date=date_format(date_create($request->end_date),'Y-m-d');
            $project_task->description=$request->description;
            $project_task->save();
            return redirect()->route('project_task.all')->with('message','Project Task created successfully !');
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
        $find_project_task=ProjectTasks::where('id',$id)->get();
        $all_projects=Projects::all();
        return view('edit_project_task',['project'=>$find_project_task,'projects'=>$all_projects]);
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
            'project_task_title'=>'required',
            'task_project'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'description'=>'required'            
        ]);
        if($validators->fails()){
            return redirect()->route('project_task.edit',$id)->withErrors($validators)->withInput();
        }else{
            $find_project_task=ProjectTasks::find($id);
            $find_project_task->title=$request->project_task_title;
            $find_project_task->project_id=$request->task_project;
            $find_project_task->start_date=date_format(date_create($request->start_date),'Y-m-d');
            $find_project_task->end_date=date_format(date_create($request->end_date),'Y-m-d');
            $find_project_task->description=$request->description;
            $find_project_task->save();
            return redirect()->route('project_task.all')->with('message','Project Task updated successfully !');
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
       $find_project_task=ProjectTasks::find($id);
       $find_project_task->delete();
       return redirect()->route('project_task.all')->with('message','Project Task removed successfully !');
    }

    // mark a specific project task as completed 
    public function makeCompleted($id){
        $find_project_task=ProjectTasks::find($id);
        $find_project_task->status='completed';
        $find_project_task->save();
        return redirect()->route('project_task.all')->with('message','Project Task marked as completed successfully !');
    }

    // mark a specific project task as pending 
    public function makePending($id){
        $find_project_task=ProjectTasks::find($id);
        $find_project_task->status='pending';
        $find_project_task->save();
        return redirect()->route('project_task.all')->with('message','Project Task marked as pending successfully !');
    }

    // show all pending project tasks
    public function pendingProjectTasks(){
        $pending_project_task=ProjectTasks::where('status','pending')->get();
        return view('pending_project_tasks',['pendings'=>$pending_project_task]);
    }

    // show all finished project tasks
    public function finishedProjectTasks(){
        $finished_project_task=ProjectTasks::where('status','completed')->get();
        return view('finished_project_tasks',['finished'=>$finished_project_task]);
    }
}
