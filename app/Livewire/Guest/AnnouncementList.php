<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Announcement;

class AnnouncementList extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedAnnouncementId;
    protected $queryString = [
        'search' => ['except' => ''],
        'announcement' => ['except' => null],
    ];

    public function mount()
    {
        // Set pengumuman pertama sebagai featured secara default atau dari query string
        $announcementId = request()->get('announcement');
        
        if ($announcementId) {
            $this->selectedAnnouncementId = $announcementId;
        } else {
            $firstAnnouncement = Announcement::query()
                ->where('is_active', true)
                ->orderBy('order', 'asc')
                ->orderBy('created_at', 'desc')
                ->first();
            
            $this->selectedAnnouncementId = $firstAnnouncement?->id;
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function selectAnnouncement($announcementId)
    {
        $this->selectedAnnouncementId = $announcementId;
        
        // Update URL without page refresh
        $this->dispatch('update-url', url()->current() . '?announcement=' . $announcementId);
        
        // Dispatch event untuk scroll ke atas pada mobile (dibuat di JavaScript)
        $this->dispatch('scroll-to-top');
    }

    public function render()
    {
        $query = Announcement::query()
            ->where('is_active', true);

        // Apply search filter
        if ($this->search) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Get paginated announcements
        $allAnnouncements = $query
            ->orderBy('order', 'asc')
            ->orderBy('start_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Get featured (selected) announcement
        $featured = Announcement::find($this->selectedAnnouncementId);
        
        // If no announcement selected or not found, use first from paginated results
        if (!$featured && $allAnnouncements->isNotEmpty()) {
            $featured = $allAnnouncements->first();
            $this->selectedAnnouncementId = $featured->id;
        }

        return view('livewire.guest.announcement-list', [
            'allAnnouncements' => $allAnnouncements,
            'featured' => $featured,
        ]);
    }
}