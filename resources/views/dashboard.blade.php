<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 items-center justify-center p-4 sm:p-6 md:p-10">
        <div
            x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 200)"
            x-show="show"
            x-transition:enter="transition ease-out duration-800"
            x-transition:enter-start="opacity-0 translate-y-6"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="relative w-full max-w-4xl rounded-3xl border border-neutral-200 bg-gradient-to-br from-white to-gray-50 p-10 text-center shadow-2xl ring-1 ring-black/5 dark:from-neutral-900 dark:to-neutral-950 dark:border-neutral-800 dark:ring-white/10"
        >
            <!-- Ikon akses cepat (lebih besar) -->
            <div class="mb-8 inline-flex items-center justify-center rounded-full bg-gradient-to-r from-blue-500/10 to-teal-500/10 p-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600 dark:text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>

            <!-- Judul Utama (lebih besar) -->
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-5xl md:text-6xl">
                Selamat Datang di
                <span class="bg-gradient-to-r from-blue-600 via-teal-500 to-emerald-500 bg-clip-text text-transparent">
                    Nata Site!
                </span>
            </h1>

            <!-- Nama Perusahaan (lebih menonjol) -->
            <p class="mb-8 text-xl font-semibold text-gray-700 dark:text-neutral-300 sm:text-2xl">
                PT. Nataultima Enggal.
            </p>

            <!-- Logo Perusahaan (lebih besar) -->
            <div
                x-data="{ logoLoaded: false }"
                x-init="$nextTick(() => logoLoaded = true)"
                class="mb-8 flex justify-center"
            >
                <div
                    x-show="logoLoaded"
                    x-transition:enter="transition ease-out duration-700"
                    x-transition:enter-start="opacity-0 scale-80"
                    x-transition:enter-end="opacity-100 scale-100"
                    class="inline-block"
                >
                    <img
                        src="/apple-touch-icon.png"
                        alt="PT. Nataultima Enggal"
                        class="h-28 w-28 rounded-2xl object-contain shadow-lg transition-transform duration-300 hover:scale-110 sm:h-36 sm:w-36"
                    />
                </div>
            </div>

            <!-- Garis aksen (lebih panjang) -->
            <div class="mx-auto h-1.5 w-32 rounded-full bg-gradient-to-r from-blue-500 via-teal-400 to-emerald-400"></div>

            <!-- Tagline (lebih besar dan berani) -->
            <p class="mt-8 text-lg text-gray-600 dark:text-neutral-400 sm:text-xl">
                Content Management System
            </p>
        </div>
    </div>
</x-layouts.app>