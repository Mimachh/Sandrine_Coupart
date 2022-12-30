<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Recette;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewReceipeCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $create;
    public $notifiable;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Recette $create, User $notifiable)
    {
        $this->create = $create;
        $this->notifiable = $notifiable;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Nouvelle Recette pour toi !',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.newrecipe',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
