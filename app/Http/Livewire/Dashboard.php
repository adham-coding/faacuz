<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Dashboard extends Component
{
    public $modelName = 'category';
    public $locale;
    
    public function mount()
    {
        $this->locale = LaravelLocalization::getCurrentLocale();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
