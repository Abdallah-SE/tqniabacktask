<?php
namespace App\Services;

use App\Contracts\ImageHandlerInterface;
use Illuminate\Http\UploadedFile;

class ImageHandlerService implements ImageHandlerInterface {
    public function upload(UploadedFile $uploadedFile, string $folderName) {
        $path = $uploadedFile->store($folderName, 'public');
        return $path;
    }
    
    public function get(string $path) {
        return url('storage/' . $path);

    }
}