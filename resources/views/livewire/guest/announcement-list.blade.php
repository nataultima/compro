<!-- Announcement Section with Table & Preview -->
<section class="py-12 sm:py-16 md:py-20 bg-gradient-to-br from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-12" x-data="{ visible: false }" x-intersect.once="visible = true" 
             :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" 
             class="transition-all duration-700">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                 <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Announcement</span>
            </h1>
            <div class="w-20 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto mb-3 rounded-full"></div>
            <p class="text-base text-gray-600 max-w-2xl mx-auto">
                Latest information and updates for you
            </p>
        </div>

        @if($allAnnouncements->count() > 0)
            <!-- MODIFIED: Stacked Layout: Table on top, Preview below -->
            <div class="grid grid-cols-1 gap-6 mb-12">
                
                <!-- Top: Table List -->
                <div class="col-span-12">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                        <!-- Table Header with Search -->
                        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-5 py-4">
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="text-lg font-bold text-white flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Announcements List
                                </h3>
                                <span class="bg-white/20 backdrop-blur-sm text-white text-sm font-medium px-2.5 py-1 rounded-full">
                                    {{ $allAnnouncements->count() }} items
                                </span>
                            </div>
                            
                            <!-- Search Bar -->
                            <div class="relative">
                                <input type="text" 
                                       wire:model.live.debounce.300ms="search"
                                       placeholder="Search announcements..." 
                                       class="w-full px-4 py-2.5 pl-10 bg-white/95 backdrop-blur-sm border-0 rounded-xl text-sm text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-white/50 transition-all">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50 border-b border-gray-100">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Announcement
                                        </th>
                                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider w-24">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @forelse($allAnnouncements as $index => $announcement)
                                        <tr class="hover:bg-blue-50 transition-colors duration-150 {{ $announcement->id === $featured->id ? 'bg-blue-50 border-l-4 border-l-blue-500' : '' }}"
                                            x-data="{ visible: false }" 
                                            x-intersect.once="visible = true" 
                                            :class="visible ? 'opacity-100' : 'opacity-0'" 
                                            style="transition-delay: {{ $index * 50 }}ms">
                                            <td class="px-4 py-4">
                                                <!-- Badges -->
                                                <div class="flex items-center gap-1.5 mb-2 flex-wrap">
                                                    @if($announcement->id === $featured->id)
                                                        <span class="inline-flex items-center px-2 py-0.5 text-xs font-bold rounded-full bg-amber-100 text-amber-700">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                            </svg>
                                                            Featured
                                                        </span>
                                                    @endif
                                                    @if($announcement->is_currently_active)
                                                        <span class="inline-flex items-center px-2 py-0.5 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-700">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            Active
                                                        </span>
                                                    @endif
                                                    <span class="inline-flex items-center px-2 py-0.5 text-xs font-medium rounded-full {{ $announcement->type === 'text' ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700' }}">
                                                        @if($announcement->type === 'text')
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            Text
                                                        @else
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            Image
                                                        @endif
                                                    </span>
                                                </div>

                                                <!-- Title -->
                                                <h4 class="font-semibold text-sm text-gray-900 mb-1 line-clamp-2 leading-snug">
                                                    {{ $announcement->title }}
                                                </h4>

                                                <!-- Date -->
                                                <div class="flex items-center text-xs text-gray-500 gap-1">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                    <span>{{ $announcement->start_date?->format('M d, Y') ?? $announcement->created_at->format('M d, Y') }}</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-center">
                                                <button wire:click="selectAnnouncement({{ $announcement->id }})"
                                                        class="inline-flex items-center justify-center px-3 py-1.5 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white text-xs font-semibold rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
                                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                    View
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="px-4 py-8 text-center text-gray-500">
                                                <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <p class="text-sm">No announcements found</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if($allAnnouncements->hasPages())
                            <div class="px-5 py-4 bg-gray-50 border-t border-gray-100">
                                <div class="flex items-center justify-between">
                                    <div class="text-sm text-gray-600">
                                        Showing <span class="font-semibold">{{ $allAnnouncements->firstItem() }}</span> 
                                        to <span class="font-semibold">{{ $allAnnouncements->lastItem() }}</span> 
                                        of <span class="font-semibold">{{ $allAnnouncements->total() }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        @if($allAnnouncements->onFirstPage())
                                            <span class="px-3 py-1.5 text-sm text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                                Previous
                                            </span>
                                        @else
                                            <button wire:click="previousPage" class="px-3 py-1.5 text-sm text-blue-600 bg-white hover:bg-blue-50 border border-blue-200 rounded-lg transition-colors font-medium">
                                                Previous
                                            </button>
                                        @endif

                                        <span class="px-3 py-1.5 text-sm text-gray-700 bg-white border border-gray-200 rounded-lg font-medium">
                                            {{ $allAnnouncements->currentPage() }} / {{ $allAnnouncements->lastPage() }}
                                        </span>

                                        @if($allAnnouncements->hasMorePages())
                                            <button wire:click="nextPage" class="px-3 py-1.5 text-sm text-blue-600 bg-white hover:bg-blue-50 border border-blue-200 rounded-lg transition-colors font-medium">
                                                Next
                                            </button>
                                        @else
                                            <span class="px-3 py-1.5 text-sm text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                                Next
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Bottom: Preview -->
                <div class="col-span-12">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden"
                         x-data="{ visible: false }" 
                         x-intersect.once="visible = true" 
                         :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'" 
                         class="transition-all duration-700">
                        
                        @if($featured->type === 'image' && $featured->image)
                            <!-- Image Preview -->
                            <div class="relative">
                                <!-- FIXED: Removed fixed height and changed object-fit to contain -->
                                <div class="w-full bg-gradient-to-br from-gray-100 to-gray-50">
                                    <img src="{{ asset('storage/' . $featured->image) }}" 
                                         alt="{{ $featured->title }}"
                                         class="w-full h-auto object-contain transition-transform duration-500 hover:scale-105" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/20 to-transparent"></div>
                                </div>
                                
                                <!-- Floating Badges on Image -->
                                <div class="absolute top-6 left-6 flex items-center gap-2 flex-wrap">
                                    <span class="bg-white/95 backdrop-blur-sm text-blue-600 text-xs font-bold px-4 py-2 rounded-full shadow-lg flex items-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        Preview
                                    </span>
                                    @if($featured->is_currently_active)
                                        <span class="bg-white/95 backdrop-blur-sm text-emerald-600 text-xs font-semibold px-4 py-2 rounded-full shadow-lg flex items-center gap-1.5">
                                            <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                                            Active
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Content Below Image -->
                            <div class="p-6 md:p-8">
                                <div class="flex items-center gap-3 mb-4 pb-4 border-b border-gray-100">
                                    <span class="inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-purple-100 text-purple-700">
                                        <svg class="w-3.5 h-3.5 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                                        </svg>
                                        Image Announcement
                                    </span>
                                    <div class="flex items-center text-sm text-gray-500 gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span class="font-medium">{{ $featured->start_date?->format('F d, Y') ?? $featured->created_at->format('F d, Y') }}</span>
                                    </div>
                                </div>

                                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 leading-tight">
                                    {{ $featured->title }}
                                </h2>
                                
                         @if($featured->description)
    <div class="text-gray-600 text-base mb-6 leading-relaxed prose prose-sm max-w-none">
        {!! nl2br(e($featured->description)) !!}
    </div>
@endif
                                @if($featured->link && $featured->button_text)
                                    <div class="pt-6 border-t border-gray-100">
                                        <a href="{{ $featured->link }}" 
                                           class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl font-semibold text-base text-white hover:from-blue-700 hover:to-indigo-700 active:from-blue-800 active:to-indigo-800 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 gap-2">
                                            {{ $featured->button_text }}
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @else
                            <!-- Text Preview -->
                            <div class="p-8 md:p-10" style="background: linear-gradient(135deg, {{ $featured->background_color ?? '#3B82F6' }}08 0%, {{ $featured->background_color ?? '#3B82F6' }}03 100%); border-left: 6px solid {{ $featured->background_color ?? '#3B82F6' }}">
                                <div class="flex items-center gap-3 mb-5 pb-5 border-b border-gray-200 flex-wrap">
                                    <span class="inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-blue-100 text-blue-700">
                                        <svg class="w-3.5 h-3.5 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"></path>
                                            <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"></path>
                                        </svg>
                                        Text Announcement
                                    </span>
                                    <span class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-full bg-blue-100 text-blue-700">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        Preview
                                    </span>
                                    @if($featured->is_currently_active)
                                        <span class="inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-700">
                                            <span class="w-2 h-2 bg-emerald-500 rounded-full mr-1.5 animate-pulse"></span>
                                            Active
                                        </span>
                                    @endif
                                    <div class="flex items-center text-sm text-gray-500 gap-2 ml-auto">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span class="font-medium">{{ $featured->start_date?->format('F d, Y') ?? $featured->created_at->format('F d, Y') }}</span>
                                    </div>
                                </div>

                                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-5 leading-tight">
                                    {{ $featured->title }}
                                </h2>
                                
                     @if($featured->description)
    <div class="text-gray-600 text-base mb-6 leading-relaxed prose prose-sm max-w-none">
        {!! nl2br(e($featured->description)) !!}
    </div>
@endif

                                @if($featured->link && $featured->button_text)
                                    <div class="pt-6 border-t border-gray-200">
                                        <a href="{{ $featured->link }}" 
                                           class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl font-semibold text-base text-white hover:from-blue-700 hover:to-indigo-700 active:from-blue-800 active:to-indigo-800 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 gap-2">
                                            {{ $featured->button_text }}
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20" x-data="{ visible: false }" x-intersect.once="visible = true" 
                 :class="visible ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" 
                 class="transition-all duration-700">
                <div class="bg-white rounded-2xl shadow-lg p-12 max-w-md mx-auto border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-100 to-indigo-50 rounded-full flex items-center justify-center mx-auto mb-5">
                        <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">No Announcements Yet</h3>
                    <p class="text-sm text-gray-500">Announcements will be displayed here soon</p>
                </div>
            </div>
        @endif
    </div>
</section>