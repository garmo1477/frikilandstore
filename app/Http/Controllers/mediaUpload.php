<?php

namespace App\Http\Controllers;

use App\File;

use Illuminate\Http\Request;

class mediaUpload extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('file');

        File::create([
            'file_name' => $file->getClientOriginalName(),
            'file_size' => $file->getSize(),
            'file_type' => $file->getMimeType(),
            'file_path' => $file->store('media'),
        ]);
    }
}