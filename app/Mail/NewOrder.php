<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Cart;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $cart;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nuevo Pedido')
            ->view('mails.new-order')->with([
            'cart' => $this->cart
        ]);
    }
}
