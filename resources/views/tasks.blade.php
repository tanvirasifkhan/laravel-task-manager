@extends('master.app')
@section('title','Ongoing Tasks')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header">
                <h1 class="page-title">My Tasks</h1> 
                <div class="row gutters-xs ml-auto">
                    <div class="col">
                        <a href="{{route('task.create')}}" class="btn btn-success">Create Task</a>
                    </div>
                </div>
              </div>
              <div class="row row-cards row-deck">
                <div class="col-12">
                  <div class="card p-4">
                    <div class="table-responsive">
                        <table id="example" class="table card-table table-vcenter text-nowrap table-striped">
                            <thead>
                              <tr>
                                <th>Task Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Description</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($tasks as $task)
                                <tr>
                                  <td>{{$task->title}}</td>
                                  <td>{{$task->category->category_title}}</td>
                                  <td>
                                    @if($task->status=='pending')
                                      <p class="text-center text-light bg-warning m-2 p-1">Pending</p>
                                    @else
                                      <p class="text-center text-light bg-success m-2">Done</p>
                                    @endif
                                  </td>
                                  <td>{{date_format(date_create($task->created_at),'d M,Y')}}</td>
                                  <td>{{date_format(date_create($task->start_date),'d M,Y')}}</td>
                                  <td>{{date_format(date_create($task->end_date),'d M,Y')}}</td>
                                  <td>{{$task->description}}</td>
                                  <td>
                                    @if($task->status=='pending')
                                     <a href="" class="btn btn-success">Mark Done</a>
                                    @elseif($task->status=='completed')
                                     <a href="" class="btn btn-warning">Mark Pending</a>
                                    @endif
                                    <a href="" class="btn btn-info">Edit</a>
                                    <a href="" class="btn btn-danger">Remove</a>
                                  </td>
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