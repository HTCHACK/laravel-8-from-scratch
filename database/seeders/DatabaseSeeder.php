<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();
        $user_two = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'Personal'
        ]);

        $sport = Category::create([
            'name' => 'Sport',
            'slug' => 'sport'
        ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$personal->id,
            'title' =>'Asadbek',
            'slug'=>'backend',
            'excerpt'=>'PHP Laravel',
            'body'=>'Personal',
        ]);

        Post::create([
            'user_id'=>$user_two->id,
            'category_id'=>$personal->id,
            'title' =>'python',
            'slug'=>'python',
            'excerpt'=>'PHP Laravel',
            'body'=>'python',
        ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$sport->id,
            'title' =>'Liverpool',
            'slug'=>'liverpool',
            'excerpt'=>'UCL EPL',
            'body'=>'SPORT',
        ]);
    }
}
