<?php


use App\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::create([
            'site_name' => "Adnan Ali's Site",
            'contact_number' => "03058293314",
            'contact_email' => 'adnan.qtaa@gmail.com',
            'address' => 'Police Station Quetta'
            ]);
    }
}