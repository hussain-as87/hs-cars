<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Rent;
use App\Models\RentCar;
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
        /**create test rent */
        for ($i = 1; $i <= 20; $i++) {
            $data['id'] = $i;
            $data['location'] = 'gaza';
            $data['user_id'] = 1;
            $data['drop_off_location'] = 'north of gaza';
            $data['pik_up_date'] = "7/15/2022";
            $data['drop_off_date'] = "7/26/2022";
            $data['pik_up_time'] = "12:00am";
            $data['created_at'] = "2018-02-" . $i . " 08:31:29";
            $data['updated_at'] = "2018-02-" . $i . " 08:31:29";

            $datetime1 = date_create("7/15/2022");
            $datetime2 = date_create("7/26/2022");
            $interval = date_diff($datetime1, $datetime2);
            $total_amount = $interval->format('%a');
            $amount = "2592.00";

            $rent = Rent::create($data);

            $price = "288.00";
            RentCar::create([
                'rent_id' => $i,
                'car_id' => $i,
                'quantity' => "1",
                'price' => $price,
                'amount' => $amount,
            ]);
        }
    }
}
