<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HumansTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        //$this->call(PublishersTableSeeder::class);
        $this->call(SpecialitiesTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
    }
}
