<?php

namespace App\Http\Controllers;

use App\Http\Requests\KonfigurasiRequest;
use App\Models\Konfigurasi;

class KonfigurasiController extends Controller
{
    public function index()
    {
        $konfigurasi = Konfigurasi::query()->first();
        return view('pages.konfigurasi.index',compact('konfigurasi'));
    }

    public function store(KonfigurasiRequest $request)
    {
        try {
            $konfigurasi = Konfigurasi::query()->first();
            Konfigurasi::query()->updateOrCreate(["id"=>$konfigurasi->id??null],$request->validated());
            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.konfigurasi.index');
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

}
