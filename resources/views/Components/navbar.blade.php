<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-cyan">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link text-info" data-toggle="dropdown" href="#">
                <i class="fas fa-user-circle fa-2x"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Profile</span>
                <div class="dropdown-divider"></div>
                <a href="{{route('get.logout')}}" class="dropdown-item">
                    <i class="fas fa-door-open mr-2"></i> Logout
                    <span class="float-right text-muted text-sm"><i class="fa fa-arrow-right"></i></span>
                </a>
                <div class="dropdown-divider"></div>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
