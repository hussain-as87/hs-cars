<?php

namespace Database\Seeders;

use App\Models\Admin\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'name' => ["en" => "Wedding Ceremony", "ar" => "مراسم الزواج"],
            'description' => [
                "en" =>
                "A small river named Duden
                  flows by their place and
                  supplies it with the necessary
                  regelialia.", "ar" => "يتدفق نهر صغير يسمى Duden من مكانه ويمده بالشعارات اللازمة."
            ],
            'logo' => 'flaticon-wedding-car',
            'user_id' => 1
        ]);
        Service::create([
            'name' => ["en" => "City Transfer", "ar" => "تحويل المدينة"],
            'description' => [
                "en" =>
                "A small river named Duden
                flows by their place and
                supplies it with the necessary
                regelialia.", "ar" => "يتدفق نهر صغير يسمى Duden من مكانه ويمده بالشعارات اللازمة."
            ], 'logo' => 'flaticon-transportation',
             'user_id' => 1
        ]);
        Service::create([
            'name' => ["en" => "Airport Transfer", "ar" => "نقل المطار"],
            'description' => [
                "en" =>
                "A small river named Duden
                flows by their place and
                supplies it with the necessary
                regelialia.", "ar" => "يتدفق نهر صغير يسمى Duden من مكانه ويمده بالشعارات اللازمة."
            ], 'logo' => 'flaticon-car',
            'user_id' => 1
        ]);
        Service::create([
            'name' => ["en" => "Whole City Tour", "ar" => "جولة في المدينة بأكملها"],
            'description' => [
                "en" =>
                "A small river named Duden
                flows by their place
                and supplies it with the necessary
                regelialia.", "ar" => "يتدفق نهر صغير يسمى Duden من مكانه ويمده بالشعارات اللازمة."
            ], 'logo' => 'flaticon-transportation',
            'user_id' => 1
        ]);
    }
}
