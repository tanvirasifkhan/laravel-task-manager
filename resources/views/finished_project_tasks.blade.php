@extends('master.app')
@section('title','Finished Project Tasks')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header">
                <h1 class="page-title">Finished Project Tasks</h1> 
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
                              @foreach($finished as $each)
                                <tr>
                                  <td>{{$each->title}}</td>
                                  <td>{{$each->project->title}}</td>
                                  <td><p class="text-center text-light bg-success m-2">Done</p></td>
                                  <td>{{date_format(date_create($each->created_at),'d M,Y')}}</td>
                                  <td>{{date_format(date_create($each->start_date),'d M,Y')}}</td>
                                  <td>{{date_format(date_create($each->end_date),'d M,Y')}}</td>
                                  <td>
                                    @if($each->status=='completed')
                                     <a href="" class="btn btn-warning" onclick="alert
                                      if(confirm('Are you sure ?')){
                                        event.preventDefault();
                                        document.getElementById('make_pending-{{$each->id}}').submit();
                                      }else{
                                        event.preventDefault();
                                      }
                                    ">Mark Pending</a>
                                    @endif
                                    <a href="{{route('project_task.edit',$each->id)}}" class="btn btn-info">Edit</a>
                                    <a href="" class="btn btn-danger" onclick="alert
                                       if(confirm('Are you sure ?')){
                                         event.preventDefault();
                                         document.getElementById('delete-{{$each->id}}').submit();
                                       }else{
                                         event.preventDefault();
                                       }
                                    ">Remove</a>
                                    <form id="delete-{{$each->id}}" action="{{route('project_task.delete',$each->id)}}" style="display:none;" method="POST">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <form id="make_pending-{{$each->id}}" action="{{route('project_task.make_pending',$each->id)}}" style="display:none;" method="POST">
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