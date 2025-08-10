<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendShipmentMail extends Mailable
{
    use Queueable, SerializesModels;
    public $trackingId;
    public $user;
    public $orderStatus;

    public function __construct($trackingId, User $user, $orderStatus)
    {
        $this->orderStatus = $orderStatus;
        $this->trackingId = $trackingId;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Shipment Details',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.orderShiped',
            with: [
                'trackingId' => $this->trackingId,
                'userName' => $this->user->name,
                'userEmail' => $this->user->email,
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
