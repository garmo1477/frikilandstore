<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class UploadImage
{
    public static function uploadPhoto(string $key, string $path): string{
        $fileName = self::generateFileName($key);
        // se guarda el archivo con su ruta y nombre
        request()->file($key)->storeAs($path, $fileName);
        return $fileName;
    }

    public static function removeFile(string $path, string $fileName)
    {
        Storage::delete(sprintf('%s/%s', $path, $fileName));
    }

    protected static function generateFileName(string $key): string{
        $extension = request()->file($key)->getClientOriginalExtension();
        return sprintf('%s-%s.%s', auth()->id(), now()->timestamp, $extension);
    }
}