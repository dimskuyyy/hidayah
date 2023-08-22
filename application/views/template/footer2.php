<div class="absolute bottom-0 w-full max-w-screen-2xl bg-mytosca px-4 md:px-6 py-4 min-[1536px]:left-1/2 min-[1536px]:-translate-x-1/2">
    <div class="h-8 flex max-md:justify-center md:justify-between items-center w-full text-white">
        <span>Copyright &copy; 2022 Dimas Fauzan. All Right Reserved</span>
        <a href="<?= prep_url('www.umri.ac.id') ?>" class="hidden md:flex">Universitas Muhammadiyah Riau</a>
    </div>
</div>
<!-- <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
<script>
  function playaudio() {
    return {
      currentlyPlaying: false,
      //play and stop the audio
      playAndStop() {
        if (this.currentlyPlaying) {
          this.$refs.audio.pause();
        //   this.$refs.audio.currentTime = 0;
          this.currentlyPlaying = false;
        } else {
        //   this.$refs.audio.resume();
          this.$refs.audio.play();
          this.currentlyPlaying = true;
        }

      }

    }
  }
</script>
</body>

</html>