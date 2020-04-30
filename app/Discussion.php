<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    //

    protected $guarded = [];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function bestReply(){
        return $this->belongsTo(Reply::class,'reply_id');
    }
    public function markedAsBest(Reply $reply){
        $this->update([
            'reply_id'=>$reply->id
        ]);
    }

   }
