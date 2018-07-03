<?php

namespace App\Listeners;

use App\Events\adminDelete;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class generateFileAfterDelete implements ShouldQueue
{
    use InteractsWithQueue;
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
    public function handle(adminDelete $event)
    {
        sleep(30);
        $file = "test.txt";
        $content = "delete successfull";
        $success = Storage::put($file, $content);
        if (!$success) {
            die("could not write file")
        };
    }

}
