<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Kelas::factory(1)->create();
        $faker = Faker::create();

        for ($i=7; $i <= 9; $i++) {
            for ($k=1; $k <= 5; $k++) {
                DB::table('kelas')->insert([
                    ['kelas' => $i."-".$k, 'walkel' => $faker->unique()->name()],
                ]);
            }
        }

        \App\Models\Siswa::factory(360)->create(); 

        $pelajaran = [
            'mathematics', 'science', 'social', 'economy', 'english', 'arts', 'physical', 'computer', 'music', 'mandarin'
        ];

        foreach ($pelajaran as $matpel) {
            DB::table('matpel')->insert([
                'matpel'=>$matpel,
            ]);
        }

        \App\Models\Nilai::factory(330)->create();
    }
}
