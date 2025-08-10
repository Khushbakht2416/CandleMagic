<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $transactionId;
    public $user;
    public $verificationToken;
    public $orderStatus;

    public function __construct($transactionId, User $user, $verificationToken, $orderStatus)
    {
        $this->orderStatus = $orderStatus;
        $this->transactionId = $transactionId;
        $this->user = $user;
        $this->verificationToken = $verificationToken;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Status Updated',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.orderUpdte',
            with: [
                'transactionId' => $this->transactionId,
                'userName' => $this->user->name,
                'userEmail' => $this->user->email,
                'verificationToken' => $this->verificationToken,
                'orderStatus' => $this->orderStatus,
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
