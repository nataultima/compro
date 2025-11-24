<!-- About Section (Improved & Modern Design) -->
<section id="about" class="py-20 bg-gradient-to-br from-blue-50 via-white to-indigo-50 relative overflow-hidden">
  <!-- Background Decorations -->
  <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-gradient-to-br from-blue-300 to-indigo-300 rounded-full filter blur-3xl opacity-20 -mr-64 -mt-64"></div>
  <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-gradient-to-br from-indigo-300 to-purple-300 rounded-full filter blur-3xl opacity-20 -ml-64 -mb-64"></div>
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    
    <!-- Section Header -->
    <div class="text-center mb-16" x-data="{ visible: false }" x-intersect.once="visible = true" 
         :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" 
         class="transition-all duration-700">
      <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
        About <span class="text-blue-600">Us</span>
      </h2>
      <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto mb-4 rounded-full"></div>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto">
        Mengenal lebih dekat <span class="font-semibold text-blue-600">PT. Nata Ultima Enggal</span>
      </p>
    </div>
    <!-- Main Content Grid -->
    <div class="grid lg:grid-cols-1 gap-8">
      
      <!-- Company Info (Left - 2 columns) -->
      <div class="lg:col-span-2" x-data="{ visible: false }" x-intersect.once="visible = true" 
           :class="visible ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-8'" 
           class="transition-all duration-700">
        <div class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 h-full">
          
          <!-- Header -->
          <div class="flex items-center mb-6 pb-6 border-b border-gray-200">
            <div class="bg-gradient-to-br from-blue-600 to-indigo-600 p-4 rounded-2xl mr-4 shadow-lg">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
              </svg>
            </div>
            <div>
              <h3 class="text-2xl font-bold text-gray-900">Tentang Perusahaan</h3>
              <p class="text-sm text-gray-500">Solusi Kelistrikan Terpercaya</p>
            </div>
          </div>
          
          <!-- Description -->
          <p class="text-gray-600 leading-relaxed mb-8 text-justify">
            PT. Nata Ultima Enggal adalah perusahaan yang didirikan untuk memberikan solusi tepat kepada pelanggan mulai dari perencanaan, pembuatan/perakitan, hingga pemasangan peralatan listrik untuk Panel Tegangan Menengah, Panel Tegangan Rendah, Trafo, Busduct, serta System Control dan Monitoring Energi.
          </p>
   <!-- Visi & Misi (Right - 1 column) -->
      <div x-data="{ visible: false, activeTab: 'visi' }" x-intersect.once="visible = true" 
           :class="visible ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-8'" 
           class="transition-all duration-700">
        <div>
          
          <!-- Header -->
          <div class="mb-6 pb-6 border-b border-gray-200">
            <h4 class="text-xl font-bold text-gray-900 flex items-center">
              <span class="w-1 h-6 bg-gradient-to-b from-blue-600 to-indigo-600 rounded-full mr-3"></span>
              Visi & Misi
            </h4>
          </div>

          <!-- Tabs -->
          <div class="flex mb-6 bg-gray-100 rounded-xl p-1">
            <button @click="activeTab = 'visi'" 
                    :class="activeTab === 'visi' ? 'bg-white text-blue-600 shadow-md' : 'text-gray-600'" 
                    class="flex-1 py-3 px-4 rounded-lg font-semibold text-sm transition-all duration-300">
              <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
              </svg>
              Visi
            </button>
            <button @click="activeTab = 'misi'" 
                    :class="activeTab === 'misi' ? 'bg-white text-blue-600 shadow-md' : 'text-gray-600'" 
                    class="flex-1 py-3 px-4 rounded-lg font-semibold text-sm transition-all duration-300">
              <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
              </svg>
              Misi
            </button>
          </div>

          <!-- Tab Content -->
          <div class="min-h-[400px]">
            <!-- Visi Content -->
            <div x-show="activeTab === 'visi'" 
                 x-transition:enter="transition ease-out duration-300" 
                 x-transition:enter-start="opacity-0 transform translate-y-4" 
                 x-transition:enter-end="opacity-100 transform translate-y-0">
              <div class="space-y-4">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 rounded-2xl border border-blue-200">
                  <div class="flex items-center mb-4">
                    <div class="bg-blue-600 p-3 rounded-xl mr-3 shadow-lg">
                      <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                      </svg>
                    </div>
                    <h5 class="font-bold text-gray-900">Visi Kami</h5>
                  </div>
                  <p class="text-gray-700 text-sm leading-relaxed text-justify mb-4">
                    Terwujudnya Industri Penunjang Ketenagalistrikan Nasional yang menjadi pilihan Perusahaan Penyedia Tenaga Listrik Indonesia, baik tentang Mutu, Keandalan, Kesediaan dan sesuai nilai keekonomiannya. Terwujudnya Industri Peralatan Listrik Indonesia yang berkelas Dunia, Kompetitif dan yang memenuhi segala Standar dan Spesifikasinya serta senantiasa menyesuaikan dengan perkembangan dan kemajuan teknologi.
                  </p>
                  <p class="text-gray-700 text-sm leading-relaxed text-justify">
                    Terwujudnya Industri Peralatan Listrik yang jelas kontribusinya terhadap peningkatan kesejahteraan, kemakmuran masyarakat serta Percepatan Pembangunan Nasional. Terwujudnya Industri Peralatan Listrik yang peduli terhadap keamanan, keselamatan, kesehatan, lingkungan hidup dan pelestarian alam Serta Budaya Indonesia.
                  </p>
                </div>
              </div>
            </div>

            <!-- Misi Content -->
            <div x-show="activeTab === 'misi'" 
                 x-transition:enter="transition ease-out duration-300" 
                 x-transition:enter-start="opacity-0 transform translate-y-4" 
                 x-transition:enter-end="opacity-100 transform translate-y-0">
              <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 rounded-2xl border border-blue-200">
                <div class="flex items-center mb-4">
                  <div class="bg-blue-600 p-3 rounded-xl mr-3 shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                  </div>
                  <h5 class="font-bold text-gray-900">Misi Kami</h5>
                </div>
                <ul class="space-y-3">
                  <li class="flex items-start">
                    <div class="bg-blue-600 rounded-full p-1 mr-3 mt-0.5 flex-shrink-0">
                      <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                      </svg>
                    </div>
                    <span class="text-gray-700 text-sm text-justify">Mewujudkan Industri Peralatan Listrik Indonesia sebagai Perusahaan Nasional yang profesional baik dibidang manajemen dan teknologi.</span>
                  </li>
                  <li class="flex items-start">
                    <div class="bg-blue-600 rounded-full p-1 mr-3 mt-0.5 flex-shrink-0">
                      <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                      </svg>
                    </div>
                    <span class="text-gray-700 text-sm text-justify">Mewujudkan Industri Peralatan Listrik Indonesia sebagai Perusahaan kelas dunia yang berdaya saing tinggi dengan selalu berupaya mencari bermacam keunggulan</span>
                  </li>
                   <li class="flex items-start">
                    <div class="bg-blue-600 rounded-full p-1 mr-3 mt-0.5 flex-shrink-0">
                      <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                      </svg>
                    </div>
                    <span class="text-gray-700 text-sm text-justify">Berperan aktif dalam Program Percepatan Pembangunan Nasional khususnya dibidang ketenagalistrikan</span>
                  </li>
                  <li class="flex items-start">
                    <div class="bg-blue-600 rounded-full p-1 mr-3 mt-0.5 flex-shrink-0">
                      <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                      </svg>
                    </div>
                    <span class="text-gray-700 text-sm text-justify">Selalu saling memupuk kebersamaan dan mempererat kerjasama diantara anggota dan lembaga terkait</span>
                  </li>
                  <li class="flex items-start">
                    <div class="bg-blue-600 rounded-full p-1 mr-3 mt-0.5 flex-shrink-0">
                      <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                      </svg>
                    </div>
                    <span class="text-gray-700 text-sm text-justify">Pandai membaca dan menganalisa situasi dan gejala bisnis ketenagalistrikan Nasional maupun Internasional serta memahami segala aturan dan perundang-undangan yang berlaku, baik dilingkup Nasional maupun Internasional.</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
         
        </div>
      </div>
    </div>

  <!-- Company Values -->
    <div class="mt-16" x-data="{ visible: false }" x-intersect.once="visible = true" 
         :class="visible ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" 
         class="transition-all duration-700">
      <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-12 border border-gray-100">
        
        <!-- Header -->
        <div class="text-center mb-12">
          <h3 class="text-3xl font-bold text-gray-900 mb-3">Nilai-Nilai Perusahaan</h3>
          <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto rounded-full"></div>
          <p class="text-gray-600 mt-4">Komitmen kami dalam memberikan layanan terbaik</p>
        </div>

        <!-- Values Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
          
  <!-- Value 4: Inovasi -->
          <div class="group text-center p-6 bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-orange-200">
            <div class="bg-white w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
              <svg class="w-10 h-10 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
              </svg>
            </div>
            <h4 class="font-bold text-gray-900 mb-3 text-lg">Inovasi</h4>
            <p class="text-sm text-gray-600 leading-relaxed">Terus berinovasi dan mengikuti perkembangan teknologi terkini</p>
          </div>

          <!-- Value 1: Kualitas -->
          <div class="group text-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-blue-200">
            <div class="bg-white w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
              <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <h4 class="font-bold text-gray-900 mb-3 text-lg">Kualitas</h4>
            <p class="text-sm text-gray-600 leading-relaxed">Memberikan produk dan layanan berkualitas tinggi sesuai standar internasional</p>
          </div>

          <!-- Value 2: Tepat Waktu -->
          <div class="group text-center p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-green-200">
            <div class="bg-white w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
              <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
            </div>
            <h4 class="font-bold text-gray-900 mb-3 text-lg">Tepat Waktu</h4>
            <p class="text-sm text-gray-600 leading-relaxed">Menghargai waktu klien dengan menyelesaikan proyek sesuai jadwal</p>
          </div>

          <!-- Value 3: Kolaborasi -->
          <div class="group text-center p-6 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-purple-200">
            <div class="bg-white w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
              <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
            </div>
            <h4 class="font-bold text-gray-900 mb-3 text-lg">Kolaborasi</h4>
            <p class="text-sm text-gray-600 leading-relaxed">Bekerja sama dengan klien dan mitra untuk hasil terbaik</p>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>