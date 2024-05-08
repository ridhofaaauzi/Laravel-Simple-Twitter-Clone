<?php

namespace App\Policies;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{
    public function update(User $user, Idea $idea): bool
    {
        return ($user->is_admin || $user->is($idea->user));
    }

    public function delete(User $user, Idea $idea): bool
    {
        return ($user->is_admin || $user->is($idea->user));
    }
}
