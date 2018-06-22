<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['isbn', 'title', 'author', 'publishername', 'size', 'itemurl', 'image_url'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('type')->withTimestamps();
    }
    
    public function read_users()
    {
        return $this->users()->where('type', 'read');
    }
    
    public function want_users()
    {
        return $this->users()->where('type', 'want');
    }
}
