<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Natter\Community;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommunityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Litted\Community  $community
     * @return \Illuminate\Auth\Access\Response|bool
     */

    public function edit(User $user, Community $community)
    {
        dd($user, $community);
        return $user->character->id === $community->owner_id;
    }

    public function update(User $user, Community $community)
    {
        return $user->character->id === $community->owner_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Litted\Community  $community
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Community $community)
    {
        return $user->character->id === $community->owner_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Litted\Community  $community
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Community $community)
    {
        return $user->character->id === $community->owner_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Litted\Community  $community
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Community $community)
    {
        return $user->character->id === $community->owner_id;
    }
}
