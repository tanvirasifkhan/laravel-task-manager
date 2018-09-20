@extends('master.app')
@section('title','Create New Project')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header d-flex justify-content-center">
                <h1 class="page-title">Create New Project</h1> 
              </div>
              <div class="row row-cards row-deck d-flex justify-content-center">
                <div class="col-12">
                  <div class="card p-4">
                      <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter project title...">
                                </div>
                                <div class="form-group">
                                    <select name="project_category" class="form-control">
                                      <option value="">Choose a category</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Start From</label>
                                    <input type="date" class="form-control" name="start_date" placeholder="Enter start date...">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">End date</label>
                                    <input type="date" class="form-control" name="end_date" placeholder="Enter end date...">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="description" placeholder="Enter project description..."></textarea>
                                </div>
                                <div class="card-footer float-right">
                                    <a href="{{route('project.ongoing')}}" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                                </form>
                      </div>
                  </div>
                </div>
              </div>              
            </div>            
          </div>
      </div>
    @endsection