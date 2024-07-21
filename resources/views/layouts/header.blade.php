<nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i
                        class="bi bi-list"></i> </a> </li>
        </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
            <!--begin::Messages Dropdown Menu-->
            
            <li class="nav-item dropdown"> <a class="nav-link" data-bs-toggle="dropdown" href="#"> <i
                        class="bi bi-chat-text"></i> <span class="navbar-badge badge text-bg-danger">3</span> </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <a href="#" class="dropdown-item">
                        <!--begin::Message-->
                        <div class="d-flex">
                            <div class="flex-shrink-0"> <img src="../../dist/assets/img/user1-128x128.jpg"
                                    alt="User Avatar" class="img-size-50 rounded-circle me-3"> </div>
                            <div class="flex-grow-1">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-end fs-7 text-danger"><i class="bi bi-star-fill"></i></span>
                                </h3>
                                <p class="fs-7">Call me whenever you can...</p>
                                <p class="fs-7 text-secondary"> <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                </p>
                            </div>
                        </div> <!--end::Message-->
                    </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <!--begin::Message-->
                        <div class="d-flex">
                            <div class="flex-shrink-0"> <img src="../../dist/assets/img/user8-128x128.jpg"
                                    alt="User Avatar" class="img-size-50 rounded-circle me-3"> </div>
                            <div class="flex-grow-1">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-end fs-7 text-secondary"> <i class="bi bi-star-fill"></i> </span>
                                </h3>
                                <p class="fs-7">I got your message bro</p>
                                <p class="fs-7 text-secondary"> <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                </p>
                            </div>
                        </div> <!--end::Message-->
                    </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <!--begin::Message-->
                        <div class="d-flex">
                            <div class="flex-shrink-0"> <img src="../../dist/assets/img/user3-128x128.jpg"
                                    alt="User Avatar" class="img-size-50 rounded-circle me-3"> </div>
                            <div class="flex-grow-1">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-end fs-7 text-warning"> <i class="bi bi-star-fill"></i> </span>
                                </h3>
                                <p class="fs-7">The subject goes here</p>
                                <p class="fs-7 text-secondary"> <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                </p>
                            </div>
                        </div> <!--end::Message-->
                    </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item dropdown-footer">See All
                        Messages</a>
                </div>
            </li> <!--end::Messages Dropdown Menu--> <!--begin::Notifications Dropdown Menu-->
            <li class="nav-item dropdown"> <a class="nav-link" data-bs-toggle="dropdown" href="#"> <i
                        class="bi bi-bell-fill"></i> <span class="navbar-badge badge text-bg-warning">15</span> </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <span
                        class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i
                            class="bi bi-envelope me-2"></i> 4 new messages
                        <span class="float-end text-secondary fs-7">3 mins</span> </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i
                            class="bi bi-people-fill me-2"></i> 8 friend requests
                        <span class="float-end text-secondary fs-7">12 hours</span> </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i
                            class="bi bi-file-earmark-fill me-2"></i> 3 new reports
                        <span class="float-end text-secondary fs-7">2 days</span> </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item dropdown-footer">
                        See All Notifications
                    </a>
                </div>
            </li> <!--end::Notifications Dropdown Menu--> <!--begin::Fullscreen Toggle-->
            <li class="nav-item dropdown">
                <a class="nav-link" data-bs-toggle="dropdown" href="#">
                    <i class="bi bi-translate"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <span class="dropdown-item dropdown-header">Languages</span>
                    <div class="dropdown-divider"></div>
                    <a href="?lang=en" class="dropdown-item">
                        <img src="https://upload.wikimedia.org/wikipedia/en/a/a4/Flag_of_the_United_States.svg" 
                             alt="English" 
                             class="img-fluid" 
                             style="max-width: 30px; max-height: 30px;">
                        English
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="?lang=ar" class="dropdown-item">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Flag_of_Saudi_Arabia.svg/800px-Flag_of_Saudi_Arabia.svg.png?20230323235445" 
                             alt="Arabic" 
                             class="img-fluid" 
                             style="max-width: 30px; max-height: 30px;">
                        Arabic
                    </a>
                </div>
            </li>
            
             
            <li class="nav-item"> <a class="nav-link" href="#" data-lte-toggle="fullscreen"> <i
                        data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i> <i data-lte-icon="minimize"
                        class="bi bi-fullscreen-exit" style="display: none;"></i> </a> </li>
            <!--end::Fullscreen Toggle--> <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"> <img src="../../dist/assets/img/user2-160x160.jpg"
                        class="user-image rounded-circle shadow" alt="User Image"> <span
                        class="d-none d-md-inline">{{ Auth::user()->name }}</span> </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <!--begin::User Image-->
                    <li class="user-header text-bg-primary"> <img src="../../dist/assets/img/user2-160x160.jpg"
                            class="rounded-circle shadow" alt="User Image">
                        <p>
                            {{ Auth::user()->name }} - Web Developer
                            <small>Member since Nov. 2023</small>
                        </p>
                    </li> <!--end::User Image--> <!--begin::Menu Body-->
                    <li class="user-body"> <!--begin::Row-->
                        <div class="row">
                            <div class="col-4 text-center"> <a href="#">Followers</a> </div>
                            <div class="col-4 text-center"> <a href="#">Sales</a> </div>
                            <div class="col-4 text-center"> <a href="#">Friends</a> </div>
                        </div> <!--end::Row-->
                    </li> <!--end::Menu Body--> <!--begin::Menu Footer-->
                    <li class="user-footer"> <a href="#" class="btn btn-default btn-flat">Profile</a> <a
                            href="#" class="btn btn-default btn-flat float-end">Sign out</a> </li>
                    <!--end::Menu Footer-->
                </ul>
            </li> <!--end::User Menu Dropdown-->
        </ul> <!--end::End Navbar Links-->
    </div> <!--end::Container-->
</nav> <!--end::Header--> <!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="#" class="brand-link">
            <!--begin::Brand Image--> <img src="../../dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span
                class="brand-text fw-light">HopeSchool</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div>
    <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                data-accordion="false">
                @if (Auth::user()->user_type == 1)
                    <li class="nav-item"> <a href="{{ url('admin/dashboard') }}" class="nav-link @if(Request::segment(2)=='dashboard') active @endif"> <i
                                class="nav-icon bi bi-speedometer"></i>
                            <p>Dashboard
                            </p>
                        </a> </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/admin/list') }}" class="nav-link @if(Request::segment(2)=='admin') active @endif">
                            <i class="nav-icon bi bi-people"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                @elseif(Auth::user()->user_type == 2)
                    <li class="nav-item"> <a href="{{ url('teacher/dashboard') }}" class="nav-link @if(Request::segment(2)=='dashboard') active @endif"> <i
                                class="nav-icon bi bi-speedometer"></i>
                            <p>Dashboard</p>
                        </a> </li>
                @elseif(Auth::user()->user_type == 3)
                    <li class="nav-item"> <a href="{{ url('student/dashboard') }}" class="nav-link @if(Request::segment(2)=='dashboard') active @endif"> <i
                                class="nav-icon bi bi-speedometer"></i>
                            <p>Dashboard</p>
                        </a> </li>
                @elseif(Auth::user()->user_type == 4)
                    <li class="nav-item"> <a href="{{ url('student/dashboard') }}" class="nav-link @if(Request::segment(2)=='dashboard') active @endif"> <i
                                class="nav-icon bi bi-speedometer"></i>
                            <p>Dashboard</p>
                        </a> </li>
                @endif
                <li class="nav-item">
                    <a href="{{ url('logout') }}" class="nav-link">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> <!--begin::App Main-->
