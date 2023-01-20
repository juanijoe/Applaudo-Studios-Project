<?php

namespace App\Services;

use App\Http\Resources\FileResource;
use App\Models\File;

class RegisterFile
{
    public function persist($file)
    {
        $fileModel = new File;

        if ($file) {
            $fileName = $file->getClientOriginalName();
            $fileNameDb = time() . $fileName;
            $filePath = $file->storeAs('public/uploads', $fileNameDb);
            $fileModel->name = time() . '_' . $file->getClientOriginalName();
            $realPath = $fileModel->file_path = '/storage/app/' . $filePath;
            $fileExt = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();
            $fileModel->save();

            $file_stored = json_encode([
                'name' => $fileName,
                'path' => $realPath,
                'extension' => $fileExt,
                'size' => $fileSize
            ]);
            return json_decode($file_stored);
        }
        return response([
            'empty or null file'
        ]);
    }
}
