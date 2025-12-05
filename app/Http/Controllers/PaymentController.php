<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Http\Requests\PaymentRequest;
use App\Models\Booking;
use App\Models\Guide;
use App\Models\Mobil;
use App\Models\Paket;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PaymentController extends Controller
{
    public function data(DataTables $dataTables)
    {
        $data = Payment::query()
            ->with(['booking','paket'])
            ->latest();

        return $dataTables->eloquent($data)
            ->editColumn('tgl_bayar',fn($data) => $data->tgl_bayar->format('d-m-Y'))
            ->addColumn('status',fn($data) => $data->is_uang_muka ? '<span class="badge bg-label-danger">Uang Muka</span>' : '<span class="badge bg-label-primary">Lunas</span>')
            ->editColumn('total_bayar',fn($data) => number_format($data->total_bayar))
            ->addColumn('action',function ($data){
                $show = "<a href='".route('admin.payment.show',$data->id)."' class='text-success' title='Show Data'><i class='bx bxs-file bx-sm'></i></a>";
                $delete = "<a href='javascript:;' class='text-danger' onclick='fn_deleteData(".'"'.route('admin.payment.destroy',$data->id).'"'.")' title='Hapus Data'><i class='bx bxs-trash bx-sm'></i></a>";

                return $show.'  '.$delete ;
            })
            ->rawColumns(['action','status'])
            ->toJson();
    }

    public function index()
    {
        return view('pages.payment.index');
    }

    public function create()
    {

        $booking = Booking::query()
            ->with(['paket', 'paketHarga', 'payments'])
            ->whereIn('status',[Booking::UNPAID,Booking::DP])
            ->get();

        $guides = Guide::all();

        return view('pages.payment.create',compact('booking','guides'));
    }


    public function store(PaymentRequest $request)
    {

        try {
            DB::transaction(function () use ($request){
                $payment = Payment::query()->create($request->validated());

                if($request->is_pelunasan)
                    $payment->booking()->update(['status' => Booking::PAID]);

                if($request->is_uang_muka)
                    $payment->booking()->update(['status' => Booking::DP]);
            });

            alert()->success('Success','Data berhasil disimpan!');
            return redirect()->route('admin.payment.index');
        }catch (\Exception $e){
            alert()->error('Ooppss!','Proses simpan data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function show(Payment $payment)
    {
        $payment->load(['paket.paketHarga','booking','guide']);
        return view('pages.payment.show',compact('payment'));
    }

    public function printInvoice(Payment $payment)
    {
        $payment->load(['paket.paketHarga','booking','guide']);
        return view('pages.payment.print',compact('payment'));
    }



    public function destroy(Payment $payment)
    {
        try {
            DB::transaction(function () use ($payment){

                $otherPayment = Payment::query()
                    ->where('booking_id',$payment->booking_id)
                    ->where('id','<>',$payment->id)
                    ->first();

                if($payment->is_pelunasan && !$otherPayment?->is_pelunasan )
                    $payment->booking()->update(["status"=>Booking::DP]);

                if($payment->is_uang_muka && !$otherPayment?->is_uang_muka)
                    $payment->booking()->update(["status"=>Booking::UNPAID]);


                $payment->delete();
            });
            return response()->json(["success" => 'Delete data berhasil.']);
        }catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }
}
