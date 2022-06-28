<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        return view('livewire.footer', [
            'contact' => Contact::find(1)
        ]);
    }
}
