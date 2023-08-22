<section class="max-w-screen-2xl max-2xl:px-4 2xl:px-0 mx-auto mt-10">
    <div class="bg-white rounded-md drop-shadow-md w-full min-h-[60vh] p-4">
        <?php foreach ($kontak as $row) : ?>
            <div class="w-full border-gray-100 border-2 rounded-md px-4 py-4 shadow-sm mb-6">
                <div class="w-full mb-8">
                    <h1 class="font-bold text-xl"><?=$row['nama']?></h1>
                    <p class="text-sm"><?=$row['email']?></p>
                </div>
                <div class="w-full whitespace-pre-wrap"><?=$row['pesan']?></div>
            </div>
        <?php endforeach ?>
    </div>

</section>