@extends('master.app')
@section('title','Pending Project Tasks')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header">
                <h1 class="page-title">Pending Project Tasks</h1>
              </div>
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
                              @foreach($pendings as $pending)
                                <tr>
                                  <td>{{$pending->title}}</td>
                                  <td>{{$pending->project->title}}</td>
                                  <td><p class="text-center text-light bg-warning m-2 p-1">Pending</p></td>
                                  <td>{{date_format(date_create($pending->created_at),'d M,Y')}}</td>
                                  <td>{{date_format(date_create($pending->start_date),'d M,Y')}}</td>
                                  <td>{{date_format(date_create($pending->end_date),'d M,Y')}}</td>
                                  <td>
                                    @if($pending->status=='pending')
                                     <a href="" class="btn btn-success" onclick="alert
                                      if(confirm('Are you sure ?')){
                                        event.preventDefault();
                                        document.getElementById('make_completed-{{$pending->id}}').submit();
                                      }else{
                                        event.preventDefault();
                                      }
                                     ">Mark Done</a>
                                    @endif
                                    <a href="{{route('project_task.edit',$pending->id)}}" class="btn btn-info">Edit</a>
                                    <a href="" class="btn btn-danger" onclick="alert
                                       if(confirm('Are you sure ?')){
                                         event.preventDefault();
                                         document.getElementById('delete-{{$pending->id}}').submit();
                                       }else{
                                         event.preventDefault();
                                       }
                                    ">Remove</a>
                                    <form id="delete-{{$pending->id}}" action="{{route('project_task.delete',$pending->id)}}" style="display:none;" method="POST">
                                        @csrf
                                        @method('delete')
                                    </form>

                                    <form id="make_completed-{{$pending->id}}" action="{{route('project_task.make_completed',$pending->id)}}" style="display:none;" method="POST">
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