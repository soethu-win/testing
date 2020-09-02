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
        //$this->call(StudentTableSeeder::class);
        //$this->call(BrandTableSeeder::class);
        //$this->call(CategoryTableSeeder::class);
         $this->call(UserTableSeeder::class);
        //$this->call(RoleTableSeeder::class);
    }
}
