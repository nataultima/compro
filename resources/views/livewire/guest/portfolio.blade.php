<!-- Portfolio Section -->
<section id="portfolio" class="py-12 sm:py-16 md:py-20 bg-blue-50">
  <div class="max-w-7xl mx-auto px-4">
<div class="text-center mb-16" x-data="{ visible: false }" x-intersect.once="visible = true" 
         :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" 
         class="transition-all duration-700">
      <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
        Portfolio <span class="text-blue-600">Project</span>
      </h2>
      <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto mb-4 rounded-full"></div>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto">
          Beberapa proyek yang telah kami kerjakan dengan <span class="font-semibold text-blue-600">Sukses</span>
      </p>
    </div>
    @if(isset($portfolios) && $portfolios->count() > 0)
      <!-- Portfolio Carousel with Alpine.js -->
      <div x-data="{ 
        currentSlide: 0, 
        totalSlides: {{ $portfolios->count() }},
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
        
        <!-- Carousel Container -->
        <div class="flex transition-transform duration-500 ease-in-out"
             :style="`transform: translateX(-${currentSlide * 100}%)`">
          @foreach($portfolios as $index => $portfolio)
            <div class="flex-none w-full">
              <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                  <!-- Gambar -->
                  <div class="h-[280px] sm:h-[400px] md:h-[500px] overflow-hidden bg-gray-100">
                    <img src="{{ $portfolio->image_url }}" 
                         alt="{{ $portfolio->title }}"
                         class="w-full h-full object-contain" 
                         draggable="false" />
                  </div>

                  <!-- Deskripsi -->
                  @if($portfolio->description)
                    <div class="p-4 sm:p-6">
                      <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-1 sm:mb-2">
                        {{ $portfolio->title }}
                      </h3>
                      <p class="text-sm sm:text-base text-gray-600">
                        {{ $portfolio->description }}
                      </p>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <!-- Tombol Navigasi Previous -->
        <button @click="prevSlide()"
                class="absolute left-2 sm:left-4 top-1/2 transform -translate-y-1/2 bg-white rounded-full p-2 sm:p-3 shadow-lg hover:shadow-xl transition-all hover:scale-110 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
          </svg>
        </button>
        
        <!-- Tombol Navigasi Next -->
        <button @click="nextSlide()"
                class="absolute right-2 sm:right-4 top-1/2 transform -translate-y-1/2 bg-white rounded-full p-2 sm:p-3 shadow-lg hover:shadow-xl transition-all hover:scale-110 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </button>

        <!-- Indikator Dots -->
        <div class="flex justify-center mt-6 sm:mt-8 space-x-2">
          @foreach($portfolios as $index => $portfolio)
            <button @click="goToSlide({{ $index }})"
                    :class="currentSlide === {{ $index }} ? 'bg-blue-600 scale-110' : 'bg-gray-300'"
                    class="w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full transition-all duration-300 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    :aria-label="'Go to slide ' + {{ $index + 1 }}">
            </button>
          @endforeach
        </div>

        <!-- Slide Counter (Optional) -->
        <div class="text-center mt-4 text-sm text-gray-600">
          <span x-text="currentSlide + 1"></span> / <span x-text="totalSlides"></span>
        </div>
      </div>
    @else
      <!-- Empty State -->
      <div class="text-center py-12 sm:py-16">
        <svg class="mx-auto h-16 w-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
        </svg>
        <h3 class="mt-4 text-lg sm:text-xl font-medium text-gray-900 mb-1 sm:mb-2">Belum Ada Portfolio</h3>
        <p class="text-sm sm:text-base text-gray-500">Portfolio akan segera ditampilkan</p>
      </div>
    @endif

    <!-- Portfolio Stats -->
    <div class="mt-12 sm:mt-16 grid grid-cols-2 gap-6 sm:gap-8">
  <div class="text-center p-5 sm:p-6 bg-white rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
    <div class="text-2xl sm:text-4xl font-bold text-blue-600 mb-2">100+</div>
    <div class="text-sm sm:text-base text-gray-600">Proyek Selesai</div>
  </div>
  <div class="text-center p-5 sm:p-6 bg-white rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
    <div class="text-2xl sm:text-4xl font-bold text-blue-600 mb-2">99%</div>
    <div class="text-sm sm:text-base text-gray-600">Proyek Berhasil</div>
  </div>
</div>
  </div>
</section>  