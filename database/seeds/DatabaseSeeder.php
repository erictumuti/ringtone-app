<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        Category::create(['name' => 'Classical']);
        Category::create(['name' => 'Funny']);
        Category::create(['name' => 'Alarms']);
        Category::create(['name' => 'Animals']);
        Category::create(['name' => 'SMS']);
        Category::create(['name' => 'Children']);
        Category::create(['name' => 'Standard']);
        Category::create(['name' => 'Music']);
        Category::create(['name' => 'Holiday']);
        Category::create(['name' => 'Nature']);

        User::create([
            'name' => 'admin',
            'email' => 'admin123@gmail.com',
            'password' => bcrypt('password1234'),
            'email_verified_at' => NOW(),
        ]);
    }
}
