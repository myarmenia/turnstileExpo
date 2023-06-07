<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('home') ? '' : ' collapsed' }}" href="{{route('home')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('press-release.*') ? '' : ' collapsed' }}"
                href="{{route('press-release.index')}}">
                <i class="ri-file-list-2-line"></i>
                <span>Press Releases</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('press-release-videos.*') ? '' : ' collapsed' }}"
                href="{{route('press-release-videos.index')}}">
                <i class="ri-play-circle-line"></i>
                <span>Press Release Videos</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('news.*') ? '' : ' collapsed' }}" href="{{route('news.index')}}">
                <i class="bx bx-news"></i>
                <span>News</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('global-monitoring.*') ? '' : ' collapsed' }}"
                href="{{route('global-monitoring.index')}}">
                <i class="ri-earth-fill"></i>
                <span>Global Monitoring</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('regional-monitoring.*') ? '' : ' collapsed' }}"
                href="{{route('regional-monitoring.index')}}">
                <i class="ri-map-pin-2-line"></i>
                <span>Regional Monitoring</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('current-earthquakes.*') ? '' : ' collapsed' }}"
                href="{{route('current-earthquakes.index')}}">
                <i class="ri-earthquake-line"></i>
                <span>Current Earthquakes</span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('scientific-publications.*') ? '' : ' collapsed' }}"
                href="{{route('scientific-publications.index')}}">
                <i class="ri-earthquake-line"></i>
                <span>Scientific Publications</span>
            </a>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('feedback.*') ? '' : ' collapsed' }}"
                href="{{route('feedback.index')}}">
                <i class="ri-feedback-line"></i>
                <span>Feedbacks</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs(['chat', 'room']) ? '' : ' collapsed' }}" href="{{route('chat')}}">
                <i class="ri-chat-2-line"></i>
                <span>Chat</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('banner.*') ? '' : ' collapsed' }}"
                href="{{route('banner.index')}}">
                <i class="ri-file-list-2-line"></i>
                <span>Banner</span>
            </a>
        </li>
        @role('Admin')
        <li class=" nav-item">
            <a class="nav-link {{ request()->routeIs('contact_informations') ? '' : ' collapsed' }}"
                href="{{route('contact_informations')}}">
                <i class="bi bi-envelope"></i>
                <span>Contact Informations</span>
            </a>
        </li>
        @endrole

        @role('Admin')
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.users.*') ? '' : ' collapsed' }}"
                href="{{route('admin.users.index')}}">
                <i class="ri-user-2-line"></i>
                <span>Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.roles.*') ? '' : ' collapsed' }}"
                href="{{route('admin.roles.index')}}">
                <i class="ri-file-list-2-line"></i>
                <span>Roles</span>
            </a>
        </li>
        @endrole


    </ul>

</aside><!-- End Sidebar-->
