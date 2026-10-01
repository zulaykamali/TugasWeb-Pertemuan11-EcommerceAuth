<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Admin memiliki seluruh akses terhadap Post.
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        return null;
    }

    /**
     * Editor dapat mengedit semua Post.
     * User hanya dapat mengedit Post miliknya sendiri.
     */
    public function update(User $user, Post $post): bool
    {
        return $user->role === 'editor'
            || $user->id === $post->user_id;
    }

    /**
     * Editor dapat menghapus semua Post.
     * User hanya dapat menghapus Post miliknya sendiri.
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->role === 'editor'
            || $user->id === $post->user_id;
    }
}
