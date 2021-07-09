<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;


class Post extends Model
{
    use HasFactory;


    protected $table = 'posts';
    protected $guarded = [''];
    protected $with = ['category', 'user'];



    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search)
        => $query
            ->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('body', 'like', '%' . request('search') . '%'));


        $query->when($filters['category'] ?? false, fn ($query, $category)
        => $query
            ->wherehas('category', fn($query)=>
                $query->where('slug', $category)
        ));

        $query->when($filters['user'] ?? false, fn ($query, $user)
        => $query
            ->wherehas('user', fn($query)=>
                $query->where('username', $user)
        ));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
