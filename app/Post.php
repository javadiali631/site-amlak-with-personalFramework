<?php

namespace App;

use System\Database\ORM\Model;
use System\Database\Traits\HasSoftDelete;

class Post extends Model
{

    use HasSoftDelete;
    protected $table = "posts";
    protected $fillable = ['title', 'body', 'image', 'user_id', 'cat_id', 'published_at', 'status'];
    protected $deletedAt = 'deleted_at';
    protected $casts = ['image' => 'array'];

    public function user(){
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }

    public function category(){
        return $this->belongsTo('\App\Category', 'cat_id', 'id');
    }

    public function comments(){
        return $this->hasMany('\App\Comment', 'post_id', 'id');
    }


    
}