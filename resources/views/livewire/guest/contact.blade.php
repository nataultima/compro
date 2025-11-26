<section id="contact" class="relative py-16 sm:py-20 lg:py-24 overflow-hidden">
  <!-- Background Image dengan Overlay -->
  <div class="absolute inset-0">
    <img 
      src="asset/img/product/Smart panel lvmdp 5000A.webp" 
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
    <!-- Heading -->
    <header class="text-center mb-14 lg:mb-20" x-data="{ show: false }" x-intersect.once="show = true">
      <div class="text-center mb-16" x-data="{ visible: false }" x-intersect.once="visible = true" 
         :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" 
         class="transition-all duration-700">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
          Contact <span class="text-cyan-400">Us</span>
        </h2>
        <div class="w-24 h-1 bg-gradient-to-r from-cyan-400 to-blue-600 mx-auto mb-4 rounded-full"></div>
        <p class="text-lg text-white/80 max-w-2xl mx-auto">
          Hubungi kami
        </p>
      </div>
    </header>

    <!-- Form & Contact Cards -->
    <main class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8" x-data="{ leftShow: false, rightShow: false }" x-intersect.once="leftShow = true; rightShow = true">

      <!-- Contact Card (Modified) -->
      <section x-show="rightShow" x-transition:enter="transition ease-out duration-700 delay-100" x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0">
        <div class="bg-white/10 backdrop-blur-sm rounded-2xl shadow-lg p-7 border border-white/20">
          <header class="text-center mb-6">
            <div class="inline-flex items-center justify-center rounded-full bg-gradient-to-br from-cyan-500 to-blue-500 p-3 mb-4">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8h18M3 8v10a2 2 0 002 2h14a2 2 0 002-2V8M3 8l6 6m0 0l6-6m-6 6V4" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-white">Contact Us</h3>
          </header>

          <div class="space-y-5">
            <!-- Phone -->
            <div class="flex items-start space-x-4">
              <div class="mt-1 flex-shrink-0">
                <div class="bg-blue-500/20 p-2.5 rounded-xl border border-white/10">
                  <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                  </svg>
                </div>
              </div>
              <div>
                <p class="text-sm text-white/60">Telepon</p>
                <a href="tel:+622744113360" class="block font-medium text-white hover:text-cyan-400 transition-colors">
                  +62 274 411 3360
                </a>
              </div>
            </div>

            <!-- Email -->
            <div class="flex items-start space-x-4">
              <div class="mt-1 flex-shrink-0">
                <div class="bg-purple-500/20 p-2.5 rounded-xl border border-white/10">
                  <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
              </div>
              <div>
                <p class="text-sm text-white/60">Email</p>
                <a href="mailto:official@nataultima.com" class="block font-medium text-white hover:text-cyan-400 transition-colors break-words">
                  official@nataultima.com
                </a>
              </div>
            </div>

            <!-- Address -->
            <div class="pt-4 border-t border-white/10">
              <div class="flex items-start space-x-4">
                <div class="mt-1 flex-shrink-0">
                  <div class="bg-emerald-500/20 p-2.5 rounded-xl border border-white/10">
                    <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                      <circle cx="12" cy="12" r="3" stroke-width="2" />
                    </svg>
                  </div>
                </div>
                <div>
                  <p class="text-sm text-white/60">Alamat</p>
                  <p class="font-medium text-white leading-relaxed">
                    Jl. Laksda Adisucipto No.37, Karangbayam, Bantul, DIY 55711
                  </p>
                </div>
              </div>
            </div>

            <!-- Map (Moved Inside the Card) -->
            <div class="pt-4 border-t border-white/10">
              <div class="rounded-xl overflow-hidden h-64 md:h-72 shadow-inner">
                <iframe 
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.002260427593!2d110.3336518750061!3d-7.894830892127951!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5980ee850a9d%3A0x1eecf738ebb21e5!2sPT%20NATA%20ULTIMA%20ENGGAL!5e0!3m2!1sid!2sid!4v1762333002978!5m2!1sid!2sid" 
                  width="100%" 
                  height="100%" 
                  style="border:0;" 
                  allowfullscreen="" 
                  loading="lazy" 
                  referrerpolicy="no-referrer-when-downgrade"
                  class="w-full h-full"
                  title="PT NATA ULTIMA ENGGAL 地图位置">
                </iframe>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Form -->
      <section x-show="leftShow" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 -translate-x-6" x-transition:enter-end="opacity-100 translate-x-0">
        <div class="bg-white/10 backdrop-blur-sm rounded-2xl shadow-xl p-7 lg:p-8 border border-white/20">
          <header class="mb-6">
            <h3 class="text-2xl font-bold text-white mb-2">Kirim Pesan</h3>
            <p class="text-white/70">Isi formulir, dan tim kami akan segera merespons.</p>
          </header>

          {{-- Alert Success - TAMBAHAN INI --}}
          @if(session('success'))
            <div class="mb-5 bg-green-500/20 border border-green-500/30 text-white px-4 py-3 rounded-xl backdrop-blur-sm" role="alert">
              <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>{{ session('success') }}</span>
              </div>
            </div>
          @endif

          {{-- UBAH HANYA TAG FORM INI: tambahkan action, method, dan @csrf --}}
          <form class="space-y-5" action="{{ route('contact.store') }}" method="POST">
            @csrf
            
            <div>
              <label class="block text-white/90 font-medium mb-2" for="name">Nama Lengkap</label>
              <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full border border-white/20 rounded-xl px-4 py-3 focus:ring-2 focus:ring-cyan-400 focus:border-cyan-400 focus:outline-none transition-all bg-white/10 text-white placeholder-white/50" placeholder="Nama Anda" required>
            </div>
            <div>
              <label class="block text-white/90 font-medium mb-2" for="email">Email <span class="text-red-400">*</span></label>
              <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full border border-white/20 rounded-xl px-4 py-3 focus:ring-2 focus:ring-cyan-400 focus:border-cyan-400 focus:outline-none transition-all bg-white/10 text-white placeholder-white/50" placeholder="example@gmial.com" required>
            </div>
            <div>
              <label class="block text-white/90 font-medium mb-2" for="phone">Nomor Telepon</label>
              <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="w-full border border-white/20 rounded-xl px-4 py-3 focus:ring-2 focus:ring-cyan-400 focus:border-cyan-400 focus:outline-none transition-all bg-white/10 text-white placeholder-white/50" placeholder="+62 812 3456 ***">
            </div>
            <div>
              <label class="block text-white/90 font-medium mb-2" for="message">Pesan <span class="text-red-400">*</span></label>
              <textarea id="message" name="message" rows="4" class="w-full border border-white/20 rounded-xl px-4 py-3 focus:ring-2 focus:ring-cyan-400 focus:border-cyan-400 focus:outline-none transition-all bg-white/10 text-white placeholder-white/50 resize-none" placeholder="Ceritakan kebutuhan Anda..." required>{{ old('message') }}</textarea>
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-bold py-3.5 rounded-xl hover:from-cyan-600 hover:to-blue-700 transform hover:scale-[1.02] transition-all duration-300 shadow-md hover:shadow-lg hover:shadow-cyan-500/25 flex items-center justify-center group">
              Kirim Pesan
              <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
              </svg>
            </button>
          </form>
        </div>
      </section>

    </main>
  </div>
</section>