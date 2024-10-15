<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="bell"></i>
                    <div class="indicator">
                        <div class="circle"></div>
                    </div>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p>6 New Notifications</p>
                        <a class="text-muted">Clear all</a>
                    </div>
                    <div class="p-1">
                        <a class="dropdown-item d-flex align-items-center py-2">
                            <div
                                class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                <i class="icon-sm text-white" data-feather="gift"></i>
                            </div>
                            <div class="flex-grow-1 me-2">
                                <p>New Order Recieved</p>
                                <p class="tx-12 text-muted">30 min ago</p>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center py-2">
                            <div
                                class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                <i class="icon-sm text-white" data-feather="alert-circle"></i>
                            </div>
                            <div class="flex-grow-1 me-2">
                                <p>Server Limit Reached!</p>
                                <p class="tx-12 text-muted">1 hrs ago</p>
                            </div>
                        </a>
                    </div>
                    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                        <a>View all</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (Auth::user()->image)
                        <img class="wd-30 ht-30 rounded-circle"
                            src="{{ asset('storage/file_uploads/profile_img/' . Auth::user()->id . '/' . Auth::user()->image) }}"
                            alt>
                    @else
                        <img class="wd-30 ht-30 rounded-circle"
                            src="{{ asset('1_WebFrontend/images/user-dummy-img.jpg') }}" alt>
                    @endif
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            @if (Auth::user()->image)
                                <img class="wd-80 ht-80 rounded-circle"
                                    src="{{ asset('storage/file_uploads/profile_img/' . Auth::user()->id . '/' . Auth::user()->image) }}"
                                    alt>
                            @else
                                <img class="wd-80 ht-80 rounded-circle"
                                    src="{{ asset('1_WebFrontend/images/user-dummy-img.jpg') }}" alt>
                            @endif

                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{ Auth::user()->name }}</p>
                            <p class="tx-12 text-muted">{{ Auth::user()->email }}
                            </p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <li class="dropdown-item py-2">
                            <a href="#" class="text-body ms-0" id="ProfileSection" data-bs-toggle="modal"
                                data-bs-target="#CommonModel">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="#" class="text-body ms-0" id="EditProfileSection" data-bs-toggle="modal"
                                data-bs-target="#CommonModel">
                                <i class="me-2 icon-md" data-feather="edit"></i>
                                <span>Edit Profile</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="#" class="text-body ms-0" id="PasswordProfileSection" data-bs-toggle="modal"
                                data-bs-target="#CommonModel">
                                <i class="me-2 icon-md" data-feather="lock"></i>
                                <span>Change Password</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="{{ route('AdminLogout') }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                <span>Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
