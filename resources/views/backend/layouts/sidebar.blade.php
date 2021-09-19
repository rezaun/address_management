@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            @if(Auth::user()->usertype=='Admin')
            {{--<li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}}">--}}
                {{--<a href="#" class="nav-link">--}}
                    {{--<i class="nav-icon fas fa-copy"></i>--}}
                    {{--<p>--}}
                        {{--Manage User--}}
                        {{--<i class="fas fa-angle-left right"></i>--}}
                    {{--</p>--}}
                {{--</a>--}}
                {{--<ul class="nav nav-treeview">--}}
                    {{--<li class="nav-item">--}}
                        {{--<a href="{{route('users.view')}}" class="nav-link" {{$route==('users.view')?'active':''}}>--}}
                            {{--<i class="far fa-circle nav-icon"></i>--}}
                            {{--<p>View User</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            @endif
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage Profile
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('profiles.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Your Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('profiles.password.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Change Password</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage Division
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('divisions.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Division</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage District
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('districts.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View District</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage upazila
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('upazilas.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View upazila</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage Union
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('unions.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View union</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage Ward
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('wards.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Ward</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage Village
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('villages.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Village</p>
                        </a>
                    </li>

                </ul>
            </li>


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->