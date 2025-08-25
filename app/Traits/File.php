<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait File
{

    /**
     * @param UploadedFile $file
     * @param string $folder
     * @param null $filename
     * @param string $disk
     *
     * @return $file
     */
    public function upload(UploadedFile $file, $folder, $filename = null, $disk = 'public')
    {
        $filename = $filename ??  Str::uuid().'.'.$file->getClientOriginalExtension();

        return $file->storeAs(
            $folder,
            $filename,
            $disk
        );
    }


    /**
     * @param mixed $path
     * @param string $disk
     *
     * @return boolean
     */
    public function delete($path, $disk = 'public')
    {
        Storage::disk($disk)->delete($path);
    }


    /**
     * @param mixed $oldPath
     * @param mixed $newPath
     * @param string $disk
     *
     * @return boolean
     */
    public function move($oldPath, $newPath, $disk = 'public')
    {
        return Storage::disk($disk)->move($oldPath, $newPath);
    }
}
