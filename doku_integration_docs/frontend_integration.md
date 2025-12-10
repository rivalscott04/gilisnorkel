# Frontend Integration - Doku Payment Gateway

## Overview
Integrasi frontend menggunakan Doku Jokul Checkout JS untuk menampilkan payment modal/iframe.

## Dependencies

### Jokul Checkout JS
Script ini sudah di-include di `resources/views/frontend/booking-success.blade.php`:

```html
<script src="https://jokul.doku.com/jokul-checkout-js/v1/jokul-checkout-1.0.0.js"></script>
```

## View File

### `resources/views/frontend/booking-success.blade.php`

#### Payment Button (Saat ini di-comment)
```blade
{{-- TODO: Uncomment when DOKU integration is ready --}}
@if(data_get($paymentUrl, 'response_encode.payment.url'))
<a href="javascript:void(0);" 
   onclick="showPaymentModal('{!! data_get($paymentUrl, 'response_encode.payment.url', '#') !!}')"
   class="btn_1 full-width purchase">
    Proceed to payment
</a>
<small>Please complete your payment by clicking the button above.</small>
@endif
```

## JavaScript Function

### `showPaymentModal(url)`
Function untuk menampilkan payment modal menggunakan Jokul Checkout.

**Location:** `resources/views/frontend/booking-success.blade.php` (line 144-159)

**Fungsi:**
1. Validasi URL payment
2. Memanggil `loadJokulCheckout(url)` jika tersedia
3. Fallback: redirect langsung ke URL jika Jokul Checkout tidak tersedia

**Validasi:**
- Mengecek apakah URL valid (tidak null, empty, atau '#')
- Menampilkan alert jika URL tidak tersedia

## Flow Integrasi

### 1. Booking Success Page
1. User menyelesaikan booking
2. Backend memanggil `PaymentServices::createPaymentUrl($booking)`
3. Payment URL dikirim ke view sebagai `$paymentUrl`
4. Button "Proceed to payment" ditampilkan dengan payment URL

### 2. Payment Modal
1. User klik button "Proceed to payment"
2. `showPaymentModal()` dipanggil dengan payment URL
3. Jokul Checkout modal ditampilkan
4. User melakukan pembayaran di dalam modal

### 3. Payment Status
Setelah pembayaran:
- **Success:** Redirect ke `/booking/{nomor}/payment-status` (callback_url)
- **Cancel:** Redirect ke `/booking/{nomor}/payment-status` (callback_url_cancel)

## Payment Status Views

### Success View
- File: `resources/views/frontend/payment-success.blade.php`
- Ditampilkan ketika status pembayaran = `SUCCESS`

### Failed View
- File: `resources/views/frontend/payment-failed.blade.php`
- Ditampilkan ketika status pembayaran != `SUCCESS`

## Callback URLs

Callback URLs di-set di `PaymentServices::prepareForRequest()`:

```php
'callback_url' => route('frontend.booking.payment-status', $booking->nomor),
'callback_url_cancel' => route('frontend.booking.payment-status', $booking->nomor),
```

Kedua callback mengarah ke route yang sama: `frontend.booking.payment-status`

## Current Status

**Status:** Integration masih di-comment (belum aktif)

**TODO:**
1. Uncomment code di `BookingController::successBooking()` untuk memanggil `createPaymentUrl()`
2. Uncomment payment button di `booking-success.blade.php`
3. Pastikan `.env` sudah di-set dengan `DOKU_CLIENT_ID` dan `DOKU_SECRET_KEY`
4. Test dengan sandbox endpoint terlebih dahulu

## Temporary Implementation

Saat ini, halaman booking success menampilkan:
- Alert: "Booking Received! Our team will contact you shortly for payment confirmation."
- Button: "Back to Home"

Ini adalah fallback sementara sampai integrasi Doku diaktifkan.

## Error Handling

### Frontend Validation
- Validasi URL sebelum memanggil `loadJokulCheckout()`
- Alert jika payment URL tidak tersedia
- Fallback redirect jika Jokul Checkout script tidak load

### Debugging
Console log untuk debugging:
```javascript
console.log('Payment URL:', url);
```

## Testing Checklist

- [ ] Jokul Checkout JS script ter-load dengan benar
- [ ] Payment URL diterima dari backend
- [ ] Modal payment muncul saat klik button
- [ ] Payment dapat diselesaikan di modal
- [ ] Redirect ke payment-status setelah payment
- [ ] Email invoice terkirim setelah booking
- [ ] Email konfirmasi terkirim setelah payment success
