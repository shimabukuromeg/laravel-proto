<?php

namespace App\Listeners;

use App\Events\PersonEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Person;
use Illuminate\Support\Facades\Storage;

class PersonEventListener
{

    public function __construct()
    {
        //
    }


    public function handle(PersonEvent $event)
    {

        Storage::append('person_access_log.txt', '[PersonEvent1 ] ' . now() . ' ' .
            $event->person->name);
    }
}
