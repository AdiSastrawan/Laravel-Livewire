<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;


class ContactIndex extends Component
{
    use WithPagination;
    public $paginate = 5;
    public $search;
    public $statusUpdate = false;
    protected $listeners = [
        'contactStored' => 'handleStored',
        'contactUpdated' => 'handleUpdated',
    ];
    protected $updatesQueryString = ['search'];
    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }
    public function render()
    {


        return view('livewire.contact-index', ['data' => $this->search === null ? Contact::latest()->paginate($this->paginate) : Contact::where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate)]);
    }
    public function getContact($id)
    {
        $this->statusUpdate = true;
        $contact = Contact::find($id);
        $this->emit('getContact', $contact);
    }
    public function handleStored($contacts)
    {

        session()->flash('message', 'Contact ' . $contacts['name'] . ' has been stored');
    }
    public function handleUpdated()
    {
        session()->flash('message', 'Contact   has been updated');
    }
    public function deleteContact($id)
    {
        session()->flash('message', 'Contact has been deleted');

        Contact::find($id)->delete();
    }
}
