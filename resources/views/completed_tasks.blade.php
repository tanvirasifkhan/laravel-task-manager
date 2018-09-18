@extends('master.app')
@section('title','Completed Tasks')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header">
                <h1 class="page-title">Completed Tasks</h1>
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
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($completed as $task)
                              <tr>
                                <td>{{$task->title}}</td>
                                <td>{{$task->category->category_title}}</td>
                                <td><p class="text-center text-light bg-success m-2">Done</p></td>
                                <td>{{date_format(date_create($task->created_at),'d M,Y')}}</td>
                                <td>{{date_format(date_create($task->start_date),'d M,Y')}}</td>
                                <td>{{date_format(date_create($task->end_date),'d M,Y')}}</td>
                                <td>{{$task->description}}</td>
                              </tr>
                            @endforeach
                          </tbody>
                          </table>
                    </div>
                  </div>
                  {{$completed->links()}}
                </div>
              </div>              
            </div>            
          </div>
      </div>      
    @endsection