{{-- resources/views/guest/partials/announcement_cards.blade.php --}}
@foreach($announcements as $index => $announcement)
    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 announcement-card" 
         x-data="{ visible: false }" 
         x-intersect.once="visible = true" 
         :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" 
         :style="`transition-delay: ${$index * 100}ms`">
        @if($announcement->type === 'image' && $announcement->image)
            <div class="h-48 overflow-hidden">
                <img src="{{ asset('storage/' . $announcement->image) }}" 
                     alt="{{ $announcement->title }}"
                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" />
            </div>
        @else
            <div class="h-12" style="background-color: {{ $announcement->background_color ?? '#3B82F6' }}"></div>
        @endif
        
        <div class="p-6">
            <div class="flex items-center mb-2">
                <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full {{ $announcement->type === 'text' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                    {{ ucfirst($announcement->type) }}
                </span>
                @if($announcement->is_currently_active)
                    <span class="ml-2 inline-block px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                @endif
            </div>
            
            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $announcement->title }}</h3>
            
            @if($announcement->description)
                <div class="text-gray-600 text-sm mb-4 prose prose-sm max-w-none">
                    {!! Str::limit($announcement->description, 100) !!}
                </div>
            @endif
            
            <div class="flex items-center justify-between">
                <div class="text-xs text-gray-500">
                    <i class="far fa-calendar"></i> 
                    {{ $announcement->start_date?->format('d M Y') ?? $announcement->created_at->format('d M Y') }}
                </div>
                @if($announcement->link && $announcement->button_text)
                    <a href="{{ $announcement->link }}" 
                       class="text-blue-600 hover:text-blue-800 text-xs font-medium">
                        {{ $announcement->button_text }}
                    </a>
                @endif
            </div>
        </div>
    </div>
@endforeach