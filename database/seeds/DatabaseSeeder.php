<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['users', 'categories', 'products', 'transactions', 'category_product'];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        foreach($this->toTruncate as $table) {
            DB::table($table)->truncate();
        }*/

        $this->call([
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            TransactionsTableSeeder::class
        ]);
    }
}
