<?php

namespace App\Listeners;

use App\Events\MessageWasReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

//se genero con el comando:
//php artisan event:generate
//Previo se deben declarar los eventos y listener en el archivo:
//Providers\EventServiceProvider
class SendAutoresponder
{
    /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
      //  var_dump('Enviar auto respondedor');
        $message = $event->message;
        Mail::send('emails.contact',['msg' => $message], function($m) use ($message){
            $m->to($message->email, $message->nombre)->subject('Tu mensaje fue recibido');
        });
    }
}
