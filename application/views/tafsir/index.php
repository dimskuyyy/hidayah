<!-- ARTICLE SECTION -->

<section class="px-4 pb-6 flex w-full justify-center mb-20 mt-24">
    <div class="w-full max-w-screen-2xl">
        <div class="w-full mb-8 font-semibold text-lg flex flex-col items-center">
            <h1>Cari Tafsir surah yang akan dibaca</h1>
        </div>
        <div id="article" class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach($surah as $row) : ?>
                <div class="bg-white w-full drop-shadow-md rounded-md group hover:bg-mytosca  transition-all p-4 flex items-center justify-center relative flex-col">
                    <span class="text-3xl group-hover:text-white font-bold"><?=$row['arab']?></span>
                    <span class="group-hover:text-white mt-2 font-bold"><?=$row['nama']?> ( <?=$row['surat']?> )</span>
                    <span class="group-hover:text-white text-sm"><?=$row['arti']?></span>
                    <span class="group-hover:text-white text-sm"> 〈 <?=$row['jumlah']?> ayat 〉 </span>
                    <a href="<?=base_url('tafsir/surah/'.$row['surat'])?>" class="absolute top-0 left-0 w-full h-full"></a>
                </div>
            <?php endforeach;?>
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