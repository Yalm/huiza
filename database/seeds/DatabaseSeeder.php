<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories=factory(App\Category::class, 6)->create();
        $categories->each(function(App\Category $category) use($categories){
          factory(App\Product::class)
          ->times(50)
          ->create([
              'category_id'=> $category->id,
          ]);
        });
    }
}
