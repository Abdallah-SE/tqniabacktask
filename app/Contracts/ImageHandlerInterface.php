<?php
namespace App\Contracts;

use Illuminate\Http\UploadedFile;

interface ImageHandlerInterface {
    public function upload(UploadedFile $uploadedFile,string $folderName);
    public function get(string $path);
}