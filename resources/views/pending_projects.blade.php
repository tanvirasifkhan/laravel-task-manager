@extends('master.app')
@section('title','Ongoing Projects')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header">
                <h1 class="page-title">Ongoing Projects</h1> 
              </div>
              <div class="row row-cards row-deck">
                <div class="col-12">
                  <div class="card p-4">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped card-table table-vcenter text-nowrap">
                            <thead>
                              <tr>
                                <th>Project Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($projects as $project)
                                <tr>
                                  <td>{{$project->title}}</td>
                                  <td>{{$project->category->category_title}}</td>
                                  <td>
                                      @if($project->status=='pending')
                                        <p class="text-center text-light bg-warning m-2 p-1">Pending</p>
                                      @else
                                        <p class="text-center text-light bg-success m-2">Done</p>
                                      @endif
                                  </td>
                                  <td>{{date_format(date_create($project->created_at),'d M,Y')}}</td>
                                  <td>{{date_format(date_create($project->start_date),'d M,Y')}}</td>
                                  <td>{{date_format(date_create($project->end_date),'d M,Y')}}</td>
                                  <td>
                                     @if($project->status=='pending')
                                      <a href="" class="btn btn-success" onclick="
                                        if(confirm('Are you sure ?')){
                                          event.preventDefault();
                                          document.getElementById('make_completed-{{$project->id}}').submit();
                                        }else{
                                          event.preventDefault();
                                        }
                                      ">Mark Completed</a>
                                     @elseif($project->status=='completed')
                                      <a href="" class="btn btn-warning" onclick="
                                        if(confirm('Are you sure ?')){
                                          event.preventDefault();
                                          document.getElementById('make_pending-{{$project->id}}').submit();
                                        }else{
                                          event.preventDefault();
                                        }
                                    ">Mark Pending</a>
                                     @endif
                                    <a href="{{route('project.edit',$project->id)}}" class="btn btn-info">Edit</a>
                                    <a href="" class="btn btn-danger" onclick="
                                       if(confirm('Are you sure ?')){
                                         event.preventDefault();
                                         document.getElementById('delete-{{$project->id}}').submit();
                                       }else{
                                         event.preventDefault();
                                       }
                                    ">Remove</a>
                                    <form id="delete-{{$project->id}}" style="display:none;" action="{{route('project.delete',$project->id)}}" method="POST">
                                      @csrf
                                      @method('delete')
                                    </form>
                                    <form id="make_completed-{{$project->id}}" style="display:none;" action="{{route('project.make_completed',$project->id)}}" method="POST">
                                      @csrf
                                    </form>
                                      <form id="make_pending-{{$project->id}}" style="display:none;" action="{{route('project.make_pending',$project->id)}}" method="POST">
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