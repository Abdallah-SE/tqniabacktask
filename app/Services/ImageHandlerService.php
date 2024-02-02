<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Contracts\ImageHandlerInterface;

class ImageHandlerService implements ImageHandlerInterface
{
    public function upload(?UploadedFile $uploadedFile, ?string $folderName)
    {
        if (!isset($uploadedFile)) {
            return;
        }
        $path = $uploadedFile->store($folderName, 'public');
        return $path;
    }

    public function get(?string $path)
    {
        $defaultImagePath = 'default/default.jpg';

        if (!$path || !Storage::disk('public')->exists($path)) {
            return url('storage/' . $defaultImagePath);
        }
        return url('storage/' . $path);
    }
}
