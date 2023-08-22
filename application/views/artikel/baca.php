<div class="px-4 max-md:max-w-[65ch] md:max-w-screen-2xl mx-auto mt-24">
    <?php foreach ($artikel as $row) : ?>
        <div class="font-bold text-3xl mb-6">
            <?= $row['judul'] ?>
        </div>
        <div class="flex justify-between">
            <h2>Oleh Author</h2>
            <span><?= $row['tanggal'] ?></span>
        </div>
    <?php endforeach ?>
</div>
<div class="prose md:max-w-screen-2xl prose-slate mx-auto lg:prose-lg px-4 mb-28">
    <?php foreach ($artikel as $row) : ?>
        <div class="w-full h-72 sm:h-96 md:h-[450px] lg:h-[550px] xl:h-[700px] overflow-hidden rounded-md">
            <img src="<?= base_url('assets/upload/' . $row['gambar']) ?>" class="w-full rounded-md object-cover" alt="<?=$row['gambar']?>">
        </div>
        <?= $row['isi'] ?>
    <?php endforeach ?>
</div>