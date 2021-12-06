<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTechnology extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'technology_id'
    ];

    public function blogs(){
        return $this->belongsTo(Blog::class,'blog_id','id');
    }

    public function technology(){
        return $this->belongsTo(Technology::class,'technology_id','id');
    }
}
