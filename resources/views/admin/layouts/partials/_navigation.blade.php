<!-- BEGIN: Main Menu-->
@inject('helper', 'App\Helpers\Helper')
<?php 
$value = Session()->get('permissions'); 
$university_data = session()->get('university_data');
$sessionUID = session()->get('uni_session_id');
?>
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">

    <div class="navbar-header">

        <ul class="nav navbar-nav flex-row">

            <li class="nav-item me-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template/index.html">
                <span class="brand-logo">
                    @if ( auth()->user()->role_id == 1)
                    <a class="navbar-brand" href="{{route('dashboard')}}"><img src="{{ asset('/')}}assets/admin/images/path-logo.png" alt="Alverno College | Alverno College"></a>
                    @endif
                    @if ( auth()->user()->role_id != 1)
                    <a class="navbar-brand uni_logo" href="{{route('dashboard')}}"><img src="{{ asset('/assets/admin/images/university/logo/'.@$university_data[0]->uni_image)}}" alt="Alverno College | Alverno College"></a>
                    @endif
                </span></a>
            </li>
        </ul>

    </div>

    <div class="shadow-bottom"></div>

    <div class="main-menu-content">

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            
            <li class="{{ $helper::activeMenu('dashboard') }} nav-item"><a class="d-flex align-items-center" href="{{route('dashboard')}}">                  
                <i class="fa-solid fa-gauge"></i>
                <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span></a>

            </li>
            

            @if(isset($permission_array))
            @if(in_array(config('constants.options.ViewUniversity'),$permission_array))


            <li class="nav-item"><a class="d-flex align-items-center" href="{{route('universities.index')}}">
                <i class="fa-solid fa-building-columns"></i>
                <span class="menu-title text-truncate" data-i18n="User">Universities</span></a>

                <ul class="menu-content">

                    <li class="{{ $helper::activeMenu('universities.index') }}"><a class="d-flex align-items-center" href="{{route('universities.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">View</span></a></li>

                   <!--  <li class="{{ $helper::activeMenu('collegeList') }}"><a class="d-flex align-items-center" href="{{url('/colleges')}}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                        data-i18n="List">Colleges And Schools</span></a></li>

                    <li><a class="d-flex align-items-center" href="{{url('/teams')}}"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="List">Teams</span></a></li> -->
                </ul>

            </li>
            
            @endif
            @endif

            @if(isset($permission_array))
            @if(in_array(config('constants.options.ViewAlumini'),$permission_array))
            <li class="nav-item {{ $helper::activeMenu('alumni.index') }}"><a class="d-flex align-items-center" href="{{route('alumni.index')}}"><i class="fa-solid fa-user-tie"></i>
                <span class="menu-title text-truncate" data-i18n="User">Alumni</span></a>

                @if ( auth()->user()->role_id == 4)
                    @if (auth()->user()->jobtitle == 0 || auth()->user()->jobtitle == 1 || auth()->user()->jobtitle == 2 || auth()->user()->jobtitle == 3 || auth()->user()->jobtitle == 4 || auth()->user()->jobtitle == 5)
                <ul class="menu-content">
                    <!-- <li class="{{ $helper::activeMenu('alumni.index') }}"><a class="d-flex align-items-center" href="{{route('alumni.index')}}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">View</span></a>
                    </li> -->                    
                    <li class="{{ $helper::activeMenu('add-availability') }}"><a class="d-flex align-items-center" href="{{route('add-availability')}}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Manage Availability</span></a>
                    </li>
                </ul>
                @endif
                @endif

            </li>
            @endif
            @endif

            @if ( auth()->user()->role_id == 3)
            <li class="nav-item"><a class="d-flex align-items-center" href="#"><i class="fa-solid fa-people-group"></i><span
                class="menu-title text-truncate">Mentors</span></a>
                <ul class="menu-content">
                    <li class="{{ $helper::activeMenu('mentors.index') }}"><a class="d-flex align-items-center" href="{{route('mentors.index')}}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">View</span></a>
                    </li>
                </ul>
            </li>
            @endif

            @if(isset($permission_array))
            @if(in_array(config('constants.options.ViewStudents'),$permission_array))
            <li class="nav-item {{ $helper::activeMenu('student.index') }}"><a class="d-flex align-items-center" href="{{route('student.index')}}"><i class="fa-solid fa-user-graduate"></i><span
                        class="menu-title text-truncate" data-i18n="User">Students</span></a>

                <!-- <ul class="menu-content">

                    <li class="{{ $helper::activeMenu('student.index') }}"><a class="d-flex align-items-center" href="{{route('student.index')}}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                        data-i18n="List">View</span></a>

                    </li>

                </ul> -->

            </li>
            @endif
            @endif

            @if(isset($permission_array))
            @if(in_array(config('constants.options.ViewMeetings'),$permission_array))

             <li class="{{ $helper::activeMenu('meeting.index') }} nav-item"><a class="d-flex align-items-center" href="{{route('meeting.index')}}"><i class="fa-solid fa-users-rectangle"></i></i><span class="menu-title text-truncate"
                data-i18n="User">Meetings</span></a>
            
            </li>
            <!-- <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fa-solid fa-users-rectangle"></i></i><span
                    class="menu-title text-truncate" data-i18n="User">Meetings</span></a>

                <ul class="menu-content">

                    <li class="{{ $helper::activeMenu('meeting.index') }}"><a class="d-flex align-items-center" href="{{route('meeting.index')}}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">View</span></a>

                    </li>

                </ul>

            </li> -->
            @endif
            @endif

            @if(isset($permission_array))
            @if(in_array(config('constants.options.ViewBoosters'),$permission_array))
            <!-- <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fa-solid fa-users-line"></i><span
                        class="menu-title text-truncate" data-i18n="User">Boosters</span></a>

                <ul class="menu-content">

                    <li class="{{ $helper::activeMenu('booster.index') }}"><a class="d-flex align-items-center" href="{{route('booster.index')}}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">View</span></a>

                    </li>

                </ul>

            </li> -->
            @endif
            @endif
              </li>

            

            @if(isset($permission_array))
            @if(in_array(config('constants.options.ViewInterestAreas'),$permission_array))

            <li class="nav-item"><a class="d-flex align-items-center" href="#"><i class="fa-solid fa-icons"></i></i><span
                class="menu-title text-truncate" data-i18n="User">Interest Areas</span></a>

                <ul class="menu-content">
                                        
                    @if ( auth()->user()->role_id == 1)
                        @if(in_array(config('constants.options.InterestAreasList'),$permission_array))
                            <li class="{{ $helper::activeMenu('/interest-Areas') }}"><a class="d-flex align-items-center" href="{{ url('/interest-Areas') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">View</span></a>
                            </li>
                        @endif
                        @if(in_array(config('constants.options.ViewInterestAreasCat'),$permission_array))
                            <li class="{{ $helper::activeMenu('interestCategories.index') }}"><a class="d-flex align-items-center" href="{{ route('interestCategories.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Categories</span></a>
                            </li>
                        @endif
                        @if(in_array(config('constants.options.ViewInterestAreasSubCat'),$permission_array))
                            <li class="{{ $helper::activeMenu('interestSubCategories.index') }}"><a class="d-flex align-items-center" href="{{ route('interestSubCategories.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Sub Categories</span></a>
                            </li>
                        @endif
                    @else
                        <li class="{{ $helper::activeMenu('interestAreas') }}"><a class="d-flex align-items-center" href="{{ route('interestAreas') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">View</span></a>
                        </li>
                    @endif

                </ul>

            </li>
            @endif
            @endif
            
            
            @if ( auth()->user()->role_id == 1)
            
            <li class="{{ $helper::activeMenu('survey-manage') }} nav-item"><a class="d-flex align-items-center" href="{{route('survey-manage')}}"><i class="fa-solid fa-user-lock"></i></i><span class="menu-title text-truncate"
                data-i18n="User">Survey Management</span></a>
            
            </li>
            <li class="{{ $helper::activeMenu('sendInvite') }} nav-item"><a class="d-flex align-items-center" href="{{route('sendInvite')}}">
                <i class="fa fa-user-plus"></i>
                <span class="menu-title text-truncate" data-i18n="Dashboards">Send Invite</span></a>
            </li>
            <li class="{{ $helper::activeMenu('permission.index') }} nav-item"><a class="d-flex align-items-center" href="{{route('permission.index')}}"><i class="fa-solid fa-user-lock"></i></i><span class="menu-title text-truncate" data-i18n="User">Permissions</span></a>
            </li>
                
            @endif
        </ul>

    </div>

</div>

<!-- END: Main Menu
