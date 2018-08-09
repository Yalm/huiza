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
        $this->call(StateSeeder::class);
        $this->call(DocumentSeeder::class);
        
        $categories=factory(App\Category::class, 6)->create();

        $products = factory(App\Product::class,300)->create();

        $customers = factory(App\Customer::class,10)->create();

        $customers->each(function(App\Customer $customer)
        {
            factory(App\Order::class,3)->create(['customer_id'=> $customer->id])
                                        ->each(function(App\Order $order)
            {
                
                for ($i=0; $i < rand(1,10); $i++) 
                {
                    $order->products()->attach(rand(1,300),['quantity' => rand(1,10)]);  
                }

            });
        });
        
        
        $this->call(UserSeeder::class);
    }
}
