<?php

namespace App\Observers;

use App\Models\Clientes;
use Ramsey\Uuid\Uuid;

class ClienteObserver
{
    /**
     * Handle the Clientes "created" event.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return void
     */
    public function created(Clientes $cliente)
    {

    }

    public function creating(Clientes $cliente)
    {
        // $cliente->cod = Uuid::uuid4();
        $cliente->user_id = 1;
    }
    /**
     * Handle the Clientes "updated" event.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return void
     */
    public function updated(Clientes $clientes)
    {
        //
    }

    /**
     * Handle the Clientes "deleted" event.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return void
     */
    public function deleted(Clientes $clientes)
    {
        //
    }

    /**
     * Handle the Clientes "restored" event.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return void
     */
    public function restored(Clientes $clientes)
    {
        //
    }

    /**
     * Handle the Clientes "force deleted" event.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return void
     */
    public function forceDeleted(Clientes $clientes)
    {
        //
    }
}
