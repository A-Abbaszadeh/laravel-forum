<?php

namespace LaravelForum;

class Discussion extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function bestReply()
    {
        return $this->belongsTo(Reply::class,'best_reply_id');
    }

    public function markAsBestReply(Reply $reply)
    {
        $this->update([
            'best_reply_id' => $reply->id
        ]);
    }
}
