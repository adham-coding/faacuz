<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ContactController extends Component
{
    use LivewireAlert;

    private $toastPattern = [
        'timerProgressBar' => true,
        'didOpen' => <<<JS
            toast => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        JS,
    ];

    public
        $address,
        $address_link,
        $email,
        $facebook,
        $form,
        $instagram,
        $location,
        $phone,
        $telegram,
        $youtube;

    private function createContact()
    {
        Contact::create([
            'address' => $this->address,
            'address_link' => $this->address_link,
            'email' => $this->email,
            'phone' => $this->phone,
            'location' => $this->location,
            'telegram' => $this->telegram,
            'youtube' => $this->youtube,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
        ]);

        $this->form = false;

        $this->alert(
            'success',
            'Contacts successfully created!',
            $this->toastPattern
        );
    }

    private function editContact()
    {
        $contact = Contact::find(1);

        $contact->update([
            'address' => $this->address,
            'address_link' => $this->address_link,
            'email' => $this->email,
            'phone' => $this->phone,
            'location' => $this->location,
            'telegram' => $this->telegram,
            'youtube' => $this->youtube,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
        ]);

        $this->form = false;

        $this->alert(
            'success',
            'Contacts successfully edited!',
            $this->toastPattern
        );
    }

    public function formSetter()
    {
        $this->validate([
            'address' => 'required',
            'address_link' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'telegram' => 'required',
            'youtube' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
        ]);

        $this->contactId ?
            $this->editContact() :
            $this->createContact();
    }

    public function openForm($id = null)
    {
        if ($id) {
            $contact = Contact::find($id);

            $this->address = $contact->address;
            $this->address_link = $contact->address_link;
            $this->email = $contact->email;
            $this->phone = $contact->phone;
            $this->location = $contact->location;
            $this->telegram = $contact->telegram;
            $this->youtube = $contact->youtube;
            $this->facebook = $contact->facebook;
            $this->instagram = $contact->instagram;
        }

        $this->contactId = $id;
        $this->form = true;
    }

    public function updatedForm()
    {
        if (!$this->form) $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.contact-controller', [
            'contact' => Contact::find(1),
        ]);
    }
}
