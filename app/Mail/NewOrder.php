<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Cart;
use App\User;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $cart;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Cart $cart, User $user)
    {
        $this->cart = $cart;
        $this->user = $user;
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
            'user' => $this->user,
            'cart' => $this->cart
        ]);
    }
}
