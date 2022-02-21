<?php

use Illuminate\Database\Seeder;
use Modules\SiteInformation\Entities\SiteInformation;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('siteinformation')->insert([
            'type' => 3,
            'data' => [
                'data' => [
                    [
                        'type' => "1",
                        'link' => '1'
                    ]
                ]
            ]
        ]);
    }
}
