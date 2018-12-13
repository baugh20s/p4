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
        // $this->call(UsersTableSeeder::class);

        /*
         * contacts Seeder
         */
        $this->call(HobbiesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(ContactHobbyTableSeeder::class);
    }
}
