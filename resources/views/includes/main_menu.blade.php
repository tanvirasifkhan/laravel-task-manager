
<div class="row align-items-center">
    <div class="col-lg order-lg-first">
        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
        <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link {{Request::is('/')?'active':''}}"><i class="fe fe-home"></i> Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="{{route('category.index')}}" class="nav-link {{Request::is('categories')?'active':''}}"><i class="fe fe-calendar"></i> Categories</a>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link {{Request::is('tasks/*')?'active':''}}" data-toggle="dropdown"><i class="fe fe-box"></i> Tasks</a>
            <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{route('task.ongoing')}}" class="dropdown-item {{Request::is('tasks/ongoing')?'active':''}}">My Tasks</a>
                <a href="{{route('task.pending')}}" class="dropdown-item {{Request::is('tasks/pending')?'active':''}}">Pending Tasks</a>
                <a href="{{route('task.completed')}}" class="dropdown-item {{Request::is('tasks/completed')?'active':''}}">Completed Tasks</a>                      
            </div>
        </li>
        <li class="nav-item dropdown">
            <a href="javascript:void(0)" class="nav-link {{Request::is('projects/*')?'active':''}}" data-toggle="dropdown"><i class="fe fe-calendar"></i> Projects</a>
            <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{route('project.all')}}" class="dropdown-item {{Request::is('projects/all')?'active':''}}">My Projects</a>
                <a href="{{route('project.ongoing')}}" class="dropdown-item {{Request::is('projects/ongoing')?'active':''}}">Ongoing Projects</a>
                <a href="{{route('project.finished')}}" class="dropdown-item {{Request::is('projects/finished')?'active':''}}">Finished Project</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link {{Request::is('project_tasks/*')?'active':''}}" data-toggle="dropdown"><i class="fe fe-box"></i> Project Tasks</a>
            <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{route('project_task.all')}}" class="dropdown-item {{Request::is('project_tasks/all')?'active':''}}">My Project Tasks</a>
                <a href="{{route('project_task.pending')}}" class="dropdown-item {{Request::is('project_tasks/pending')?'active':''}}">Pending Tasks</a>
                <a href="{{route('project_task.finished')}}" class="dropdown-item {{Request::is('project_tasks/finished')?'active':''}}">Finished Tasks</a>
            </div>
        </li>
        </ul>
    </div>
</div>