<?php

namespace Modules\SiteInformation\Database\Seeders;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\SiteInformation\Entities\SiteInformation;

class SiteInformationDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteInformation::create([
            'type' => 0,
            'data' => [
                'data' => [
                    'title' => '',
                    'company-name' => '',
                    'why-us' => '',
                    'description' => '',
                    'image' => ''
                ]
            ]
        ]);

        SiteInformation::create([
            'type' => 1,
            'data' => [
                'data' => [
                    'title' => '',
                    'phone' => "",
                    'description' => '',
                    'email' => '',
                    'address' => '',
                ]
            ]
        ]);







        SiteInformation::create([
            'type' => 3,
            'data' => [
                'data' => [
                    [
                        'type' => "درباره ما",
                        'link' => 'about-us'
                    ]
                ]
            ]
        ]);
        SiteInformation::create([
            'type' => 3,
            'data' => [
                'data' => [
                    [
                        'type' => "ارتباط با ما",
                        'link' => 'contact-us'
                    ]
                ]
            ]
        ]);
        SiteInformation::create([
            'type' => 3,
            'data' => [
                'data' => [
                    [
                        'type' => "سوالات متداول",
                        'link' => 'faq'
                    ]
                ]
            ]
        ]);
        SiteInformation::create([
            'type' => 3,
            'data' => [
                'data' => [
                    [
                        'type' => "محصولات",
                        'link' => 'products'
                    ]
                ]
            ]
        ]);
    }
}
