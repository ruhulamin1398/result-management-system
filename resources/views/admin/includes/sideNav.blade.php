<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-sidebar-brand">

            <a href="{{route('admin')}}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{asset('logo.png')}}" srcset="./images/logo2x.png 2x" alt="logo"  height="100px;">
                <img class="logo-dark logo-img" src="{{asset('logo.png')}}" srcset="./images/logo-dark2x.png 2x" alt="logo-dark"  height="100px;">
            </a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">

                    @role('student')
                    <li class="nk-menu-item">
                        <a href="{{route('index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                            <span class="nk-menu-text">Back to profile </span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    @endrole

                    @role('admin')

                    <li class="nk-menu-item small">
                        <a href="{{route('departments.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users "></em></span>
                            <span class="nk-menu-text  ">Departments</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item small">
                        <a href="{{route('study_sessions.create')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users "></em></span>
                            <span class="nk-menu-text  ">Sessions</span>
                        </a>
                    </li><!-- .nk-menu-item -->


                    <li class="nk-menu-item  has-sub ">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                            <span class="nk-menu-text">Courses</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('semesters.index')}}?department_id=1" class="nk-menu-link"><span class="nk-menu-text">CSE</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('semesters.index')}}?department_id=2" class="nk-menu-link"><span class="nk-menu-text">EEE</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('semesters.index')}}?department_id=3" class="nk-menu-link"><span class="nk-menu-text">CE</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    

                    <li class="nk-menu-item  has-sub ">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                            <span class="nk-menu-text">Course Offering</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('course-offerings.index')}}?department_id=1" class="nk-menu-link"><span class="nk-menu-text">CSE</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('course-offerings.index')}}?department_id=2" class="nk-menu-link"><span class="nk-menu-text">EEE</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('course-offerings.index')}}?department_id=3" class="nk-menu-link"><span class="nk-menu-text">CE</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->




                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                            <span class="nk-menu-text">Students</span>
                        </a>
                        <ul class="nk-menu-sub">

                            <li class="nk-menu-item">
                                <a href="{{route('students.create')}}" class="nk-menu-link"><span class="nk-menu-text">New Student</span></a>
                            </li>

                            <li class="nk-menu-item">
                                <a href="{{route('study_sessions.index')}}?department_id=1" class="nk-menu-link"><span class="nk-menu-text">CSE</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('study_sessions.index')}}?department_id=2" class="nk-menu-link"><span class="nk-menu-text">EEE</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('study_sessions.index')}}?department_id=3" class="nk-menu-link"><span class="nk-menu-text">CE</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->



                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                            <span class="nk-menu-text">Result</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('study_sessions.index')}}?department_id=1" class="nk-menu-link"><span class="nk-menu-text">CSE</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('study_sessions.index')}}?department_id=2" class="nk-menu-link"><span class="nk-menu-text">EEE</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('study_sessions.index')}}?department_id=3" class="nk-menu-link"><span class="nk-menu-text">CE</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->






                    @endrole


                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>