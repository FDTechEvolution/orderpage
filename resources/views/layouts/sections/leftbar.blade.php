<aside id="aside-main" class="aside-start aside-hide-xs bg-white shadow-sm d-flex flex-column px-2 h-auto">
    <div class="py-2 px-3 mb-3 mt-1">
        <a href="{{ route('dashboard.index') }}">
            <img src="{{ asset('assets/images/logo/logo.webp') }}" class="img-fluid">
        </a>
    </div>

    <div class="aside-wrapper scrollable-vertical scrollable-styled-light align-self-baseline h-100 w-100">
        <nav class="nav-deep nav-deep-sm nav-deep-light">
            <ul class="nav flex-column">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.index') }}">
                        <svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z">
                            </path>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z">
                            </path>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <i class="fa-solid fa-list"></i>
                        <span>ออเดอร์</span>
                        <span class="group-icon float-end">
                            <i class="fi fi-arrow-end"></i>
                            <i class="fi fi-arrow-down"></i>
                        </span>
                    </a>

                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="{{ route('manageOrder.index') }}">รายการออเดอร์</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('tracking.index') }}">ติดตามการจัดส่ง</a></li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cod.index') }}">
                        <i class="fa-solid fa-magnifying-glass-dollar"></i>
                        <span>ตรวจยอดเงิน COD</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('crm.index') }}">
                        <i class="fa-regular fa-handshake"></i>
                        <span>CRM</span>
                    </a>
                </li>


                <li class="nav-item mt-4 border-top">
                    <a class="nav-link fw-bolder" href="{{ route('search.index') }}">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span>ค้นหา</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
