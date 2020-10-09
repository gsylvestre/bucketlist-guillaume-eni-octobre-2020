<?php

namespace App\Uploader;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Uploader
{
    public function upload(UploadedFile $uploadedFile, string $uploadDirectory)
    {
        $newFilename = uniqid() . "." . $uploadedFile->guessExtension();

        try {
            $uploadedFile->move($uploadDirectory, $newFilename);
        } catch (FileException $e) {
            dd($e->getMessage());
        }

        return $newFilename;
    }
}