<?php

namespace App\Listeners;

use App\Events\ItemWasDeleted;

class RecordItemDelete
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }


    /**
     * Handle the event.
     *
     * @param  ItemWasDeleted $event
     *
     * @return void
     */
    public function handle(ItemWasDeleted $event)
    {
        //
    }
}
