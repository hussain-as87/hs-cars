<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\AboutSeeder;
use Database\Seeders\AdvertSeeder;
use Database\Seeders\ServicesSeeder;
use Database\Seeders\SettingsSeeder;
use Database\Seeders\CreateCarSeeder;
use Database\Seeders\CreateCategorySeeder;
use Database\Seeders\CreateAdminUserSeeder;
use Database\Seeders\PermissionTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(AdvertSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(CreateCategorySeeder::class);
        $this->call(CreateCarSeeder::class);
    }
}
