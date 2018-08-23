<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Replay;

class ReplayPolicy extends Policy
{
    public function update(User $user, Replay $replay)
    {
        // return $replay->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Replay $replay)
    {
        return true;
    }
}
