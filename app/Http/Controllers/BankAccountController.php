<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountRequest;
use App\Models\BankAccount;
use Yajra\DataTables\DataTables;

class BankAccountController extends Controller
{
    public function data(DataTables $dataTables)
    {
        $data = BankAccount::query()
            ->latest();

        return $dataTables->eloquent($data)
            ->addColumn("isActive",fn($data)=> $data->is_active ? "Ya" : "Tidak")
            ->addColumn('action',function ($data){
                $edit = "<a href='".route('admin.bank.edit',$data->id)."' class='text-success' title='Edit Data'><i class='bx bxs-edit bx-sm'></i></a>";
                $delete = "<a href='javascript:;' class='text-danger' onclick='fn_deleteData(".'"'.route('admin.bank.destroy',$data->id).'"'.")' title='Hapus Data'><i class='bx bxs-trash bx-sm'></i></a>";

                return $edit.'  '.$delete;
            })
            ->rawColumns(['action','answer'])
            ->toJson();
    }

    public function index()
    {
        return view('pages.bank.index');
    }

    public function create()
    {
        return view('pages.bank.create');
    }

    public function store(BankAccountRequest $request)
    {
        try {
            BankAccount::create($request->validated());

            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.bank.index');
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function edit(BankAccount $bank)
    {
        return view('pages.bank.create',compact('bank'));
    }

    public function update(BankAccountRequest $request,BankAccount $bank)
    {
        try {

            $bank->update($request->validated());
            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.bank.index');
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(BankAccount $bank)
    {
        try {

            $bank->delete();
            return response()->json(["success" => 'Delete data berhasil.']);
        }catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }



}
