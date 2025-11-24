{{-- resources/views/livewire/product-list.blade.php --}}

<!-- Products Section -->
<section id="products" class="py-12 sm:py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
          <div class="text-center mb-16" x-data="{ visible: false }" x-intersect.once="visible = true" 
         :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" 
         class="transition-all duration-700">
      <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
        <span class="text-blue-600">Products</span>
      </h2>
      <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto mb-4 rounded-full"></div>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto">
       Galeri produk panel listrik berkualitas tinggi yang telah kami<span class="font-semibold text-blue-600"> Produksi</span>
      </p>
        </div>

        @if($products->count() > 0)
            <div x-data="{
                currentSlide: 0,
                totalSlides: {{ $products->chunk(3)->count() }}, // Hitung total slide di server
                next() {
                    if (this.totalSlides > 1) {
                        this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
                    }
                },
                prev() {
                    if (this.totalSlides > 1) {
                        this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
                    }
                },
                goToSlide(index) {
                    this.currentSlide = index;
                }
            }" class="relative">
                
                <!-- Carousel Container -->
                <div class="overflow-hidden">
                    <div class="flex transition-transform duration-500 ease-in-out"
                         :style="`transform: translateX(-${currentSlide * 100}%)`">
                        
                        @foreach($products->chunk(3) as $productChunk)
                            <div class="w-full flex-shrink-0">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8">
                                    @foreach($productChunk as $product)
                                        {{-- Product Card --}}
                                        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group cursor-pointer"
                                             onclick="openProductModal({{ $product->toJson() }})">
                                            
                                            <div class="relative overflow-hidden">
                                                @if($product->image)
                                                    <img
                                                        src="{{ Storage::url($product->image) }}"
                                                        alt="{{ $product->name }}"
                                                        class="w-full h-48 sm:h-56 md:h-64 object-cover transition-transform duration-500 group-hover:scale-110"
                                                    />
                                                @else
                                                    <div class="w-full h-48 sm:h-56 md:h-64 bg-gray-200 flex items-center justify-center">
                                                        <svg class="w-12 sm:w-16 h-12 sm:h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                        </svg>
                                                    </div>
                                                @endif
                                                
                                                <div class="absolute top-3 sm:top-4 left-3 sm:left-4">
                                                    <div class="text-white px-2 sm:px-3 py-0.5 sm:py-1 rounded-full text-xs sm:text-sm font-semibold
                                                        @switch($product->category)
                                                            @case('LVMDP') bg-blue-600 @break
                                                            @case('LVMDP-S') bg-green-600 @break
                                                            @case('SDP') bg-purple-600 @break
                                                            @default bg-gray-600 @break
                                                        @endswitch
                                                    ">
                                                        {{ $product->category }}
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="p-4 sm:p-5 md:p-6">
                                                <h3 class="text-base sm:text-lg md:text-xl font-bold text-gray-800 mb-1 sm:mb-2 group-hover:text-blue-600 transition-colors">
                                                    {{ $product->name }}
                                                </h3>
                                                <p class="text-sm sm:text-base text-gray-600 mb-3 leading-relaxed line-clamp-2">
                                                    {{ Str::limit($product->description, 100) }}
                                                </p>
                                                <div class="flex flex-wrap justify-between items-center gap-2">
                                                    @if($product->capacity)
                                                        <span class="text-blue-600 font-semibold text-xs sm:text-sm md:text-base">Kapasitas: {{ $product->capacity }}</span>
                                                    @else
                                                        <span class="text-blue-600 font-semibold text-xs sm:text-sm md:text-base">{{ $product->category }}</span>
                                                    @endif
                                                    
                                                    @if($product->badge_label)
                                                        <span class="px-2 sm:px-3 py-0.5 sm:py-1 rounded-full text-xs sm:text-sm font-medium
                                                            @switch($product->badge_color)
                                                                @case('blue') bg-blue-100 text-blue-800 @break
                                                                @case('green') bg-green-100 text-green-800 @break
                                                                @case('purple') bg-purple-100 text-purple-800 @break
                                                                @case('red') bg-red-100 text-red-800 @break
                                                                @case('yellow') bg-yellow-100 text-yellow-800 @break
                                                                @default bg-gray-100 text-gray-800 @break
                                                            @endswitch
                                                        ">
                                                            {{ $product->badge_label }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                </div>

                {{-- Navigation Buttons - Hanya tampilkan jika ada lebih dari 1 slide --}}
                @if($products->chunk(3)->count() > 1)
                    <button 
                        @click="prev()" 
                        class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 bg-white rounded-full p-2 sm:p-3 shadow-lg hover:bg-gray-100 transition-colors z-10 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>

                    <button 
                        @click="next()" 
                        class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 bg-white rounded-full p-2 sm:p-3 shadow-lg hover:bg-gray-100 transition-colors z-10 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>

                    <!-- Dots Indicator -->
                    <div class="flex justify-center mt-6 sm:mt-8 gap-2">
                        <template x-for="(slide, index) in totalSlides" :key="index">
                            <button 
                                @click="goToSlide(index)"
                                class="w-2 h-2 sm:w-3 sm:h-3 rounded-full transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                :class="currentSlide === index ? 'bg-blue-600 w-6 sm:w-8' : 'bg-gray-300 hover:bg-gray-400'"
                                :aria-label="'Go to slide ' + (index + 1)">
                            </button>
                        </template>
                    </div>
                @endif

            </div>
        @else
            <div class="text-center py-10 sm:py-12">
                <svg class="mx-auto h-10 w-10 sm:h-12 sm:w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
                <h3 class="mt-2 text-sm sm:text-base font-semibold text-gray-900">Belum ada produk</h3>
                <p class="mt-1 text-xs sm:text-sm text-gray-500">Produk akan segera tersedia.</p>
            </div>
        @endif
    </div>

    {{-- MODAL DETAIL PRODUK --}}
    <div id="productModal" class="fixed inset-0 z-50 hidden bg-gray-600 bg-opacity-50 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative w-full max-w-5xl transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all">
                <!-- Header Modal -->
                <div class="flex items-start justify-between bg-white px-6 py-4 border-b border-gray-100">
                    <h3 id="productModalTitle" class="text-2xl font-bold text-gray-900"></h3>
                    <button onclick="closeProductModal()" type="button" class="ml-4 rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                        <span class="sr-only">Tutup</span>
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Body Modal -->
                <div class="bg-white px-6 py-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Kolom Gambar (Menempati 2 dari 3 kolom) -->
                        <div class="md:col-span-2">
                            <div id="productModalImageContainer" class="w-full flex items-center justify-center">
                                <!-- Gambar akan dimuat di sini oleh JavaScript -->
                            </div>
                        </div>

                        <!-- Kolom Detail (Menempati 1 dari 3 kolom) -->
                        <div class="md:col-span-1 flex flex-col justify-between">
                            <div>
                                <p id="productModalDescription" class="text-gray-600 text-base mb-4"></p>
                                <div class="space-y-3">
                                    <p class="text-sm text-gray-700"><strong class="font-semibold text-gray-800">Kategori:</strong> <span id="productModalCategory" class="font-medium text-gray-900"></span></p>
                                    <p class="text-sm text-gray-700"><strong class="font-semibold text-gray-800">Kapasitas:</strong> <span id="productModalCapacity" class="font-medium text-gray-900"></span></p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span id="productModalBadge" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium">
                                    <!-- Badge akan dimuat di sini oleh JavaScript -->
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Modal -->
                <div class="bg-gray-50 px-6 py-4 flex justify-end">
                    <button onclick="closeProductModal()" type="button" class="rounded-lg bg-gray-200 px-4 py-2 text-sm font-semibold text-gray-800 shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-500 transition-colors">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>