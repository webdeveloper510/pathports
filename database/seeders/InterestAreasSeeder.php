<?php

namespace Database\Seeders;


use App\Models\InterestAreas;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterestAreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (InterestAreas::all()->count()===0) {
            DB::table('interest_areas')->insert([
                [
                    'subcat_id' => '1',
                    'interest_area_name' => 'Computational Biology',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'subcat_id' => '1',
                    'interest_area_name' => 'Molecular Biology',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'subcat_id' => '2',
                    'interest_area_name' => 'Plant Biology',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'subcat_id' => '2',
                    'interest_area_name' => 'Horticulture Breeding',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                
            ]);
        }
    }
}
