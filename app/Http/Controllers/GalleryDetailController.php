<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryDetailRequest;
use App\Models\Gallery;
use App\Models\GalleryDetail;
use App\Models\Image;


class GalleryDetailController extends Controller
{
    public function index(Gallery $gallery)
    {
        $images = Image::query()->with('media')->get();
        return view('pages.gallery.images',compact('images','gallery'));
    }

    public function store(GalleryDetailRequest $request,Gallery $gallery)
    {
        try {
            $gallery->galleryDetails()->create($request->validated());

            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.gallery.image.index',$gallery);
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(GalleryDetail $galleryDetail)
    {
        try {
            $galleryDetail->delete();
            return response()->json(["success" => 'Delete data berhasil.']);
        }catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }



}
