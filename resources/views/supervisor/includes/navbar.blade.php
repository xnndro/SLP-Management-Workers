 <!-- ============================================================== -->
    <!-- toggle and nav items -->
    <!-- ============================================================== -->
    <ul class="navbar-nav float-left me-auto ms-3 ps-1">
        
    </ul>
    <!-- ============================================================== -->
    <!-- Right side toggle and nav items -->
    <!-- ============================================================== -->
    <ul class="navbar-nav float-end">
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img src="../../assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle"
                    width="40">
                <span class="ms-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                        class="text-dark">{{Auth::user()->name}}</span> <i data-feather="chevron-down"
                        class="svg-icon"></i></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user"
                        class="svg-icon me-2 ms-1"></i>
                    My Profile</a>
                <div class="dropdown-divider"></div>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="dropdown-item" type="submit"><i data-feather="power"
                            class="svg-icon me-2 ms-1"></i>
                        Logout</button>
                </form>
            </div>
        </li>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
    </ul>