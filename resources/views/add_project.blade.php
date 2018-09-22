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
                     @if($count==0)
                        <h3 class="text-info text-center">Sorry !No Category available</h3>
                        <a href="{{route('category.create')}}" class="btn btn-info">Create Category</a>
                     @else
                  <div class="card p-4">
                      <div class="card-body">
                            <form action="{{route('project.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control {{($errors->has('project_title'))?'is-invalid':''}}" value="{{old('project_title')}}" name="project_title" placeholder="Enter project title...">
                                    @if($errors->has('project_title'))
                                       <p class="text-danger">{{$errors->first('project_title')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <select name="project_category" class="form-control  {{($errors->has('project_category'))?'is-invalid':''}}">
                                        <option value="">Choose a category</option>
                                        @foreach($categories as $category)
                                           <option value="{{$category->id}}" {{(old('project_category')==$category->id)?'selected':''}}>{{$category->category_title}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('project_category'))
                                       <p class="text-danger">{{$errors->first('project_category')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Start From</label>
                                    <input type="date" class="form-control  {{($errors->has('start_date'))?'is-invalid':''}}" name="start_date" value="{{old('start_date')}}" placeholder="Enter start date...">
                                    @if($errors->has('start_date'))
                                       <p class="text-danger">{{$errors->first('start_date')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">End date</label>
                                    <input type="date" class="form-control  {{($errors->has('end_date'))?'is-invalid':''}}" name="end_date" value="{{old('end_date')}}" placeholder="Enter end date...">
                                    @if($errors->has('end_date'))
                                       <p class="text-danger">{{$errors->first('end_date')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control {{($errors->has('description'))?'is-invalid':''}}" name="description" placeholder="Enter project description...">{{old('description')}}</textarea>
                                    @if($errors->has('description'))
                                       <p class="text-danger">{{$errors->first('description')}}</p>
                                    @endif
                                </div>
                                <div class="card-footer float-right">
                                    <a href="{{route('project.all')}}" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </form>
                      </div>
                      @endif
                  </div>
                </div>
              </div>              
            </div>            
          </div>
      </div>
    @endsection