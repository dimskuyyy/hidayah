<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= base_url();?></loc> 
    </url>
    <url>
        <loc><?= base_url('about/');?></loc> 
    </url>
    <url>
        <loc><?= base_url('quran/');?></loc> 
    </url>
    <url>
        <loc><?= base_url('tafsir/');?></loc> 
    </url>
    <url>
        <loc><?= base_url('artikel/search/4');?></loc> 
    </url>

    <!-- My code is looking quite different, but the principle is similar -->
    <?php foreach($surah as $surat) { ?>
    <url>
        <loc><?= base_url('quran/surah/'.$surat['surat']) ?></loc>
    </url>
    <?php } ?>
    <?php foreach($artikel as $art) { ?>
    <url>
        <loc><?= base_url('artikel/baca/'.$art['id']) ?></loc>
    </url>
    <?php } ?>
    <?php foreach($surah as $surat) { ?>
    <url>
        <loc><?= base_url('tafsir/surah/'.$surat['surat']) ?></loc>
    </url>
    <?php } ?>
</urlset>