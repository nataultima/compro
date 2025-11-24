FAQ Section
<section id="faq" class="relative py-16 sm:py-20 lg:py-24 bg-black overflow-hidden">
    <!-- Animated background gradient -->
    <div class="absolute inset-0">
        <div class="bg-gradient-to-r from-purple-900 via-black to-gray-900 opacity-30 animate-pulse-slow w-full h-full"></div>
    </div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6">
        <!-- Heading -->
        <div class="text-center mb-12 fade-up">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-purple-600 to-purple-700 rounded-full mb-4 pulse-glow">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-2">F.A.Q</h2>
            <p class="text-sm sm:text-base md:text-lg text-gray-300">Frequently Asked Questions</p>
        </div>

        <div class="space-y-4 sm:space-y-6 stagger-container">
            <!-- FAQ Item 1 -->
            <div x-data="{ open: false }" class="bg-gray-900 bg-opacity-70 rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 fade-up">
                <button @click="open = !open" class="w-full px-4 sm:px-6 py-3 sm:py-4 text-left flex items-center justify-between hover:bg-gray-800 transition-colors">
                    <h3 class="text-sm sm:text-base md:text-lg font-semibold text-white pr-4">Produk apa saja yang diproduksi oleh PT. Nata Ultima Enggal?</h3>
                    <svg :class="{ 'rotate-180': open }" class="w-5 sm:w-6 h-5 sm:h-6 text-gray-300 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-collapse x-cloak class="px-4 sm:px-6 pb-3 sm:pb-4">
                    <div class="text-sm sm:text-base text-gray-300 leading-relaxed">
                        <p class="mb-2">Kami memproduksi berbagai jenis panel listrik berkualitas tinggi, meliputi:</p>
                        <ul class="space-y-1 ml-4 list-disc">
                            <li>Smart Panel - Design Prancis dengan standar IEC 61439-1&2</li>
                            <li>Power Busway - Busbar trunking sampai 6300A</li>
                            <li>Energy Management System - Software monitoring daya lengkap</li>
                            <li>Automation System - Ethernet Programmable Automation & Safety PLC</li>
                            <li>Main Distribution Panel (MDP)</li>
                            <li>Motor Control Center (MCC)</li>
                            <li>Auto Transfer Switch (ATS)</li>
                            <li>Capacitor Bank Panel</li>
                            <li>Synchronizing Panel</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div x-data="{ open: false }" class="bg-gray-900 bg-opacity-70 rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 fade-up">
                <button @click="open = !open" class="w-full px-4 sm:px-6 py-3 sm:py-4 text-left flex items-center justify-between hover:bg-gray-800 transition-colors">
                    <h3 class="text-sm sm:text-base md:text-lg font-semibold text-white pr-4">Apa spesifikasi teknis Smart Panel yang Anda produksi?</h3>
                    <svg :class="{ 'rotate-180': open }" class="w-5 sm:w-6 h-5 sm:h-6 text-gray-300 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-collapse x-cloak class="px-4 sm:px-6 pb-3 sm:pb-4">
                    <div class="text-sm sm:text-base text-gray-300 leading-relaxed">
                        <p class="mb-2">Smart Panel kami memiliki spesifikasi teknis unggulan:</p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <h4 class="font-semibold text-white mb-1 sm:mb-2">Standar & Sertifikasi:</h4>
                                <ul class="space-y-1 ml-4 list-disc">
                                    <li>Full type tested sesuai IEC 61439-1&2</li>
                                    <li>Design di Prancis</li>
                                    <li>Electrical switchboards sampai 4000A</li>
                                    <li>Icw 100kA rms/1s</li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white mb-1 sm:mb-2">Material & Proteksi:</h4>
                                <ul class="space-y-1 ml-4 list-disc">
                                    <li>Steel metal sheet dengan electrophoresis</li>
                                    <li>Hot-polymerised polyester epoxy powder</li>
                                    <li>Color White RAL 9001</li>
                                    <li>Degree protection IP30 sampai IP55</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div x-data="{ open: false }" class="bg-gray-900 bg-opacity-70 rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 fade-up">
                <button @click="open = !open" class="w-full px-4 sm:px-6 py-3 sm:py-4 text-left flex items-center justify-between hover:bg-gray-800 transition-colors">
                    <h3 class="text-sm sm:text-base md:text-lg font-semibold text-white pr-4">Apa keunggulan Power Busway Anda?</h3>
                    <svg :class="{ 'rotate-180': open }" class="w-5 sm:w-6 h-5 sm:h-6 text-gray-300 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-collapse x-cloak class="px-4 sm:px-6 pb-3 sm:pb-4">
                    <div class="text-sm sm:text-base text-gray-300 leading-relaxed">
                        <p class="mb-2">Power Busway kami memiliki keunggulan komprehensif:</p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <h4 class="font-semibold text-white mb-1 sm:mb-2">Kapasitas & Standar:</h4>
                                <ul class="space-y-1 ml-4 list-disc">
                                    <li>Busbar trunking sampai 6300A</li>
                                    <li>Sesuai standar IEC 11439-1 & 6</li>
                                    <li>Modular dan upgradeable system</li>
                                    <li>Fleksibilitas instalasi tinggi</li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white mb-1 sm:mb-2">Material & Proteksi:</h4>
                                <ul class="space-y-1 ml-4 list-disc">
                                    <li>Polyester class B (130°C Withstand)</li>
                                    <li>Halogen free material</li>
                                    <li>Proteksi IP55, IPxxD</li>
                                    <li>Sprinkle resistant</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div x-data="{ open: false }" class="bg-gray-900 bg-opacity-70 rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 fade-up">
                <button @click="open = !open" class="w-full px-4 sm:px-6 py-3 sm:py-4 text-left flex items-center justify-between hover:bg-gray-800 transition-colors">
                    <h3 class="text-sm sm:text-base md:text-lg font-semibold text-white pr-4">Apakah produk Anda sudah bersertifikat?</h3>
                    <svg :class="{ 'rotate-180': open }" class="w-5 sm:w-6 h-5 sm:h-6 text-gray-300 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-collapse x-cloak class="px-4 sm:px-6 pb-3 sm:pb-4">
                    <div class="text-sm sm:text-base text-gray-300 leading-relaxed">
                        <p class="mb-2">Ya, semua produk kami telah memiliki sertifikasi resmi dan standar internasional:</p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <h4 class="font-semibold text-white mb-1 sm:mb-2">Sertifikasi Kualitas:</h4>
                                <ul class="space-y-1 ml-4 list-disc">
                                    <li>ISO 9001:2015 - Sistem Manajemen Kualitas</li>
                                    <li>SNI Certified - Standar Nasional Indonesia</li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white mb-1 sm:mb-2">Standar Internasional:</h4>
                                <ul class="space-y-1 ml-4 list-disc">
                                    <li>IEC 61439-1 & 2</li>
                                    <li>CE Compliance</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div x-data="{ open: false }" class="bg-gray-900 bg-opacity-70 rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 fade-up">
                <button @click="open = !open" class="w-full px-4 sm:px-6 py-3 sm:py-4 text-left flex items-center justify-between hover:bg-gray-800 transition-colors">
                    <h3 class="text-sm sm:text-base md:text-lg font-semibold text-white pr-4">Bagaimana cara memesan produk dari PT. Nata Ultima Enggal?</h3>
                    <svg :class="{ 'rotate-180': open }" class="w-5 sm:w-6 h-5 sm:h-6 text-gray-300 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-collapse x-cloak class="px-4 sm:px-6 pb-3 sm:pb-4">
                    <div class="text-sm sm:text-base text-gray-300 leading-relaxed">
                        <p class="mb-2">Untuk memesan produk, ikuti langkah berikut:</p>
                        <ul class="space-y-1 ml-4 list-disc">
                            <li>Kunjungi halaman <a href="#contact" class="text-purple-400 underline hover:text-purple-300 transition-colors">Kontak Kami</a></li>
                            <li>Isi formulir permintaan penawaran (RFQ)</li>
                            <li>Tim kami akan menghubungi Anda dalam 1x24 jam</li>
                            <li>Lakukan konfirmasi dan pembayaran sesuai kesepakatan</li>
                            <li>Produk akan dikirim sesuai jadwal produksi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>