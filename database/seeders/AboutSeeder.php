<?php

namespace Database\Seeders;

use App\Models\Admin\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'id' => 1,
            'description' => [
                "en" => "A small river named Duden flows by their place and supplies it with the necessary regelialia.
                It is a paradisematic country, in which roasted parts of sentences fly into your mouth.

                On her way she met a copy. The copy warned the Little Blind Text,that where it came from it would have been rewritten athousand times and
                everything that was left from its origin would be the word  and the Little Blind Text should turn around and return to its own,safe country.
                A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country,
                in which roasted parts of sentences fly into your mouth.",

                "ar" => "يتدفق نهر صغير يُدعى Duden من مكانه ويمدها بالراحة اللازمة.
                إنها دولة الفردوسية ، حيث تتطاير الأجزاء المحمصة من الجمل في فمك.

                في طريقها قابلت نسخة. حذرت النسخة النص المكفوف الصغير ، من أن مصدره كان سيُعاد كتابته ألف مرة و
                كل ما تبقى من أصله سيكون كلمة  ويجب أن يستدير النص الصغير للمكفوفين ويعود إلى بلده الآمن.
                يتدفق نهر صغير يُدعى Duden من مكانه ويمدها بالراحة اللازمة. إنها دولة الفردوسية ،
                حيث تنتقل الأجزاء المشوية من الجمل إلى فمك."
            ],
            'photo' => '1643109478.jpg'
        ]);
    }
}
