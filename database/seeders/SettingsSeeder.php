<?php

namespace Database\Seeders;

use App\Models\Admin\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     Setting::create(['name'=>'website_name','value'=>'HS Car']);
     Setting::create(['name'=>'description','value'=>'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.']);
     Setting::create(['name'=>'time_zone','value'=>'asia/jerusalem']);
     Setting::create(['name'=>'webiste_phone','value'=>'2 392 3929 210']);
     Setting::create(['name'=>'webiste_email','value'=>'info@yourdomain.com']);
     Setting::create(['name'=>'facebook_url','value'=>'#']);
     Setting::create(['name'=>'twitter_url','value'=>'#']);
     Setting::create(['name'=>'instagram_name','value'=>'#']);
     Setting::create(['name'=>'them','value'=>'dark']);
     Setting::create(['name'=>'year_experienced','value'=>'60']);
     Setting::create(['name'=>'total_branches','value'=>'67']);
     Setting::create(['name'=>'address','value'=>'203 Fake St. Mountain View, San Francisco, California, USA']);
    }
}
