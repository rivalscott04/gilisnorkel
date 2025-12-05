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
            ->with('paket')
            ->where('status',Booking::UNPAID)
            ->latest();

        return $dataTables->eloquent($data)
            ->editColumn('tgl_kedatangan',fn($data) => $data->tgl_kedatangan->format('d-m-Y'))
            ->editColumn('status',fn($data) => config('constants.status_booking.'.$data->status))
            ->editColumn('harga',fn($data) => number_format($data->harga))
            ->addColumn('action',function ($data){
                $edit = "<a href='".route('admin.booking.edit',$data->id)."' class='text-success' title='Edit Data'><i class='bx bxs-edit bx-sm'></i></a>";
                $delete = "<a href='javascript:;' class='text-danger' onclick='fn_deleteData(".'"'.route('admin.booking.destroy',$data->id).'"'.")' title='Hapus Data'><i class='bx bxs-trash bx-sm'></i></a>";

                return $data->status === Booking::UNPAID ? $edit.'  '.$delete : 'Disabled' ;
            })
            ->rawColumns(['action','status'])
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
