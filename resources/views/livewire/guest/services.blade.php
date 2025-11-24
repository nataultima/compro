<!-- Services Section -->
<section id="services" class="py-12 sm:py-16 md:py-20 bg-blue-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
 <!-- Section Header -->
    <div class="text-center mb-16" x-data="{ visible: false }" x-intersect.once="visible = true" 
         :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" 
         class="transition-all duration-700">
      <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
        Our <span class="text-blue-600">Products</span>
      </h2>
      <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto mb-4 rounded-full"></div>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto">
        Solusi panel listrik lengkap untuk kebutuhan <span class="font-semibold text-blue-600">Industri</span>
      </p>
    </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Smart Panel -->
            <div class="bg-white p-5 sm:p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div style="width: 44px; height: 44px; background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-bottom: 14px;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="3" y1="9" x2="21" y2="9"></line>
                        <line x1="9" y1="21" x2="9" y2="9"></line>
                    </svg>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-gray-800 mb-2 sm:mb-3">Smart Panel</h3>
                <p class="text-gray-600 mb-2 sm:mb-3 text-xs sm:text-sm leading-relaxed">
                    Design di Prancis dengan teknologi terdepan.
                </p>
                <ul class="text-gray-600 space-y-1 text-xs sm:text-sm leading-relaxed">
                    <li>• Full type tested sesuai IEC 61439-1&2</li>
                    <li>• Electrical switchboards sampai 4000A</li>
                    <li>• Icw 100kA rms/1s</li>
                    <li>• Steel metal sheet electrophoresis</li>
                    <li>• Color White RAL 9001</li>
                    <li>• Protection IP30 sampai IP55</li>
                </ul>
            </div>

            <!-- Power Busway -->
            <div class="bg-white p-5 sm:p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div style="width: 44px; height: 44px; background: linear-gradient(135deg, #16a34a 0%, #15803d 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-bottom: 14px;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                    </svg>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-gray-800 mb-2 sm:mb-3">Power Busway</h3>
                <p class="text-gray-600 mb-2 sm:mb-3 text-xs sm:text-sm leading-relaxed">
                    Busbar trunking untuk distribusi power sampai 6300A.
                </p>
                <ul class="text-gray-600 space-y-1 text-xs sm:text-sm leading-relaxed">
                    <li>• Modular dan upgradeable system</li>
                    <li>• Sesuai standar IEC 11439-1 & 6</li>
                    <li>• Polyester class B (130°C)</li>
                    <li>• Halogen free dengan proteksi IP55</li>
                    <li>• IPxxD, sprinkle resistant</li>
                </ul>
            </div>

            <!-- Energy Management -->
            <div class="bg-white p-5 sm:p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div style="width: 44px; height: 44px; background: linear-gradient(135deg, #9333ea 0%, #7e22ce 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-bottom: 14px;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="20" x2="18" y2="10"></line>
                        <line x1="12" y1="20" x2="12" y2="4"></line>
                        <line x1="6" y1="20" x2="6" y2="14"></line>
                    </svg>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-gray-800 mb-2 sm:mb-3">Energy Management</h3>
                <p class="text-gray-600 mb-2 sm:mb-3 text-xs sm:text-sm leading-relaxed">
                    Software untuk monitoring daya secara lengkap.
                </p>
                <ul class="text-gray-600 space-y-1 text-xs sm:text-sm leading-relaxed">
                    <li>• Monitor daya lengkap</li>
                    <li>• Termasuk sistem WAGES</li>
                    <li>• Real-time monitoring</li>
                    <li>• Energy efficiency analysis</li>
                    <li>• Reporting & analytics</li>
                </ul>
            </div>

            <!-- Automation -->
            <div class="bg-white p-5 sm:p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div style="width: 44px; height: 44px; background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-bottom: 14px;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M12 1v6m0 6v6m5.2-13.2l-4.2 4.2m0 6l4.2 4.2M23 12h-6m-6 0H5m13.2 5.2l-4.2-4.2m0-6l4.2-4.2"></path>
                    </svg>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-gray-800 mb-2 sm:mb-3">Automation</h3>
                <p class="text-gray-600 mb-2 sm:mb-3 text-xs sm:text-sm leading-relaxed">
                    Ethernet Programmable Automation & Safety PLC.
                </p>
                <ul class="text-gray-600 space-y-1 text-xs sm:text-sm leading-relaxed">
                    <li>• Solusi stand-alone controller</li>
                    <li>• Safety controller system</li>
                    <li>• Ethernet connectivity</li>
                    <li>• Programmable logic control</li>
                    <li>• Industrial automation</li>
                </ul>
            </div>
        </div>
    </div>
</section>
