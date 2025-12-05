<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaketJamRequest;
use App\Models\Jam;
use App\Models\Paket;
use App\Models\PaketJam;

class PaketJamController extends Controller
{
    public function index(Paket $paket)
    {
        $paket->load(['paketJam.jam']);
        $jam = Jam::all();
        return view('pages.paket.jam',compact('paket','jam'));
    }

    public function store(PaketJamRequest $request,Paket $paket)
    {
        try {
            $paket->paketJam()->create($request->validated());

            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.paket.jam.index',$paket);
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(PaketJam $paket_jam)
    {
        try {
            $paket_jam->delete();
            return response()->json(["success" => 'Delete data berhasil.']);
        }catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }
}
