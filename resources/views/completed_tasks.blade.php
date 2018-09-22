@extends('master.app')
@section('title','Completed Tasks')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header">
                <h1 class="page-title">Completed Tasks</h1>
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
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($completed as $task)
                                <tr>
                                  <td>{{$task->title}}</td>
                                  <td>{{$task->category->category_title}}</td>
                                  <td><p class="text-center text-light bg-success m-2">Done</p></td>
                                  <td>{{date_format(date_create($task->created_at),'d M,Y')}}</td>
                                  <td>{{date_format(date_create($task->start_date),'d M,Y')}}</td>
                                  <td>{{date_format(date_create($task->end_date),'d M,Y')}}</td>
                                  <td>
                                     <a href="" class="btn btn-warning" onclick="alert
                                      if(confirm('Are you sure ?')){
                                        event.preventDefault();
                                        document.getElementById('make_pending-{{$task->id}}').submit();
                                      }else{
                                        event.preventDefault();
                                      }
                                    ">Mark Pending</a>
                                    <a href="{{route('task.edit',$task->id)}}" class="btn btn-info">Edit</a>
                                    <a href="" class="btn btn-danger" onclick="alert
                                       if(confirm('Are you sure ?')){
                                         event.preventDefault();
                                         document.getElementById('delete-{{$task->id}}').submit();
                                       }else{
                                         event.preventDefault();
                                       }
                                    ">Remove</a>
                                    <form id="delete-{{$task->id}}" action="{{route('task.delete',$task->id)}}" style="display:none;" method="POST">
                                        @csrf
                                        @method('delete')
                                    </form>

                                    <form id="make_completed-{{$task->id}}" action="{{route('task.make_completed',$task->id)}}" style="display:none;" method="POST">
                                        @csrf
                                    </form>

                                    <form id="make_pending-{{$task->id}}" action="{{route('task.make_pending',$task->id)}}" style="display:none;" method="POST">
                                        @csrf
                                    </form>
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