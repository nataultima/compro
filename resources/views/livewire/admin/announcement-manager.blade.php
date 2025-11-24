<div>
    <!-- Flash Messages -->
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
            </svg>
            {{ session('error') }}
        </div>
    @endif

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Manage Announcements</h1>
            <p class="text-sm text-gray-600 mt-1">Kelola announcement banner website</p>
        </div>
        <button wire:click="openModal" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 shadow-md hover:shadow-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Announcement
        </button>
    </div>

    <!-- Search -->
    <div class="mb-6">
        <div class="relative max-w-md">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input wire:model.live.debounce.300ms="search" 
                   type="text" 
                   placeholder="Cari announcement..." 
                   class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>
    </div>

    <!-- Announcements Table -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preview</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Schedule</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($announcements as $announcement)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($announcement->type === 'image' && $announcement->image)
                                    <img src="{{ Storage::url($announcement->image) }}" alt="{{ $announcement->title }}" class="h-12 w-20 object-cover rounded shadow-sm">
                                @else
                                    <div class="h-8 w-8 rounded shadow-sm" style="background-color: {{ $announcement->background_color }}"></div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $announcement->title }}</div>
                                @if($announcement->description)
                                    <div class="text-xs text-gray-500 mt-1">{{ Str::limit($announcement->description, 50) }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs rounded-full {{ $announcement->type === 'text' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                    {{ ucfirst($announcement->type) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs text-gray-500">
                                @if($announcement->start_date || $announcement->end_date)
                                    <div>{{ $announcement->start_date?->format('d M Y') ?? 'No start' }}</div>
                                    <div>to {{ $announcement->end_date?->format('d M Y') ?? 'No end' }}</div>
                                @else
                                    <span class="text-gray-400">Always active</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $announcement->order }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button wire:click="toggleStatus({{ $announcement->id }})" class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 {{ $announcement->is_active ? 'bg-blue-600' : 'bg-gray-200' }}">
                                    <span class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 {{ $announcement->is_active ? 'translate-x-5' : 'translate-x-0' }}"></span>
                                </button>
                                <div class="mt-1">
                                    @if($announcement->is_currently_active)
                                        <span class="text-xs text-green-600 font-medium">● Running</span>
                                    @elseif($announcement->is_active)
                                        <span class="text-xs text-yellow-600">○ Scheduled</span>
                                    @else
                                        <span class="text-xs text-gray-400">○ Inactive</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button wire:click="edit({{ $announcement->id }})" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                <button wire:click="confirmDelete({{ $announcement->id }})" class="text-red-600 hover:text-red-900">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada data announcement
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        {{ $announcements->links() }}
    </div>

    <!-- Add/Edit Modal -->
    @if ($showModal)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
            <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-xl rounded-lg bg-white">
                <div class="flex justify-between items-center pb-3 border-b">
                    <h3 class="text-xl font-semibold text-gray-900">
                        {{ $isEdit ? 'Edit Announcement' : 'Tambah Announcement Baru' }}
                    </h3>
                    <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <div class="mt-4">
                    <form wire:submit.prevent="save">
                        <!-- Type -->
                        <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-3">Tipe Announcement <span class="text-red-500">*</span></label>
                            <div class="flex gap-6">
                                <label class="flex items-center cursor-pointer">
                                    <input wire:model.live="type" type="radio" value="text" class="mr-3 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                    <div>
                                        <span class="text-sm font-medium">Text Only</span>
                                        <p class="text-xs text-gray-500">Tampilkan teks dengan warna background</p>
                                    </div>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input wire:model.live="type" type="radio" value="image" class="mr-3 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                    <div>
                                        <span class="text-sm font-medium">Image + Description</span>
                                        <p class="text-xs text-gray-500">Tampilkan gambar banner dengan deskripsi</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Title (Common for both types) -->
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                Judul <span class="text-red-500">*</span>
                            </label>
                            <p class="text-xs text-gray-500 mb-2">Judul utama yang akan ditampilkan pada announcement</p>
                            <input type="text" id="title" wire:model="title" 
                                   placeholder="Contoh: Reminder"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-3 border">
                            @error('title') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Description (Common for both types) -->
                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Deskripsi
                            </label>
                            <p class="text-xs text-gray-500 mb-2">Informasi tambahan tentang announcement (opsional)</p>
                            <textarea id="description" wire:model="description" rows="3"
                                      placeholder="{{ $type === 'text' ? 'Contoh: Deskripsi...' : 'Deskripsi singkat tentang announcement...' }}"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-3 border"></textarea>
                            @error('description') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        @if($type === 'image')
                            <!-- Image -->
                            <div class="mb-6">
                                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Gambar Banner <span class="text-red-500">*</span></label>
                                <p class="text-xs text-gray-500 mb-2">Gambar yang akan ditampilkan pada banner</p>
                                
                                @if($currentImage && !$image)
                                    <div class="mt-2 mb-4">
                                        <div class="relative">
                                            <img src="{{ Storage::url($currentImage) }}" alt="Current" class="h-40 w-full object-cover rounded-lg border shadow-sm">
                                            <div class="absolute top-2 right-2 bg-black bg-opacity-50 text-white text-xs px-2 py-1 rounded">
                                                Gambar Saat Ini
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($image)
                                    <div class="mt-2 mb-4">
                                        <div class="relative">
                                            <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="h-40 w-full object-cover rounded-lg border shadow-sm">
                                            <div class="absolute top-2 right-2 bg-black bg-opacity-50 text-white text-xs px-2 py-1 rounded">
                                                Preview Gambar Baru
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="flex items-center justify-center w-full">
                                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                                            <p class="text-xs text-gray-500">PNG, JPG, WEBP (MAX. 2MB)</p>
                                        </div>
                                        <input id="image" wire:model="image" type="file" class="hidden" accept="image/*" />
                                    </label>
                                </div>
                                @error('image') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG, WEBP (Max: 2MB) - Rekomendasi ukuran: 1200x300px</p>
                            </div>
                        @endif

                        <!-- Background Color (only for text type) -->
                        @if($type === 'text')
                            <div class="mb-6">
                                <label for="background_color" class="block text-sm font-medium text-gray-700 mb-2">Warna Background <span class="text-red-500">*</span></label>
                                <p class="text-xs text-gray-500 mb-2">Warna latar belakang untuk teks pengumuman</p>
                                <div class="flex gap-2 mt-1">
                                    <input wire:model.live="background_color" type="color" class="h-10 w-20 rounded border border-gray-300">
                                    <input type="text" id="background_color" wire:model="background_color" placeholder="#3B82F6"
                                           class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
                                </div>
                                @error('background_color') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>
                        @endif

                        <!-- Schedule -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                                <p class="text-xs text-gray-500 mb-2">Kapan announcement akan mulai ditampilkan</p>
                                <input type="datetime-local" id="start_date" wire:model="start_date"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
                                @error('start_date') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Selesai</label>
                                <p class="text-xs text-gray-500 mb-2">Kapan announcement akan berhenti ditampilkan</p>
                                <input type="datetime-local" id="end_date" wire:model="end_date"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
                                @error('end_date') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mb-6">Kosongkan untuk announcement yang selalu aktif</p>

                        <!-- Order -->
                        <div class="mb-6">
                            <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Urutan Prioritas <span class="text-red-500">*</span></label>
                            <p class="text-xs text-gray-500 mb-2">Angka lebih kecil = prioritas lebih tinggi</p>
                            <input type="number" id="order" wire:model="order" min="0"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
                            @error('order') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Is Active -->
                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" wire:model="is_active" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-700">Aktif</span>
                            </label>
                            <p class="text-xs text-gray-500 mt-1">Centang untuk menampilkan announcement</p>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end space-x-3 pt-4 border-t">
                            <button type="button" wire:click="closeModal" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors">
                                Batal
                            </button>
                            <button type="submit" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-md hover:from-blue-600 hover:to-blue-700 transition-all duration-200">
                                {{ $isEdit ? 'Update' : 'Simpan' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <!-- Delete Confirmation Modal -->
    @if ($confirmingDeletion)
        <div class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center">
            <div class="fixed inset-0 bg-black opacity-50" wire:click="cancelDelete"></div>
            
            <div class="relative bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
                <div class="p-6">
                    <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                    
                    <div class="text-center">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Konfirmasi Hapus</h3>
                        <p class="text-sm text-gray-500 mb-4">Apakah Anda yakin ingin menghapus announcement ini? Tindakan ini tidak dapat dibatalkan.</p>
                    </div>
                    
                    <div class="flex justify-center gap-3 mt-6">
                        <button wire:click="cancelDelete" 
                                class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-lg transition-colors duration-200">
                            Batal
                        </button>
                        <button wire:click="delete" 
                                class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-200">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>