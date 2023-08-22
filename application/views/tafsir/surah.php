<!-- ARTICLE SECTION -->
<section class="px-4 pb-6 flex w-full justify-center mb-20 mt-24">
    <div class="w-full max-w-screen-2xl">

        <div class="w-full mb-8 text-lg flex flex-col items-center">
            <?php foreach ($surah as $row) : ?>
                <h1 class="font-semibold ">Surah <?= $row['nama'] ?></h1>
                <div>
                    <p class="text-sm text-center"><?= $row['jumlah'] ?> ayat | <?= $row['tipe'] ?></p>
                    <p class="text-sm">Sumber Tafsir : Kemenag</p>
                </div>
            <?php endforeach; ?>
        </div>
        <div id="article" class="grow grid grid-cols-1 gap-6 ">
            <?php foreach ($tafsir as $row) : ?>
                <div class="bg-white w-full drop-shadow-md rounded-md group hover:bg-mytosca  transition-all p-4 relative flex-col">
                    <span class="text-lg font-bold group-hover:text-white text-center w-full block">Ayat <?=$row['ayat']?></span>
                    <div class=" w-full mt-6 group-hover:text-white whitespace-pre-wrap">
                        <?=$row['teks']?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<div x-data="playaudio()" class="h-80 w-80 mt-20 hidden">
    <button @keydown.tab="playAndStop" @click="playAndStop" type="button" class="relative rounded-xl group cursor-pointer focus:outline-none focus:ring focus:ring-[#1F89AE]">
        click me
    </button>

    <audio x-ref="audio">
        <source src="https://download.quranicaudio.com/quran/mishaari_raashid_al_3afaasee/001.mp3" type="audio/mp3" />
    </audio>
</div>