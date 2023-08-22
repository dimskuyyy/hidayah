<!-- ARTICLE SECTION -->
<section class="px-4 pb-6 flex w-full justify-center mb-20 mt-28">
    <div class="w-full max-w-screen-2xl">

        <div class="w-full mb-8 font-semibold text-lg flex flex-col items-center">
            <?php if (sizeof($artikel) > 0) : ?>
                <h1><?= sizeof($artikel) ?> Artikel Terkait</h1>
            <?php endif ?>
            <?php if (sizeof($artikel) == 0) : ?>
                <h1>Tidak Ada Hasil Pencarian</h1>
                <h1>0 Result</h1>
            <?php endif ?>
        </div>
        <div class="overflow-auto w-full scrollbar-none touch-pan-x mb-8">
            <div class="h-12 flex items-center ">
                <?php foreach ($kategori as $row) : ?>
                    <div class="px-4 py-2 bg-slate-900 flex items-center justify-center rounded-md mr-2">
                        <a href="<?= base_url('artikel/search/' . $row['id_kategori']) ?>" class="w-full h-full text-white text-sm capitalize"><?= $row['nama'] ?></a>
                    </div>
                <?php endforeach; ?>
                <?php if (sizeof($kategori) > 10) : ?>
                    <div class="px-4 py-2 bg-slate-900 flex items-center justify-center rounded-md mr-2">
                        <button @click="artikel=!artikel" class="w-full h-full text-white text-sm capitalize">More</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div id="article" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <?php foreach ($artikel as $row) : ?>
                <div class="flex items-start py-3 px-3 rounded-md drop-shadow-md bg-white relative max-sm:h-32 sm:h-36 hover:drop-shadow-lg  transition-all ease-in-out ">
                    <a href="<?= base_url('artikel/baca/' . $row['id']) ?>" class="absolute h-full w-full top-0 left-0"></a>
                    <div class="w-1/3 h-full overflow-hidden rounded-md mr-4">
                        <?php
                            $img = explode('.', $row['gambar']);
                            if (file_exists('assets/upload/' . $img[0] . '_thumb.' . $img[1])) {
                                $gambar = base_url('assets/upload/' . $img[0] . '_thumb.' . $imt[1]);
                            } else {
                                $gambar = base_url('assets/upload/' . $row['gambar']);
                            }
                        ?>
                        <img src="<?= $gambar ?>" alt="" class="object-cover h-full w-full">
                    </div>
                    <div class="w-2/3 overflow-hidden h-full">
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
                </div>
            <?php endforeach ?>
        </div>
</section>
<?php if (sizeof($kategori) > 10) : ?>
    <div class="fixed top-0 left-0 bg-black/50 w-full min-h-screen z-40" x-show="artikel" x-transition.opacity x-transition.duration.300ms></div>
    <div x-show="artikel" @keyup.escape="artikel=false" x-transition:enter="duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" x-description="Mobile menu, show/hide based on mobile menu state." class=" fixed inset-x-0 top-[10%] px-6 origin-top-right transform transition z-50">
        <div @click.away="artikel=false" class="w-full rounded-md bg-white py-8 max-w-xl max-h-[80vh] mx-auto overflow-y-scroll scrollbar-thin scrollbar-track-slate-200 scrollbar-thumb-mytosca">
            <ul class="w-full ">
                <?php foreach ($kategori as $row) : ?>
                    <li class="w-full hover:bg-slate-200 transition-all hover:font-bold"><a href="<?= base_url('artikel/search/' . $row['id_kategori']) ?>" class="w-full block py-6 px-6 text-center"><?= $row['nama'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="mt-1 w-full h-8 bg-white rounded-md hidden">

        </div>
    </div>
<?php endif; ?>