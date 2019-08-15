<?php

namespace App\Listeners;

use App\Events\CadastrarNovoUsuario;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MandarEmailParaUsuario
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
     * @param  CadastrarNovoUsuario  $event
     * @return void
     */
    public function handle(CadastrarNovoUsuario $event)
    {
    }
}
