<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="w-full max-w-md space-y-8">
    <div>
      <img class="mx-auto h-12 w-auto" src="<?= base_url('assets/image/logo.png') ?>" alt="Your Company">
      <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>

    </div>
    <form class="mt-8 space-y-6" action="" method="POST">
      <input type="hidden" name="remember" value="true">
      <div class="-space-y-px rounded-md shadow-sm">
        <div>
          <label for="email-address" class="sr-only">Email address</label>
          <input id="email-address" name="email" type="email" autocomplete="email" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-mytosca-dark focus:outline-none focus:ring-mytosca-dark sm:text-sm" placeholder="Email address">
        </div>
        <div>
          <label for="password" class="sr-only">Password</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-mytosca-dark focus:outline-none focus:ring-mytosca-dark sm:text-sm" placeholder="Password">
        </div>
      </div>

      <div class="bg-mytosca rounded-md">
        <button type="submit" name="login" class="group relative flex w-full justify-center rounded-md border border-transparent bg-mytosca py-2 px-4 text-sm font-medium text-white hover:bg-mytosca-dark focus:outline-none focus:ring-2 focus:ring-mytosca-dark focus:ring-offset-2">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <!-- Heroicon name: mini/lock-closed -->
          </span>
          Sign in
        </button>
      </div>
    </form>
  </div>
</div>