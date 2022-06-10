<!-- BEGIN: Main Menu-->

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">

    <div class="navbar-header">

        <ul class="nav navbar-nav flex-row">

            <li class="nav-item me-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template/index.html"><span class="brand-logo">
                <a class="navbar-brand" href="#"><img src="{{ asset('/')}}assets/backend/images/path-logo.png" alt="Alverno College | Alverno College"></a>
            </span>

                </a></li>
        </ul>

    </div>

    <div class="shadow-bottom"></div>

    <div class="main-menu-content">

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <!-- <li class=" nav-item"><a class="d-flex align-items-center" href="{{url('/backend')}}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span><span class="badge badge-light-warning rounded-pill ms-auto me-1">2</span></a>

            </li> -->
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('backend.dashboard')}}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span><span class="badge badge-light-warning rounded-pill ms-auto me-1">2</span></a>

            </li>




            <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('backend.universities.index')}}"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="User">University</span></a>

                <ul class="menu-content">

                    <li><a class="d-flex align-items-center" href="{{route('backend.universities.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">University List</span></a>

                    </li> 
                    <li><a class="d-flex align-items-center" href="{{ route('backend.collegeList') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Collages and Schools</span></a>

                    </li>
                    <li><a class="d-flex align-items-center" href="{{url('/backend/team_list')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Teams</span></a>

                    </li>

                    <!-- <li><a class="d-flex align-items-center" href="{{url('/university_view')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="View">View</span></a>

                    </li> -->

                </ul>

            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="User">Graduates</span></a>

                <ul class="menu-content">

                    <li><a class="d-flex align-items-center" href="{{url('/backend/graduates_list')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span></a>

                    </li>

                </ul>

            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="User">Alumini</span></a>

                <ul class="menu-content">

                    <li><a class="d-flex align-items-center" href="{{url('/backend/alumini_list')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span></a>

                    </li>

                </ul>

            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="User">Booster</span></a>

                <ul class="menu-content">

                    <li><a class="d-flex align-items-center" href="{{url('/backend/booster_list')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span></a>

                    </li>

                </ul>

            </li>

             <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='file'></i></i><span class="menu-title text-truncate" data-i18n="User">Interest Area</span></a>

                <ul class="menu-content">

                   
                    <li><a class="d-flex align-items-center" href="{{ route('backend.interestAreas') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span></a>
                    </li> 
                    

                </ul>

            </li> 

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='calendar'></i></i><span class="menu-title text-truncate" data-i18n="User">Meetings</span></a>

                <ul class="menu-content">

                    <li><a class="d-flex align-items-center" href="{{url('/backend/meetings_list')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span></a>

                    </li>

                </ul>

            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{url('/backend/permissions')}}"><i data-feather='calendar'></i></i><span class="menu-title text-truncate" data-i18n="User">Permissions</span></a>


            </li>

        </ul>

    </div>

</div>

<!-- END: Main Menu
