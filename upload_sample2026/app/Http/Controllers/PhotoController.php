<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\File;

class PhotoController extends Controller
{
    public function create()
    {
        $photos = Photo::latest()->paginate(12);
        return view('upload', compact('photos'));
    }

    public function storeSingle(Request $request)
    {
        // 1. Validate: Only images and check database for duplicate filename
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $image = $request->file('image');
        $originalName = $image->getClientOriginalName();

        // 2. Prevent Duplicate: Check if a photo with this name already exists
        if (Photo::where('image', 'LIKE', '%' . $originalName)->exists()) {
            return back()->with('error', 'Asset already exists in the archive.');
        }

        $name = time().'_'.$originalName;
        $image->move(public_path('images'), $name);

        Photo::create(['image' => $name]);

        return back()->with('success', 'Single image uploaded successfully!');
    }

    public function storeMultiple(Request $request)
    {
        // 1. Validate: Each item in the array must be an image
        $request->validate([
            'images.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $uploadedCount = 0;
        $duplicateCount = 0;

        foreach ($request->file('images') as $image) {
            $originalName = $image->getClientOriginalName();

            // 2. Duplicate Check per file
            if (Photo::where('image', 'LIKE', '%' . $originalName)->exists()) {
                $duplicateCount++;
                continue; // Skip this file and move to the next
            }

            $name = time().'_'.$originalName;
            $image->move(public_path('images'), $name);
            Photo::create(['image' => $name]);
            $uploadedCount++;
        }

        if ($uploadedCount === 0 && $duplicateCount > 0) {
            return back()->with('error', 'All selected files already exist in the archive.');
        }

        return back()->with('success', "Batch processed: $uploadedCount added, $duplicateCount duplicates skipped.");
    }

    public function destroy(Photo $photo)
    {
        $filePath = public_path('images/' . $photo->image);

        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        $photo->delete();

        return back()->with('success', 'Asset successfully purged from archive.');
    }


    public function destroyAll()
{
    // 1. Path to the images folder
    $directory = public_path('images');

    // 2. Delete all files in the directory (keeping the folder itself)
    if (File::exists($directory)) {
        File::cleanDirectory($directory);
    }

    // 3. Wipe all records from the database
    Photo::truncate();

    return back()->with('success', 'Archive cleared. All assets have been purged.');
}
}