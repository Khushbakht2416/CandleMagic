<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentSuccessMail extends Mailable
{
    use Queueable, SerializesModels;
    public $transactionId;
    public $productDetails;
    public $user;
    public $verification_token;
    /**
     * Create a new message instance.
     */
    public function __construct($transactionId, $productDetails, $user, $verification_token)
    {
        $this->transactionId = $transactionId;
        $this->productDetails = $productDetails;
        $this->user = $user;
        $this->verification_token = $verification_token;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Payment Success Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.paymentSuccess',
            with: [
                'transactionId'=> $this->transactionId,
                'paymentDetails' => $this->productDetails,
                'user' => $this->user,
                'verification_token' => $this->verification_token,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
