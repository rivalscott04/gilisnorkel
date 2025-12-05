<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoicePaidMail extends Mailable
{
    use Queueable, SerializesModels;
    public $booking;
    public $paymentSuccess;
    public function __construct(Booking $booking,$paymentSuccess)
    {
        $this->booking = $booking->load(['paket','paketHarga','bankAccount']);
        $this->paymentSuccess = $paymentSuccess;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Payment Successfull',
            replyTo: ['gilisnorkeling1@gmail.com']
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.invoice-paid',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
