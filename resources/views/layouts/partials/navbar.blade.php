@php
    $routeName = Route::currentRouteName();
    $finalTitle = '';

    if ($routeName) {
        // 1. Cek apakah rute diakhiri dengan '.index' atau '.list'
        if (Str::endsWith($routeName, '.index') || Str::endsWith($routeName, '.list')) {
            // Jika ya, ambil bagian sebelum titik terakhir (misal: 'fakultas.index' -> 'fakultas')
            $rawTitle = Str::beforeLast($routeName, '.');
        } else {
            // Jika tidak (misal: 'fakultas.create'), ambil bagian setelah titik terakhir (misal: 'fakultas.create' -> 'create')
            if (Str::contains($routeName, '.')) {
                $rawTitle = Str::afterLast($routeName, '.');
            } else {
                // Untuk rute tanpa titik (misal: 'dashboard'), gunakan nama rute itu sendiri.
                $rawTitle = $routeName;
            }
        }

        // 2. Bersihkan underscore/strip dan kapitalisasi.
        $finalTitle = Str::title(Str::replace(['-', '_'], ' ', $rawTitle));
    }
@endphp
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-0 shadow-none border-radius-xl " id="navbarBlur"
    data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ url('/') }}">Pages</a>
                </li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">
                    {{ $finalTitle }}
                </li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">
                {{ $finalTitle }}
            </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Type here...">
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
                {{-- LOGIKA BARU DIMULAI DI SINI --}}
                @auth
                    <li class="nav-item dropdown d-flex align-items-center me-3">

                        {{-- 1. TRIGGER DROPDOWN (Foto Profil) --}}
                        <a href="javascript:;" class="nav-link text-white p-0" style="line-height: 1;" id="profileDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">

                            {{-- Logika untuk menampilkan foto profil atau placeholder --}}
                            @if (Auth::user()->profile_photo_path)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Photo"
                                    class="avatar avatar-sm rounded-circle shadow-sm">
                            @else
                                <div
                                    class="avatar avatar-sm rounded-circle bg-light d-flex align-items-center justify-content-center shadow-sm">
                                    <i class="fa fa-user text-dark"></i>
                                </div>
                            @endif
                        </a>

                        {{-- 2. MENU DROPDOWN --}}
                        <ul class="dropdown-menu dropdown-menu-end px-2 py-2 me-sm-n4" aria-labelledby="profileDropdown">

                            {{-- 3. Item 1: Link ke Profile --}}
                            <li>
                                <a class="dropdown-item border-radius-md" href="{{ route('profile.edit') }}">
                                    <div class="d-flex align-items-center py-1">
                                        <i class="fa fa-user me-2"></i>
                                        <span class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-0">
                                                Profile
                                            </h6>
                                        </span>
                                    </div>
                                </a>
                            </li>

                            {{-- 4. Item 2: Tombol Logout --}}
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                                    @csrf
                                    <a class_exists="dropdown-item border-radius-md" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        <div class="d-flex align-items-center py-1">
                                            <i class="ni ni-button-power text-danger me-2"></i>
                                            <span class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-0 text-danger">
                                                    Log Out
                                                </h6>
                                            </span>
                                        </div>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    {{-- JIKA BELUM LOGIN (GUEST), TAMPILKAN SIGN IN & SIGN UP --}}

                    {{-- <li class="nav-item d-flex align-items-center ms-3">
                                <a href="{{ route('register') }}" class="nav-link text-white font-weight-bold px-0">
                                    <i class="fa fa-user-plus me-sm-1"></i>
                                    <span class="d-sm-inline d-none">Sign Up</span>
                                </a>
                            </li> --}}
                @endauth

                {{-- LOGIKA BARU BERAKHIR DI SINI --}}


                <li class="nav-item d-xl-none ps-1 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-1 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer"></i>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                        aria-labelledby="dropdownMenuButton">
                        {{-- ... (isi dropdown notifikasi Anda) ... --}}
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
