<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class UploadService
{
    public function uploadImage(UploadedFile $file, string $folder):string {
         $path = $file->storeAs($folder,$file->hashName(),'upload');
//        $path = $file->storeAs(
//            $folder,
//            md5($file->getClientOriginalName()).$file->getClientOriginalExtension(),
//            'upload');

        if (!$path) {
             throw new UploadException('Can not upload file');
         }
         return $path;
    }
}
