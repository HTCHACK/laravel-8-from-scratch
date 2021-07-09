<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $table = 'categories';
    protected $guarded = [''];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
