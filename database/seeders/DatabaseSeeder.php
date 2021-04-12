<?php

namespace Database\Seeders;

use App\Models\Users;
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
        Users::factory()->count(1000)->create();
        $this->call([
            AdminSeeder::class,
        ]);
    }
}
