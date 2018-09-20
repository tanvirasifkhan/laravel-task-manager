@extends('master.app')
@section('title','Edit Category')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header d-flex justify-content-center">
                <h1 class="page-title">Edit Category</h1> 
              </div>
              <div class="row row-cards row-deck d-flex justify-content-center">
                <div class="col-6">
                  <div class="card">
                    <div class="card-status bg-green"></div>
                    <div class="card-header">Edit Category</div>
                    <div class="card-body">
                        @foreach($category as $each)
                        <form action="{{route('category.update',$each->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="category_title" class="form-control {{($errors->has('category_title'))?'is-invalid':''}}" value="{{$each->category_title}}" placeholder="Enter category title..."> 
                                @if($errors->has('category_title'))
                                   <p class="text-danger">{{$errors->first('category_title')}}</p>
                                @endif
                            </div>             
                            <div class="card-footer float-right">
                                <a href="{{route('category.index')}}" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>              
            </div>            
          </div>
      </div>
    @endsection