@extends('master.app')
@section('title','Ongoing Tasks')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header d-flex justify-content-center">
                <h1 class="page-title">Create New Task</h1> 
              </div>
              <div class="row row-cards row-deck d-flex justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <div class="card-status bg-green"></div>
                        <div class="card-header">Add Task</div>
                        <div class="card-body">
                           <form action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="task_title" class="form-control" id="recipient-name" placeholder="Enter title..."> 
                                    <p class="errorTitle text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <select name="task_category" id="" class="form-control">
                                    <option value="">Choose a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_title}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Start From</label>
                                    <input type="date" name="start_date" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">End date</label>
                                    <input type="date" name="end_date" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="description" id="message-text" placeholder="Task description"></textarea>
                                </div>                  
                                <div class="card-footer float-right">
                                    <a href="{{route('task.ongoing')}}" class="btn btn-danger">Cancel</a>
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