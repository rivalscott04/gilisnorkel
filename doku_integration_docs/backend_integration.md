# Backend Integration - Doku Payment Gateway

## Overview
Integrasi Doku payment gateway menggunakan Doku API untuk proses pembayaran booking. Implementasi menggunakan HMAC SHA256 signature untuk autentikasi.

## Konfigurasi Environment

**PENTING:** File `.env` tidak dapat diakses oleh AI assistant. Pastikan untuk menambahkan konfigurasi berikut di file `.env`:

```env
DOKU_CLIENT_ID=your_client_id_here
DOKU_SECRET_KEY=your_secret_key_here
```

Konfigurasi ini akan dibaca oleh file `config/doku.php`:
- `DOKU_CLIENT_ID` → `config('doku.client_id')`
- `DOKU_SECRET_KEY` → `config('doku.secret_key')`

## File Konfigurasi

### `config/doku.php`
```php
return [
    'client_id' => env("DOKU_CLIENT_ID", null),
    'secret_key' => env("DOKU_SECRET_KEY", null),
    'prod_endpoint' => "https://api.doku.com",
    'sandbox_endpoint' => "https://api-sandbox.doku.com",
];
```

## Service Class

### `app/Services/PaymentServices.php`

Service ini menyediakan 3 method utama:

#### 1. `createPaymentUrl(Booking $booking)`
Membuat payment URL untuk booking.

**Endpoint:** `POST /checkout/v2/payment`

**Request Body:**
- `order`: amount, invoice_number, currency, callback_url, line_items
- `payment`: payment_due_date (120 menit)
- `customer`: name, email

**Response:** Array dengan `response` (HTTP response) dan `response_encode` (decoded JSON)

#### 2. `getPaymentStatus(Booking $booking)`
Mengecek status pembayaran booking.

**Endpoint:** `GET /orders/v1/status/{invoice_number}`

**Response:** Array dengan status transaksi

#### 3. `getNotification(Request $request)`
Memvalidasi dan memproses webhook notification dari Doku.

**Endpoint:** `POST /payments/notifications`

**Validasi:** Signature verification menggunakan HMAC SHA256

## Signature Generation

Signature dibuat dengan format:
```
Client-Id:{client_id}
Request-Id:{request_id}
Request-Timestamp:{timestamp}
Request-Target:{target_path}
Digest:{digest_value}  // hanya untuk POST
```

Signature di-encode dengan:
```php
base64_encode(hash_hmac('sha256', $componentSignature, $secretKey, true))
```

Header yang dikirim:
- `Client-Id`
- `Request-Id` (UUID)
- `Request-Timestamp` (ISO8601/ISO format)
- `Signature` (format: `HMACSHA256={signature}`)

## Controller Integration

### `app/Http/Controllers/Frontend/BookingController.php`

#### Method: `successBooking(Booking $booking)`
- Saat ini masih di-comment (TODO: Uncomment when DOKU integration is ready)
- Memanggil `PaymentServices::createPaymentUrl($booking)`
- Mengirim email invoice dengan payment URL

#### Method: `paymentStatus(Booking $booking)`
- Mengecek status pembayaran
- Jika status `SUCCESS`:
  - Membuat record `Payment`
  - Update booking status menjadi `PAID`
  - Mengirim email konfirmasi pembayaran

#### Method: `paymentNotification(Request $request)`
- Webhook handler untuk notification dari Doku
- Validasi signature
- Membuat record `Payment` dan update booking status

## Routes

```php
// Frontend routes
Route::get('/booking/{booking:nomor}/payment-status', [BookingController::class, 'paymentStatus'])
    ->name('frontend.booking.payment-status');

Route::post('/booking/payment-notification', [BookingController::class, 'paymentNotification'])
    ->name('frontend.booking.payment-notification');
```

## Invoice Number Format

Format: `INV-{booking->nomor}`

Contoh: `INV-12345`

## Payment Due Date

Default: 120 menit (2 jam) dari waktu pembuatan payment URL.

## Error Handling

- Pastikan `DOKU_CLIENT_ID` dan `DOKU_SECRET_KEY` sudah di-set di `.env`
- Validasi signature untuk webhook notification
- Handle HTTP errors dari Doku API response

## Testing

Untuk testing, gunakan sandbox endpoint:
- Sandbox: `https://api-sandbox.doku.com`
- Production: `https://api.doku.com`

Saat ini menggunakan production endpoint. Untuk development, ubah di `PaymentServices.php`:
```php
$url = config('doku.sandbox_endpoint').self::$paymentTargetPath;
```
