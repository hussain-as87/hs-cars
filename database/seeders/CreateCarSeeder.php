<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CreateCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $data['name'] = ['en' => 'Jeep', 'ar' => 'جيب'];
            $data['description'] = ['en' => 'Jeep is like Kleenex.  It’s a product model that’s become synonymous with an entire product line.
          Jeep, as a model, is designed and built by Fiat Chrysler Automobiles.
          The Jeep hit the scene in November 1940, just before the USA entered WWII.  They were widely used throughout the war and subsequent wars due to their ability to travel on all kinds of terrain.', 'ar' => 'جيب مثل كلينيكس.
           إنه نموذج منتج أصبح مرادفًا لخط إنتاج كامل. تم تصميم وبناء جيب ، كنموذج ، بواسطة شركة فيات كرايسلر للسيارات.
           ظهرت السيارة الجيب في المشهد في نوفمبر 1940 ، قبل دخول الولايات المتحدة الحرب العالمية الثانية مباشرة. تم استخدامها على نطاق واسع طوال الحرب والحروب اللاحقة بسبب قدرتها على السفر في جميع أنواع التضاريس.'];
            $data['category_id'] = 5;
            $data['user_id'] = 1;
            $data['image'] = '#';
            $data['mileage'] = '4.000';
            $data['transmission_type'] = 'Manual transmission';
            $data['seats'] = '4';
            $data['luggage'] = '2';
            $data['fuel'] = 'Petrol';
            $car = Car::create($data);
            //price data
            $price_data['car_id'] = $car->id;
            $price_data['in_houre'] = 12;
            $price_data['in_day'] = 288;
            $price_data['in_month'] = 720;
            $car->pricing()->create($price_data);
            //feather data
            $details_data['car_id'] = $car->id;
            $details_data['air_conditions'] = "1";
            $details_data['child_seat'] = "0";
            $details_data['gps'] = "1";
            $details_data['luggage'] = "1";
            $details_data['music'] = "1";
            $details_data['seat_beit'] = "0";
            $details_data['sleeping_bed'] = "1";
            $details_data['water'] = "1";
            $details_data['bluetooth'] = "1";
            $details_data['onboard_computer'] = "0";
            $details_data['audio_input'] = "1";
            $details_data['long_term_trips'] = "1";
            $details_data['car_kit'] = "1";
            $details_data['remote_central_locking'] = "1";
            $details_data['climate_control'] = "1";
            $car->feature()->create($details_data);
        }
    }
}
