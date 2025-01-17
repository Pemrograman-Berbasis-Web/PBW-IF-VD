<x-dashboard.layout>
    {{-- Start::Head component --}}
    <x-slot name="title">Umum</x-slot>
    {{-- End::Head component --}}

    {{-- Start::Toolbar component --}}
    <x-slot name="toolbar">
        <x-dashboard.toolbar.main>
            <x-slot name="title">Umum</x-slot>

            <x-slot name="breadcrumb">
                <li class="breadcrumb-item text-muted">
                    <span class="text-muted">Pengguna</span>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Umum</li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Ubah Pengguna Umum</li>
            </x-slot>
        </x-dashboard.toolbar.main>
    </x-slot>
    {{-- End::Toolbar component --}}

    {{-- Start::Post component --}}
    <x-slot name="post">
        {{-- Start::Alert component --}}
        <x-dashboard.alert.success />
        <x-dashboard.alert.error />
        {{-- End::Alert Component --}}

        {{-- Start::Content --}}
        <form class="form" action="{{ route('general.update', $general->id) }}" method="POST" autocomplete="off"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card">
                <div class="card-header">
                    <div class="card-title fs-3 fw-bolder">Ubah Pengguna Umum</div>
                    <div class="card-toolbar">
                        <a class="btn btn-sm btn-light-primary fw-bolder" href="{{ route('general.index') }}">
                            <i class="fa fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input class="form-control" type="text" name="name" value="{{ $general->name }}" required>
                    </div>
                    <div class="mb-6">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="gender" required>
                            <option value="L" {{ $general->gender == 'L' ? 'selected' : '' }}>Laki-Laki
                            </option>
                            <option value="P" {{ $general->gender == 'P' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label class="form-label">Tempat Lahir</label>
                        <input class="form-control" type="text" name="birthplace" value="{{ $general->birthplace }}"
                            required>
                    </div>
                    <div class="mb-6">
                        <label class="form-label">Tanggal Lahir</label>
                        <input class="form-control flatpickr" type="text" name="date_of_birth"
                            value="{{ $date_of_birth }}" required>
                    </div>
                    <div class="mb-6">
                        <label class="form-label">Alamat</label>
                        <input class="form-control" type="text" name="address" value="{{ $general->address }}" required>
                    </div>
                    <div class="mb-6">
                        <label class="form-label">Nomor Telepon</label>
                        <input class="form-control" type="tel" name="phone_number" value="{{ $general->phone_number }}"
                            required>
                    </div>
                    <div class="mb-6">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" value="{{ $general->email }}" required>
                    </div>
                    <div class="mb-6">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" name="password">
                    </div>
                    <div class="mb-6">
                        <label class="form-label">Konfirmasi Password</label>
                        <input class="form-control" type="password" name="password_confirm">
                    </div>
                    <div class="mb-6">
                        <label class="form-label">Foto Profil</label>
                        <input class="form-control" type="file" name="photo">
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end py-6">
                    <button type="submit" class="btn btn-sm btn-success">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z"
                                    fill="black"></path>
                                <path
                                    d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z"
                                    fill="black"></path>
                                <path
                                    d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z"
                                    fill="black"></path>
                            </svg>
                        </span>Ubah Pengguna Umum</button>
                </div>
            </div>
        </form>
        {{-- End::Content --}}
    </x-slot>
    {{-- End::Post component --}}

    {{-- Start::Javascript --}}
    <x-slot name="javascript">
        {{-- Start::Flatpickr --}}
        <script src="{{ asset('js/flatpickr/id.js') }}"></script>
        <script>
            $(".flatpickr").flatpickr({
                altInput: true,
                locale: "id",
                altFormat: "d F Y",
            });
        </script>
        {{-- End::Flatpickr --}}
    </x-slot>
    {{-- End::Javascript --}}
</x-dashboard.layout>