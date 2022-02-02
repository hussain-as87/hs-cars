<?php

namespace Database\Seeders;

use App\Models\Admin\Advert;
use Illuminate\Database\Seeder;

class AdvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Advert::create([
            'user_id' => 1,
            'title' => [
                "en" => "Fast & Easy Way To Rent A Car",
                "ar" => "طريقة سريعة وسهلة لتأجير السيارات"
            ], 'description' => [
                "en" => "A small river named \"Duden\" flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts",
                "ar" => "يتدفق نهر صغير يُدعى \"Duden\" من مكانه ويمدها بالراحة اللازمة. إنها دولة الفردوسية ، فيها أجزاء محمصة"
            ], 'video' => 'https://www.youtube.com/watch?v=02yxl06J4Uw',
            'image' => 'bg_1.jpg'
        ]);
    }
}
