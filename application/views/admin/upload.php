<div class="mt-10 max-w-screen-2xl max-w-2xl:px-4 2xl:px-0 mx-auto pb-16">
    <div class="md:grid md:grid-cols-1">
        <div class="mt-5 md:col-span-2 md:mt-0">
            <form action="<?=base_url('admin/uploaddata/')?>" method="post" enctype="multipart/form-data">
                <div class="overflow-hidden drop-shadow-md sm:rounded-md">
                    <div class="bg-white px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                                <input type="text" name="judul" id="judul"  required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-mytosca focus:ring-mytosca sm:text-sm">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-mytosca focus:ring-mytosca sm:text-sm">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                                <input type="text" list="list" name="kategori" required id="kategori" autocomplete="off" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-mytosca focus:ring-mytosca sm:text-sm">
                                <datalist id="list">
                                    <?php foreach ($kategori as $row):?>
                                        <option value="<?=$row['id_kategori']?>"><?=$row['nama']?></option>
                                    <?php endforeach?>
                                </datalist>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="tipe" class="block text-sm font-medium text-gray-700">Tipe</label>
                                <select id="tipe" name="tipe" required class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-mytosca focus:outline-none focus:ring-mytosca sm:text-sm">
                                    <option value="Artikel" selected>Artikel</option>
                                    <option value="Berita_Umri">Berita Umri</option>
                                </select>
                            </div>

                            <div class="col-span-6 ">
                                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                                <input type="file" name="gambar" required id="gambar" class="mt-1 block w-full p-3 rounded-md border-gray-300 shadow-sm focus:border-mytosca focus:ring-mytosca sm:text-sm" accept="image/jpeg, image/pjpeg, image/png, image/jpg">
                            </div>

                            <div class="col-span-6">
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                <div class="mt-1">
                                    <textarea id="deskripsi" required name="deskripsi" rows="5" class="mt-1 p-3 block w-full rounded-md border-gray-300 shadow-sm focus:border-mytosca focus:ring-mytosca sm:text-sm" placeholder="you@example.com"></textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">Inputkan deskripsi singkat.</p>
                            </div>

                            <div class="col-span-6">
                                <label for="isi" class="block text-sm font-medium text-gray-700">Isi Artikel</label>
                                <div class="mt-1">
                                    <textarea id="isi" required name="isi" rows="5" class="mt-1 p-3 block w-full rounded-md border-gray-300 shadow-sm focus:border-mytosca focus:ring-mytosca sm:text-sm"></textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">Inputkan isi artikel.</p>
                            </div>

                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <div class="bg-mytosca inline-flex rounded-md">
                            <button type="submit" name="submit" class="inline-flex transition-all justify-center rounded-md border border-transparent bg-mytosca py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-mytosca-dark focus:outline-none ">Post</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
        <div class="border-t border-gray-200"></div>
    </div>
</div>

<script>
    CKEDITOR.replace('isi');
</script>
</body>

</html>