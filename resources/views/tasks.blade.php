@extends('master.app')
@section('title','Ongoing Tasks')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header">
                <h1 class="page-title">My Tasks</h1> 
                <div class="row gutters-xs ml-auto">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Search for...">
                    </div>
                    <span class="col-auto">
                        <button class="btn btn-secondary" type="button"><i class="fe fe-search"></i></button>
                    </span>
                </div>
              </div>
              <div class="row row-cards row-deck">
                <div class="col-12">
                  <div class="card">
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap tasks">
                            <thead>
                              <tr>
                                <th>Task Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Description</th>
                                <th>Action</th>
                                <th><button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">Create Task</button></th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($tasks as $task)
                                <tr>
                                  <td>{{$task->title}}</td>
                                  <td>{{$task->category->category_title}}</td>
                                  <td>
                                    @if($task->status=='pending')
                                      <p class="text-center text-light bg-warning m-2 p-1">Pending</p>
                                    @else
                                      <p class="text-center text-light bg-success m-2">Done</p>
                                    @endif
                                  </td>
                                  <td>{{date_format(date_create($task->created_at),'d M,Y')}}</td>
                                  <td>{{date_format(date_create($task->start_date),'d M,Y')}}</td>
                                  <td>{{date_format(date_create($task->end_date),'d M,Y')}}</td>
                                  <td>{{$task->description}}</td>
                                  <td>
                                    @if($task->status=='pending')
                                     <a href="" class="btn btn-success">Mark Done</a>
                                    @elseif($task->status=='completed')
                                     <a href="" class="btn btn-warning">Mark Pending</a>
                                    @endif
                                    <a href="" class="btn btn-info">Edit</a>
                                    <a href="" class="btn btn-danger">Remove</a>
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                  </div>
                    {{$tasks->links()}}
                </div>
              </div>              
            </div>            
          </div>
      </div>
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{route('task.store')}}" method="POST">
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
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="save" class="btn btn-success">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
            $('.modal-footer').on('click','#save',function(event){        
              event.preventDefault();      
              alert($('input[name=task_title]').val());
            });
        </script>
    @endsection