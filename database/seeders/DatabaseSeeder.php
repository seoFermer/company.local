<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\User;
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
        $users = User::factory(10000)->create();
        Company::factory(10000)->create()->each(function ($company) use ($users) {
            $company->users()->attach($users->random(rand(2, 50)));
        });
    }
}
