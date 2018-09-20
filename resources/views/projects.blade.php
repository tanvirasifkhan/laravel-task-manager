@extends('master.app')
@section('title','Ongoing Projects')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header">
                <h1 class="page-title">My Projects</h1> 
                <div class="row gutters-xs ml-auto">
                    <div class="col">
                        <a href="{{route('project.create')}}" class="btn btn-success">Create Project</a>
                    </div>
                </div>
              </div>
              @if(Session::has('message'))
                 <p class="alert alert-success">{{Session::get('message')}}</p>
              @endif
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
                                <th>Description</th>
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
                                  <td>{{$project->description}}</td>
                                  <td>
                                     @if($project->status=='pending')
                                      <a href="" class="btn btn-success">Mark Done</a>
                                     @elseif($project->status=='completed')
                                      <a href="" class="btn btn-warning">Mark Pending</a>
                                     @endif
                                    <a href="{{route('project.edit',$project->id)}}" class="btn btn-info">Edit</a>
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