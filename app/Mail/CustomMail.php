<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @param array $data Must include 'subject' and 'body'; optionally 'attachment'
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->data['subject'] ?? 'CandleMagic Info'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.customEmailTemplate',
            with: [
                'body' => $this->data['body'] ?? '',
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        if (isset($this->data['attachment'])) {
            return [
                Attachment::fromPath($this->data['attachment']->getRealPath())
                    ->as($this->data['attachment']->getClientOriginalName())
                    ->withMime($this->data['attachment']->getClientMimeType()),
            ];
        }

        return [];
    }
}
