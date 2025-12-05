<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Yajra\DataTables\DataTables;

class FaqController extends Controller
{
    public function data(DataTables $dataTables)
    {
        $data = Faq::query()
            ->latest();

        return $dataTables->eloquent($data)

            ->addColumn('action',function ($data){
                $edit = "<a href='".route('admin.faq.edit',$data->id)."' class='text-success' title='Edit Data'><i class='bx bxs-edit bx-sm'></i></a>";
                $delete = "<a href='javascript:;' class='text-danger' onclick='fn_deleteData(".'"'.route('admin.faq.destroy',$data->id).'"'.")' title='Hapus Data'><i class='bx bxs-trash bx-sm'></i></a>";

                return $edit.'  '.$delete;
            })
            ->rawColumns(['action','answer'])
            ->toJson();
    }

    public function index()
    {
        return view('pages.faq.index');
    }

    public function create()
    {
        return view('pages.faq.create');
    }

    public function store(FaqRequest $request)
    {
        try {
            Faq::create($request->validated());

            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.faq.index');
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function edit(Faq $faq)
    {
        return view('pages.faq.create',compact('faq'));
    }

    public function update(FaqRequest $request,Faq $faq)
    {
        try {

            $faq->update($request->validated());
            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.faq.index');
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(Faq $faq)
    {
        try {

            $faq->delete();
            return response()->json(["success" => 'Delete data berhasil.']);
        }catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }



}
