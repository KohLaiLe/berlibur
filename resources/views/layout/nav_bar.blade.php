<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="">
            <a class="navbar-brand fw-semibold" href="/">
                <img class="navbar-brand" src="{{ url('/assets/berlibur.png') }}" alt="berlibur.png" style="width: 256px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">

                @if(Auth::check() && Auth::user()->role == 'Admin')
                    <li class="nav-item">
                        <form class="d-flex my-auto" action="{{ route('product_search') }}" role="search" method="get">
                            <input class="form-control ms-3" type="search" name="search" placeholder="Search" aria-label="Search" style="width: 68vw;" value="@if(isset($query)) {{$query}} @endif" autocomplete="off">
                            <button class="btn btn-outline-primary ms-3" type="submit">Search</button>
                        </form>
                    </li>
                @elseif(Auth::check() && Auth::user()->role == 'Member')
                    <li class="nav-item">
                        <form class="d-flex" action="{{ route('product_search') }}" role="search" method="get">
                            <input class="form-control ms-3" type="search" name="search" placeholder="Search" aria-label="Search" style="width: 68vw;" value="@if(isset($query)) {{$query}} @endif" autocomplete="off">
                            <button class="btn btn-outline-primary ms-3" type="submit">Search</button>
                        </form>
                    </li>
                @elseif(!Auth::check())
                        <form class="d-flex" action="{{ route('product_search') }}" role="search" method="get">
                            <input class="form-control ms-3" type="search" name="search" placeholder="Search" aria-label="Search" style="width: 68vw;" value="@if(isset($query)) {{$query}} @endif" autocomplete="off">
                            <button class="btn btn-outline-primary ms-3" type="submit">Search</button>
                        </form>
                    </li>
                @endif
                @if(!Auth::check())
                    <div class="d-flex ms-5 me-5">
                        <li class="nav-item">
                            <a class="btn" style="width: 5vw;background: #1C82AD; color: #ffffff;}" aria-current="page" href="/auth/login">Login</a>
                        </li>
                    </div>

                @elseif(Auth::check())
                    <li class="nav-item dropdown ms-5 me-5 my-auto">
                        <button class="btn float-end" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button">
                            <img src="https://cdn-icons-png.flaticon.com/512/3237/3237472.png" alt="" style="width: 35px;">
                        </button>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@if(Auth::check())
<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark offcanvas offcanvas-end" tabindex="-1" id="offcanvas" data-bs-keyboard="false" data-bs-backdrop="false" style="width: 18rem;">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <div class="offcanvas-header">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                        <button style="margin-left: 7rem;" type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu" style="margin-left: 0.7rem;">
                        <li class="nav-item">
                            <a href="{{ route('index') }}" class="text-white nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        @if(Auth::check() && Auth::user()->role == 'Admin')
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="text-white nav-link px-0 align-middle ">
                                <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Manage Product</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="{{ route('add_page') }}" class="text-primary-emphasis nav-link px-0"> <span class="d-none d-sm-inline"></span>Add Destination</a>
                                </li>
                                <li>
                                    <a href="{{ route('manage_product') }}" class="text-primary-emphasis nav-link px-0"> <span class="d-none d-sm-inline"></span>Manage Destination</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(Auth::check() && Auth::user()->role == 'Member')
                            <a href="{{ route('cart') }}" class="text-white nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">My Cart</span>
                            </a>
                            <a href="{{ route('history') }}" class="text-white nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Purchase History</span>
                            </a>
                        @endif
                    </ul>
                    <hr>
                    <div class="dropdown px-3 pb-5 mx-auto">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://cdn-icons-png.flaticon.com/512/3237/3237472.png" alt="profile" class="rounded-circle me-1" style="width: 40px;">
                            <span class="d-none d-sm-inline mx-2">{{ $user->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-start text-small shadow p-3" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item text-center" href="/profile">Edit Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class=" btn btn-danger w-100">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
</div>
@endif
