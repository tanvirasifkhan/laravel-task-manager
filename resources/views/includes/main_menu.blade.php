
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
            <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i> Tasks</a>
            <div class="dropdown-menu dropdown-menu-arrow">
            <a href="tasks.html" class="dropdown-item ">My Tasks</a>
            <a href="pending.html" class="dropdown-item ">Pending Tasks</a>
            <a href="completed.html" class="dropdown-item ">Completed Tasks</a>                      
            </div>
        </li>
        <li class="nav-item dropdown">
            <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-calendar"></i> Projects</a>
            <div class="dropdown-menu dropdown-menu-arrow">
            <a href="projects.html" class="dropdown-item ">My Projects</a>
            <a href="ongoing.html" class="dropdown-item ">Ongoing Projects</a>
            <a href="finished.html" class="dropdown-item ">Finished Project</a>
            </div>
        </li>
        </ul>
    </div>
</div>