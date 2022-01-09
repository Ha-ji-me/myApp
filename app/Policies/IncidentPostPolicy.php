<?php

namespace App\Policies;

use App\IncidentPost;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

//リソースコントローラーのメソッドに対応
class IncidentPostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any incident posts.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the incident post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\IncidentPost  $incidentPost
     * @return mixed
     */
    public function view(User $user, IncidentPost $incidentPost)
    {
        //
    }

    /**
     * Determine whether the user can create incident posts.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the incident post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\IncidentPost  $incidentPost
     * @return mixed
     */
    public function update(User $user, IncidentPost $incidentPost)
    {
        //
    }

    /**
     * Determine whether the user can delete the incident post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\IncidentPost  $incidentPost
     * @return mixed
     */
    public function delete(User $user, IncidentPost $incidentPost)
    {
        //
    }

    /**
     * Determine whether the user can restore the incident post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\IncidentPost  $incidentPost
     * @return mixed
     */
    public function restore(User $user, IncidentPost $incidentPost)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the incident post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\IncidentPost  $incidentPost
     * @return mixed
     */
    public function forceDelete(User $user, IncidentPost $incidentPost)
    {
        //
    }
}
