@extends('master.app')
@section('title','Edit Task')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header d-flex justify-content-center">
                <h1 class="page-title">Edit Task</h1> 
              </div>
              <div class="row row-cards row-deck d-flex justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <div class="card-status bg-green"></div>
                        <div class="card-header">Edit Task</div>
                        <div class="card-body">
                           @foreach($task as $each)
                           <form action="{{route('task.update',$each->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="task_title" class="form-control {{($errors->has('task_title'))?'is-invalid':''}}" value="{{$each->title}}" placeholder="Enter task title..."> 
                                    @if($errors->has('task_title'))
                                       <p class="text-danger">{{$errors->first('task_title')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <select name="task_category" class="form-control {{($errors->has('task_category'))?'is-invalid':''}}">
                                    <option value="">Choose a category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{($category->id==$each->category_id)?'selected':''}}>{{$category->category_title}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('task_category'))
                                       <p class="text-danger">{{$errors->first('task_category')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Start From</label>
                                    <input type="date" name="start_date" value="{{ $each->start_date }}" class="form-control {{($errors->has('start_date'))?'is-invalid':''}}" placeholder="Enter start date...">
                                    @if($errors->has('start_date'))
                                       <p class="text-danger">{{$errors->first('start_date')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">End date</label>
                                    <input type="date" name="end_date" value="{{ $each->end_date }}" class="form-control {{($errors->has('start_date'))?'is-invalid':''}}" placeholder="Enter end date...">
                                    @if($errors->has('end_date'))
                                       <p class="text-danger">{{$errors->first('end_date')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control {{($errors->has('description'))?'is-invalid':''}}" name="description" placeholder="Task description...">{{$each->description}}</textarea>
                                    @if($errors->has('description'))
                                       <p class="text-danger">{{$errors->first('description')}}</p>
                                    @endif
                                </div>                  
                                <div class="card-footer float-right">
                                    <a href="{{route('task.ongoing')}}" class="btn btn-danger">Cancel</a>
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