<!-- Clients Section -->
<section id="clients" class="py-12 sm:py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
          <div class="text-center mb-16" x-data="{ visible: false }" x-intersect.once="visible = true" 
         :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" 
         class="transition-all duration-700">
      <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
        Our <span class="text-blue-600">Clients</span>
      </h2>
      <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto mb-4 rounded-full"></div>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto">
      Perusahaan-perusahaan terkemuka yang telah mempercayai layanan<span class="font-semibold text-blue-600"> Kami</span>
      </p>
        </div>
        @php

            // Ambil semua client yang aktif, diurutkan
            $clients = \App\Models\Client::active()->ordered()->get();
            $clientsPerSlide = 6;
            $slides = $clients->chunk($clientsPerSlide);
            $totalSlides = $slides->count();
        @endphp

        @if($clients->count() > 0)
        <!-- Client Carousel with Alpine.js -->
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
                }, 4000);
            },
            stopAutoplay() {
                clearInterval(this.autoplayInterval);
            }
        }" 
        x-init="startAutoplay()"
        @mouseenter="stopAutoplay()"
        @mouseleave="startAutoplay()"
        class="relative overflow-hidden">
            
            <!-- Carousel Container -->
            <div class="flex transition-transform duration-700 ease-in-out"
                 :style="`transform: translateX(-${currentSlide * 100}%)`">
                
                @foreach($slides as $slideIndex => $slideClients)
                <!-- Slide {{ $slideIndex + 1 }} -->
                <div class="flex-none w-full px-2 sm:px-4">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 sm:gap-4 md:gap-6">
                        @foreach($slideClients as $client)
                        <!-- Client: {{ $client->name }} -->
                        <div class="group bg-white p-4 sm:p-5 md:p-6 rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 flex items-center justify-center min-h-[120px] sm:min-h-[140px]">
                            <div class="text-center w-full">
                                <div class="mb-2 transform group-hover:scale-110 transition-transform duration-300">
                                    <img src="{{ asset('storage/' . $client->logo_path) }}" 
                                         alt="Logo {{ $client->name }}" 
                                         class="max-h-12 sm:max-h-16 md:max-h-20 object-contain mx-auto" />
                                </div>
                                <div class="text-xs sm:text-sm font-medium text-gray-700 group-hover:text-blue-600 transition-colors">
                                    {{ $client->name }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>

            @if($totalSlides > 1)
            <!-- Navigation Buttons -->
            <button @click="prevSlide()"
                    class="absolute left-2 sm:left-4 top-1/2 transform -translate-y-1/2 bg-white/90 backdrop-blur-sm rounded-full p-2 sm:p-3 shadow-lg hover:shadow-xl transition-all hover:scale-110 focus:outline-none focus:ring-2 focus:ring-blue-500 z-10">
                <svg class="w-4 h-4 sm:w-6 sm:h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                </svg>
                         </button>
            
            <button @click="nextSlide()"
                    class="absolute right-2 sm:right-4 top-1/2 transform -translate-y-1/2 bg-white/90 backdrop-blur-sm rounded-full p-2 sm:p-3 shadow-lg hover:shadow-xl transition-all hover:scale-110 focus:outline-none focus:ring-2 focus:ring-blue-500 z-10">
                <svg class="w-4 h-4 sm:w-6 sm:h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>

            <!-- Carousel Indicators -->
            <div class="flex justify-center mt-6 sm:mt-8 space-x-2">
                @for($i = 0; $i < $totalSlides; $i++)
                <button @click="goToSlide({{ $i }})"
                        :class="currentSlide === {{ $i }} ? 'bg-blue-600 w-8' : 'bg-gray-300 w-3'"
                        class="h-3 rounded-full transition-all duration-300 hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </button>
                @endfor
            </div>
            @endif
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center py-12">
            <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
            </svg>
            <p class="mt-4 text-gray-600">Belum ada client yang ditampilkan</p>
        </div>
        @endif
    </div>
</section>