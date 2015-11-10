<?php

namespace TevoHarvester\Events;

use Illuminate\Queue\SerializesModels;
use TevoHarvester\Tevo\Model;

class ItemWasDeleted extends ItemWasStored
{
    use SerializesModels;


    /**
     * Create a new event instance.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        //
    }


    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
