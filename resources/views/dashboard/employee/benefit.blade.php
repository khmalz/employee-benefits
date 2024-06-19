@extends('dashboard.layouts.main')

@section('content')
    <div>
        <div class="w-full rounded-lg bg-white p-5">
            <h2 class="mb-3 text-xl font-semibold">Permintaan Tunjangan</h2>

            <form action="#" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="mb-5">
                    <label class="mb-2 block text-sm font-medium text-gray-900" for="besar_tunjangan">Besar Tunjangan</label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        id="besar_tunjangan" name="besar_tunjangan" type="text" value="{{ old('besar_tunjangan') }}"
                        placeholder="1.000.000" required>
                    @error('besar_tunjangan')
                        <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block text-sm font-medium text-gray-900" for="teacher">Pesan</label>
                    <textarea
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        id="pesan" rows="4" placeholder="Tulis pesan yang ingin disampaikan">{{ old('pesan') }}</textarea>
                    @error('pesan')
                        <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <div class="w-full lg:w-1/2">
                        <label class="mb-2 block text-sm font-medium text-gray-900" for="dropzone-file">File
                            Pendukung</label>
                        <label
                            class="flex h-52 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100"
                            id="dropzone-label" for="dropzone-file">
                            <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                <svg class="mb-4 h-8 w-8 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500" id="file-name"><span class="font-semibold">Click
                                        to
                                        upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500">PNG|JPG|JPEG (MAX. 2 MB).</p>
                            </div>
                            <input class="hidden" id="dropzone-file" name="file" type="file"
                                accept=".png,.jpg,.jpeg" />
                        </label>
                        @error('file')
                            <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                        @enderror
                        <div id="image-container">
                            @if (false)
                                <div class="mt-2" id="image-pre">
                                    <img class="h-60 w-full rounded-md border bg-slate-200/70 shadow-sm" src="#"
                                        alt="preview-image">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <button
                    class="rounded-lg bg-green-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300"
                    type="submit">Kirim</button>
            </form>

        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"
        integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" type="module"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $("#besar_tunjangan").maskMoney({
                thousands: '.',
                decimal: ',',
                precision: 0,
                allowZero: true,
                allowNegative: false,
            });
        })
    </script>
    <script>
        const dt = new DataTransfer();

        function deleteImagePre() {
            const imageDiv = $("#image-container")

            if (dt.items.length > 0) {
                dt.items.clear();
            }

            imageDiv.html('');
        }

        function handleFileCount() {
            const fileCount = dt.files.length;
            $("#file-name").text(dt.items[0].getAsFile().name);
        }

        function handleFiles(files) {
            const dropzoneFileInput = $("#dropzone-file");
            const imageContainer = $("#image-container");
            const allowedExtensionsDesign = ["png", "jpg", "jpeg"];

            if (files.length > 0) {
                const file = files[0];

                const fileExtension = file.name.split(".").pop().toLowerCase();
                if (!allowedExtensionsDesign.includes(fileExtension)) {
                    const validationHtml =
                        `<p id="validationFile" class="mt-2 text-sm font-semibold text-rose-500">Hanya file dengan format yang diizinkan.</p>`
                    $("#dropzone-label").next(`#validationFile`).remove().end().val("").after(
                        validationHtml);
                } else {
                    deleteImagePre()

                    $("#dropzone-label").next(`#validationFile`).remove();

                    dt.items.add(file);

                    const blob = URL.createObjectURL(file);
                    const imageHTML = `
                        <div class="mt-2" id="image-pre">
                            <img class="w-full border rounded-md shadow-sm h-60"
                                src="${blob}"
                                alt="preview-image">
                        </div>
                    `;
                    imageContainer.html(imageHTML);

                    dropzoneFileInput[0].files = dt.files;
                    handleFileCount();
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const dropzoneLabel = $("#dropzone-label");
            const dropzoneFileInput = $("#dropzone-file");

            dropzoneLabel.on('dragover', function(e) {
                e.preventDefault();
                $(this).addClass('border-primary-500');
            });

            dropzoneLabel.on('dragleave', function() {
                $(this).removeClass('border-primary-500');
            });

            dropzoneLabel.on('drop', function(e) {
                e.preventDefault();
                $(this).removeClass('border-primary-500');

                const droppedFiles = e.originalEvent.dataTransfer.files;
                handleFiles(droppedFiles);
            });

            dropzoneFileInput.change(function() {
                const selectedFiles = this.files;
                handleFiles(selectedFiles);
            });
        });
    </script>
@endpush
