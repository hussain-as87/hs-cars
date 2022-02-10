<?php

namespace Database\Seeders;

use App\Models\Admin\Category;
use Illuminate\Database\Seeder;

class CreateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['name'] = ['en' => 'SUV', 'ar' => 'س ي ف'];
        $data['description'] = ['en' => 'Jeep is like Kleenex.  It’s a product model that’s become synonymous with an entire product line.
          Jeep, as a model, is designed and built by Fiat Chrysler Automobiles.
          The Jeep hit the scene in November 1940, just before the USA entered WWII.  They were widely used throughout the war and subsequent wars due to their ability to travel on all kinds of terrain.', 'ar' => 'جيب مثل كلينيكس.
           إنه نموذج منتج أصبح مرادفًا لخط إنتاج كامل. تم تصميم وبناء جيب ، كنموذج ، بواسطة شركة فيات كرايسلر للسيارات.
           ظهرت السيارة الجيب في المشهد في نوفمبر 1940 ، قبل دخول الولايات المتحدة الحرب العالمية الثانية مباشرة. تم استخدامها على نطاق واسع طوال الحرب والحروب اللاحقة بسبب قدرتها على السفر في جميع أنواع التضاريس.'];
        $data['logo'] = '#';
        $data['user_id'] = 1;
        Category::create($data);

        $data1['name'] = ['en' => 'Truck', 'ar' => 'شاحنة'];
        $data1['description'] = ['en' => 'Jeep is like Kleenex.  It’s a product model that’s become synonymous with an entire product line.
          Jeep, as a model, is designed and built by Fiat Chrysler Automobiles.
          The Jeep hit the scene in November 1940, just before the USA entered WWII.  They were widely used throughout the war and subsequent wars due to their ability to travel on all kinds of terrain.', 'ar' => 'جيب مثل كلينيكس.
           إنه نموذج منتج أصبح مرادفًا لخط إنتاج كامل. تم تصميم وبناء جيب ، كنموذج ، بواسطة شركة فيات كرايسلر للسيارات.
           ظهرت السيارة الجيب في المشهد في نوفمبر 1940 ، قبل دخول الولايات المتحدة الحرب العالمية الثانية مباشرة. تم استخدامها على نطاق واسع طوال الحرب والحروب اللاحقة بسبب قدرتها على السفر في جميع أنواع التضاريس.'];
        $data1['logo'] = '#';
        $data1['user_id'] = 1;
        Category::create($data1);

        $data2['name'] = ['en' => 'Sedan', 'ar' => 'سيدان'];
        $data2['description'] = ['en' => 'Jeep is like Kleenex.  It’s a product model that’s become synonymous with an entire product line.
          Jeep, as a model, is designed and built by Fiat Chrysler Automobiles.
          The Jeep hit the scene in November 1940, just before the USA entered WWII.  They were widely used throughout the war and subsequent wars due to their ability to travel on all kinds of terrain.', 'ar' => 'جيب مثل كلينيكس.
           إنه نموذج منتج أصبح مرادفًا لخط إنتاج كامل. تم تصميم وبناء جيب ، كنموذج ، بواسطة شركة فيات كرايسلر للسيارات.
           ظهرت السيارة الجيب في المشهد في نوفمبر 1940 ، قبل دخول الولايات المتحدة الحرب العالمية الثانية مباشرة. تم استخدامها على نطاق واسع طوال الحرب والحروب اللاحقة بسبب قدرتها على السفر في جميع أنواع التضاريس.'];
        $data2['logo'] = '#';
        $data2['user_id'] = 1;
        Category::create($data2);

        $data3['name'] = ['en' => 'Van', 'ar' => 'سيارة نقل'];
        $data3['description'] = ['en' => 'Porsche is on fire in 2022, with a massive lineup of exciting sports cars, SUVs,
         and electric vehicles (EVs).
          The automakers first electric car debuted in 2020 ', 'ar' => 'تشتعل بورش في عام 2022
          ، مع مجموعة ضخمة من السيارات الرياضية المثيرة ، وسيارات الدفع الرباعي ، والسيارات الكهربائية (EVs).
           ظهرت أول سيارة كهربائية لصانع السيارات في عام 2020'];
        $data3['logo'] = '#';
        $data3['user_id'] = 1;
        Category::create($data3);

        $data4['name'] = ['en' => 'Coupe ', 'ar' => 'كوبيه'];
        $data4['description'] = ['en' => 'The most significant change to the 2022 Mazda model line is the addition of the brands first electric vehicle (EV), the MX-30 crossover.
         Mazdas maiden voyage into electrification should open doors to future EVs across the model line.', 'ar' => 'كان التغيير الأكثر أهمية في خط طراز 2022 Mazda هو إضافة أول سيارة كهربائية (EV) للعلامة التجارية ،
          MX-30 كروس. يجب أن تفتح رحلة Mazda الأولى في مجال الكهرباء الأبواب أمام السيارات الكهربائية المستقبلية عبر خط الطراز.'];
        $data4['logo'] = '#';
        $data4['user_id'] = 1;
        Category::create($data4);

        $data5['name'] = ['en' => 'Sports Cars', 'ar' => 'سيارات رياضية'];
        $data5['description'] = ['en' => 'The most significant change to the 2022 Mazda model line is the addition of the brands first electric vehicle (EV), the MX-30 crossover.
         Mazdas maiden voyage into electrification should open doors to future EVs across the model line.', 'ar' => 'كان التغيير الأكثر أهمية في خط طراز 2022 Mazda هو إضافة أول سيارة كهربائية (EV) للعلامة التجارية ،
          MX-30 كروس. يجب أن تفتح رحلة Mazda الأولى في مجال الكهرباء الأبواب أمام السيارات الكهربائية المستقبلية عبر خط الطراز.'];
        $data5['logo'] = '#';
        $data5['user_id'] = 1;
        Category::create($data5);

        $data6['name'] = ['en' => 'Diesel', 'ar' => 'ديزل'];
        $data6['description'] = ['en' => 'The most significant change to the 2022 Mazda model line is the addition of the brands first electric vehicle (EV), the MX-30 crossover.
         Mazdas maiden voyage into electrification should open doors to future EVs across the model line.', 'ar' => 'كان التغيير الأكثر أهمية في خط طراز 2022 Mazda هو إضافة أول سيارة كهربائية (EV) للعلامة التجارية ،
          MX-30 كروس. يجب أن تفتح رحلة Mazda الأولى في مجال الكهرباء الأبواب أمام السيارات الكهربائية المستقبلية عبر خط الطراز.'];
        $data6['logo'] = '#';
        $data6['user_id'] = 1;
        Category::create($data6);
    }
}
