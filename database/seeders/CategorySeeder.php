<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $categories = ['sport','IT', 'Maths'];
        for($i=0;$i<count($categories);$i++){
            Category::create([
                'label'=> $categories[$i]
            ]);
        }
        */

        \App\Models\Category::factory(5)->create();
    }
}
