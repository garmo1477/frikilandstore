<?php

namespace App\Http\Livewire;

use App\File;
use Livewire\Component;

class UploadImages extends Component
{
    protected $listeners = ['mediaUploaded' => '$refresh'];
    public function render()
    {
        /* Recuperar las imagenes de S3 desde la base de datos */
        $files = File::all();
        return view('livewire.upload-images', compact('files'));
    }
}
