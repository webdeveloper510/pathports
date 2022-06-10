<?php

namespace Database\Seeders;


use App\Models\InterestAreasSubCategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterestAreasSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (InterestAreasSubCategory::all()->count()===0) {
            DB::table('interest_areas_sub_categories')->insert([
                [
                    'cat_id' => '1',
                    'subcategory_name' => 'Biology',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'cat_id' => '1',
                    'subcategory_name' => 'Botany',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'cat_id' => '2',
                    'subcategory_name' => 'Chemistry',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'cat_id' => '2',
                    'subcategory_name' => 'Math',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'cat_id' => '3',
                    'subcategory_name' => 'Banking',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'cat_id' => '3',
                    'subcategory_name' => 'Insurance',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'cat_id' => '4',
                    'subcategory_name' => 'Computer Science',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'cat_id' => '4',
                    'subcategory_name' => 'Mechanical Engineering',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                
            ]);
        }
    }
}
