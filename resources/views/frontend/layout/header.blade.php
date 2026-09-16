@php_check_syntax
 $frontendImages = asset('frontend/assets/images');
 
 
 @endphp
  
 <!-- TOP BAR -->
<div class="top-bar">
    <div class="container top-bar-content">

        <div class="top-bar-left">
            <a href="https://www.linkedin.com/in/marksmen-construction-38b38a348/"
               target="_blank"
               rel="noopener noreferrer"
               title="LinkedIn">
                <i class="fa-brands fa-linkedin-in"></i>
            </a>

            <a href="https://www.instagram.com/marksmen_group_/"
               target="_blank"
               rel="noopener noreferrer"
               title="Instagram">
                <i class="fa-brands fa-instagram"></i>
            </a>

            <a href="https://www.youtube.com/@MarketingMarksman"
               target="_blank"
               rel="noopener noreferrer"
               title="YouTube">
                <i class="fa-brands fa-youtube"></i>
            </a>
        </div>

        <div class="top-bar-right">
            <span>
                Incorporated since 2003, 23+ years experience in construction equipment & OTR tires
            </span>
        </div>

    </div>
</div>


<!-- MAIN HEADER -->
<header class="main-header">
    <div class="header-grid-container">

        <!-- Logo -->
        <div class="header-logo-col">
            <a href="{{ route('home') }}" class="logo-link">
                <img
                    src="{{asset('frontend/assets')}}/logo.png"
                    alt="Marksmen Group Logo"
                    class="logo-img-ref"
                >
            </a>
        </div>


        <!-- Right Content -->
        <div class="header-right-col">

            <!-- Contact Details -->
            <div class="header-contact-wrapper">

                <!-- Top Contact Row -->
                <div class="header-contact-row-top">

                    <div class="contact-detail-block">
                        <i class="fa-solid fa-map-location-dot map-icon-gold"></i>

                        <a
                            href="https://maps.google.com/?q=233+-+Ganesh+Nagar,+Bawadia+Kalan,+Ward+53,+Hoshangabad+Road,+Bhopal+-+462026"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            Bawadia Kalan, Bhopal
                        </a>
                    </div>


                    <div class="contact-detail-block">
                        <i class="fa-solid fa-envelope envelope-icon-gold"></i>

                        <a href="mailto:info@marksmengroup.com">
                            info@marksmengroup.com
                        </a>
                    </div>

                </div>


                <!-- Bottom Contact Row -->
                <div class="header-contact-row-bottom">

                    <div class="contact-detail-block">

                        <i class="fa-brands fa-whatsapp whatsapp-icon-green"></i>

                        <a
                            href="https://wa.me/919893911155"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            +91 9893911155
                        </a>

                        <span style="color: rgba(0,0,0,0.25); margin: 0 0.25rem;">
                            /
                        </span>

                        <a
                            href="https://wa.me/919201987779"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            +91 9201987779
                        </a>

                    </div>

                </div>

            </div>


            <!-- NAVIGATION -->
            <div class="header-navigation-row">

                <nav class="nav-menu-ref">

                    <!-- Home -->
                    <a
                        href="{{ route('home') }}"
                        class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}"
                    >
                        Home
                    </a>


                    <!-- About -->
                    <a
                        href="{{ route('about') }}"
                        class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}"
                    >
                        About Us
                    </a>


                    <!-- Products & Services -->
                    <div class="nav-dropdown">

                        <a
                            href="{{ route('services') }}"
                            class="nav-item {{ request()->routeIs('services') ? 'active' : '' }}"
                        >
                            Products & Services
                            <i class="fa-solid fa-angle-down"></i>
                        </a>

                        <div class="dropdown-menu">

                            <a
                                href="{{ route('services') }}#tata-hitachi"
                                class="dropdown-item"
                            >
                                <i
                                    class="fa-solid fa-chevron-right"
                                    style="font-size: 0.65rem; margin-right: 0.4rem; color: var(--accent);"
                                ></i>
                                Tata Hitachi Heavy Machinery
                            </a>

                            <a
                                href="{{ route('services') }}#schwing-stetter"
                                class="dropdown-item"
                            >
                                <i
                                    class="fa-solid fa-chevron-right"
                                    style="font-size: 0.65rem; margin-right: 0.4rem; color: var(--accent);"
                                ></i>
                                Schwing Stetter Concrete Systems
                            </a>

                            <a
                                href="{{ route('services') }}#ascenso"
                                class="dropdown-item"
                            >
                                <i
                                    class="fa-solid fa-chevron-right"
                                    style="font-size: 0.65rem; margin-right: 0.4rem; color: var(--accent);"
                                ></i>
                                Ascenso OTR & Off-Road Tyres
                            </a>

                            <a
                                href="{{ route('services') }}#eicher"
                                class="dropdown-item"
                            >
                                <i
                                    class="fa-solid fa-chevron-right"
                                    style="font-size: 0.65rem; margin-right: 0.4rem; color: var(--accent);"
                                ></i>
                                Eicher Commercial Fleet Workshop
                            </a>

                        </div>

                    </div>


                    <!-- Gallery -->
                    <div class="nav-dropdown">

                        <a
                            href="{{ route('gallery') }}"
                            class="nav-item {{ request()->routeIs('gallery') ? 'active' : '' }}"
                        >
                            Gallery
                            <i class="fa-solid fa-angle-down"></i>
                        </a>

                        <div class="dropdown-menu">

                            <a
                                href="{{ route('gallery') }}#fleet"
                                class="dropdown-item"
                            >
                                <i
                                    class="fa-solid fa-chevron-right"
                                    style="font-size: 0.65rem; margin-right: 0.4rem; color: var(--accent);"
                                ></i>
                                Machinery & Excavator Fleet
                            </a>

                            <a
                                href="{{ route('gallery') }}#sites"
                                class="dropdown-item"
                            >
                                <i
                                    class="fa-solid fa-chevron-right"
                                    style="font-size: 0.65rem; margin-right: 0.4rem; color: var(--accent);"
                                ></i>
                                Infrastructure Site Deliveries
                            </a>

                            <a
                                href="{{ route('gallery') }}#workshop"
                                class="dropdown-item"
                            >
                                <i
                                    class="fa-solid fa-chevron-right"
                                    style="font-size: 0.65rem; margin-right: 0.4rem; color: var(--accent);"
                                ></i>
                                Workshop & Service Operations
                            </a>

                        </div>

                    </div>


                    <!-- Clients -->
                    <div class="nav-dropdown">

                        <a
                            href="{{ route('clients') }}"
                            class="nav-item {{ request()->routeIs('clients') ? 'active' : '' }}"
                        >
                            Clients
                            <i class="fa-solid fa-angle-down"></i>
                        </a>

                        <div class="dropdown-menu">

                            <a
                                href="{{ route('clients') }}#oem"
                                class="dropdown-item"
                            >
                                <i
                                    class="fa-solid fa-chevron-right"
                                    style="font-size: 0.65rem; margin-right: 0.4rem; color: var(--accent);"
                                ></i>
                                Authorized OEM Alliances
                            </a>

                            <a
                                href="{{ route('clients') }}#customers"
                                class="dropdown-item"
                            >
                                <i
                                    class="fa-solid fa-chevron-right"
                                    style="font-size: 0.65rem; margin-right: 0.4rem; color: var(--accent);"
                                ></i>
                                Prime Infrastructure Customers
                            </a>

                        </div>

                    </div>


                    <!-- Careers -->
                    <a
                        href="{{ route('careers') }}"
                        class="nav-item {{ request()->routeIs('careers') ? 'active' : '' }}"
                    >
                        Careers
                    </a>


                    <!-- Contact -->
                    <a
                        href="{{ route('contact') }}"
                        class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}"
                    >
                        Contact Us
                    </a>

                </nav>


                <!-- Mobile Hamburger -->
                <button
                    class="hamburger"
                    type="button"
                    aria-label="Open navigation menu"
                >
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

            </div>

        </div>

    </div>
