<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="PT. Nata Ultima Enggal - Panel Maker Professional dengan pengalaman 7+ tahun" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>PT. Nata Ultima Enggal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   
    @vite(['resources/css/style.css', 'resources/js/app.js'])
</head>
<body class="font-sans">
    <!-- Announcement Banner -->
    <div x-data="{ 
        show: false, 
        announcements: [],
        currentAnnouncement: null,
        init() {
            fetch('/api/announcements')
                .then(response => response.json())
                .then(data => {
                    this.announcements = data;
                    if (this.announcements.length > 0) {
                        this.currentAnnouncement = this.announcements[0];
                        this.show = true;
                    }
                })
                .catch(error => console.error('Error fetching announcements:', error));
        }
    }" x-show="show" x-cloak id="announcementBanner" class="announcement-banner text-white py-2 px-4 text-center relative" :style="currentAnnouncement && currentAnnouncement.type === 'text' ? `background-color: ${currentAnnouncement.background_color}` : ''">
        <div class="flex items-center justify-center">
            <template x-if="currentAnnouncement">
                <template x-if="currentAnnouncement.type === 'text'">
                    <span id="announcementText" class="text-sm font-medium" x-text="currentAnnouncement.title"></span>
                </template>
                <template x-if="currentAnnouncement.type === 'image'">
                    <div class="flex items-center">
                        <img :src="`/storage/${currentAnnouncement.image}`" :alt="currentAnnouncement.title" class="h-8 mr-2">
                        <span id="announcementText" class="text-sm font-medium" x-text="currentAnnouncement.title"></span>
                    </div>
                </template>
            </template>
            <button @click="show = false" class="ml-4 text-white hover:text-gray-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Navigation -->
    <nav x-data="{ mobileMenuOpen: false, dropdownOpen: false }" class="bg-white shadow-lg fixed w-full top-0 z-50" id="navbar">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center mr-3">
                        <img src="{{ asset('asset/img/logo.webp') }}" alt="Logo PT. Nata Ultima Enggal" class="w-10 h-10 object-contain" />
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">PT. Nata Ultima Enggal</h1>
                        <p class="text-sm text-gray-600">Working On Innovation</p>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-2 items-center">
                    <!-- Link ke section di halaman utama -->
                    <a href="{{ route('home') }}#home" class="nav-link px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition-colors">Home</a>
                    <a href="{{ route('home') }}#about" class="nav-link px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition-colors">About</a>
                    <a href="{{ route('home') }}#services" class="nav-link px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition-colors">Services</a>
                    <a href="{{ route('home') }}#products" class="nav-link px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition-colors">Products</a>
                        <a href="{{ route('home') }}#certified" class="nav-link px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition-colors">Certified</a>
                    <a href="{{ route('home') }}#portfolio" class="nav-link px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition-colors">Portfolio</a>
                
                    
                    <!-- Dropdown Menu -->
                    <div class="relative" @mouseenter="dropdownOpen = true" @mouseleave="dropdownOpen = false">
                        <button class="nav-link px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition-colors flex items-center">
                            More
                            <svg class="w-4 h-4 ml-1 transition-transform" :class="dropdownOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <!-- Dropdown Content -->
                        <div x-show="dropdownOpen"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             x-cloak
                             class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-100 py-2">
                        
                            <!-- Link ke section di halaman utama -->
                            <a href="{{ route('home') }}#clients" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Clients
                                </div>
                            </a>
                            <a href="{{ route('home') }}#faq" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    FAQ
                                </div>
                            </a>
                                <!-- Link ke halaman terpisah -->
                            <a href="{{ route('announcement') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                    </svg>
                                    Announcement
                                </div>
                            </a>
                             <!-- <a href="{{ route('home') }}#career" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Career
                                </div>
                            </a> -->
                        </div>
                    </div>
                    
                    <a href="{{ route('home') }}#contact" class="nav-link px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition-colors">Contact</a>
                    
                    <!-- Divider -->
                    <div class="h-6 w-px bg-gray-300 mx-2"></div>
                    
                    <!-- Login Button -->
                    <a href="/login" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Login
                    </a>
                </div>

                <!-- Mobile Menu Button (Hamburger) -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-gray-700 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-md p-2">
                    <!-- Hamburger Icon (3 garis) -->
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <!-- Close Icon (X) -->
                    <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform -translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform -translate-y-2"
                 x-cloak
                 class="md:hidden pb-4 border-t border-gray-200">
                <a @click="mobileMenuOpen = false" href="{{ route('home') }}#home" class="block py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors rounded-md">Home</a>
                <a @click="mobileMenuOpen = false" href="{{ route('home') }}#about" class="block py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors rounded-md">About</a>
                <a @click="mobileMenuOpen = false" href="{{ route('home') }}#services" class="block py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors rounded-md">Services</a>
                <a @click="mobileMenuOpen = false" href="{{ route('home') }}#certified" class="block py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors rounded-md">Certified</a>
                <a @click="mobileMenuOpen = false" href="{{ route('home') }}#portfolio" class="block py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors rounded-md">Portfolio</a>
                <a @click="mobileMenuOpen = false" href="{{ route('announcement') }}" class="block py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors rounded-md">Announcement</a>
                <!-- <a @click="mobileMenuOpen = false" href="{{ route('home') }}#career" class="block py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors rounded-md">Career</a> -->
                <a @click="mobileMenuOpen = false" href="{{ route('home') }}#clients" class="block py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors rounded-md">Clients</a>
                <a @click="mobileMenuOpen = false" href="{{ route('home') }}#faq" class="block py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors rounded-md">FAQ</a>
                <a @click="mobileMenuOpen = false" href="{{ route('home') }}#contact" class="block py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors rounded-md">Contact</a>
                
                <!-- Login Button Mobile -->
                <div class="px-4 pt-4 mt-2 border-t border-gray-200">
                    <a @click="mobileMenuOpen = false" href="/login" class="flex items-center justify-center w-full px-4 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-md">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Login
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Spacer untuk fixed navbar -->
    <div class="h-20"></div>
</body>
</html>