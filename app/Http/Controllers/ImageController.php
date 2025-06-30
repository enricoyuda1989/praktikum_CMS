<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);  

        $imagePath = $request->file('image')->store('image','public');

        $image = Image::create([
            'title' => $request->title,
            'image_path' => $imagePath,
            'product_id' => $request->product_id,
        ]);

        return view('upload', ['image' => $image])->with('success', 'gambar berhasil diupload');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        
        Storage::disk('public')->delete($image->image_path);

        $image->delete();

        return back()->with('success', 'Gambar berhasil dihapus');
    }
}
