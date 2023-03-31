<?php

namespace App\Listeners;

use App\Events\UserUpdateHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreUpdateHistory
{
    public $post;
    /**
     * Create the event listener.
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Handle the event.
     */
    public function handle(UserUpdateHistory $event): void
    {
        //
    }
}
