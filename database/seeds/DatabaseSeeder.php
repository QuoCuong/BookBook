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
        $this->call([
        	RolesTableSeeder::class,
            CategoriesTableSeeder::class,
        	SubcategoriesTableSeeder::class,
        	CitiesTableSeeder::class,
        	DistrictsTableSeeder::class,
        	UsersTableSeeder::class,
        	AddressesTableSeeder::class,
        	ProductsTableSeeder::class,
        	CommentsTableSeeder::class,
        	OrdersTableSeeder::class,
        ]);
    }
}
