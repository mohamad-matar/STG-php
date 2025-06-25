<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places = [
            [
                'id' => 200,
                'name_ar' =>  'قصر العظم ',
                'name_en' => 'Al-Athem Palace',
                'description_ar' => 'قصر العظم هو قصر تاريخي يقع في دمشق القديمة، ويعتبر من أهم وأجمل المباني الإسلامية في المدينة',
                'description_en' => 'Al-Azm Palace is a historic palace located in Old Damascus, and is considered one of the most important and beautiful Islamic buildings in the city.',                
                'province_id' => 1,
                'image_id' => 200,
                'created_by' => 1,
            ],
            [
                'id' => 300,
                'name_ar' =>  'قلعة صلاح الدين' ,
                'name_en' => 'Saladin Citadel',
                'description_ar' => 'تعد قلعة صلاح الدين أحد أهم معالم القاهرة الإسلامية، وإحدى أعرق القلاع الحربية التي شيدت في العصور الوسطى',
                'description_en' => 'Saladin Citadel is one of the most important landmarks in Islamic Cairo, and one of the oldest military fortresses built in the Middle Ages',
                'province_id' => 1,
                'image_id' => 300,
                'created_by' => 1,
            ],
            [
                'id' => 215,
                'name_ar' =>  'الاسوق القديمة',
                'name_en' => 'Old Souck',
                'description_ar' => 'تاريخ -ثقافة',
                'description_en' => 'Cultural - history',                
                'province_id' => 1,
                'image_id' => 215,
                'created_by' => 1,
            ],
            
            [
                'id' => 11,
                'name_ar' => 'أماكن طبيعية ',
                'name_en' => 'natural places',
                'description_ar' => 'مغارة ',
                'description_en' => 'mosa',
                'province_id' => 1,
                'image_id' => 11,
                'created_by' => 1,
            ],
             [
                'id' => 100,                
                'name_ar' => 'الجامع الأموي',
                'name_en' => 'the Umayyed Mosque ',
                'description_ar' => 'أسواق - مطاعم - حلويات',
                'description_en' => 'market - restuarant - desert',
                'province_id' => 1,
                'image_id' => 100,
                'created_by' => 1,
            ],
             [
                'id' => 1000,                
                'name_ar' => 'استراحة البقيعة',
                'name_en' => 'Baqea break',
                'description_ar' => 'فطاير - حلويات',
                'description_en' => 'Fatayer - Sweets',
                'province_id' => 14,
                'image_id' => 2100 ,
                'created_by' => 1,                
             ],
             [
                'id' => 2101,                
                'name_ar' => 'شاطئ هوليداي',
                'name_en' => 'Holiday Beach',
                'description_ar' => 'منتجعات - غرف تبديل',
                'description_en' => 'Resorts - changing rooms',
                'province_id' => 8,
                'image_id' => 2101 ,
                'created_by' => 1,                
           
            ],
               [
                'id' => 4000,                
                'name_ar' => ' متحف الطب  العلوم',
                'name_en' => 'Museum of medicine and science',
                'description_ar' => 'متحف الطب والعلوم عند العرب في مدينة دمشق، أقيم في البيمارستان النوري، بعد أن أعادت ترميمَه المديرية العامة للآثار والمتاحف عام',
                'description_en' => 'The Museum of Arab Medicine and Science in Damascus, located in the Al-Nouri Hospital, after it was restored by the General Directorate of Antiquities and Museums in the year',
                'province_id' => 1,
                'image_id' => 4000 ,
                'created_by' => 1,                
             ],    
             [
                'id' => 5000,                
                'name_ar' => ' الكنيسة المريمية ',
                'name_en' => 'Mary Church ',
                'description_ar' => 'لكنيسة المريمية أو الكاتدرائية المريمية وهي إحدى كنائس مدينة دمشق عاصمة الجمهورية العربية السورية',
                'description_en' => 'The Mary Church or the Mary Cathedral is one of the churches in Damascus, the capital of the Syrian Arab Republic.',
                'province_id' => 1,
                'image_id' => 5000 ,
                'created_by' => 1,                
             ],                                         
        ];
        Place::insert($places);
        Place::find(200)->categories()->attach([2,3]);
        Place::find(215)->categories()->attach([1,2]);

        Place::find(300)->categories()->attach([2]);        
        
        Place::find(100)->categories()->attach([1, 2]);
        
        Place::find(1000)->categories()->attach([10]);
        
        Place::find(11)->categories()->attach([4]);
        Place::find(2101)->categories()->attach([4]);
        Place::find(4000)->categories()->attach([3]);
        Place::find(5000)->categories()->attach([1]);

        /** Evaluates */

        Place::find(200)->comments()->create(['comment' => 'مكان رائع', 'tourist_id' => 2]);
        Place::find(200)->comments()->create(['comment' => 'شيء مذهل', 'tourist_id' => 3]);
        Place::find(200)->tourists()->attach(2, ['evaluate' => 1]);
        Place::find(200)->tourists()->attach(3, ['evaluate' => 4]);
        
        Place::find(215)->comments()->create(['comment' => 'مكان رائع', 'tourist_id' => 2]);
        Place::find(215)->comments()->create(['comment' => 'شيء مذهل', 'tourist_id' => 3]);
        Place::find(215)->tourists()->attach(2, ['evaluate' => 3]);
        Place::find(215)->tourists()->attach(3, ['evaluate' => 4]);

        Place::find(300)->comments()->create(['comment' => 'مكان رائع', 'tourist_id' => 2]);
        Place::find(300)->comments()->create(['comment' => 'شيء مذهل', 'tourist_id' => 3]);
        Place::find(300)->tourists()->attach(2, ['evaluate' => 5]);
        Place::find(300)->tourists()->attach(3, ['evaluate' => 4]);

        Place::find(100)->comments()->create(['comment' => 'مكان رائع', 'tourist_id' => 2]);
        Place::find(100)->comments()->create(['comment' => 'شيء مذهل', 'tourist_id' => 3]);
        Place::find(100)->tourists()->attach(2, ['evaluate' => 2]);
        Place::find(100)->tourists()->attach(3, ['evaluate' => 4]);
        
        Place::find(1000)->comments()->create(['comment' => 'مكان رائع', 'tourist_id' => 2]);
        Place::find(1000)->comments()->create(['comment' => 'شيء مذهل', 'tourist_id' => 3]);
        Place::find(1000)->tourists()->attach(2, ['evaluate' => 3]);
        Place::find(1000)->tourists()->attach(3, ['evaluate' => 4]);
        
        Place::find(11)->comments()->create(['comment' => 'مكان رائع', 'tourist_id' => 2]);
        Place::find(11)->comments()->create(['comment' => 'شيء مذهل', 'tourist_id' => 3]);
        Place::find(11)->tourists()->attach(2, ['evaluate' => 5]);
        Place::find(11)->tourists()->attach(3, ['evaluate' => 4]);
        
        Place::find(2101)->comments()->create(['comment' => 'مكان رائع', 'tourist_id' => 2]);
        Place::find(2101)->comments()->create(['comment' => 'شيء مذهل', 'tourist_id' => 3]);
        Place::find(2101)->tourists()->attach(2, ['evaluate' => 4]);
        Place::find(2101)->tourists()->attach(3, ['evaluate' => 4]);

        Place::find(4000)->comments()->create(['comment' => 'مكان رائع', 'tourist_id' => 2]);
        Place::find(4000)->comments()->create(['comment' => 'شيء مذهل', 'tourist_id' => 3]);
        Place::find(4000)->tourists()->attach(2, ['evaluate' => 5]);
        Place::find(4000)->tourists()->attach(3, ['evaluate' => 3]);

        Place::find(5000)->comments()->create(['comment' => 'مكان رائع', 'tourist_id' => 2]);
        Place::find(5000)->comments()->create(['comment' => 'شيء مذهل', 'tourist_id' => 3]);
        Place::find(5000)->tourists()->attach(2, ['evaluate' => 4]);
        Place::find(5000)->tourists()->attach(3, ['evaluate' => 5]);
        
    }
}
