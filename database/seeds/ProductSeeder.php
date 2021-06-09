<?php

use App\Product;
use App\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                "name_product" => "Breath of the Wild",                         
                "category" => "Videojuegos",  
                "price" => 60.00,               
            ],
            [
                "name_product" => "Assassins Creed: Odyssey",                         
                "category" => "Videojuegos",  
                "price" => 40.00,               
            ],
            [
                "name_product" => "Animatronic Grogu",                         
                "category" => "Merchandising",  
                "price" => 69.00,               
            ],
            [
                "name_product" => "Camiseta The Mandalorian",                         
                "category" => "Ropa",  
                "price" => 30.00,               
            ],
            [
                "name_product" => "Consola Playstation 4",                         
                "category" => "Videojuegos",  
                "price" => 200.00,               
            ],
            [
                "name_product" => "Consola Nintendo Switch",                         
                "category" => "Videojuegos",  
                "price" => 240.00,               
            ],
        ];
        foreach($products as $product){
            //buscamos de forma aleatoria un vendedor y cogemos su id
            $product['user_id'] = User::whereRole(User::SELLER)->get()->random()->id;
            factory(Product::class)->create($product);
                       
        }
        
    }
}
