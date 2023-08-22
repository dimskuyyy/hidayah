<!DOCTYPE html>
<html lang="en" class="scroll-smooth h-full">

<head>
	<meta charset="utf-8">
	<title>
		<?php
			if (isset($title)) {
				echo $title." - Hidayah Id";
			}else{
				echo "Hidayah Id";
			}
		?>
	</title>

	<link rel="stylesheet" href="<?= base_url('assets/css/font.css') ?>">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/fa.css') ?>">
	<link rel="icon" type="image/x-icon" href="<?= base_url('assets/image/logo.png')?>">
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" /> -->
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" /> -->
	<script src="https://kit.fontawesome.com/2ee28f8ba8.js" crossorigin="anonymous"></script>
	<script src="<?=base_url('node_modules/ckeditor4/ckeditor.js')?>"></script>
	<script defer src="<?= base_url('assets/script/script.js') ?>"></script>
</head>

<body class="font-poppins text-slate-900 h-full" x-data="{menu:false,search:false,artikel:false}">
	<!-- NAVBAR -->
	<div class="relative bg-white z-40 w-full flex justify-center">
		<div class="fixed top-0 w-full bg-white mx-auto max-w-screen-2xl max-2xl:px-4 min-[1536px]:px-0">
			<div class="flex items-center justify-between  py-6 md:justify-start md:space-x-10">
				<div class="flex max-md:grow md:flex-none justify-start ">
					<a href="<?= base_url() ?>">
						<span class="sr-only">Your Company</span>
						<img class="h-6 w-auto md:h-10" src="<?= base_url('assets/image/logo.png') ?>" alt="">
					</a>
				</div>
				<div @click="search=!search" class="-my-2 md:hidden">
					<button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-mytosca" aria-expanded="false">
						<span class="sr-only">Search</span>
						<!-- Heroicon name: outline/bars-3 -->
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
							<path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
						</svg>

					</button>
				</div>
				<div @click="menu=!menu" class="-my-2 -mr-2 md:hidden">
					<button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-mytosca" aria-expanded="false">
						<span class="sr-only">Open menu</span>
						<!-- Heroicon name: outline/bars-3 -->
						<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
						</svg>
					</button>
				</div>
				<nav class="hidden space-x-4 md:flex">
					<div class="relative" x-data="{solution:false}">
							<!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
						<button @click="solution=!solution" type="button" class="text-gray-500 group inline-flex items-center rounded-md text-base font-medium hover:text-gray-900 focus:outline-none " aria-expanded="false">
							<span>Konten</span>
							<!--
							Heroicon name: mini/chevron-down

							Item active: "text-gray-600", Item inactive: "text-gray-400"
							-->
							<svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
								<path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
							</svg>
						</button>

						<!--
							'Solutions' flyout menu, show/hide based on flyout menu state.

							Entering: "transition ease-out duration-200"
							From: "opacity-0 translate-y-1"
							To: "opacity-100 translate-y-0"
							Leaving: "transition ease-in duration-150"
							From: "opacity-100 translate-y-0"
							To: "opacity-0 translate-y-1"
						-->
						<div x-show="solution" @click.away="solution=false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1" x-description="'Solutions' flyout menu, show/hide based on flyout menu state." class="fixed z-50 -ml-4 mt-3 w-screen max-w-md transform px-2 sm:px-0 ">
							<div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
								<div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
									<a href="<?=base_url()?>" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
										<!-- Heroicon name: outline/chart-bar -->
										<svg class="h-6 w-6 flex-shrink-0 text-mytosca" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
											<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
										</svg>
										<div class="ml-4">
											<p class="text-base font-medium text-gray-900">Artikel</p>
											<p class="mt-1 text-sm text-gray-500">Temukan dan jelajahi lebih jauh informasi terkait dunia Islam.</p>
										</div>
									</a>

									<a href="<?=base_url('quran/')?>" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
										<!-- Heroicon name: outline/cursor-arrow-rays -->
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 flex-shrink-0 text-mytosca">
											<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
										</svg>
										<div class="ml-4">
											<p class="text-base font-medium text-gray-900">Qur'an</p>
											<p class="mt-1 text-sm text-gray-500">Baca dan dengarkan ayat suci Al-Qur'an dengan online.</p>
										</div>
									</a>

									<a href="<?=base_url('tafsir/')?>" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
										<!-- Heroicon name: outline/shield-check -->
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 flex-shrink-0 text-mytosca">
											<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
										</svg>
										<div class="ml-4">
											<p class="text-base font-medium text-gray-900">Tafsir Qur'an</p>
											<p class="mt-1 text-sm text-gray-500">Kaji Qur'an dengan tafsir yang bersumber dari kemenag.</p>
										</div>
									</a>

									<a href="https://umri.ac.id" target="_blank" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
										<!-- Heroicon name: outline/squares-2x2 -->
										<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 text-mytosca" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
										</svg>
										<div class="ml-4">
											<p class="text-base font-medium text-gray-900">UMRI</p>
											<p class="mt-1 text-sm text-gray-500">Kunjungi website Universitas Muhammadiyah Riau untuk lebih lanjut.</p>
										</div>
									</a>

									<a href="<?=base_url('artikel/search/4')?>" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
										<!-- Heroicon name: outline/arrow-path -->
										<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 text-mytosca" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
										</svg>
										<div class="ml-4">
											<p class="text-base font-medium text-gray-900">Berita UMRI</p>
											<p class="mt-1 text-sm text-gray-500">Kunjungi halaman berita UMRI</p>
										</div>
									</a>
								</div>

							</div>
						</div>
					</div>

					<a href="<?=base_url('about/')?>" class="text-base font-medium text-gray-500 hover:text-gray-900">Tentang Saya</a>
					<a href="<?=base_url('about/#kontak')?>" class="text-base font-medium text-gray-500 hover:text-gray-900">Kontak</a>
					<!-- 
					<div class="relative" x-data="{more:false}">
						<button @click="more=!more" type="button" class="text-gray-500 group inline-flex items-center rounded-md text-base font-medium hover:text-gray-900 focus:outline-none " aria-expanded="false">
							<span>More</span>
							
							<svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
								<path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
							</svg>
						</button>

						
						<div x-show="more" @click.away="more=false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1" x-description="'More' flyout menu, show/hide based on flyout menu state." class="fixed max=lg:left-1/2 z-10 mt-3 w-screen max-w-md max-lg:-translate-x-1/2 lg:-translate-x-4 transform px-2 sm:px-0">
							<div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
								<div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
									<a href="#" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
										
										<svg class="h-6 w-6 flex-shrink-0 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
											<path stroke-linecap="round" stroke-linejoin="round" d="M16.712 4.33a9.027 9.027 0 011.652 1.306c.51.51.944 1.064 1.306 1.652M16.712 4.33l-3.448 4.138m3.448-4.138a9.014 9.014 0 00-9.424 0M19.67 7.288l-4.138 3.448m4.138-3.448a9.014 9.014 0 010 9.424m-4.138-5.976a3.736 3.736 0 00-.88-1.388 3.737 3.737 0 00-1.388-.88m2.268 2.268a3.765 3.765 0 010 2.528m-2.268-4.796a3.765 3.765 0 00-2.528 0m4.796 4.796c-.181.506-.475.982-.88 1.388a3.736 3.736 0 01-1.388.88m2.268-2.268l4.138 3.448m0 0a9.027 9.027 0 01-1.306 1.652c-.51.51-1.064.944-1.652 1.306m0 0l-3.448-4.138m3.448 4.138a9.014 9.014 0 01-9.424 0m5.976-4.138a3.765 3.765 0 01-2.528 0m0 0a3.736 3.736 0 01-1.388-.88 3.737 3.737 0 01-.88-1.388m2.268 2.268L7.288 19.67m0 0a9.024 9.024 0 01-1.652-1.306 9.027 9.027 0 01-1.306-1.652m0 0l4.138-3.448M4.33 16.712a9.014 9.014 0 010-9.424m4.138 5.976a3.765 3.765 0 010-2.528m0 0c.181-.506.475-.982.88-1.388a3.736 3.736 0 011.388-.88m-2.268 2.268L4.33 7.288m6.406 1.18L7.288 4.33m0 0a9.024 9.024 0 00-1.652 1.306A9.025 9.025 0 004.33 7.288" />
										</svg>
										<div class="ml-4">
											<p class="text-base font-medium text-gray-900">Help Center</p>
											<p class="mt-1 text-sm text-gray-500">Get all of your questions answered in our forums or contact support.</p>
										</div>
									</a>

									<a href="#" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
										
										<svg class="h-6 w-6 flex-shrink-0 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
											<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
										</svg>
										<div class="ml-4">
											<p class="text-base font-medium text-gray-900">Guides</p>
											<p class="mt-1 text-sm text-gray-500">Learn how to maximize our platform to get the most out of it.</p>
										</div>
									</a>

									<a href="#" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
										
										<svg class="h-6 w-6 flex-shrink-0 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
											<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
										</svg>
										<div class="ml-4">
											<p class="text-base font-medium text-gray-900">Events</p>
											<p class="mt-1 text-sm text-gray-500">See what meet-ups and other events we might be planning near you.</p>
										</div>
									</a>

									<a href="#" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
										
										<svg class="h-6 w-6 flex-shrink-0 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
											<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
										</svg>
										<div class="ml-4">
											<p class="text-base font-medium text-gray-900">Security</p>
											<p class="mt-1 text-sm text-gray-500">Understand how we take your privacy seriously.</p>
										</div>
									</a>
								</div>
								<div class="bg-gray-50 px-5 py-5 sm:px-8 sm:py-8">
									<div>
										<h3 class="text-base font-medium text-gray-500">Recent Posts</h3>
										<ul role="list" class="mt-4 space-y-4">
											<li class="truncate text-base">
												<a href="#" class="font-medium text-gray-900 hover:text-gray-700">Boost your conversion rate</a>
											</li>

											<li class="truncate text-base">
												<a href="#" class="font-medium text-gray-900 hover:text-gray-700">How to use search engine optimization to drive traffic to your site</a>
											</li>

											<li class="truncate text-base">
												<a href="#" class="font-medium text-gray-900 hover:text-gray-700">Improve your customer experience</a>
											</li>
										</ul>
									</div>
									<div class="mt-5 text-sm">
										<a href="#" class="font-medium text-indigo-600 hover:text-mytosca">
											View all posts
											<span aria-hidden="true"> &rarr;</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div> -->
				</nav>
				<div class="hidden items-center justify-end md:flex md:grow">
					<div @click="search=!search" class="-my-2 hidden md:flex md:bg-gray-100 hover:bg-gray-200 transition-all rounded-md">
						<button type="button" class="inline-flex items-center max-md:justify-center rounded-md p-2 text-gray-500  transition-all hover:text-gray-600 focus:outline-none md:w-72 md:justify-between" aria-expanded="false">
							<span class="sr-only hidden">Search</span>
							<span class="hidden md:grow md:flex md:justify-start pl-2">Cari Artikel</span>
							<!-- Heroicon name: outline/bars-3 -->
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
							</svg>

						</button>
					</div>
					<!-- <a href="#" class="ml-8 whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">Sign in</a>
					<a href="#" class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-mytosca px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-mytosca-dark">Sign up</a> -->
				</div>
			</div>
		</div>

		<!--
			Mobile menu, show/hide based on mobile menu state.

			Entering: "duration-200 ease-out"
			From: "opacity-0 scale-95"
			To: "opacity-100 scale-100"
			Leaving: "duration-100 ease-in"
			From: "opacity-100 scale-100"
			To: "opacity-0 scale-95"
		-->
		<div class="fixed md:hidden top-0 left-0 bg-black/25 w-full min-h-screen z-40" x-show="menu" x-transition.opacity x-transition.duration.300ms></div>
		<div x-show="menu" @click.away="menu=false" x-transition:enter="duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" x-description="Mobile menu, show/hide based on mobile menu state." class="fixed inset-x-0 top-0 origin-top-right transform p-2 transition md:hidden z-50">
			<div class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
				<div class="px-5 pt-5 pb-6">
					<div class="flex items-center justify-between">
						<div>
							<img class="h-6 w-auto" src="<?= base_url('assets/image/logo.png') ?>" alt="Your Company">
						</div>
						<div class="-mr-2">
							<button type="button" @click="menu=false" class=" inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-mytosca">
								<span class="sr-only">Close menu</span>
								<!-- Heroicon name: outline/x-mark -->
								<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
									<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
								</svg>
							</button>
						</div>
					</div>
					<div class="mt-6">
						<nav class="grid gap-y-8">
							<a href="<?=base_url()?>" class="-m-3 flex items-center rounded-md p-3 hover:bg-gray-50">
								<!-- Heroicon name: outline/squares-2x2 -->
								<svg class="h-6 w-6 flex-shrink-0 text-mytosca" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
									<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
								</svg>
								<span class="ml-3 text-base font-medium text-gray-900">Artikel</span>
							</a>
							<a href="<?=base_url('quran/')?>" class="-m-3 flex items-center rounded-md p-3 hover:bg-gray-50">
								<!-- Heroicon name: outline/chart-bar -->
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 flex-shrink-0 text-mytosca">
									<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
								</svg>
								<span class="ml-3 text-base font-medium text-gray-900">Qur'an</span>
							</a>

							<a href="<?=base_url('tafsir/')?>" class="-m-3 flex items-center rounded-md p-3 hover:bg-gray-50">
								<!-- Heroicon name: outline/cursor-arrow-rays -->
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 flex-shrink-0 text-mytosca">
									<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
								</svg>
								<span class="ml-3 text-base font-medium text-gray-900">Tafsir Qur'an</span>
							</a>

							<a href="https://umri.ac.id" class="-m-3 flex items-center rounded-md p-3 hover:bg-gray-50">
								<!-- Heroicon name: outline/shield-check -->
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 text-mytosca" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
								</svg>

								<span class="ml-3 text-base font-medium text-gray-900">Umri</span>
							</a>
							<a href="<?=base_url('artikel/search/4')?>" class="-m-3 flex items-center rounded-md p-3 hover:bg-gray-50">
								<!-- Heroicon name: outline/arrow-path -->
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 text-mytosca" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
								</svg>

								<span class="ml-3 text-base font-medium text-gray-900">Berita Umri</span>
							</a>
						</nav>
					</div>
				</div>
				<div class="space-y-6 py-6 px-5">
					<div class="grid grid-cols-2 gap-y-4 gap-x-8">
						<a href="<?=base_url('about/')?>" class="text-base font-medium text-gray-900 hover:text-gray-600">Tentang Saya</a>

						<a href="<?=base_url('about/#kontak')?>" class="text-base font-medium text-gray-900 hover:text-gray-600">Kontak</a>

						<a href="https://umri.ac.id" class="text-base font-medium text-gray-900 hover:text-gray-600">Umri</a>

						<a href="https://daftar.umri.ac.id/" class="text-base font-medium text-gray-900 hover:text-gray-600">Daftar Umri</a>


					</div>
					<!-- <div>
						<a href="#" class="flex w-full items-center justify-center rounded-md border border-transparent bg-mytosca px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-mytosca-dark transition-all">Sign up</a>
						<p class="mt-6 text-center text-base font-medium text-gray-500">
							Memiliki Akun?
							<a href="#" class="text-mytosca hover:text-mytosca">Sign in</a>
						</p>
					</div> -->
				</div>
			</div>
		</div>

		<div class="fixed top-0 left-0 bg-black/50 w-full min-h-screen z-40" x-show="search" x-transition.opacity x-transition.duration.300ms></div>
		<div x-show="search" @click.away="search=false" x-transition:enter="duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" x-description="Mobile menu, show/hide based on mobile menu state." class=" fixed inset-x-0 top-[10%] px-6 origin-top-right transform transition z-50">
			<div class="w-full rounded-md bg-white px-4 max-w-xl mx-auto">
				<span class="sr-only">Search</span>
				<form action="<?=base_url('artikel/search')?>" method="post" class="flex justify-between items-center h-14">
					<div class="grow h-14">
						<input type="text" name="search" class="h-full w-full outline-none border-none focus:ring-transparent ring-0" placeholder="Cari Kategori Artikel">
					</div>
					<div class="flex-none w-8 h-full flex justify-between items-center">
						<button class="h-full" type="submit" name="submit">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
							</svg>
						</button>
					</div>
				</form>
			</div>
			<div class="mt-1 w-full h-8 bg-white rounded-md hidden">
			</div>
		</div>
	</div>
