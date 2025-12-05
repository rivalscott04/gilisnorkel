<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\BankAccount;
use App\Models\Booking;
use App\Models\Jam;
use App\Models\Paket;
use App\Services\PaymentServices;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BookingController extends Controller
{
    public function data(DataTables $dataTables)
    {
        $data = Booking::query()
            ->select([
                'bookings.id',
                'bookings.tgl_kedatangan',
                'bookings.nama',
                'bookings.nomor_telp',
                'bookings.harga',
                'bookings.status',
                'bookings.paket_id',
                'bookings.created_at',
                'pakets.nama as paket_nama'
            ])
            ->leftJoin('pakets', 'bookings.paket_id', '=', 'pakets.id')
            ->where('bookings.status', Booking::UNPAID);

        return $dataTables->eloquent($data)
            ->editColumn('tgl_kedatangan', fn($row) => $row->tgl_kedatangan->format('d-m-Y'))
            ->editColumn('status', fn($row) => config('constants.status_booking.'.$row->status))
            ->editColumn('harga', fn($row) => number_format($row->harga))
            ->addColumn('paket.nama', fn($row) => $row->paket_nama)
            ->addColumn('action', function ($row) {
                $edit = "<a href='".route('admin.booking.edit', $row->id)."' class='text-success' title='Edit Data'><i class='bx bxs-edit bx-sm'></i></a>";
                $delete = "<a href='javascript:;' class='text-danger' onclick='fn_deleteData(".'\"'.route('admin.booking.destroy', $row->id).'\"'.")' title='Hapus Data'><i class='bx bxs-trash bx-sm'></i></a>";

                return $row->status === Booking::UNPAID ? $edit.'  '.$delete : 'Disabled';
            })
            ->orderColumn('tgl_kedatangan', fn($query, $order) => $query->orderBy('bookings.tgl_kedatangan', $order))
            ->orderColumn('nama', fn($query, $order) => $query->orderBy('bookings.nama', $order))
            ->orderColumn('nomor_telp', fn($query, $order) => $query->orderBy('bookings.nomor_telp', $order))
            ->orderColumn('harga', fn($query, $order) => $query->orderBy('bookings.harga', $order))
            ->orderColumn('status', fn($query, $order) => $query->orderBy('bookings.status', $order))
            ->orderColumn('paket.nama', fn($query, $order) => $query->orderBy('pakets.nama', $order))
            ->rawColumns(['action', 'status'])
            ->toJson();
    }

    public function index()
    {
        return view('pages.booking.index');
    }

    public function create()
    {
        $paket = Paket::query()->with('paketHarga')->where('is_active',true)->get();
        $jam = Jam::query()->where('is_active',true)->get();
        $bankAccount = BankAccount::all();
        return view('pages.booking.create',compact('paket','bankAccount','jam'));
    }

    public function store(BookingRequest $request)
    {
        try {
            Booking::query()->create($request->validated());
            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route("admin.booking.index");
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function edit(Booking $booking)
    {
        $booking->load('paket.paketHarga');
        $paket = Paket::query()->with('paketHarga')->where('is_active',true)->get();
        $jam = Jam::query()->where('is_active',true)->get();
        $bankAccount = BankAccount::all();
        return view('pages.booking.create',compact('booking','paket','bankAccount','jam'));
    }

    public function update(BookingRequest $request,Booking $booking)
    {
        try {
            $booking->update($request->validated());
            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.booking.index');
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(Booking $booking)
    {
        try {
            $booking->delete();
            return response()->json(["success" => 'Delete data berhasil.']);
        }catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }
}
