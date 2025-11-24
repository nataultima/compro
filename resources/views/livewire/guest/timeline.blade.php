<!-- Timeline Section -->
<section id="timeline" class="relative min-h-screen py-16 overflow-hidden">
    <!-- Background Image dengan Overlay -->
    <div class="absolute inset-0">
        <img 
            src="asset/img/office.jpg" 
            alt="PT. Nata Ultima Enggal Background" 
            class="w-full h-full object-cover"
            onerror="this.style.display='none';"
        />
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/90 via-blue-900/85 to-slate-900/90"></div>
    </div>

    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-72 h-72 bg-cyan-500/10 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
        <div class="absolute top-40 right-10 w-72 h-72 bg-blue-500/10 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 2s;"></div>
        <div class="absolute bottom-20 left-1/2 w-72 h-72 bg-slate-500/10 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 4s;"></div>
    </div>

    <!-- Content -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
        <!-- Section Header -->
        <div class="text-center mb-16" x-data="{ visible: false }" x-intersect.once="visible = true" 
             :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" 
             class="transition-all duration-700">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Our <span class="text-cyan-400">Journey</span>
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-cyan-400 to-blue-600 mx-auto mb-4 rounded-full"></div>
            <p class="text-lg text-white/80 max-w-2xl mx-auto">
                Milestone <span class="font-semibold text-cyan-400">PT. Nata Ultima Enggal</span>
            </p>
        </div>

        <!-- Timeline Container -->
        <div class="relative">
            <!-- Timeline Line - Desktop: Center, Mobile: Left -->
            <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-gradient-to-b from-cyan-400 via-blue-600 to-purple-600 rounded-full"></div>
            <div class="md:hidden absolute left-8 top-0 bottom-0 w-1 bg-gradient-to-b from-cyan-400 via-blue-600 to-purple-600 rounded-full"></div>

            <!-- Timeline Items -->
            <div class="space-y-12 md:space-y-16">
                <!-- 2017 -->
                <div class="relative flex items-start md:justify-between">
                    <!-- Desktop View -->
                    <div class="hidden md:block w-5/12 pr-8 text-left">
                        <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-white/20">
                            <h4 class="text-xl font-bold text-cyan-400 mb-2">2017</h4>
                            <h5 class="text-lg font-semibold text-white mb-2">Pencetusan Ide</h5>
                            <p class="text-white/80">Pencetusan ide pendirian Perusahaan oleh para pendiri, dengan dukungan dari Partner.</p>
                        </div>
                    </div>
                    
                    <!-- Timeline Dot -->
                    <div class="relative z-10 flex-shrink-0 mx-auto md:mx-0">
                        <div class="w-12 h-12 bg-cyan-400 rounded-full flex items-center justify-center border-4 border-white shadow-lg shadow-cyan-500/50">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Desktop View -->
                    <div class="hidden md:block w-5/12 pl-8"></div>
                    
                    <!-- Mobile View -->
                    <div class="md:hidden ml-16 mt-2 bg-white/10 backdrop-blur-sm p-4 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-white/20">
                        <h4 class="text-lg font-bold text-cyan-400 mb-2">2017</h4>
                        <h5 class="text-base font-semibold text-white mb-2">Pencetusan Ide</h5>
                        <p class="text-white/80 text-sm">Pencetusan ide pendirian Perusahaan oleh para pendiri, dengan dukungan dari Partner.</p>
                    </div>
                </div>

                <!-- 2018 -->
                <div class="relative flex items-start md:justify-between">
                    <!-- Desktop View -->
                    <div class="hidden md:block w-5/12 pr-8"></div>
                    
                    <!-- Timeline Dot -->
                    <div class="relative z-10 flex-shrink-0 mx-auto md:mx-0">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center border-4 border-white shadow-lg shadow-green-500/50">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Desktop View -->
                    <div class="hidden md:block w-5/12 pl-8 text-left">
                        <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-white/20">
                            <h4 class="text-xl font-bold text-green-400 mb-2">2018</h4>
                            <h5 class="text-lg font-semibold text-white mb-2">Peningkatan Fasilitas</h5>
                            <p class="text-white/80">Penyediaan dan peningkatan fasilitas sarana dan prasarana produksi, terutama office dan workshop area.</p>
                        </div>
                    </div>
                    
                    <!-- Mobile View -->
                    <div class="md:hidden ml-16 mt-2 bg-white/10 backdrop-blur-sm p-4 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-white/20">
                        <h4 class="text-lg font-bold text-green-400 mb-2">2018</h4>
                        <h5 class="text-base font-semibold text-white mb-2">Peningkatan Fasilitas</h5>
                        <p class="text-white/80 text-sm">Penyediaan dan peningkatan fasilitas sarana dan prasarana produksi, terutama office dan workshop area.</p>
                    </div>
                </div>

                <!-- 2019 -->
                <div class="relative flex items-start md:justify-between">
                    <!-- Desktop View -->
                    <div class="hidden md:block w-5/12 pr-8 text-left">
                        <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-white/20">
                            <h4 class="text-xl font-bold text-purple-400 mb-2">2019</h4>
                            <h5 class="text-lg font-semibold text-white mb-2">Pengesahan PT</h5>
                            <p class="text-white/80">Pengesahan pendirian PT. dengan izin usaha lengkap meliputi: Reparasi Motor Listrik, Instalasi Listrik, Perdagangan Eceran Peralatan Listrik, Aktivitas Keinsinyuran dan Konsultasi Teknis, Instalasi Saluran Air (Plambing), Industri Peralatan Pengontrol dan Pendistribusian Listrik, Instalasi Elektronika, dan Instalasi Mekanikal.</p>
                        </div>
                    </div>
                    
                    <!-- Timeline Dot -->
                    <div class="relative z-10 flex-shrink-0 mx-auto md:mx-0">
                        <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center border-4 border-white shadow-lg shadow-purple-500/50">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Desktop View -->
                    <div class="hidden md:block w-5/12 pl-8"></div>
                    
                    <!-- Mobile View -->
                    <div class="md:hidden ml-16 mt-2 bg-white/10 backdrop-blur-sm p-4 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-white/20">
                        <h4 class="text-lg font-bold text-purple-400 mb-2">2019</h4>
                        <h5 class="text-base font-semibold text-white mb-2">Pengesahan PT</h5>
                        <p class="text-white/80 text-sm">Pengesahan pendirian PT. dengan izin usaha lengkap meliputi: Reparasi Motor Listrik, Instalasi Listrik, Perdagangan Eceran Peralatan Listrik, Aktivitas Keinsinyuran dan Konsultasi Teknis, Instalasi Saluran Air (Plambing), Industri Peralatan Pengontrol dan Pendistribusian Listrik, Instalasi Elektronika, dan Instalasi Mekanikal.</p>
                    </div>
                </div>

                <!-- 2020 -->
                <div class="relative flex items-start md:justify-between">
                    <!-- Desktop View -->
                    <div class="hidden md:block w-5/12 pr-8"></div>
                    
                    <!-- Timeline Dot -->
                    <div class="relative z-10 flex-shrink-0 mx-auto md:mx-0">
                        <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center border-4 border-white shadow-lg shadow-red-500/50">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Desktop View -->
                    <div class="hidden md:block w-5/12 pl-8 text-left">
                        <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-white/20">
                            <h4 class="text-xl font-bold text-red-400 mb-2">2020</h4>
                            <h5 class="text-lg font-semibold text-white mb-2">Operasional Penuh</h5>
                            <p class="text-white/80">Mulai beroperasi penuh dengan semua izin usaha yang telah diperoleh, melayani berbagai kebutuhan instalasi listrik dan peralatan kontrol.</p>
                        </div>
                    </div>
                    
                    <!-- Mobile View -->
                    <div class="md:hidden ml-16 mt-2 bg-white/10 backdrop-blur-sm p-4 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-white/20">
                        <h4 class="text-lg font-bold text-red-400 mb-2">2020</h4>
                        <h5 class="text-base font-semibold text-white mb-2">Operasional Penuh</h5>
                        <p class="text-white/80 text-sm">Mulai beroperasi penuh dengan semua izin usaha yang telah diperoleh, melayani berbagai kebutuhan instalasi listrik dan peralatan kontrol.</p>
                    </div>
                </div>

                <!-- 2021-Sekarang -->
                <div class="relative flex items-start md:justify-between">
                    <!-- Desktop View -->
                    <div class="hidden md:block w-5/12 pr-8 text-left">
                        <div class="bg-gradient-to-r from-cyan-500/20 to-blue-600/20 backdrop-blur-sm p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border-2 border-cyan-400/50">
                            <h4 class="text-xl font-bold text-cyan-400 mb-2">2021 - Sekarang</h4>
                            <h5 class="text-lg font-semibold text-white mb-2">PANEL MAKER</h5>
                            <p class="text-white/80">Fokus utama sebagai Panel Maker profesional, menghadirkan solusi panel listrik berkualitas tinggi untuk berbagai kebutuhan industri dengan standar internasional dan teknologi terdepan.</p>
                        </div>
                    </div>
                    
                    <!-- Timeline Dot -->
                    <div class="relative z-10 flex-shrink-0 mx-auto md:mx-0">
                        <div class="w-12 h-12 bg-indigo-500 rounded-full flex items-center justify-center border-4 border-white shadow-lg shadow-indigo-500/50">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Desktop View -->
                    <div class="hidden md:block w-5/12 pl-8"></div>
                    
                    <!-- Mobile View -->
                    <div class="md:hidden ml-16 mt-2 bg-gradient-to-r from-cyan-500/20 to-blue-600/20 backdrop-blur-sm p-4 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border-2 border-cyan-400/50">
                        <h4 class="text-lg font-bold text-cyan-400 mb-2">2021 - Sekarang</h4>
                        <h5 class="text-base font-semibold text-white mb-2">PANEL MAKER</h5>
                        <p class="text-white/80 text-sm">Fokus utama sebagai Panel Maker profesional, menghadirkan solusi panel listrik berkualitas tinggi untuk berbagai kebutuhan industri dengan standar internasional dan teknologi terdepan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>