<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">

        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">

        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> Hi,{{session('nama')}}
                </a>

                <a href="{{route('logout')}}" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>

                <a href="{{route('change.password')}}" class="dropdown-item">
                    <i class="fas fa-key"></i> Ganti Password
                </a>

            </div>
        </li>
    </ul>
</nav>
