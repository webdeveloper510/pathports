<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\University;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::all()->count()===0) {
            DB::table('users')->insert([
                [
                    'username' => 'SuperNova',
                    'email' => 'admin@pathports.com',
                    'role_id' => Role::where('name','Admin')->first()->id,
                    'university_id' => '1',
                    'status' => '1',
                    'password' => bcrypt('hackMeIn@2022!@#$'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'username' => 'UniversityAdmin',
                    'email' => 'universityadmin@pathports.com',
                    'role_id' => Role::where('name','University')->first()->id,
                    'university_id' => '1',
                    'status' => '1',
                    'password' => bcrypt('hackMeIn@2022!@#$'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]);
        }
    }
}


