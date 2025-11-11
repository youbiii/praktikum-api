<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        {{-- 1. Ambil nama rute saat ini, contoh: 'dashboard.index' --}}
        @php
            $routeName = Route::currentRouteName();

            // 2. Jika nama rute mengandung '.', ambil bagian setelah titik terakhir.
            //    Jika tidak, gunakan seluruh nama rute.
            //    Contoh: 'dashboard.index' -> 'index'
            //    Contoh: 'fakultas.create' -> 'create'
            //    Contoh: 'dashboard' -> 'dashboard'
            $baseName = Str::contains($routeName, '.') ? Str::afterLast($routeName, '.') : $routeName;

            // 3. Tambahkan logika pengecualian khusus untuk 'index'
            //    Jika nama rute *TIDAK* berakhir dengan '.index' atau '.list',
            //    maka tampilkan $baseName. Jika berakhir dengan '.index', tampilkan nama segmen pertama.

            if (Str::endsWith($routeName, '.index') || Str::endsWith($routeName, '.list')) {
                // Untuk 'fakultas.index', hasilnya adalah 'fakultas'
                $finalTitle = Str::before($routeName, '.');
            } else {
                // Untuk 'fakultas.create' atau 'dashboard' (jika tidak pakai .index)
                $finalTitle = $baseName;
            }

            // 4. Bersihkan (ganti underscore/strip) dan kapitalisasi
            $finalTitle = Str::title(Str::replace(['-', '_'], ' ', $finalTitle));
        @endphp

        {{ $finalTitle }}
    </title>
    @include('layouts.partials.links')
</head>
<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-dark position-absolute w-100"></div>
    @include('layouts.partials.aside')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('layouts.partials.navbar')
        <!-- End Navbar -->
        {{-- @include('layouts.partials.breadcrumb') --}}

        <div class="container-fluid py-4">
            @yield('content')
            <!-- footer -->

            @include('layouts.partials.footer')
        </div>
    </main>
    @include('layouts.partials.plugin')
    <!--   Core JS Files   -->
    @include('layouts.partials.scripts')
</body>

</html>
