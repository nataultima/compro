<div x-data="{
    isModalOpen: false,
    showDeleteModal: false,
    deleteId: null,
    selectedMessage: @entangle('selectedMessage'),
    
    openModal() {
        this.isModalOpen = true;
    },
    
    closeModal() {
        this.isModalOpen = false;
        this.selectedMessage = null;
        $wire.call('closeModal');
    },
    
    confirmDelete(id) {
        this.deleteId = id;
        this.showDeleteModal = true;
    },
    
    deleteConfirmed() {
        this.showDeleteModal = false;
        $wire.call('deleteMessage', this.deleteId);
    },
    
    viewMessage(id) {
        $wire.call('viewMessage', id).then(() => {
            this.openModal();
        });
    }
}" 
@open-modal.window="isModalOpen = true"
@close-modal.window="isModalOpen = false"
class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Contact Messages</h1>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola semua pesan yang masuk dari form kontak</p>
        </div>
    </div>

    <!-- Flash Messages -->
    @if (session()->has('success'))
        <div class="rounded-lg bg-green-50 p-4 dark:bg-green-900/20 border border-green-200 dark:border-green-800">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800 dark:text-green-200">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    <!-- Filters -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-4 space-y-4">
        <div class="grid gap-4 md:grid-cols-3">
            <div class="relative">
                <input 
                    type="text" 
                    wire:model.live.debounce.300ms="search" 
                    placeholder="Cari pesan..."
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            
            <select 
                wire:model.live="perPage" 
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="10">10 per halaman</option>
                <option value="25">25 per halaman</option>
                <option value="50">50 per halaman</option>
                <option value="100">100 per halaman</option>
            </select>

            <div class="flex items-center gap-2">
                <button 
                    wire:click="$refresh" 
                    class="inline-flex items-center gap-2 px-4 py-2 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Refresh
                </button>
            </div>
        </div>
    </div>

    <!-- Messages Table -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            Tanggal
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            Nama
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            Telepon
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            Pesan
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($messages as $message)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 dark:text-white">{{ $message->created_at->format('d M Y') }}</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">{{ $message->created_at->format('H:i') }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-semibold text-gray-900 dark:text-white">{{ $message->name }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="mailto:{{ $message->email }}" class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">
                                    {{ $message->email }}
                                </a>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($message->phone)
                                    <a href="tel:{{ $message->phone }}" class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">
                                        {{ $message->phone }}
                                    </a>
                                @else
                                    <span class="text-sm text-gray-400 dark:text-gray-500">-</span>
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900 dark:text-gray-300 max-w-xs truncate">
                                    {{ $message->message }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-2">

                                    <button 
                                        @click="confirmDelete({{ $message->id }})" 
                                        class="inline-flex items-center justify-center w-8 h-8 text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="flex flex-col items-center justify-center py-12">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <div class="mt-4 text-center">
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                                            @if($search)
                                                Tidak ada pesan ditemukan
                                            @else
                                                Belum ada pesan masuk
                                            @endif
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                            @if($search)
                                                Coba dengan kata kunci lain
                                            @else
                                                Pesan dari form kontak akan muncul di sini
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
            {{ $messages->links() }}
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div x-show="showDeleteModal" 
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto"
         style="display: none;"
         @keydown.escape.window="showDeleteModal = false">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-gradient-to-br from-red-900/40 to-gray-900/60 backdrop-blur-sm" @click="showDeleteModal = false"></div>
            
            <div class="relative bg-white dark:bg-gray-800 rounded-2xl max-w-md w-full p-6 z-10 shadow-2xl border border-gray-200 dark:border-gray-700"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95">
                
                <!-- Icon -->
                <div class="flex items-center justify-center w-16 h-16 mx-auto bg-gradient-to-br from-red-100 to-red-50 dark:from-red-900/30 dark:to-red-900/10 rounded-2xl mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                
                <!-- Content -->
                <div class="text-center mb-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Hapus Pesan?</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                        Apakah Anda yakin ingin menghapus pesan ini? 
                        <span class="font-semibold text-red-600 dark:text-red-400">Tindakan ini tidak dapat dibatalkan</span>.
                    </p>
                </div>
                
                <!-- Actions -->
                <div class="flex gap-3">
                    <button type="button" 
                            @click="showDeleteModal = false" 
                            class="flex-1 px-4 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 transition-all font-medium shadow-sm">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Batal
                        </span>
                    </button>
                    <button type="button" 
                            @click="deleteConfirmed()" 
                            class="flex-1 px-4 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-xl transition-all font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Ya, Hapus
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>