<?php

namespace App\Mail;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

date_default_timezone_set('America/La_Paz');

class notificacion extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $dataF = [];

    public function __construct($request, $id)
    {
        $evento = Evento::findOrFail($request['id_evento']);
        $cliente = User::findOrFail($id);
        $this->dataF = [
            'name' => $cliente->name,
            'email' => $cliente->email,
            'evento' => $evento->name,
            'fecha' => date('Y-m-d'),
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mensaje')->with($this->dataF);
    }
}
