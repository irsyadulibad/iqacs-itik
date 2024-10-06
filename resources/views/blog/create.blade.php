<x-panel-layout>
    <div class="bg-white shadow-lg rounded-lg mb-7">
        <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200 bg-gray-50">
            <h2 class="text-lg font-bold text-dgreen">Tambah Blog</h2>
        </div>
        <div class="px-4 pb-4">
            <div class="overflow-x-auto mt-4">
                <!-- Livewire Component untuk menampilkan data karyawan -->
                <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                    action="{{ url('addblog') }}">
                    @csrf
                    <div class="form-group space-y-2 md:space-y-4 mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" id="judul" name="judul"
                            class="form-control w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                    </div>
                    <div class="form-group space-y-2 md:space-y-4 mb-7">
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block text-sm font-medium text-gray-700">Kategori</label>
                                <select id="kategori" name="kategori"
                                    class="form-control w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <option value="kategori1">Kategori 1</option>
                                    <option value="kategori2">Kategori 2</option>
                                    <option value="kategori3">Kategori 3</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label for="image-upload"
                                    class="block text-sm font-medium text-gray-700">Upload Gambar</label>
                                <div class="flex items-center">
                                    <label class="block">
                                        <span class="sr-only">Choose file</span>
                                        <input type="file" id="image-upload" name="image-upload"
                                            class="hidden" accept="image/*" required>
                                    </label>
                                    <button type="button"
                                        onclick="document.getElementById('image-upload').click()"
                                        class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Pilih
                                        Gambar</button>
                                    <span id="file-name" class="ml-3 text-sm text-gray-600">Tidak ada file
                                        yang dipilih</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group space-y-2 md:space-y-4 mb-7">
                        <label for="blog-content"
                            class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea id="blog-content" name="blog-content" rows="10"
                            class="form-control w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required></textarea>
                        <script>
                            CKEDITOR.replace('editor1');
                        </script>
                    </div>

                    <div class="flex justify-end mt-4">
                        <button
                            class="bg-dgreen hover:bg-dgreen text-white font-semibold py-2 px-4 rounded-lg inline-flex items-center"
                            data-modal-target="default-modal" data-modal-toggle="default-modal">
                            <span class="inline-block">Tambah Blog</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-panel-layout>
