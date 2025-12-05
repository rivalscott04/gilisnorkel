<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ImagesController extends Controller
{
    public function data(DataTables $dataTables)
    {
        $data = Image::query()
            ->with('media')
            ->latest();

        return $dataTables->eloquent($data)
            ->addColumn('link', function ($data){
                return "<a href='".$data->getFirstMediaUrl()."' class='text-success' title='Lihat Image' target='_blank'><img src='{$data->getFirstMediaUrl()}' alt='' width='100' height='70'></a>";
            })
            ->addColumn('action',function ($data){
                $edit = "<a href='".route('admin.images.edit',$data->id)."' class='text-success' title='Edit Data'><i class='bx bxs-edit bx-sm'></i></a>";
                $delete = "<a href='javascript:;' class='text-danger' onclick='fn_deleteData(".'"'.route('admin.images.destroy',$data->id).'"'.")' title='Hapus Data'><i class='bx bxs-trash bx-sm'></i></a>";

                return $edit.'  '.$delete;
            })
            ->rawColumns(['action','link'])
            ->toJson();
    }

    public function index()
    {
        return view('pages.images.index');
    }

    public function create()
    {
        return view('pages.images.create');
    }

    public function store(ImageRequest $request)
    {
        try {
            DB::transaction(function () use ($request){
                $image = Image::create(Arr::except($request->validated(),'file_image'));
                if($request->hasFile('file_image'))
                    $image->addMediaFromRequest('file_image')->toMediaCollection();
            });


            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.images.index');
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function edit(Image $image)
    {
        return view('pages.images.create',compact('image'));
    }

    public function update(ImageRequest $request,Image $image)
    {
        try {
            DB::transaction(function () use ($request,$image){
                $image->update(Arr::except($request->validated(),'file_image'));
                if($request->hasFile('file_image')){
                    $image->getFirstMedia()?->delete();
                    $image->addMediaFromRequest('file_image')->toMediaCollection();
                }

            });

            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.images.index');
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function destroy(Image $image)
    {
        try {

            $image->delete();
            return response()->json(["success" => 'Delete data berhasil.']);
        }catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }
}
