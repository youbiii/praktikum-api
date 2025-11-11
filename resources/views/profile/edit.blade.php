@extends('layouts.app') {{-- Menggunakan layout SIKAD Anda --}}

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            {{-- PERUBAHAN: Saya ganti col-lg-8 menjadi col-lg-10 agar lebih lebar --}}
            <div class="col-lg-10 mx-auto">

                {{-- ===== AWAL: BAGIAN BARU UNTUK FOTO PROFIL ===== --}}
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Profile Photo</h6>
                    </div>
                    <div class="card-body px-4 pt-3 pb-4">
                        <form method="post" action="{{ route('profile.update.photo') }}" enctype="multipart/form-data"> {{-- Note: Ini butuh route BARU --}}
                            @csrf
                            @method('patch')

                            <div class="row align-items-center">
                                <div class="col-auto">
                                    {{-- Tampilkan foto saat ini atau placeholder --}}
                                    @if (Auth::user()->profile_photo_path)
                                        {{-- Ganti 'storage/'.Auth::user()->profile_photo_path dengan path foto Anda --}}
                                        <img src="{{ asset('storage/'.Auth::user()->profile_photo_path) }}" alt="Profile Photo" class="avatar avatar-xl rounded-circle position-relative">
                                    @else
                                        {{-- Placeholder jika tidak ada foto --}}
                                        <div class="avatar avatar-xl rounded-circle position-relative bg-light d-flex align-items-center justify-content-center">
                                            <i class="fa fa-user fa-2x text-dark"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="col">
                                    <label for="photo" class="form-label">Upload new photo</label>
                                    <input class="form-control" type="file" id="photo" name="photo">
                                    @if($errors->get('photo'))
                                        <div class="text-danger text-sm mt-1">
                                            @foreach((array)$errors->get('photo') as $message)
                                                <p class="m-0">{{ $message }}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-dark mb-0 mt-4">{{ __('Save Photo') }}</button>
                                </div>
                            </div>
                        </form>

                        @if (session('status') === 'photo-updated')
                            <p class="text-sm text-success m-0 mt-2">{{ __('Photo saved.') }}</p>
                        @endif
                    </div>
                </div>
                {{-- ===== AKHIR: BAGIAN BARU UNTUK FOTO PROFIL ===== --}}


                {{-- Update Profile Information Card --}}
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Edit Profile</h6>
                    </div>
                    <div class="card-body px-4 pt-3 pb-4">
                        {{-- ===== AWAL: KODE DARI update-profile-information-form.blade.php ===== --}}
                        <section>
                            <p class="text-sm">
                                {{ __("Perbarui informasi profil dan alamat email akun Anda.") }}
                            </p>

                            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                @csrf
                            </form>
                                {{-- PERUBAHAN: Menambahkan enctype untuk upload file (meskipun form ini tidak menggunakannya, form di atas butuh) --}}
                            <form method="post" action="{{ route('profile.update') }}" class="mt-4">
                                @csrf
                                @method('patch')

                                {{-- Name --}}
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                                    @if($errors->get('name'))
                                        <div class="text-danger text-sm mt-1">
                                            @foreach((array)$errors->get('name') as $message)
                                                <p class="m-0">{{ $message }}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                {{-- Email --}}
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
                                    @if($errors->get('email'))
                                        <div class="text-danger text-sm mt-1">
                                             @foreach((array)$errors->get('email') as $message)
                                                <p class="m-0">{{ $message }}</p>
                                            @endforeach
                                        </div>
                                    @endif

                                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                        <div class="mt-2">
                                            <p class="text-sm text-muted">
                                                {{ __('Alamat email Anda belum terverifikasi.') }}
                                                <button form="send-verification" class="btn btn-link p-0 m-0 align-baseline text-sm text-primary">
                                                    {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                                                </button>
                                            </p>
                                            @if (session('status') === 'verification-link-sent')
                                                <p class="mt-2 text-sm text-success">
                                                    {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                                                </p>
                                            @endif
                                        </div>
                                    @endif
                                </div>

                                <div class="d-flex align-items-center gap-4">
                                    <button type="submit" class="btn btn-dark mb-0">{{ __('Save') }}</button>
                                    @if (session('status') === 'profile-updated')
                                        <p class="text-sm text-success m-0">{{ __('Saved.') }}</p>
                                    @endif
                                </div>
                            </form>
                        </section>
                        {{-- ===== AKHIR: KODE DARI update-profile-information-form.blade.php ===== --}}
                    </div>
                </div>

                {{-- Update Password Card --}}
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Update Password</h6>
                    </div>
                    <div class="card-body px-4 pt-3 pb-4">
                        {{-- ===== AWAL: KODE DARI update-password-form.blade.php ===== --}}
                        <section>
                            <p class="text-sm">
                                {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.') }}
                            </p>

                            <form method="post" action="{{ route('password.update') }}" class="mt-4">
                                @csrf
                                @method('put')

                                {{-- Current Password --}}
                                <div class="mb-3">
                                    <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
                                    <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
                                     @if($errors->updatePassword->get('current_password'))
                                        <div class="text-danger text-sm mt-1">
                                            @foreach((array)$errors->updatePassword->get('current_password') as $message)
                                                <p class="m-0">{{ $message }}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                {{-- New Password --}}
                                <div class="mb-3">
                                    <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
                                    <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
                                     @if($errors->updatePassword->get('password'))
                                        <div class="text-danger text-sm mt-1">
                                            @foreach((array)$errors->updatePassword->get('password') as $message)
                                                <p class="m-0">{{ $message }}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                {{-- Confirm Password --}}
                                <div class="mb-3">
                                    <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                    <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                                     @if($errors->updatePassword->get('password_confirmation'))
                                        <div class="text-danger text-sm mt-1">
                                            @foreach((array)$errors->updatePassword->get('password_confirmation') as $message)
                                                <p class="m-0">{{ $message }}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <div class="d-flex align-items-center gap-4">
                                    <button type="submit" class="btn btn-dark mb-0">{{ __('Save') }}</button>
                                    @if (session('status') === 'password-updated')
                                        <p class="text-sm text-success m-0">{{ __('Saved.') }}</p>
                                    @endif
                                </div>
                            </form>
                        </section>
                        {{-- ===== AKHIR: KODE DARI update-password-form.blade.php ===== --}}
                    </div>
                </div>

                {{-- Delete Account Card --}}
                <div class="card">
                    <div class="card-header pb-0">
                        <h6 class="text-danger">Delete Account</h6>
                    </div>
                    <div class="card-body px-4 pt-3 pb-4">
                        {{-- ===== AWAL: KODE DARI delete-user-form.blade.php ===== --}}
                        <section class="space-y-6">
                            <p class="text-sm">
                                Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen.
                            </p>

                            <button type="button" class="btn btn-danger mb-0" data-bs-toggle="modal" data-bs-target="#confirm-user-deletion-modal">
                                {{ __('Delete Account') }}
                            </button>

                            {{-- Modal Konfirmasi Hapus Akun --}}
                            <div class="modal fade" id="confirm-user-deletion-modal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="post" action="{{ route('profile.destroy') }}" class="p-0 m-0">
                                            @csrf
                                            @method('delete')

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmUserDeletionModalLabel">{{ __('Apakah Anda yakin ingin menghapus akun Anda?') }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <p class="text-sm text-muted">
                                                    {{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.') }}
                                                </p>

                                                <div class="mb-3">
                                                    <label for="password_delete" class="form-label">{{ __('Password') }}</label>
                                                    <input id="password_delete" name="password" type="password" class="form-control" placeholder="{{ __('Password') }}" autocomplete="current-password">
                                                    @if($errors->userDeletion->get('password'))
                                                        <div class="text-danger text-sm mt-1">
                                                            @foreach((array)$errors->userDeletion->get('password') as $message)
                                                                <p class="m-0">{{ $message }}</p>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary mb-0" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                                <button type="submit" class="btn btn-danger mb-0">{{ __('Delete Account') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                        {{-- ===== AKHIR: KODE DARI delete-user-form.blade.php ===== --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


