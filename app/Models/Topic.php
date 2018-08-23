<?php

namespace App\Models;

class Topic extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'category_id', 'reply_count', 'view_count', 'last_reply_user_id', 'order', 'excerpt', 'slug'];

    public function category()
    {
        return $this->belongsTo(Category::class,"category_id","id");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeWithOrder($query,$order)
    {
        switch($order){
            case 'recent':
                $this->Recent();
            default:
                $this->RecentReplaied();
        }

        return $query->with("user","category");
    }
    public function scopeRecentReplaied($query)
    {
        return $query->orderBy("updated_at","desc");
    }
    public function scopeRecent($query)
    {
        return $query->orderBy("created_at","desc");
    }

    public function link($param = [])
    {
        return route("topics.show",array_merge([$this->id,$this->slug],$param));
    }

    public function replies()
    {
        return $this->hasMany(Replay::class);
    }
}
