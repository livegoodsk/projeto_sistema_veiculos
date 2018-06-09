<?php

namespace FederalSt\Listeners;

use FederalSt\Events\Event;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Event  $event
     * @return void
     */
    public function handle(Event $event)
    {
        try{
            $user =  $event->user;

            Mail::send('emails.alteracao_usuario', ['user' => $user], function ($m) use ($user) {
                $m->from('daividlogin@gmail.com', 'Alteração Usuário');
                $m->to($user->email, $user->name)->subject('Alteração Usuário');
            });

        } catch (\Exception $e){
           // die($e->getMessage());
        }
    }
}