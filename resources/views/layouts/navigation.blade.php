{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
--}}
<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">

  <div class="navbar-header">
    <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
    data-toggle="menubar">
    <span class="sr-only">Toggle navigation</span>
    <span class="hamburger-bar"></span>
  </button>
  <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
  data-toggle="collapse">
  <i class="icon md-more" aria-hidden="true"></i>
</button>
<div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
  <img class="navbar-brand-logo" src="{{asset('public/backend/assets/images/logo.png')}}" title="LOGO">
  <span class="navbar-brand-text hidden-xs-down"> MyBE</span>
</div>
<button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
data-toggle="collapse">
<span class="sr-only">Toggle Search</span>
<i class="icon md-search" aria-hidden="true"></i>
</button>
</div>

<div class="navbar-container container-fluid">
  <!-- Navbar Collapse -->
  <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
    <!-- Navbar Toolbar -->
    <ul class="nav navbar-toolbar">
      <li class="nav-item hidden-float" id="toggleMenubar">
        <a class="nav-link" data-toggle="menubar" href="#" role="button">
          <i class="icon hamburger hamburger-arrow-left">
            <span class="sr-only">Toggle menubar</span>
            <span class="hamburger-bar"></span>
          </i>
        </a>
      </li>
      <li class="nav-item hidden-sm-down" id="toggleFullscreen">
        <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
          <span class="sr-only">Toggle fullscreen</span>
        </a>
      </li>
      <li class="nav-item hidden-float">
        <a class="nav-link icon md-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
        role="button">
        <span class="sr-only">Toggle Search</span>
      </a>
    </li>

  </ul>
  <!-- End Navbar Toolbar -->

  <!-- Navbar Toolbar Right -->
  <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" data-animation="scale-up"
      aria-expanded="false" role="button">
      <span class="flag-icon flag-icon-us"></span>
    </a>
    <div class="dropdown-menu" role="menu">
      <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
        <span class="flag-icon flag-icon-gb"></span> English</a>
        <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
          <span class="flag-icon flag-icon-fr"></span> French</a>
          <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
            <span class="flag-icon flag-icon-cn"></span> Chinese</a>
            <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
              <span class="flag-icon flag-icon-de"></span> German</a>
              <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                <span class="flag-icon flag-icon-nl"></span> Dutch</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
              data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="{{asset('public/backend/global/portraits/5.jpg')}}" alt="...">
                <i></i>
              </span>
            </a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> {{ auth()->user()->name }}</a>
              <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-card" aria-hidden="true"></i> Vai trò: 
                @php
                $roles = Auth::user()->getRoleNames();
                foreach($roles as $role){
                  echo '<span style="text-transform: uppercase;"> ' . $role . ' </span> |';
                }
                @endphp

              </a>
              {{-- <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-settings" aria-hidden="true"></i> Settings</a> --}}
              <div  class="dropdown-divider"></div>
              <form class="dropdown-item waves-effect waves-light waves-round" method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                <button type="submit" class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Logout</button>
              </x-responsive-nav-link>
            </form>

          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications"
          aria-expanded="false" data-animation="scale-up" role="button">
          <i class="icon md-notifications" aria-hidden="true"></i>
          <span class="badge badge-pill badge-danger up">5</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
          <div class="dropdown-menu-header">
            <h5>NOTIFICATIONS</h5>
            <span class="badge badge-round badge-danger">New 5</span>
          </div>

          <div class="list-group">
            <div data-role="container">
              <div data-role="content">
                <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                  <div class="media">
                    <div class="pr-10">
                      <i class="icon md-receipt bg-red-600 white icon-circle" aria-hidden="true"></i>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading">A new order has been placed</h6>
                      <time class="media-meta" datetime="2017-06-12T20:50:48+08:00">5 hours ago</time>
                    </div>
                  </div>
                </a>
                <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                  <div class="media">
                    <div class="pr-10">
                      <i class="icon md-account bg-green-600 white icon-circle" aria-hidden="true"></i>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading">Completed the task</h6>
                      <time class="media-meta" datetime="2017-06-11T18:29:20+08:00">2 days ago</time>
                    </div>
                  </div>
                </a>
                <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                  <div class="media">
                    <div class="pr-10">
                      <i class="icon md-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading">Settings updated</h6>
                      <time class="media-meta" datetime="2017-06-11T14:05:00+08:00">2 days ago</time>
                    </div>
                  </div>
                </a>
                <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                  <div class="media">
                    <div class="pr-10">
                      <i class="icon md-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading">Event started</h6>
                      <time class="media-meta" datetime="2017-06-10T13:50:18+08:00">3 days ago</time>
                    </div>
                  </div>
                </a>
                <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                  <div class="media">
                    <div class="pr-10">
                      <i class="icon md-comment bg-orange-600 white icon-circle" aria-hidden="true"></i>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading">Message received</h6>
                      <time class="media-meta" datetime="2017-06-10T12:34:48+08:00">3 days ago</time>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="dropdown-menu-footer">
            <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
              <i class="icon md-settings" aria-hidden="true"></i>
            </a>
            <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
              All notifications
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Messages"
        aria-expanded="false" data-animation="scale-up" role="button">
        <i class="icon md-email" aria-hidden="true"></i>
        <span class="badge badge-pill badge-info up">3</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
        <div class="dropdown-menu-header">
          <h5>MESSAGES</h5>
          <span class="badge badge-round badge-info">New 3</span>
        </div>

        <div class="list-group" role="presentation">
          <div data-role="container">
            <div data-role="content">
              <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                <div class="media">
                  <div class="pr-10">
                    <span class="avatar avatar-sm avatar-online">
                      <img src="{{asset('public/backend/global/portraits/2.jpg')}}" alt="..." />
                      <i></i>
                    </span>
                  </div>
                  <div class="media-body">
                    <h6 class="media-heading">Mary Adams</h6>
                    <div class="media-meta">
                      <time datetime="2017-06-17T20:22:05+08:00">30 minutes ago</time>
                    </div>
                    <div class="media-detail">Anyways, i would like just do it</div>
                  </div>
                </div>
              </a>

            </div>
          </div>
        </div>
        <div class="dropdown-menu-footer" role="presentation">
          <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
            <i class="icon md-settings" aria-hidden="true"></i>
          </a>
          <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
            See all messages
          </a>
        </div>
      </div>
    </li>
    <li class="nav-item" id="toggleChat">
      <a class="nav-link" data-toggle="site-sidebar" href="javascript:void(0)" title="Chat"
      data-url="site-sidebar.tpl">
      <i class="icon md-comment" aria-hidden="true"></i>
    </a>
  </li>
</ul>
<!-- End Navbar Toolbar Right -->
</div>
<!-- End Navbar Collapse -->

<!-- Site Navbar Seach -->
<div class="collapse navbar-search-overlap" id="site-navbar-search">
  <form role="search">
    <div class="form-group">
      <div class="input-search">
        <i class="input-search-icon md-search" aria-hidden="true"></i>
        <input type="text" class="form-control" name="site-search" placeholder="Search...">
        <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search"
        data-toggle="collapse" aria-label="Close"></button>
      </div>
    </div>
  </form>
</div>
<!-- End Site Navbar Seach -->
</div>
</nav>    
<div class="site-menubar">
  <ul class="site-menu">
    @role('admin|super admin')
    <li class="site-menu-item active">
      <a class="animsition-link" href="{{ route('dashboard') }}">
        <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
        <span class="site-menu-title">Dashboard</span>
      </a>
    </li>
    @endrole
    <li class="site-menu-item has-sub">
      <a class="animsition-link" href="{{ route('userinfo.show', Auth::id()) }}">
        <i class="site-menu-icon md-account" aria-hidden="true"></i>
        <span class="site-menu-title">Thông tin cá nhân</span>
      </a>
    </li>
    @canany(['add user','edit user',' delete user', 'publish user'])
    <li class="site-menu-item has-sub">
      <a href="{{route('users.index')}}">
        <i class="site-menu-icon icon md-accounts" aria-hidden="true"></i>
        <span class="site-menu-title">Người dùng</span>
        {{-- <span class="site-menu-arrow"></span> --}}
      </a>
      {{-- <ul class="site-menu-sub">

        <li class="site-menu-item">
          <a class="animsition-link" href="{{route('users.index')}}">
            <span class="site-menu-title">Danh sách người dùng</span>
          </a>
        </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <span class="site-menu-title">Page Aside</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="layouts/aside-left-static.html">
                    <span class="site-menu-title">Left Static</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="layouts/aside-right-static.html">
                    <span class="site-menu-title">Right Static</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="layouts/aside-left-fixed.html">
                    <span class="site-menu-title">Left Fixed</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="layouts/aside-right-fixed.html">
                    <span class="site-menu-title">Right Fixed</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul> --}}
        </li>
        @endcanany
        @role('admin|super admin')
        <li class="site-menu-item has-sub">
          <a href="javascript:void(0)">
            <i class="site-menu-icon icon md-assignment-account" aria-hidden="true"></i>
            <span class="site-menu-title">Vai trò và quyền</span>
            <span class="site-menu-arrow"></span>
          </a>
          <ul class="site-menu-sub">
            @canany(['add role','edit role',' delete role'])
            <li class="site-menu-item">
              <a class="animsition-link" href="{{route('rolesandpers.index')}}">
                <span class="site-menu-title">Vai trò</span>
              </a>
            </li>
            @endcanany
            @canany(['add permission',' delete permission'])
            <li class="site-menu-item">
              <a class="animsition-link" href="{{route('permission')}}">
                <span class="site-menu-title">Quyền</span>
              </a>
            </li>
            @endcanany
          </ul>
        </li>
        @endrole

        {{-- @can('edit articles')
          //
          @endcan --}}

        </ul>
      </div>  