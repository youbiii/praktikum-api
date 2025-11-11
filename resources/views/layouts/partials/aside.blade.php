<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
    id="sidenav-main">
    <div class="sidenav-header text-center">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>

        <a class="navbar-brand m-0" href="{{ url('/') }}">

            <img src="{{ asset('storage/logoUP.jpeg') }}" class="navbar-brand-img" alt="Logo Utama"
                style="max-height: 50px; width: auto;">

            <span class="font-weight-bold d-block mt-1 fs-4">SIAKAD</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            @auth
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#dataManagementCollapse" role="button"
                        aria-expanded="false" aria-controls="dataManagementCollapse">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-folder-17 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data Management</span>
                    </a>
                    <div class="collapse" id="dataManagementCollapse">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('fakultas.index') }}">
                                    <span class="nav-link-text ms-1">Fakultas</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('prodi.index') }}">
                                    <span class="nav-link-text ms-1">Prodi</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dosen.index') }}">
                                    <span class="nav-link-text ms-1">Dosen</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('mahasiswa.index') }}">
                                    <span class="nav-link-text ms-1">Mahasiswa</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('jabatan.index') }}">
                                    <span class="nav-link-text ms-1">Jabatan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('matakuliah.index') }}">
                                    <span class="nav-link-text ms-1">Matakuliah</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('krs.index') }}">
                                    <span class="nav-link-text ms-1">KRS</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endauth
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>

            {{-- LOGIKA BARU DIMULAI DI SINI --}}
            @auth
                {{-- TAMPILKAN INI JIKA SUDAH LOGIN --}}
                <li class="nav-item">
                    {{-- Link Profile diperbaiki ke route('profile.edit') bawaan Breeze --}}
                    <a class="nav-link " href="{{ route('profile.edit') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                {{-- Tombol Log Out baru ditambahkan di sini --}}
                {{-- <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                        @csrf
                        <a class="nav-link " href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-button-power text-danger text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Log Out</span>
                        </a>
                    </form>
                </li> --}}
            @else
                {{-- TAMPILKAN INI JIKA BELUM LOGIN (GUEST) --}}
                <li class="nav-item">
                    {{-- Link Sign In diperbaiki ke route('login') --}}
                    <a class="nav-link " href="{{ route('login') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-copy-04 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Sign In</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('register') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Sign Up</span>
                    </a>
                </li>
            @endauth
            {{-- LOGIKA BARU BERAKHIR DI SINI --}}

        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-50 mx-auto" src="../assets/img/illustrations/icon-documentation.svg"
                alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">Need help?</h6>
                    <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
                </div>
            </div>
        </div>
        <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank"
            class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
        <a class="btn btn-primary btn-sm mb-0 w-100"
            href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree" type="button">Upgrade
            to pro</a>
    </div>
</aside>
