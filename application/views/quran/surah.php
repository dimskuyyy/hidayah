<!-- ARTICLE SECTION -->
<section class="px-4 pb-6 flex w-full justify-center mb-20 mt-24">
    <div class="w-full max-w-screen-2xl">
        <div class="w-full mb-8 text-lg flex flex-col items-center">
            <?php foreach ($surah as $row) : ?>
                <h1 class="font-semibold ">Surah <?= $row['nama'] ?></h1>
                <div>
                    <p class="text-sm text-center"><?= $row['jumlah'] ?> ayat | <?= $row['tipe'] ?></p>
                    <a href="<?= base_url('tafsir/surah/' . $row['surat']) ?>" class="block text-center text-sm underline">Lihat Tafsir</a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="mt-6 w-full flex justify-center items-center h-12 mb-8">
            <div class="bg-mytosca rounded-tl-md rounded-bl-md mr-3 w-32 hover:bg-mytosca-dark transition-all h-full">
                <a href="<?php if ($surah[0]['surat'] == 1) {
                                echo base_url('quran/surah/1');
                            } else{echo base_url('quran/surah/'.$surah[0]['surat']-1);}?>" class="w-full h-full flex items-center justify-center text-white">Sebelumnya</a>
            </div>
            <div class="bg-mytosca rounded-tr-md rounded-br-md w-32 hover:bg-mytosca-dark transition-all h-full">
                <a href="<?php if ($surah[0]['surat'] == 114) {
                                echo base_url('quran/surah/114');
                            } else{echo base_url('quran/surah/'.$surah[0]['surat']+1);}?>" class="w-full h-full flex items-center justify-center text-white">Selanjutnya</a>
            </div>
        </div>
        <div id="article" class="grow grid grid-cols-1 gap-6 ">
            <?php foreach ($ayat as $row) : ?>
                <div id="<?= $row['nomor_ayat'] ?>" class="bg-white w-full drop-shadow-md rounded-md group  transition-all p-4 relative flex-col">
                    <span class="w-full text-center text-sm  block mb-3">〈 <?= $row['nomor_ayat'] ?> 〉</span>
                    <span class="text-4xl  text-center w-full block leading-relaxed">
                        <?= $row['teks'] ?>
                    </span>
                    <span class="block w-full mt-6  italic text-center"><?= $row['arti'] ?></span>
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