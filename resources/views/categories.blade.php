@extends('master.app')
@section('title','Categories')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header">
                <h1 class="page-title">Categories</h1> 
                <div class="row gutters-xs ml-auto">
                    <div class="col">
                        <a href="{{route('category.create')}}" class="btn btn-success">Create Category</a>
                    </div>
                </div>
              </div>
              <div class="row row-cards row-deck">
                <div class="col-12">
                  <div class="card">
                    <div class="table-responsive">
                      <table class="table card-table table~-vcenter text-nowrap">
                        <thead>
                          <tr>
                            <th>Category Title</th>
                            <th>Created At</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($categories as $category)
                          <tr>
                            <td>{{$category->category_title}}</td>
                            <td>{{date_format(date_create($category->created_at),'d M,Y')}}</td>
                            <td>
                              <a href="" class="btn btn-info">Edit</a>
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