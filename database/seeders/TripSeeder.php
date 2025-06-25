<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Provider\Trip;
use App\Models\Provider\TripDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trip::create([
            'id' => 1,
            'name_ar' => 'ساحل طرطوس',
            'name_en' => 'Tartos beach',

            'start_date' => '2025-07-17 07:00:00',
            'end_date' => '2025-07-23 16:42:52',

            'count' => 45,
            'cost' => 300000,

            'provider_id' => 2000
        ]);

    
        Trip::find(1)->tourists()->attach(2, ['seat_count' => 5 , 'evaluate' => 3]);
        Trip::find(1)->tourists()->attach(3, ['seat_count' => 2 , 'evaluate' => 2]) ;        

        Comment::insert([
            ['comment' => 'الرحلة روعة وممتعة' ,   'type' => 'comment' ,  'commented_id' =>  1, 'commented_type' =>  'App\Models\Provider\Trip' , 'tourist_id' => 2],
            ['comment' => 'هل بالإمكان إعادة هذه الرحلة',   'type' => 'comment',  'commented_id' =>  1, 'commented_type' =>  'App\Models\Provider\Trip' , 'tourist_id' => 3],
        ]);

        TripDetail::insert([
            [
                'name_ar' => 'فطور ضمن الاستراحة',
                'name_en' => 'Breakfast  within rest stop',
                'start_date' => '2025-07-17 10:00:00',
                'end_date' => '2025-07-17 10:30:00',
                'trip_id' => 1,
                'place_id' => '1000',
            ],
            [
                'name_ar' => 'جلوس على الشط',
                'name_en' => 'Sitting on the beach',
                'start_date' => '2025-07-17 18:00:00',
                'end_date' => '2025-07-17 20:30:00',
                'trip_id' => 1,
                'place_id' => '2101',
            ]
        ]);

        Trip::insert([
            [
                'id' => 2,
                'name_ar' => 'مدرجات بصرى الشام',
                'name_en' => 'Bosra Amphitheater',

                'start_date' => '2025-08-01 07:00:00',
                'end_date' => '2025-08-01 22:30:00',

                'count' => 25,
                'cost' => 75000,

                'provider_id' => 2000
            ],
            [
                'id' => 3,
                'name_ar' => 'شلالات تل شهاب',
                'name_en' => 'Tell Shehab',

                'start_date' => '2025-05-01 07:00:00',
                'end_date' => '2025-05-01 22:30:00',

                'count' => 30,
                'cost' => 75000,

                'provider_id' => 2000
            ]
        ]);


        Trip::find(2)->tourists()->attach(2, ['seat_count' => 2, 'evaluate' => 4]);
        Trip::find(2)->tourists()->attach(3, ['seat_count' => 2, 'evaluate' => 2]);

        Trip::find(3)->tourists()->attach(2, ['seat_count' => 1, 'evaluate' => 3]);
        Trip::find(3)->tourists()->attach(3, ['seat_count' => 2, 'evaluate' => 5]);
    }
}
