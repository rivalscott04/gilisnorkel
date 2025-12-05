<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaketRequest;
use App\Models\Image;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PaketController extends Controller
{
    public function data(DataTables $dataTables)
    {
        $data = Paket::query()
            ->withCount(['paketJam'])
            ->latest();

        return $dataTables->eloquent($data)
            ->addColumn("isActive",fn($data)=> $data->is_active ? "Ya" : "Tidak")
            ->addColumn('max_person',function ($data){
                return $data->max_person ?? '-';
            })
            ->addColumn('harga_per_person',function ($data){
                return 'Rp ' . number_format($data->harga_per_person ?? 0);
            })
            ->addColumn('jam',function ($data){
                return "<a href='".route('admin.paket.jam.index',$data->id)."' class='text-warning fw-bold w-100' title='Tambah Jam'>".
                    ($data->paket_jam_count)
                    ." <i class='bx bx-plus-circle bx-sm ms-3'></i></a>";

            })
            ->addColumn('action',function ($data){
                $edit = "<a href='".route('admin.paket.edit',$data->id)."' class='text-success' title='Edit Data'><i class='bx bxs-edit bx-sm'></i></a>";
                $delete = "<a href='javascript:;' class='text-danger' onclick='fn_deleteData(".'"'.route('admin.paket.destroy',$data->id).'"'.")' title='Hapus Data'><i class='bx bxs-trash bx-sm'></i></a>";

                return $edit.'  '.$delete;
            })
            ->rawColumns(['action','jam'])
            ->toJson();
    }

    public function index()
    {
        return view('pages.paket.index');
    }

    public function create()
    {
        $images = Image::query()->with('media')->get();
        return view('pages.paket.create',compact('images'));
    }

    public function store(PaketRequest $request)
    {
        try {
            DB::transaction(function () use ($request){
                $paket =  Paket::create(Arr::except($request->validated(),'images'));
                $paket->images()->attach($request->images);

                // Auto-generate harga dari 1 sampai max_person
                $hargaPerPerson = (int) str_replace(",","",$request->harga_per_person);
                $maxPerson = $paket->max_person;
                
                for ($i = 1; $i <= $maxPerson; $i++) {
                    $paket->paketHarga()->create([
                        'keterangan' => $i . ($i == 1 ? ' Participant' : ' Participants'),
                        'harga' => $hargaPerPerson * $i,
                        'min_person' => $i,
                        'max_person' => $i,
                    ]);
                }
            });

            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.paket.index');
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function edit(Paket $paket)
    {
        $paket->load('images');
        $images = Image::query()->with('media')->get();
        return view('pages.paket.create',compact('paket','images'));
    }

    public function update(PaketRequest $request,Paket $paket)
    {
        try {
            DB::transaction(function () use ($paket,$request){
                $oldMaxPerson = $paket->max_person;
                $oldHargaPerPerson = $paket->harga_per_person;
                
                $paket->update(Arr::except($request->validated(),'images'));
                $paket->images()->sync($request->images);
                
                $newMaxPerson = $paket->max_person;
                $newHargaPerPerson = (int) str_replace(",","",$request->harga_per_person);
                
                // Jika max_person atau harga_per_person berubah, update/regenerate harga
                if ($oldMaxPerson != $newMaxPerson || $oldHargaPerPerson != $newHargaPerPerson) {
                    // Ambil semua paket_harga yang sudah ada
                    $existingHarga = $paket->paketHarga()->get()->keyBy('min_person');
                    
                    // Update atau create harga dari 1 sampai max_person
                    for ($i = 1; $i <= $newMaxPerson; $i++) {
                        $keterangan = $i . ($i == 1 ? ' Participant' : ' Participants');
                        $harga = $newHargaPerPerson * $i;
                        
                        if (isset($existingHarga[$i])) {
                            // Update harga yang sudah ada (jika belum ada booking yang pakai)
                            $existingItem = $existingHarga[$i];
                            $hasBookings = \App\Models\Booking::where('paket_harga_id', $existingItem->id)->exists();
                            
                            if (!$hasBookings) {
                                // Bisa update karena belum ada booking
                                $existingItem->update([
                                    'keterangan' => $keterangan,
                                    'harga' => $harga,
                                    'min_person' => $i,
                                    'max_person' => $i,
                                ]);
                            }
                            // Jika sudah ada booking, skip update (biarkan harga lama)
                        } else {
                            // Create harga baru yang belum ada
                            $paket->paketHarga()->create([
                                'keterangan' => $keterangan,
                                'harga' => $harga,
                                'min_person' => $i,
                                'max_person' => $i,
                            ]);
                        }
                    }
                    
                    // Hapus harga yang melebihi max_person baru (hanya yang belum ada booking)
                    if ($newMaxPerson < $oldMaxPerson) {
                        $paket->paketHarga()
                            ->where('min_person', '>', $newMaxPerson)
                            ->whereDoesntHave('bookings')
                            ->delete();
                    }
                }
            });

            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.paket.index');
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(Paket $paket)
    {
        try {

            $paket->delete();
            return response()->json(["success" => 'Delete data berhasil.']);
        }catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }



}
