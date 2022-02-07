<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $faker = Factory::create();
        for($i=0;$i<25;$i++){
            Article::create([
                'title' => Str::random(10),
                'subtile' => Str::random(10).'@gmail.com',
                'content' =>  $faker->text,
                'category_id'=> Category::inRandomOrder()->first()->id
            ]);
        }
        */

        Category::get()->each(function ($category){
            \App\Models\Article::factory(5)->create(
                [
                    'category_id'=> $category->id
                ]
            );
        });
    }
}
