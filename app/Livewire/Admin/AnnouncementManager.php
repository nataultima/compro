<?php

namespace App\Livewire\Admin;

use App\Models\Announcement;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class AnnouncementManager extends Component
{
    use WithFileUploads, WithPagination;

    public $title;
    public $description;
    public $type = 'text';
    public $image;
    public $link;
    public $button_text;
    public $background_color = '#3B82F6';
    public $is_active = true;
    public $order = 0;
    public $start_date;
    public $end_date;
    public $announcementId;
    public $search = '';
    public $showModal = false;
    public $isEdit = false;
    public $currentImage;
    public $confirmingDeletion = false;
    public $announcementToDelete = null;

    protected $listeners = ['deleteConfirmed' => 'delete'];

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'type' => 'required|in:text,image',
            'image' => $this->type === 'image' ? 'required|image|max:2048' : 'nullable|image|max:2048',
            'link' => 'nullable|url|max:500',
            'button_text' => 'nullable|string|max:100',
            'background_color' => 'required|string|max:7',
            'is_active' => 'boolean',
            'order' => 'required|integer|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedType()
    {
        // Reset image validation when type changes
        $this->resetValidation('image');
    }

    public function render()
    {
        $announcements = Announcement::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->ordered()
            ->paginate(10);

        return view('livewire.admin.announcement-manager', [
            'announcements' => $announcements
        ]);
    }

    public function openModal()
    {
        $this->resetForm();
        $this->showModal = true;
        $this->isEdit = false;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);
        $this->announcementId = $announcement->id;
        $this->title = $announcement->title;
        $this->description = $announcement->description;
        $this->type = $announcement->type;
        $this->link = $announcement->link;
        $this->button_text = $announcement->button_text;
        $this->background_color = $announcement->background_color;
        $this->order = $announcement->order;
        $this->is_active = $announcement->is_active;
        $this->start_date = $announcement->start_date?->format('Y-m-d\TH:i');
        $this->end_date = $announcement->end_date?->format('Y-m-d\TH:i');
        $this->currentImage = $announcement->image;
        $this->isEdit = true;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        try {
            $data = [
                'title' => $this->title,
                'description' => $this->description,
                'type' => $this->type,
                'link' => $this->link,
                'button_text' => $this->button_text,
                'background_color' => $this->background_color,
                'order' => $this->order,
                'is_active' => $this->is_active,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
            ];

            if ($this->image) {
                // Delete old image if exists
                if ($this->isEdit && $this->currentImage) {
                    Storage::disk('public')->delete($this->currentImage);
                }
                
                $data['image'] = $this->image->store('announcements', 'public');
            }

            if ($this->isEdit) {
                $announcement = Announcement::findOrFail($this->announcementId);
                $announcement->update($data);
                session()->flash('message', 'Announcement berhasil diupdate.');
            } else {
                Announcement::create($data);
                session()->flash('message', 'Announcement berhasil ditambahkan.');
            }

            $this->closeModal();
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function confirmDelete($id)
    {
        $this->announcementToDelete = $id;
        $this->confirmingDeletion = true;
    }

    public function cancelDelete()
    {
        $this->confirmingDeletion = false;
        $this->announcementToDelete = null;
    }

    public function delete()
    {
        try {
            $announcement = Announcement::findOrFail($this->announcementToDelete);
            
            // Delete image if exists
            if ($announcement->image) {
                Storage::disk('public')->delete($announcement->image);
            }
            
            $announcement->delete();
            session()->flash('message', 'Announcement berhasil dihapus.');
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        $this->confirmingDeletion = false;
        $this->announcementToDelete = null;
    }

    public function toggleStatus($id)
    {
        try {
            $announcement = Announcement::findOrFail($id);
            $announcement->update(['is_active' => !$announcement->is_active]);
            session()->flash('message', 'Status announcement berhasil diubah.');
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->reset([
            'title', 'description', 'type', 'image', 'link', 'button_text',
            'background_color', 'order', 'is_active', 'start_date', 'end_date',
            'announcementId', 'currentImage', 'isEdit'
        ]);
        $this->type = 'text';
        $this->background_color = '#3B82F6';
        $this->order = 0;
        $this->is_active = true;
        $this->resetValidation();
    }
}