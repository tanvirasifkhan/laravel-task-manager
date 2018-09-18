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
                        <table class="table card-table table-vcenter text-nowrap">
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
                                <th><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Create Task</button></th>
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
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST">
                  <div class="form-group">
                    <input type="text" class="form-control" id="recipient-name" placeholder="Enter title...">
                  </div>
                  <div class="form-group">
                    <select name="" id="" class="form-control">
                      <option value="">Choose a category</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Start From</label>
                    <input type="date" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                      <label for="recipient-name" class="col-form-label">End date</label>
                      <input type="date" class="form-control" id="recipient-name">
                    </div>
                  <div class="form-group">
                    <textarea class="form-control" id="message-text" placeholder="Task description"></textarea>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success">Save</button>
              </div>
            </div>
          </div>
        </div>
    @endsection