</header>


<!-- MOBILE NAVIGATION -->
<div class="mobile-nav">

    <div class="mobile-nav-close">&times;</div>

    <div class="mobile-menu">

        <a
            href="{{ route('home') }}"
            class="mobile-link {{ request()->routeIs('home') ? 'active' : '' }}"
        >
            Home
        </a>

        <a
            href="{{ route('about') }}"
            class="mobile-link {{ request()->routeIs('about') ? 'active' : '' }}"
        >
            About Us
        </a>

        <a
            href="{{ route('services') }}"
            class="mobile-link {{ request()->routeIs('services') ? 'active' : '' }}"
        >
            Products & Services
        </a>

        <a
            href="{{ route('gallery') }}"
            class="mobile-link {{ request()->routeIs('gallery') ? 'active' : '' }}"
        >
            Gallery
        </a>

        <a
            href="{{ route('clients') }}"
            class="mobile-link {{ request()->routeIs('clients') ? 'active' : '' }}"
        >
            Clients
        </a>

        <a
            href="{{ route('careers') }}"
            class="mobile-link {{ request()->routeIs('careers') ? 'active' : '' }}"
        >
            Careers
        </a>

        <a
            href="{{ route('contact') }}"
            class="mobile-link {{ request()->routeIs('contact') ? 'active' : '' }}"
        >
            Contact Us
        </a>

    </div>


    <div class="mobile-nav-cta">
        <button
            type="button"
            class="btn btn-primary btn-enquire"
            style="width: 100%;"
        >
            Enquire Now
        </button>
    </div>

</div>

  <div class="overlay"></div>