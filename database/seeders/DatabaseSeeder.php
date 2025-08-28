<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $items = [
            
            ['site_main_logo', Null],
            ['site_footer_logo', Null],
            ['site_fav_icon', Null],
            ['site_information', 'The Nepal Holidays'],
            ['site_phone', '984 848 4848'],
            ['site_email', 'admin@dhulikhelspa.com'],
            ['site_location', 'Kathmandu, Nepal'],
            ['officeopen', '09:00 am – 10:00 pm'],
            ['site_location_url', 'https://paradiseinfo.tech/'],
            ['site_facebook', 'https://paradiseinfo.tech/'],
            ['site_youtube', 'https://paradiseinfo.tech/'],
            ['site_instagram', 'https://paradiseinfo.tech/'],
            ['site_experiance', 'The Nepal Holidays'],
            ['site_copyright', 'The Nepal Holidays'],

            ['homepage_title', 'The Nepal Holidays'],
            ['homepage_image', Null],
            ['homepagecategory', Null],
            ['footercategory', Null],
            ['homepage_description', 'The Nepal Holidays'],
            ['homepage_seo_title', 'The Nepal Holidays'],
            ['homepage_seo_description', 'The Nepal Holidays'],
            ['homepage_seo_keywords', 'The Nepal Holidays'],

            ['getappoint_small_title', 'The Nepal Holidays'],
            ['getappoint_title', 'The Nepal Holidays'],
            ['getappoint_description', 'The Nepal Holidays'],

            ['blog_small_title', 'The Nepal Holidays'],
            ['blog_title', 'The Nepal Holidays'],

            ['service_small_title', 'The Nepal Holidays'],
            ['service_title', 'The Nepal Holidays'],
            ['service_image', 'The Nepal Holidays'],

            ['price_small_title', 'The Nepal Holidays'],
            ['price_title', 'The Nepal Holidays'],

            ['gallery_small_title', 'The Nepal Holidays'],
            ['gallery_title', 'The Nepal Holidays'],

            ['review_small_title', 'The Nepal Holidays'],
            ['review_title', 'The Nepal Holidays'],

            ['team_small_title', 'The Nepal Holidays'],
            ['team_title', 'The Nepal Holidays'],

            ['faq_small_title', 'The Nepal Holidays'],
            [
                'faq_title', 'The Nepal Holidays'
            ],
            [
                'faq_image', 'The Nepal Holidays'
            ],
        ];

        if (count($items)) {
            foreach ($items as $item) {
                \App\Models\Setting::create([
                    'key' => $item[0],
                    'value' => $item[1],
                ]);
            }
        }

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gyaniholiday.com',
            'password' => Hash::make('password'),
        ]);
    }
}
