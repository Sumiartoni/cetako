<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new \Illuminate\Mail\Mailables\Address(
                config('mail.from.address', 'noreply@cetako.id'),
                'Cetako'
            ),
            subject: 'Pesan Baru dari Form Kontak - ' . ($this->data['name'] ?? 'Website'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
        );
    }
}
