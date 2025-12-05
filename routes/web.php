<?php

use App\Mail\InvoiceMail;
use App\Services\PaymentServices;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

//Route::get("send-email-test",function(){
//    $booking = \App\Models\Booking::first();
//    $sendMail = Mail::to("ahmad.mujamil@gmail.com")->send(new InvoiceMail($booking,"https://example.com"));

//    return $sendMail;
//});


//FRONTEND
Route::group(["as"=>'frontend.'],function(){
    Route::get('/', \App\Http\Controllers\Frontend\HomeController::class)
        ->name("home");

    Route::get('/paket-detail/{paketId}', [\App\Http\Controllers\Frontend\PaketDetailController::class,'index'])
        ->name("paket-detail");


    Route::get('/gallery', \App\Http\Controllers\Frontend\GalleryController::class)
        ->name("gallery");

    Route::get('/contact', \App\Http\Controllers\Frontend\ContactController::class)
        ->name("contact");

    Route::get('/faq', \App\Http\Controllers\Frontend\FaqController::class)
        ->name("faq");

    Route::group(["as"=>"booking."],function(){
        Route::get('/booking/{selectedPaket?}', [\App\Http\Controllers\Frontend\BookingController::class,'index'])
            ->name("index");
        Route::post('/booking', [\App\Http\Controllers\Frontend\BookingController::class,'store'])
            ->name("store");

        Route::get('/booking/{booking:nomor}/success',[\App\Http\Controllers\Frontend\BookingController::class,'successBooking'])
            ->name("success");

        Route::get('/booking/{booking:nomor}/payment-status',[\App\Http\Controllers\Frontend\BookingController::class,'paymentStatus'])
            ->name("payment-status");

        Route::post('/booking/payment-notification',[\App\Http\Controllers\Frontend\BookingController::class,'paymentNotification'])
            ->name("payment-notification");
    });

});



//BACKEND
Auth::routes();

Route::group(["middleware" => 'auth',"prefix" => "admin","as"=>"admin."],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/storage-link',function (){
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        return redirect()->route('admin.home');
    })->name('storage-link');

    //IMAGES
    Route::group(['middleware' => 'check.access:images'],function (){
        Route::get('/images/data',[\App\Http\Controllers\ImagesController::class,'data'])->name('images.data');
        Route::resource('images',\App\Http\Controllers\ImagesController::class);
    });

    //PAKET
    Route::group(['middleware' => 'check.access:paket'],function (){
        //HARGA
        Route::get('/paket/{paket}/harga',[\App\Http\Controllers\PaketHargaController::class,'index'])->name('paket.harga.index');
        Route::post('/paket/{paket}/harga',[\App\Http\Controllers\PaketHargaController::class,'store'])->name('paket.harga.store');
        Route::put('/paket-harga/{paket_harga}',[\App\Http\Controllers\PaketHargaController::class,'update'])->name('paket.harga.update');
        Route::get('/paket/{paket}/harga/regenerate',[\App\Http\Controllers\PaketHargaController::class,'regenerate'])->name('paket.harga.regenerate');
        Route::delete('/paket-harga/{paket_harga}',[\App\Http\Controllers\PaketHargaController::class,'destroy'])->name('paket.harga.destroy');

        //JAM
        Route::get('/paket/{paket}/jam',[\App\Http\Controllers\PaketJamController::class,'index'])->name('paket.jam.index');
        Route::post('/paket/{paket}/jam',[\App\Http\Controllers\PaketJamController::class,'store'])->name('paket.jam.store');
        Route::delete('/paket-jam/{paket_jam}',[\App\Http\Controllers\PaketJamController::class,'destroy'])->name('paket.jam.destroy');

        Route::get('/paket/data',[\App\Http\Controllers\PaketController::class,'data'])->name('paket.data');
        Route::resource('paket',\App\Http\Controllers\PaketController::class)
            ->except('show');
    });

    //KONFIGURASI
    Route::group(['middleware' => 'check.access:konfigurasi'],function (){
        Route::get('/konfigurasi',[\App\Http\Controllers\KonfigurasiController::class,'index'])->name('konfigurasi.index');
        Route::post('/konfigurasi',[\App\Http\Controllers\KonfigurasiController::class,'store'])->name('konfigurasi.store');
    });

    //BANK ACCOUNT
    Route::group(['middleware' => 'check.access:bank'],function (){
        Route::get('/bank/data',[\App\Http\Controllers\BankAccountController::class,'data'])->name('bank.data');
        Route::resource('bank',\App\Http\Controllers\BankAccountController::class);
    });

    //JAM
    Route::group(['middleware' => 'check.access:jam'],function (){
        Route::get('/jam/data',[\App\Http\Controllers\JamController::class,'data'])->name('jam.data');
        Route::resource('jam',\App\Http\Controllers\JamController::class);
    });

    //GUIDE
    Route::group(['middleware' => 'check.access:guide'],function (){
        Route::get('/guide/data',[\App\Http\Controllers\GuideController::class,'data'])->name('guide.data');
        Route::resource('guide',\App\Http\Controllers\GuideController::class);
    });

    //BOOKING
    Route::group(['middleware' => 'check.access:booking'],function (){
        Route::get('/booking/data',[\App\Http\Controllers\BookingController::class,'data'])->name('booking.data');
        Route::resource('booking',\App\Http\Controllers\BookingController::class);
    });

    //PAYMENT
    Route::group(['middleware' => 'check.access:payment'],function (){
        Route::get('/payment/data',[\App\Http\Controllers\PaymentController::class,'data'])->name('payment.data');
        Route::get('/payment/{payment}/print-invoice',[\App\Http\Controllers\PaymentController::class,'printInvoice'])->name('payment.print');
        Route::resource('payment',\App\Http\Controllers\PaymentController::class)
            ->except(['edit','update']);
    });


    //GALLERY
    Route::group(['middleware' => 'check.access:gallery'],function (){
        Route::get('/gallery/{gallery}/image',[\App\Http\Controllers\GalleryDetailController::class,'index'])->name('gallery.image.index');
        Route::post('/gallery/{gallery}/image',[\App\Http\Controllers\GalleryDetailController::class,'store'])->name('gallery.image.store');
        Route::delete('/gallery-image/{galleryDetail}',[\App\Http\Controllers\GalleryDetailController::class,'destroy'])->name('gallery.image.destroy');

        Route::get('/gallery/data',[\App\Http\Controllers\GalleryController::class,'data'])->name('gallery.data');
        Route::resource('gallery',\App\Http\Controllers\GalleryController::class)
            ->except('show');
    });

    //FAQs
    Route::group(['middleware' => 'check.access:faq'],function (){
        Route::get('/faq/data',[\App\Http\Controllers\FaqController::class,'data'])->name('faq.data');
        Route::resource('faq',\App\Http\Controllers\FaqController::class);
    });

    //USER
    Route::group(['middleware' => 'check.access:user'],function (){
        Route::get('/user/data',[\App\Http\Controllers\UserController::class,'data'])->name('user.data');
        Route::get('/user',[\App\Http\Controllers\UserController::class,'index'])->name('user.index');
        Route::get('/user/{user}/edit',[\App\Http\Controllers\UserController::class,'edit'])->name('user.edit');
        Route::put('/user/{user}',[\App\Http\Controllers\UserController::class,'update'])->name('user.update');
        Route::get('/user/{user}/password',[\App\Http\Controllers\UserController::class,'editPassword'])->name('user.password.edit');
        Route::post('/user/{user}/password',[\App\Http\Controllers\UserController::class,'updatePassword'])->name('user.password.update');
    });
});



