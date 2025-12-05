<?php

namespace App\Http\Controllers;

use App\Http\Requests\JamRequest;
use App\Models\Jam;
use Yajra\DataTables\DataTables;

class JamController extends Controller
{
    public function data(DataTables $dataTables)
    {
        $data = Jam::query()
            ->latest();

        return $dataTables->eloquent($data)
            ->addColumn("isActive",fn($data)=> $data->is_active ? "Ya" : "Tidak")
            ->addColumn('action',function ($data){
                $edit = "<a href='".route('admin.jam.edit',$data->id)."' class='text-success' title='Edit Data'><i class='bx bxs-edit bx-sm'></i></a>";
                $delete = "<a href='javascript:;' class='text-danger' onclick='fn_deleteData(".'"'.route('admin.jam.destroy',$data->id).'"'.")' title='Hapus Data'><i class='bx bxs-trash bx-sm'></i></a>";

                return $edit.'  '.$delete;
            })
            ->rawColumns(['action','answer'])
            ->toJson();
    }

    public function index()
    {
        return view('pages.jam.index');
    }

    public function create()
    {
        return view('pages.jam.create');
    }

    public function store(JamRequest $request)
    {
        try {
            Jam::create($request->validated());

            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.jam.index');
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function edit(Jam $jam)
    {
        return view('pages.jam.create',compact('jam'));
    }

    public function update(JamRequest $request,Jam $jam)
    {
        try {

            $jam->update($request->validated());
            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.jam.index');
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(Jam $jam)
    {
        try {

            $jam->delete();
            return response()->json(["success" => 'Delete data berhasil.']);
        }catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }



}
