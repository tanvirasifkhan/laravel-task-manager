@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{Session::get('message')}} {{Auth::user()->name}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  </button>
</div>
@endif
 <div class="page-header">
      <h1 class="page-title">
        Dashboard
      </h1>
    </div>
    <div class="row row-cards">
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card bg-info">
          <div class="card-body p-3 text-center text-light">
            <div class="h1 m-0">{{$tasks}}</div>
            <div class="mb-4">Total Tasks</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card bg-warning">
          <div class="card-body p-3 text-center text-light">
            <div class="h1 m-0">{{$pending_tasks}}</div>
            <div class="mb-4">Pending</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card bg-success">
          <div class="card-body p-3 text-center text-light">
            <div class="h1 m-0">{{$completed_tasks}}</div>
            <div class="mb-4">Completed</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card bg-info">
          <div class="card-body p-3 text-center text-light">
            <div class="h1 m-0">{{$projects}}</div>
            <div class="mb-4">My Project</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card bg-warning">
          <div class="card-body p-3 text-center text-light">
            <div class="h1 m-0">{{$pending_projects}}</div>
            <div class="mb-4">Ongoing</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card bg-success">
          <div class="card-body p-3 text-center text-light">
            <div class="h1 m-0">{{$completed_projects}}</div>
            <div class="mb-4">Finished</div>
          </div>
        </div>
      </div>
</div>