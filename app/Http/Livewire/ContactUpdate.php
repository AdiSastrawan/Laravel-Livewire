<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactUpdate extends Component
{
    public $name;
    public $phone;
    public $contactId;
    protected $listeners = [
        'getContact' => 'showContact',
    ];
    public function render()
    {
        return view('livewire.contact-update');
    }
    public function showContact($contact)
    {
        $this->name = $contact['name'];
        $this->phone = $contact['phone'];
        $this->contactId = $contact['id'];
    }
    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'phone' => 'required|max:15',
        ]);
        Contact::find($this->contactId)->update(["name" => $this->name, "phone" => $this->phone]);
        $this->emit('contactUpdated');
        $this->resetInput();
    }
    private function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }
}
