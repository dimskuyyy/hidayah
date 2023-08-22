<section class="mt-8 max-w-screen-2xl max-2xl:px-4 2xl:px-0 mx-auto">
    <div id="article" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 ">
        <?php foreach ($artikel as $row) : ?>
            <div class="flex items-start py-3 px-3 rounded-md drop-shadow-md bg-white relative max-sm:h-32 sm:h-36 hover:drop-shadow-lg  transition-all ease-in-out ">
                <!-- <a href="<?= base_url('artikel/baca/' . $row['id']) ?>" class="absolute h-full w-full top-0 left-0"></a> -->
                <div class="w-2/5 h-full overflow-hidden rounded-md mr-4">
                    <?php
                    $img = explode('.', $row['gambar']);
                    if (file_exists('assets/upload/' . $img[0] . '_thumb.' . $img[1])) {
                        $gambar = base_url('assets/upload/' . $img[0] . '_thumb.' . $img[1]);
                    } else {
                        $gambar = base_url('assets/upload/' . $row['gambar']);
                    }
                    ?>
                    <img src="<?= $gambar ?>" alt="" class="object-cover h-full w-full">
                </div>
                <div class="w-3/5 overflow-hidden h-full">
                    <div class="flex justify-between w-full items-center">
                        <h1 class="truncate font-semibold w-2/3"><?= $row['judul'] ?></h1>
                        <span class="text-xs"><?= $row['tanggal'] ?></span>
                    </div>
                    <div class=" mt-1 overflow-hidden w-full max-h-[68px]">
                        <span class="text-ellipsis overflow-hidden text-sm text-justify">
                            <?= $row['deskripsi'] ?>
                        </span>
                    </div>
                </div>
                <div class="w-1/5 ml-3 flex flex-col items-end ">
                    <div class=" w-12 bg-red-500 hover:bg-red-600 rounded-md transition-all mb-3">
                        <a href="<?= base_url('admin/delete/' . $row['id']) ?>" class="h-full flex items-center justify-center p-3 text-slate-50">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </a>
                    </div>
                    <div class=" w-12 bg-mytosca hover:bg-mytosca-dark rounded-md transition-all mb-3">
                        <a href="<?= base_url('artikel/baca/' . $row['id']) ?>" class="h-full flex items-center justify-center p-3 text-slate-50">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div class="max-w-screen-2xl flex items-center justify-between bg-white mt-6">
        <div class="flex items-center w-full justify-between max-sm:justify-end">
            <div class="max-sm:hidden">
                <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium"><?= ++$start ?></span>
                    to
                    <span class="font-medium"><?= $page ?></span>
                    of
                    <span class="font-medium"><?= $total ?></span>
                    results
                </p>
            </div>
            <?php
            echo $this->pagination->create_links(); ?>
        </div>
    </div>
</section>