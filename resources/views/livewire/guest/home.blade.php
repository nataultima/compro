<section id="home" class="relative min-h-[85vh] pt-24 flex items-center overflow-hidden" x-data="{ 
  scrollToSection(id) { 
    const el = document.getElementById(id); 
    if(el) el.scrollIntoView({ behavior:'smooth' }); 
  },
  statsAnimated: false,
  animateStats() {
    if (this.statsAnimated) return;
    this.statsAnimated = true;
    
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
      const target = +counter.getAttribute('data-target');
      const increment = target / 100;
      
      const updateCounter = () => {
        const count = +counter.innerText;
        
        if (count < target) {
          counter.innerText = Math.ceil(count + increment);
          setTimeout(updateCounter, 20);
        } else {
          counter.innerText = target + '+';
        }
      };
      
      updateCounter();
    });
  }
}" x-init="setTimeout(() => animateStats(), 2000)">
  <!-- Background Image dengan Overlay Minimalis -->
  <div class="absolute inset-0">
    <img 
      src="asset/img/bgmain.webp" 
      alt="PT. Nata Ultima Enggal Background" 
      class="w-full h-full object-cover transition-opacity duration-1000"
      onerror="this.style.display='none';"
    />
    <!-- Simple Dark Overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900/90 via-blue-900/85 to-slate-900/90"></div>
  </div>

  <!-- Animated Background Elements -->
  <div class="absolute inset-0 overflow-hidden">
    <div class="absolute top-20 left-10 w-72 h-72 bg-cyan-500/10 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
    <div class="absolute top-40 right-10 w-72 h-72 bg-blue-500/10 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 2s;"></div>
    <div class="absolute bottom-20 left-1/2 w-72 h-72 bg-slate-500/10 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 4s;"></div>
  </div>

  <!-- Content Wrapper -->
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 md:px-8 py-12 z-10">
    <div class="max-w-4xl mx-auto text-center">
      
      <!-- Badge Simple -->
      <div class="inline-flex items-center bg-white/5 backdrop-blur-sm px-4 py-2 rounded-full text-sm mb-6 border border-white/10 transform transition-all duration-700 opacity-0 translate-y-4" 
           x-init="setTimeout(() => { $el.classList.remove('opacity-0', 'translate-y-4'); $el.classList.add('opacity-100', 'translate-y-0'); }, 200)">
        <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
        <span class="text-white/80">Profesional Panel Maker</span>
      </div>

      <!-- Main Heading Minimalis -->
      <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold mb-4 leading-tight">
        <span class="block text-white transform transition-all duration-700 opacity-0 translate-y-4" 
              x-init="setTimeout(() => { $el.classList.remove('opacity-0', 'translate-y-4'); $el.classList.add('opacity-100', 'translate-y-0'); }, 400)">PT. NATA ULTIMA</span>
        <span class="block text-cyan-400 mt-2 transform transition-all duration-700 opacity-0 translate-y-4" 
              x-init="setTimeout(() => { $el.classList.remove('opacity-0', 'translate-y-4'); $el.classList.add('opacity-100', 'translate-y-0'); }, 600)">ENGGAL</span>
      </h1>

      <!-- Tagline Simple dengan Glow Animation -->
      <p class="text-xl sm:text-2xl font-light text-white/70 mb-6 transform transition-all duration-700 opacity-0 translate-y-4 relative" 
         x-init="setTimeout(() => { $el.classList.remove('opacity-0', 'translate-y-4'); $el.classList.add('opacity-100', 'translate-y-0'); }, 800)">
        <span class="relative z-10">Working On Innovation</span>
        <span class="absolute inset-0 bg-cyan-400/20 blur-md -z-10 animate-pulse"></span>
      </p>

      <!-- Description -->
      <p class="text-base sm:text-lg text-white/60 mb-10 max-w-2xl mx-auto leading-relaxed transform transition-all duration-700 opacity-0 translate-y-4" 
         x-init="setTimeout(() => { $el.classList.remove('opacity-0', 'translate-y-4'); $el.classList.add('opacity-100', 'translate-y-0'); }, 1000)">
        Perusahaan panel maker profesional yang menghadirkan solusi panel listrik berkualitas tinggi untuk berbagai kebutuhan industri.
      </p>

      <!-- CTA Buttons Minimalis -->
      <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12 transform transition-all duration-700 opacity-0 translate-y-4" 
           x-init="setTimeout(() => { $el.classList.remove('opacity-0', 'translate-y-4'); $el.classList.add('opacity-100', 'translate-y-0'); }, 1200)">
        <button
          x-on:click="scrollToSection('services')"
          class="group bg-cyan-500 hover:bg-cyan-400 text-white font-semibold px-8 py-4 rounded-lg transition-all duration-300 flex items-center justify-center transform hover:scale-105 hover:shadow-lg hover:shadow-cyan-500/25"
        >
          Lihat Layanan
          <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </button>
        
        <button
          x-on:click="scrollToSection('contact')"
          class="group bg-white/5 hover:bg-white/10 text-white font-semibold px-8 py-4 rounded-lg border border-white/20 hover:border-white/30 transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-white/10"
        >
          Hubungi Kami
        </button>
      </div>

      <!-- Stats Grid Minimalis (hanya 2 kolom) -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-2xl mx-auto">
        <!-- Stat 1 -->
        <div class="bg-white/5 backdrop-blur-sm rounded-lg p-6 border border-white/10 hover:bg-white/10 transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-white/10 opacity-0 translate-y-4" 
             x-init="setTimeout(() => { $el.classList.remove('opacity-0', 'translate-y-4'); $el.classList.add('opacity-100', 'translate-y-0'); }, 1400)">
          <div class="text-3xl lg:text-4xl font-bold text-white mb-2 counter" data-target="100">0</div>
          <div class="text-sm text-white/100">Proyek Selesai</div>
        </div>

        <!-- Stat 2 -->
        <div class="bg-white/5 backdrop-blur-sm rounded-lg p-6 border border-white/10 hover:bg-white/10 transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-white/10 opacity-0 translate-y-4" 
             x-init="setTimeout(() => { $el.classList.remove('opacity-0', 'translate-y-4'); $el.classList.add('opacity-100', 'translate-y-0'); }, 1600)">
          <div class="text-3xl lg:text-4xl font-bold text-white mb-2">99%</div>
          <div class="text-sm text-white/60">Tingkat Keberhasilan</div>
        </div>
      </div>

    </div>
  </div>
</section>