<section id="certified" class="relative py-12 sm:py-16 md:py-20 overflow-hidden">
    <!-- Background Image dengan Overlay -->
    <div class="absolute inset-0">
        <img 
            src="asset/img/bgmain3.jpg" 
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

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
        <!-- Section Header -->
        <div class="text-center mb-16" x-data="{ visible: false }" x-intersect.once="visible = true" 
             :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" 
             class="transition-all duration-700">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                <span class="text-cyan-400">Certified</span>
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-cyan-400 to-blue-600 mx-auto mb-4 rounded-full"></div>
            <p class="text-lg text-white/80 max-w-2xl mx-auto">
                Standar Kualitas & Keamanan yang kami <span class="font-semibold text-cyan-400">Miliki</span>
            </p>
        </div>

        @php
            // Ambil semua sertifikat yang aktif, diurutkan
            $certificates = \App\Models\Certificate::active()->ordered()->get(); 
            // Kelompokkan sertifikat menjadi 5 per slide (untuk desktop)
            $certificatesPerSlide = 5;
            $slides = $certificates->chunk($certificatesPerSlide);
            $totalSlides = $slides->count();
        @endphp

        @if($certificates->count() > 0)
            <!-- Certificate Carousel with Alpine.js -->
            <div x-data="{ 
                currentSlide: 0, 
                totalSlides: {{ $totalSlides }},
                autoplayInterval: null,
                nextSlide() {
                    this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
                },
                prevSlide() {
                    this.currentSlide = this.currentSlide === 0 ? this.totalSlides - 1 : this.currentSlide - 1;
                },
                goToSlide(index) {
                    this.currentSlide = index;
                },
                startAutoplay() {
                    this.autoplayInterval = setInterval(() => {
                        this.nextSlide();
                    }, 5000);
                },
                stopAutoplay() {
                    clearInterval(this.autoplayInterval);
                }
            }" 
            x-init="startAutoplay()"
            @mouseenter="stopAutoplay()"
            @mouseleave="startAutoplay()"
            class="relative overflow-hidden">
                
            
                <div class="flex transition-transform duration-500 ease-in-out"
                     :style="`transform: translateX(-${currentSlide * 100}%)`">
                    @foreach($slides as $slideIndex => $slideCertificates)
                        <div class="flex-none w-full">
                            <!-- Grid 5 kolom di desktop, responsif di mobile/tablet -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 sm:gap-6 px-2 sm:px-4">
                                @foreach($slideCertificates as $certificate)
                                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 sm:hover:-translate-y-2">
                                        <!-- Gambar Sertifikat -->
                                        <div class="h-40 sm:h-44 lg:h-48 overflow-hidden bg-gradient-to-br from-{{ $certificate->badge_color ?? 'gray' }}-50 to-{{ $certificate->badge_color ?? 'gray' }}-100 flex items-center justify-center p-3 sm:p-4 cursor-pointer relative border-b border-gray-100"
                                             onclick="openCertificateModal({{ $certificate->toJson() }})">
                                            @if ($certificate->image_path)
                                                <img src="{{ asset('storage/' . $certificate->image_path) }}" 
                                                     alt="{{ $certificate->name }}"
                                                     class="max-h-full w-auto object-contain transition-transform duration-300 hover:scale-105" 
                                                     draggable="false" />
                                            @else
                                                <div class="text-center">
                                                    <svg class="w-10 h-10 sm:w-12 sm:h-12 text-{{ $certificate->badge_color ?? 'gray' }}-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                    </svg>
                                                    <p class="text-xs text-{{ $certificate->badge_color ?? 'gray' }}-600 font-medium">Lihat</p>
                                                </div>
                                            @endif
                                            <!-- Badge -->
                                            <div class="absolute top-2 right-2">
                                                <div class="bg-{{ $certificate->badge_color ?? 'gray' }}-600 text-white px-2 py-1 rounded-full text-xs font-semibold shadow-sm">
                                                    {{ $certificate->badge ?? 'Certified' }}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Deskripsi -->
                                        <div class="p-3 sm:p-4">
                                            <h3 class="text-sm sm:text-base font-bold text-gray-900 mb-2 line-clamp-2" title="{{ $certificate->name }}">
                                                {{ $certificate->name }}
                                            </h3>
                                            <span class="inline-block bg-{{ $certificate->badge_color ?? 'gray' }}-100 text-{{ $certificate->badge_color ?? 'gray' }}-800 px-2.5 py-1 rounded-full text-xs font-semibold">
                                                {{ $certificate->status ?? 'Active' }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Tombol Navigasi Previous -->
                <button @click="prevSlide()"
                        class="absolute left-1 sm:left-2 md:left-4 top-1/2 transform -translate-y-1/2 bg-white/90 backdrop-blur-sm rounded-full p-2 sm:p-3 shadow-lg hover:shadow-xl transition-all hover:scale-110 focus:outline-none focus:ring-2 focus:ring-cyan-400 z-10">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                
                <!-- Tombol Navigasi Next -->
                <button @click="nextSlide()"
                        class="absolute right-1 sm:right-2 md:right-4 top-1/2 transform -translate-y-1/2 bg-white/90 backdrop-blur-sm rounded-full p-2 sm:p-3 shadow-lg hover:shadow-xl transition-all hover:scale-110 focus:outline-none focus:ring-2 focus:ring-cyan-400 z-10">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <!-- Indikator Dots -->
                <div class="flex justify-center mt-6 sm:mt-8 space-x-1.5 sm:space-x-2">
                    @for($i = 0; $i < $totalSlides; $i++)
                        <button @click="goToSlide({{ $i }})"
                                :class="currentSlide === {{ $i }} ? 'bg-cyan-400 w-6 sm:w-8' : 'bg-white/30 w-2.5 h-2.5 sm:w-3 sm:h-3'"
                                class="h-2.5 sm:h-3 rounded-full transition-all duration-300 hover:bg-white/50 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                                :aria-label="'Go to slide ' + {{ $i + 1 }}">
                        </button>
                    @endfor
                </div>

                <!-- Slide Counter -->
                <div class="text-center mt-4 text-sm text-white/60">
                    <span x-text="currentSlide + 1"></span> / <span x-text="totalSlides"></span>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-12 sm:py-16">
                <svg class="mx-auto h-16 w-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <h3 class="mt-4 text-lg sm:text-xl font-medium text-white mb-1 sm:mb-2">Belum Ada Sertifikat</h3>
                <p class="text-sm sm:text-base text-white/60">Sertifikat akan segera ditampilkan</p>
            </div>
        @endif
    </div>
</section>