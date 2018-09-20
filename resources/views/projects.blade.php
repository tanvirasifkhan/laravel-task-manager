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
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Design Works</td>
                                <td>Carlson Limited</td>
                                <td><p class="text-center text-light bg-success m-2">Done</p></td>
                                <td>87956621</td>
                                <td>15 Dec 2017</td>
                                <td><span class="status-icon bg-success"></span> Paid</td>
                                <td>
                                  <a href="" class="btn btn-success">Done</a>
                                  <a href="" class="btn btn-warning">Pending</a>
                                  <a href="" class="btn btn-info">Edit</a>
                                  <a href="" class="btn btn-danger">Remove</a>
                                </td>
                              </tr>
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