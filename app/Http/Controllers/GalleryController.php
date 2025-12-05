<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use Yajra\DataTables\DataTables;

class GalleryController extends Controller
{
    public function data(DataTables $dataTables)
    {
        $data = Gallery::query()
            ->withCount('images')
            ->latest();

        return $dataTables->eloquent($data)
            ->addColumn('image_count',function ($data){
                return "<a href='".route('admin.gallery.image.index',$data->id)."' class='text-logo-green fw-bold w-100' title='Tambah Harga'>".
                    ($data->images_count)
                    ." <i class='bx bx-plus-circle bx-sm ms-3'></i></a>";

            })
            ->addColumn('action',function ($data){
                $edit = "<a href='".route('admin.gallery.edit',$data->id)."' class='text-success' title='Edit Data'><i class='bx bxs-edit bx-sm'></i></a>";
                $delete = "<a href='javascript:;' class='text-danger' onclick='fn_deleteData(".'"'.route('admin.gallery.destroy',$data->id).'"'.")' title='Hapus Data'><i class='bx bxs-trash bx-sm'></i></a>";

                return $edit.'  '.$delete;
            })
            ->rawColumns(['action','image_count'])
            ->toJson();
    }

    public function index()
    {
        return view('pages.gallery.index');
    }

    public function create()
    {

        return view('pages.gallery.create');
    }

    public function store(GalleryRequest $request)
    {
        try {
            Gallery::create($request->validated());

            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.gallery.index');
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function edit(Gallery $gallery)
    {

        return view('pages.gallery.create',compact('gallery'));
    }

    public function update(GalleryRequest $request,Gallery $gallery)
    {
        try {
            $gallery->update($request->validated());
            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.gallery.index');
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(Gallery $gallery)
    {
        try {

            $gallery->delete();
            return response()->json(["success" => 'Delete data berhasil.']);
        }catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }



}
