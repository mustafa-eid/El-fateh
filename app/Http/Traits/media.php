<?php 

namespace App\Http\traits;

trait media
{
    public function upload_image($image, $folder) {
        $photoName = uniqid() . '.' . $image->extension();
        $image->move(public_path('/dist/img/' . $folder), $photoName);
        return $photoName;
    }

    public function delete_image($image_path) {
        if (file_exists($image_path)) {
            unlink($image_path);
            return true;
        }
        return false;
    }
}