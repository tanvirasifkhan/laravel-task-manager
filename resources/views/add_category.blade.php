@extends('master.app')
@section('title','Categories')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header">
                <h1 class="page-title">Add New Category</h1> 
              </div>
              <div class="row row-cards row-deck">
                <div class="col-6">
                  <div class="card">
                    <div class="card-status bg-green"></div>
                    <div class="card-header">Add Category</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="task_title" class="form-control" id="recipient-name" placeholder="Enter category title..."> 
                            </div>             
                            <div class="card-footer float-right">
                                <a href="{{route('category.index')}}" class="btn btn-danger">Cancel</a>
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