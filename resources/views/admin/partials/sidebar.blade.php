<aside class="sidebar">

    {{-- SIDEBAR BRAND --}}
    <div class="sidebar-logo">

        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">

            <div class="brand-mark">
                M
            </div>

            <div class="brand-text">
                <h2>MARKSMEN</h2>
                <span>ADMIN PANEL</span>
            </div>

        </a>

    </div>


    {{-- SIDEBAR MENU --}}
    <nav class="sidebar-menu">

        {{-- MAIN --}}
        <div class="menu-section">
            <div class="menu-title">
                MAIN
            </div>

            <a
                href="{{ route('admin.dashboard') }}"
                class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
            >
                <span class="menu-icon">
                    <i class="fa-solid fa-house"></i>
                </span>

                <span class="menu-label">
                    Dashboard
                </span>
            </a>
        </div>


        {{-- CONTENT --}}
        <div class="menu-section">

            <div class="menu-title">
                CONTENT
            </div>

            <a
                href="{{ route('admin.categories.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"
            >
                <span class="menu-icon">
                    <i class="fa-solid fa-layer-group"></i>
                </span>

                <span class="menu-label">
                    Categories
                </span>
            </a>


            <a
                href="{{ route('admin.galleries.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}"
            >
                <span class="menu-icon">
                    <i class="fa-solid fa-images"></i>
                </span>

                <span class="menu-label">
                    Gallery
                </span>
            </a>



        </div>


        {{-- ENQUIRIES --}}
        <div class="menu-section">

            <div class="menu-title">
                ENQUIRIES
            </div>

            <a
                href="{{ route('admin.product-enquiries.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.product-enquiries.*') ? 'active' : '' }}"
            >
                <span class="menu-icon">
                    <i class="fa-solid fa-box-open"></i>
                </span>

                <span class="menu-label">
                    Product Enquiries
                </span>
            </a>


            <a
                href="{{ route('admin.contact-enquiries.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.contact-enquiries.*') ? 'active' : '' }}"
            >
                <span class="menu-icon">
                    <i class="fa-solid fa-envelope"></i>
                </span>

                <span class="menu-label">
                    Contact Enquiries
                </span>
            </a>

        </div>


        {{-- CAREERS --}}
        <div class="menu-section">

            <div class="menu-title">
                CAREERS
            </div>

            <a
                href="{{ route('admin.jobs.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}"
            >
                <span class="menu-icon">
                    <i class="fa-solid fa-briefcase"></i>
                </span>

                <span class="menu-label">
                    Job Openings
                </span>
            </a>


            <a
                href="{{ route('admin.applications.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.applications.*') ? 'active' : '' }}"
            >
                <span class="menu-icon">
                    <i class="fa-solid fa-file-lines"></i>
                </span>

                <span class="menu-label">
                    Applications
                </span>
            </a>

        </div>


        {{-- ACCOUNT --}}
        <div class="menu-section">

            <div class="menu-title">
                ACCOUNT
            </div>

            <a
                href="{{ route('admin.change-password') }}"
                class="sidebar-link {{ request()->routeIs('admin.change-password') ? 'active' : '' }}"
            >
                <span class="menu-icon">
                    <i class="fa-solid fa-lock"></i>
                </span>

                <span class="menu-label">
                    Change Password
                </span>
            </a>

        </div>

    </nav>


    {{-- SIDEBAR FOOTER --}}
    <div class="sidebar-footer">

        <div class="sidebar-footer-inner">

            <div class="footer-icon">
                <i class="fa-solid fa-shield-halved"></i>
            </div>

            <div>
                <strong>Secure Admin</strong>
                <span>Marksmen Group</span>
            </div>

        </div>

    </div>

</aside>