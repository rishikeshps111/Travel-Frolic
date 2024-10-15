<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('DashboardView') }}" class="sidebar-brand">
            <img src="/1_WebFrontend/images/logo1.png" alt="logo" class="w-75">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route('DashboardView') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('PackageListView') }}" class="nav-link">
                    <i class="link-icon" data-feather="package"></i>
                    <span class="link-title">Package Management</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('DurationListView') }}" class="nav-link">
                    <i class="link-icon" data-feather="clock"></i>
                    <span class="link-title">Durations</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('DestinationListView') }}" class="nav-link">
                    <i class="link-icon" data-feather="map-pin"></i>
                    <span class="link-title">Destinations</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('GalleryListView') }}" class="nav-link">
                    <i class="link-icon" data-feather="image"></i>
                    <span class="link-title">Gallery</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('TestimonialListView') }}" class="nav-link">
                    <i class="link-icon" data-feather="pocket"></i>
                    <span class="link-title">Testimonial</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('ProfileView') }}" class="nav-link">
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="link-title">Company Profile</span>
                </a>
            </li>
            @if (Auth::user()->role == 1)
                <li class="nav-item">
                <a href="{{ route('UserListView') }}" class="nav-link">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">User Management</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</nav>
