<?php

namespace App\Policies;

use App\Snippet;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SnippetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any snippets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the snippet.
     *
     * @param  \App\User  $user
     * @param  \App\Snippet  $snippet
     * @return mixed
     */
    public function view(User $user, Snippet $snippet)
    {
        //
    }

    /**
     * Determine whether the user can create snippets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id;
    }

    /**
     * Determine whether the user can update the snippet.
     *
     * @param  \App\User  $user
     * @param  \App\Snippet  $snippet
     * @return mixed
     */
    public function update(User $user, Snippet $snippet)
    {
        //
    }

    /**
     * Determine whether the user can delete the snippet.
     *
     * @param  \App\User  $user
     * @param  \App\Snippet  $snippet
     * @return mixed
     */
    public function delete(User $user, Snippet $snippet)
    {
        //
    }

    /**
     * Determine whether the user can restore the snippet.
     *
     * @param  \App\User  $user
     * @param  \App\Snippet  $snippet
     * @return mixed
     */
    public function restore(User $user, Snippet $snippet)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the snippet.
     *
     * @param  \App\User  $user
     * @param  \App\Snippet  $snippet
     * @return mixed
     */
    public function forceDelete(User $user, Snippet $snippet)
    {
        //
    }
}
