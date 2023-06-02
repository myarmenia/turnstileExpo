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
            <a class="nav-link {{ request()->routeIs('news.*') ? '' : ' collapsed' }}" href="{{route('news.index')}}">
                <i class="bx bx-news"></i>
                <span>News</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('news.*') ? '' : ' collapsed' }}"
                href="{{route('global-monitoring.index')}}">
                <i class="bx bx-news"></i>
                <span>Global Monitoring</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('current-earthquakes.*') ? '' : ' collapsed' }}"
                href="{{route('current-earthquakes.index')}}">
                <i class="ri-earthquake-line"></i>
                <span>Current Earthquakes</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('scientific-publications.*') ? '' : ' collapsed' }}"
                href="{{route('scientific-publications.index')}}">
                <i class="ri-earthquake-line"></i>
                <span>Scientific Publications</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('feedback.*') ? '' : ' collapsed' }}"
                href="{{route('feedback.index')}}">
                <i class="ri-feedback-line"></i>
                <span>Feedbacks</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('chat.*') ? '' : ' collapsed' }}"
                href="{{route('chat')}}">
                <i class="ri-file-list-2-line"></i>
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
                    <a class="nav-link {{ request()->routeIs('contact-informations.*') ? '' : ' collapsed' }}"
                        href="{{route('contact_informations')}}">
                        <i class="ri-earthquake-line"></i>
                        <span>Contact Informations</span>
                    </a>
        </li>
        @endrole

        @role('Admin|moderator')
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.users.*') ? '' : ' collapsed' }}"
                href="{{route('admin.users.index')}}">
                <i class="ri-file-list-2-line"></i>
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
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Alerts</span>
                    </a>
                </li>
                <li>
                    <a href="components-accordion.html">
                        <i class="bi bi-circle"></i><span>Accordion</span>
                    </a>
                </li>
                <li>
                    <a href="components-badges.html">
                        <i class="bi bi-circle"></i><span>Badges</span>
                    </a>
                </li>
                <li>
                    <a href="components-breadcrumbs.html">
                        <i class="bi bi-circle"></i><span>Breadcrumbs</span>
                    </a>
                </li>


            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-heading">Pages</li>



        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->


    </ul>

</aside><!-- End Sidebar-->
