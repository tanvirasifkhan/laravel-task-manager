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
                <table id="example" class="table card-table table-striped table-vcenter text-nowrap">
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