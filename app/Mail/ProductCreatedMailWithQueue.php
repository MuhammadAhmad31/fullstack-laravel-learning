<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Product;

class ProductCreatedMailWithQueue extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Product Created Mail With Queue',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.product-created',
            with: [
                'product' => $this->product,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
