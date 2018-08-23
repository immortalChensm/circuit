<?php

namespace App\Observers;

use App\Models\Replay;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplayObserver
{
    public function creating(Replay $replay)
    {
        //
        $replay->content = clean($replay->content,'user_topic_body');
    }

    public function created(Replay $replay)
    {
        //$replay->topic->increment("replay_count",1);
    }

    public function updating(Replay $replay)
    {
        //
    }
}