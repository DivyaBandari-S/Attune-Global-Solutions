<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;


class ProgressBar extends Component
{
    use WithFileUploads;

    public $image;

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:1024', // Adjust the validation rules as needed
        ]);
        $this->image = $this->image->store('images', 'public');
    }
    public function submitForm()
    {
        $this->image = $this->image->store('images', 'public');
    }
    public function render()
    {
        return view('livewire.progress-bar');
    }
}
