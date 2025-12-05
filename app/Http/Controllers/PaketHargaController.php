<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaketHargaRequest;
use App\Models\Paket;
use App\Models\PaketHarga;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PaketHargaController extends Controller
{
    public function index(Paket $paket)
    {
        return view('pages.paket.harga',compact('paket'));
    }

    public function store(PaketHargaRequest $request,Paket $paket)
    {
        try {
            $paket->paketHarga()->create($request->validated());

            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.paket.harga.index',$paket);
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function update(Request $request, PaketHarga $paket_harga)
    {
        try {
            $request->validate([
                'harga' => 'required|numeric|min:1'
            ]);

            $paket_harga->update([
                'harga' => $request->harga
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Harga berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function regenerate(Paket $paket)
    {
        try {
            DB::transaction(function () use ($paket) {
                $hargaPerPerson = $paket->harga_per_person ?? 0;
                $maxPerson = $paket->max_person ?? 1;
                
                if ($hargaPerPerson > 0 && $maxPerson > 0) {
                    // Ambil semua paket_harga yang sudah ada
                    $existingHarga = $paket->paketHarga()->get()->keyBy('min_person');
                    
                    // Update atau create harga dari 1 sampai max_person
                    for ($i = 1; $i <= $maxPerson; $i++) {
                        $keterangan = $i . ($i == 1 ? ' Participant' : ' Participants');
                        $harga = $hargaPerPerson * $i;
                        
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
                    
                    // Hapus harga yang melebihi max_person (hanya yang belum ada booking)
                    $paket->paketHarga()
                        ->where('min_person', '>', $maxPerson)
                        ->whereDoesntHave('bookings')
                        ->delete();
                }
            });

            alert()->success('Success','Harga berhasil di-regenerate! (Harga yang sudah digunakan oleh booking tidak diubah)');
            return redirect()->route('admin.paket.harga.index', $paket);
        } catch (\Exception $e) {
            alert()->error('Error','Gagal regenerate harga: ' . $e->getMessage());
            return back();
        }
    }

    public function destroy(PaketHarga $paket_harga)
    {
        try {
            $paket_harga->delete();
            return response()->json(["success" => 'Delete data berhasil.']);
        }catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }
}
