<div id="sidebar" class="active">
    <div class="sidebar-wrapper {{Route::is('admin.*')}}">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="{{route('dashboard')}}"><img src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo" srcset=""></a>
                </div>
                <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                        <label class="form-check-label"></label>
                    </div>
                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
                    <a href="{{route('dashboard')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if(auth()->user()->is_admin == 1)
                <li class="sidebar-item has-sub {{ (request()->is('admin/*')) ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Admin Tools</span>
                    </a>
                    <ul class="submenu {{ (request()->is('admin/*')) ? 'active' : '' }}">
                        <li class="submenu-item ">
                            <a href="{{route('admin.user-management')}}">Users</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="#">Device List</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="#">API</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="#">Notifications</a>
                        </li>
                    </ul>
                </li>
                @endif

                <li class="sidebar-title">Device & Tools</li>
                <li class="sidebar-item {{ (request()->is('device/*')) ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-phone-fill"></i>
                        <span>Device List</span>
                    </a>
                </li>
                <li class="sidebar-item {{ (request()->is('booking/*')) ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-book-fill"></i>
                        <span>Booking Servis</span>
                    </a>
                </li>
                <li class="sidebar-item {{ (request()->is('birthdays/*')) ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-calendar-fill"></i>
                        <span>Incoming Birthdays</span>
                    </a>
                </li>

                <li class="sidebar-title">Database</li>
                <li class="sidebar-item {{ (request()->is('grouping/*')) ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>Grouping</span>
                    </a>
                </li>
                <li class="sidebar-item {{ (request()->is('contact/*')) ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-book-fill"></i>
                        <span>Contact</span>
                    </a>
                </li>
                <li class="sidebar-item has-sub {{ (request()->is('template/*')) ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-map-fill"></i>
                        <span>Template</span>
                    </a>
                    <ul class="submenu {{ (request()->is('template/*')) ? 'active' : '' }}">
                        <li class="submenu-item ">
                            <a href="#">Detail Dealer</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="#">Template Whatsapp</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="#">Auto Replay</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Process & Reporting</li>
                <li class="sidebar-item has-sub {{ (request()->is('process/*')) ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-map-fill"></i>
                        <span>Send Message</span>
                    </a>
                    <ul class="submenu {{ (request()->is('process/*')) ? 'active' : '' }}">
                        <li class="submenu-item ">
                            <a href="#">Send Whatsapp</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="#">Send SMS</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub {{ (request()->is('report/*')) ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-map-fill"></i>
                        <span>Report</span>
                    </a>
                    <ul class="submenu {{ (request()->is('report/*')) ? 'active' : '' }}">
                        <li class="submenu-item ">
                            <a href="#">Report Whatsapp</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="#">Report KPB</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>