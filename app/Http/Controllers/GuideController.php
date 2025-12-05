<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuideRequest;
use App\Models\Guide;
use App\Models\Image;
use Yajra\DataTables\DataTables;

class GuideController extends Controller
{
    public function data(DataTables $dataTables)
    {
        $data = Guide::query()
            ->latest();

        return $dataTables->eloquent($data)

            ->addColumn('action',function ($data){
                $edit = "<a href='".route('admin.guide.edit',$data->id)."' class='text-success' title='Edit Data'><i class='bx bxs-edit bx-sm'></i></a>";
                $delete = "<a href='javascript:;' class='text-danger' onclick='fn_deleteData(".'"'.route('admin.guide.destroy',$data->id).'"'.")' title='Hapus Data'><i class='bx bxs-trash bx-sm'></i></a>";

                return $edit.'  '.$delete;
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function index()
    {
        return view('pages.guide.index');
    }

    public function create()
    {
        $images = Image::all();
        return view('pages.guide.create',compact('images'));
    }

    public function store(GuideRequest $request)
    {
        try {
            Guide::create($request->validated());

            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.guide.index');
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function edit(Guide $guide)
    {
        $images = Image::all();
        return view('pages.guide.create',compact('images','guide'));
    }

    public function update(GuideRequest $request,Guide $guide)
    {
        try {

            $guide->update($request->validated());
            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.guide.index');
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(Guide $guide)
    {
        try {

            $guide->delete();
            return response()->json(["success" => 'Delete data berhasil.']);
        }catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }



}
