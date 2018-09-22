@extends('master.app')
@section('title','Edit Project Task')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header d-flex justify-content-center">
                <h1 class="page-title">Edit Project Task</h1> 
              </div>
              <div class="row row-cards row-deck d-flex justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <div class="card-status bg-green"></div>
                        <div class="card-header">Edit Project Task</div>
                        <div class="card-body">
                        @foreach($project as $each)
                           <form action="{{route('project_task.update',$each->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="project_task_title" class="form-control {{($errors->has('project_task_title'))?'is-invalid':''}}" value="{{$each->title}}" placeholder="Enter project task title..."> 
                                    @if($errors->has('task_title'))
                                       <p class="text-danger">{{$errors->first('project_task_title')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <select name="task_project" id="" class="form-control {{($errors->has('task_project'))?'is-invalid':''}}">
                                    <option value="">Choose a category</option>
                                        @foreach($projects as $project)
                                            <option value="{{$project->id}}" {{($project->id==$each->project_id)?'selected':''}}>{{$project->title}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('task_project'))
                                       <p class="text-danger">{{$errors->first('task_project')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Start From</label>
                                    <input type="date" name="start_date" value="{{$each->start_date}}" class="form-control {{($errors->has('start_date'))?'is-invalid':''}}" placeholder="Enter start date...">
                                    @if($errors->has('start_date'))
                                       <p class="text-danger">{{$errors->first('start_date')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">End date</label>
                                    <input type="date" name="end_date" value="{{$each->end_date}}" class="form-control {{($errors->has('end_date'))?'is-invalid':''}}" placeholder="Enter end date...">
                                    @if($errors->has('end_date'))
                                       <p class="text-danger">{{$errors->first('end_date')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control {{($errors->has('description'))?'is-invalid':''}}" name="description" placeholder="Project task description...">{{$each->description}}</textarea>
                                    @if($errors->has('description'))
                                       <p class="text-danger">{{$errors->first('description')}}</p>
                                    @endif
                                </div>                  
                                <div class="card-footer float-right">
                                    <a href="{{route('project_task.all')}}" class="btn btn-danger">Cancel</a>
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