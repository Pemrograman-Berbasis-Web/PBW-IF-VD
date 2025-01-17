<x-dashboard.layout>
    {{-- Start::Head component --}}
    <x-slot name="title">Blog</x-slot>
    {{-- End::Head component --}}

    {{-- Start::Toolbar component --}}
    <x-slot name="toolbar">
        <x-dashboard.toolbar.main>
            <x-slot name="title">Blog</x-slot>

            <x-slot name="breadcrumb">
                <li class="breadcrumb-item text-muted">
                    <span class="text-muted">Postingan</span>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Blog</li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Tambah Blog</li>
            </x-slot>
        </x-dashboard.toolbar.main>
    </x-slot>
    {{-- End::Toolbar component --}}

    {{-- Start::Post component --}}
    <x-slot name="post">
        {{-- Start::Alert component --}}
        <x-dashboard.alert.success />
        <x-dashboard.alert.warning />
        <x-dashboard.alert.error />
        {{-- End::Alert Component --}}

        {{-- Start::Content --}}
        <form class="form" action="{{ route('blog.store')}}" method="POST" autocomplete="off"
            enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <div class="card-title fs-3 fw-bolder">Tambah Blog</div>
                    <div class="card-toolbar">
                        <a class="btn btn-sm btn-light-primary fw-bolder" href="{{ route('blog.index') }}">
                            <i class="fa fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-6">
                        <label class="form-label required">Judul Blog</label>
                        <input class="form-control" type="text" name="title" value="{{ old('title') }}" required>
                    </div>
                    <div class="mb-6">
                        <label class="form-label">Status Publikasi</label>
                        @if (Auth::user()->hasAnyRole('super_administrator|administrator'))
                        <select class="form-select" name="publication_status" required>
                            <option value="0">Belum Terbit</option>
                            <option value="1" selected>Telah Terbit</option>
                        </select>
                        @else
                        <select class="form-select" required disabled>
                            <option value="1" selected>Telah Terbit</option>
                        </select>
                        <input class="form-control" type="text" name="publication_status" value="1" required hidden>
                        @endif
                    </div>
                    <div class="mb-7">
                        <label class="form-label">
                            <span class="required">Thumbnail Blog</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Ukuran maksimal thumbnail adalah 3MB."></i></label>
                        <input class="form-control" type="file" name="thumbnail" required>
                    </div>
                    <div>
                        <label class="form-label required">Isi Konten</label>
                        <textarea class="form-control" name="body" id="body" rows="10">{{ old('body') }}</textarea>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end py-6">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                    transform="rotate(-90 11.364 20.364)" fill="black" />
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                            </svg>
                        </span> Tambah Blog</button>
                </div>
            </div>
        </form>
        {{-- End::Content --}}
    </x-slot>
    {{-- End::Post component --}}

    {{-- Start::Javascript --}}
    <x-slot name="javascript">
        {{-- Start::Tinymce --}}
        <script src="{{ asset('plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
        <script>
            tinymce.init({
			selector: '#body',
            menu: {
                file: { title: 'File', items: 'newdocument restoredraft | preview | print ' },
                edit: { title: 'Edit', items: 'undo redo | cut copy paste | selectall | searchreplace' },
                view: { title: 'View', items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen' },
                insert: { title: 'Insert', items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime' },
                format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats align lineheight | forecolor backcolor | removeformat' },
                tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | code wordcount' },
                table: { title: 'Table', items: 'inserttable | cell row column | tableprops deletetable' },
                help: { title: 'Help', items: 'help' }
            },
			height: 500,
			plugins: [
				'advlist autolink lists link image charmap print preview anchor',
				'searchreplace visualblocks code fullscreen',
				'insertdatetime media table paste wordcount'
			],
			toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
			content_style: "@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap'); body { font-family: Poppins,Helvetica,sans-serif; font-size:14px } h1,h2,h3,h4,h5,h6 { font-family: Poppins,Helvetica,sans-serif; }"
		});
        </script>
        {{-- End::Tinymce --}}
    </x-slot>
    {{-- End::Javascript --}}
</x-dashboard.layout>