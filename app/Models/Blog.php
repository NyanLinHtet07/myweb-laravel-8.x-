<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'text', 'tag_id']; 

  
    public function ts()
    {
        return $this->hasMany(Tag::class, 'tag_id');
    }
}
