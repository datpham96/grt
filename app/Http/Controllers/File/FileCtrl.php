<?php

namespace App\Http\Controllers\File;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage, Image;

class FileCtrl extends Controller
{
    function avatar(Request $request) {
        $data = $request->input('data', '');
        if (Storage::exists($data)) {
            $storagePath = \Storage::path($data);
        } else {
            $storagePath = public_path('/images/new-user-image-default.jpg');
        }

        return Image::make($storagePath)->response();
    }
}
