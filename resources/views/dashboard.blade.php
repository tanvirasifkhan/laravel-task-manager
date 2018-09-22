@extends('master.app')
@section('title','Dashboard')
@section('content')
  <div class="my-3 my-md-5">
      <div class="container">
        @include('includes.states')
        <div class="row row-cards row-deck">
          <div class="col-12">
            <div class="card p-4">
              <div class="card-header">
                <h3 class="card-title">Most Recent Tasks</h3>
                <a href="{{route('task.ongoing')}}" class="ml-auto btn btn-info">View Tasks</a>
              </div>
              <div class="table-responsive">
                @if($tasks==0)
                   <h3 class="text-center text-info mt-4">Sorry ! No Tasks available</h3>
                @else
                  <table class="table card-table table-vcenter text-nowrap table-striped">
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
                        @foreach($all_tasks as $task)
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
                            <td>
                              @if($task->status=='pending')
                               <a href="" class="btn btn-success" onclick="alert
                                if(confirm('Are you sure ?')){
                                  event.preventDefault();
                                  document.getElementById('make_completed-{{$task->id}}').submit();
                                }else{
                                  event.preventDefault();
                                }
                               ">Mark Done</a>
                              @elseif($task->status=='completed')
                               <a href="" class="btn btn-warning" onclick="alert
                                if(confirm('Are you sure ?')){
                                  event.preventDefault();
                                  document.getElementById('make_pending-{{$task->id}}').submit();
                                }else{
                                  event.preventDefault();
                                }
                              ">Mark Pending</a>
                              @endif
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
                  @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection