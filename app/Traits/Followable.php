<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait Followable
{
    public function follow($user)
    {
        $this->followings()->attach($user, [
            'accepted_at' => now()
        ]);
    }

    public function unfollow($user)
    {
        $this->followings()->detach($user);
    }

    public function toggleFollow($user)
    {
        $this->isFollowing($user) ? $this->unfollow($user) : $this->follow($user);
    }

    public function isFollowing($user)
    {
        if ($user instanceof Model) {
            $user = $user->getKey();
        }

        /* @var \Illuminate\Database\Eloquent\Model $this */
        if ($this->relationLoaded('followings')) {
            return $this->followings
                ->where('pivot.accepted_at', '!==', null)
                ->contains($user);
        }

        return $this->followings()
            ->wherePivot('accepted_at', '!=', null)
            ->where($this->getQualifiedKeyName(), $user)
            ->exists();
    }


    public function followers()
    {
        return $this->belongsToMany(__CLASS__, 'user_follower', 'following_id', 'follower_id')
            ->withPivot('accepted_at')->withTimestamps();
    }

    public function followings()
    {
        return $this->belongsToMany(__CLASS__, 'user_follower', 'follower_id', 'following_id')
            ->withPivot('accepted_at')->withTimestamps();;
    }
}
