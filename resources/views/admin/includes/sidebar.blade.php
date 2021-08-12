<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="far fa-grin-tongue-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Portfolio <sup>*</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active ">
        <a class="nav-link" href="{{url('/home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ request()->is('admin/*') ? 'active' :'' }}">
        <a class="nav-link collapsed" href="#"  data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="{{ request()->is('admin/*') ? 'true' :'false' }}" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Users</span>
        </a>
        <div id="collapseTwo"  aria-expanded="{{ request()->is('admin/*') ? 'true' :'false' }}" class="collapse {{ request()->is('admin/*') ? 'show' :'' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar"><!-- show is define by css it show when inspect on browser -->
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Profile:</h6>
                <a class="collapse-item {{ request()->is('admin/profiles') ? 'active' : '' }}" href="{{ url('admin/profiles') }}">Profiles</a>
                <a class="collapse-item {{ request()->is('admin/skills') ? 'active' : '' }}" href="{{ url('admin/skills') }}">Skills</a>
                <a class="collapse-item {{ request()->is('admin/projects') ? 'active' : '' }}" href="{{ url('admin/projects') }}">Projects</a>
                <a class="collapse-item {{ request()->is('admin/contacts') ? 'active' : '' }}" href="{{ url('admin/contacts') }}">Messages</a>
            </div>
        </div>
    </li>





    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
