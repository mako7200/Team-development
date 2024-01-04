<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('occupations')->insert([
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'occupation_name'=> 'コンサル',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'occupation_name'=> '金融',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'occupation_name'=> 'メーカー',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'occupation_name'=> '商社',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'occupation_name'=> 'IT・通信',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'occupation_name'=> '広告・マスコミ',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'occupation_name'=> '人材・教育',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'occupation_name'=> 'インフラ・交通',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'occupation_name'=> '不動産・建設',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'occupation_name'=> '旅行・観光',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'occupation_name'=> 'ブライダル・美容・くらし',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'occupation_name'=> '医療福祉',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'occupation_name'=> '公務員',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'occupation_name'=> '流通・商売',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'occupation_name'=> 'その他',
            ],
        ]);
    }
}
