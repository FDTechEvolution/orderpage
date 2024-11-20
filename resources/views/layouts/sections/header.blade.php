<header id="header" class="d-flex align-items-center bg-transparent">
    <div class="px-3 px-lg-0 w-100 position-relative">
        <nav class="navbar navbar-expand-lg navbar-light justify-content-between h-auto">
            <div class="align-items-start">

                <!-- sidebar toggler -->
                <a href="#aside-main"
                    class="btn-sidebar-toggle h-100 d-inline-block d-lg-none justify-content-center align-items-center p-2">
                    <span>
                        <svg width="25" height="25" viewBox="0 0 20 20">
                            <path
                                d="M 19.9876 1.998 L -0.0108 1.998 L -0.0108 -0.0019 L 19.9876 -0.0019 L 19.9876 1.998 Z">
                            </path>
                            <path
                                d="M 19.9876 7.9979 L -0.0108 7.9979 L -0.0108 5.9979 L 19.9876 5.9979 L 19.9876 7.9979 Z">
                            </path>
                            <path
                                d="M 19.9876 13.9977 L -0.0108 13.9977 L -0.0108 11.9978 L 19.9876 11.9978 L 19.9876 13.9977 Z">
                            </path>
                            <path
                                d="M 19.9876 19.9976 L -0.0108 19.9976 L -0.0108 17.9976 L 19.9876 17.9976 L 19.9876 19.9976 Z">
                            </path>
                        </svg>
                    </span>
                </a>

                <!-- logo : mobile only -->
                <a class="navbar-brand d-inline-block d-lg-none mx-2" href="index.html">
                    <img src="assets/images/logo/logo_sm.svg" width="38" height="38" alt="...">
                </a>

            </div>

            <ul class="list-inline list-unstyled mb-0 d-flex align-items-end">
                <li class="list-inline-item mx-1 dropdown">

                    <!-- has avatar -->
                    <a href="#" id="dropdownAccountOptions"
                        class="btn btn-sm btn-icon btn-light dropdown-toggle rounded-circle shadow bg-cover"
                        style="background-image:url({{ asset(Auth::user()->profile_url) }})" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false" aria-haspopup="true"
                        aria-label="Account options"></a>

                    <!-- no avatar -->
                    <!--
                    <a href="#" id="dropdownAccountOptions" class="btn btn-sm btn-icon btn-light dropdown-toggle rounded-circle" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                      <span class="small fw-bold">JD</span>
                    </a>
                    -->

                    <div aria-labelledby="dropdownAccountOptions"
                        class="dropdown-menu dropdown-menu-clean dropdown-menu-navbar-autopos dropdown-menu-invert dropdown-fadeindown p-0 mt-2 w-300">

                        <!-- user detail -->
                        <div
                            class="dropdown-header bg-primary bg-gradient rounded rounded-bottom-0 text-white small p-4">
                            <span class="d-block fw-medium text-truncate">{{ Auth::user()->name }}</span>
                            <span class="d-block smaller fw-medium text-truncate">{{ Auth::user()->mobileno }}</span>
                            <span class="d-block smaller"><b>Last Login:</b> {{ Auth::user()->updated_at }}</span>
                        </div>

                        <div class="dropdown-divider mb-3"></div>

                        <a href="#" class="dropdown-item text-truncate">
                            <span class="fw-medium">My profile</span>
                            <small class="d-block text-muted smaller">account settings and more</small>
                        </a>


                        <div class="dropdown-divider mb-0 mt-3"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                class="prefix-icon-ignore dropdown-footer dropdown-custom-ignore fw-medium py-3 px-4">
                                <i class="fi fi-power float-start"></i>
                                Log Out
                            </x-dropdown-link>
                        </form>

                    </div>

                </li>
            </ul>
        </nav>
    </div>
</header>