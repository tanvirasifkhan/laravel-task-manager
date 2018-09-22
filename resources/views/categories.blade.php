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
              @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{Session::get('message')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  </button>
                </div>
              @endif
              <div class="row row-cards row-deck">
                <div class="col-12">
                  <div class="card p-4">
                    <div class="table-responsive">
                      <table class="table card-table table-vcenter table-striped text-nowrap" id="example">
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
                              <a href="{{route('category.edit',$category->id)}}" class="btn btn-info">Edit</a>
                              <a href="" class="btn btn-danger" onclick="
                                  if(confirm('Are you sure ?')){                                    
                                    event.preventDefault();
                                    document.getElementById('delete-{{$category->id}}').submit();
                                  }else{
                                    event.preventDefault();
                                  }
                              ">Remove</a>
                              <form style="display:none;" id="delete-{{$category->id}}" action="{{route('category.delete',$category->id)}}" method="POST">
                                @csrf
                                @method('delete')
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