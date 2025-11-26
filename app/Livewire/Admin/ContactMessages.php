<?php

namespace App\Livewire\Admin;

use App\Models\ContactMessage;
use Livewire\Component;
use Livewire\WithPagination;

class ContactMessages extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $selectedMessage = null;
    public $showModal = false;
    public $confirmingDeletion = false;
    public $messageToDelete = null;

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function viewMessage($id)
    {
        $this->selectedMessage = ContactMessage::findOrFail($id);
        $this->showModal = true;
        
        // Return the message data for Alpine.js
        return $this->selectedMessage;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedMessage = null;
    }

    public function confirmDelete($id)
    {
        $this->messageToDelete = $id;
        $this->confirmingDeletion = true;
    }

    public function deleteMessage($id = null)
    {
        $messageId = $id ?: $this->messageToDelete;
        
        if ($messageId) {
            ContactMessage::findOrFail($messageId)->delete();
            
            $this->confirmingDeletion = false;
            $this->messageToDelete = null;
            
            // Close detail modal if it's open
            if ($this->showModal && $this->selectedMessage && $this->selectedMessage->id == $messageId) {
                $this->closeModal();
            }
            
            session()->flash('success', 'Pesan berhasil dihapus.');
        }
    }

    public function cancelDelete()
    {
        $this->confirmingDeletion = false;
        $this->messageToDelete = null;
    }

    public function render()
    {
        $messages = ContactMessage::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('phone', 'like', '%' . $this->search . '%')
                      ->orWhere('message', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.admin.contact-messages', [
            'messages' => $messages
        ]);
    }
}