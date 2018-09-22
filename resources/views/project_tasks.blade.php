@extends('master.app')
@section('title','Project Tasks')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header">
                <h1 class="page-title">My Project Tasks</h1> 
                <div class="row gutters-xs ml-auto">
                    <div class="col">
                        <a href="{{route('project_task.create')}}" class="btn btn-success">Create Project Task</a>
                    </div>
                </div>
              </div>
              @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{Session::get('message')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  </button>
                </div>
              @endif
              <div class="row row-cards row-deck">
                <div class="col-12">
                  <div class="card p-4">
                    <div class="table-responsive">
                        <table id="example" class="table card-table table-vcenter text-nowrap table-striped">
                            <thead>
                              <tr>
                                <th>Task Title</th>
                                <th>Project</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($project_tasks as $project_task)
                                <tr>
                                  <td>{{$project_task->title}}</td>
                                  <td>{{$project_task->project->title}}</td>
                                  <td>
                                    @if($project_task->status=='pending')
                                      <p class="text-center text-light bg-warning m-2 p-1">Pending</p>
                                    @else
                                      <p class="text-center text-light bg-success m-2">Done</p>
                                    @endif
                                  </td>
                                  <td>{{date_format(date_create($project_task->created_at),'d M,Y')}}</td>
                                  <td>{{date_format(date_create($project_task->start_date),'d M,Y')}}</td>
                                  <td>{{date_format(date_create($project_task->end_date),'d M,Y')}}</td>
                                  <td>
                                    @if($project_task->status=='pending')
                                     <a href="" class="btn btn-success" onclick="alert
                                      if(confirm('Are you sure ?')){
                                        event.preventDefault();
                                        document.getElementById('make_completed-{{$project_task->id}}').submit();
                                      }else{
                                        event.preventDefault();
                                      }
                                     ">Mark Done</a>
                                    @elseif($project_task->status=='completed')
                                     <a href="" class="btn btn-warning" onclick="alert
                                      if(confirm('Are you sure ?')){
                                        event.preventDefault();
                                        document.getElementById('make_pending-{{$project_task->id}}').submit();
                                      }else{
                                        event.preventDefault();
                                      }
                                    ">Mark Pending</a>
                                    @endif
                                    <a href="{{route('project_task.edit',$project_task->id)}}" class="btn btn-info">Edit</a>
                                    <a href="" class="btn btn-danger" onclick="alert
                                       if(confirm('Are you sure ?')){
                                         event.preventDefault();
                                         document.getElementById('delete-{{$project_task->id}}').submit();
                                       }else{
                                         event.preventDefault();
                                       }
                                    ">Remove</a>
                                    <form id="delete-{{$project_task->id}}" action="{{route('project_task.delete',$project_task->id)}}" style="display:none;" method="POST">
                                        @csrf
                                        @method('delete')
                                    </form>

                                    <form id="make_completed-{{$project_task->id}}" action="{{route('project_task.make_completed',$project_task->id)}}" style="display:none;" method="POST">
                                        @csrf
                                    </form>

                                    <form id="make_pending-{{$project_task->id}}" action="{{route('project_task.make_pending',$project_task->id)}}" style="display:none;" method="POST">
                                        @csrf
                                    </form>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                  </div>
                </div>
              </div>              
            </div>            
          </div>
      </div>
    @endsection