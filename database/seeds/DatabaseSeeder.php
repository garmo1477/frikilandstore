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
        //llamada a UserSeeder, que es el q crea los 10 usuarios        
        $this->call(UserSeeder::class);

        $this->call(ProductSeeder::class);
    }
}
