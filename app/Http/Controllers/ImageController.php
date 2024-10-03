<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ImageController extends Controller
{
    public function download(Request $request)
    {
        $imageUrl = $request->input('url');
        $imageContent = Http::get($imageUrl)->body();
        $imageName = basename($imageUrl);
        $localPath = storage_path('app/public/images/' . $imageName);
        file_put_contents($localPath, $imageContent);
        return response()->download($localPath);
    }
}

