@include('includes.header')
  <body class="">
    <div class="page">
      <div class="page-main">
        <div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <div class="d-flex order-lg-2">
                <div class="nav-item d-none d-md-flex">
                  <a href="{{route('dashboard')}}" class="text-light text-uppercase" style="font-size:20px;text-decoration:none;">Task Managment System</a>
                </div>
              </div>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url({{asset('uploads/avatar.png')}})"></span>
                    <span class="ml-2 d-none d-lg-block">
                      @if(Auth::check())
                        <span class="text-light">{{Auth::user()->name}}</span>
                        <small class="text-muted d-block mt-1">Administrator</small>
                      @endif
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('auth.logout')}}" 
                      <i class="dropdown-icon fe fe-log-out"></i> Sign out
                    </a>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="header_my collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
              @include('includes.main_menu')
          </div>
        </div>        
        <div class="my-3 my-md-5">
            <div class="container">
                @yield('content')
            </div>
          </div>
      </div>
      @include('includes.footer')