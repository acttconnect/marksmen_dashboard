<header class="admin-header">

    {{-- LEFT --}}
    <div class="header-left">

        <div class="header-title-wrapper">

            <span class="header-title-icon">
                <i class="fa-solid fa-gauge"></i>
            </span>

            <div>
                <h3>
                    @yield('title', 'Dashboard')
                </h3>

                <span class="header-breadcrumb">
                    Marksmen Admin
                </span>
            </div>

        </div>

    </div>


    {{-- RIGHT --}}
    <div class="header-right">

        {{-- ADMIN PROFILE --}}
        <div class="admin-profile">

            <div class="admin-avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>

            <div class="admin-info">

                <span class="admin-label">
                    Administrator
                </span>

                <strong class="admin-name">
                    {{ auth()->user()->name ?? 'Admin' }}
                </strong>

            </div>

        </div>


        {{-- DIVIDER --}}
        <div class="header-divider"></div>


        {{-- LOGOUT --}}
        <form
            action="{{ route('admin.logout') }}"
            method="POST"
            class="logout-form"
        >

            @csrf

            <button
                type="submit"
                class="logout-button"
                title="Logout"
            >

                <i class="fa-solid fa-right-from-bracket"></i>

                <span>
                    Logout
                </span>

            </button>

        </form>

    </div>

</header>