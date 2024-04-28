<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public static function storeImage(UploadedFile $image)
    {
        try {
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public', $imageName);
            return $imageName;
        } catch (\Exception $e) {
            throw new \Exception('Failed to store the image: ' . $e->getMessage());
        }
    }
}
