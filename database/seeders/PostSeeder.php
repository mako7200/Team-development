<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('posts')->insert([
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'title'=> 'test1',
                'content'=> 'test1test1test1test1test1',
                'country_id'=> '1',
                'occupation_id'=> '1',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'title'=> 'test2',
                'content'=> 'test2test2test2est2test2',
                'country_id'=> '2',
                'occupation_id'=> '2',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'title'=> 'test3',
                'content'=> 'test3test3test3test3test3',
                'country_id'=> '3',
                'occupation_id'=> '3',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'title'=> 'test4',
                'content'=> 'test3test3test3test3test3',
                'country_id'=> '3',
                'occupation_id'=> '4',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'title'=> 'test5',
                'content'=> 'test3test3test3test3test3',
                'country_id'=> '3',
                'occupation_id'=> '1',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'title'=> 'test6',
                'content'=> 'test3test3test3test3test3',
                'country_id'=> '3',
                'occupation_id'=> '4',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'title'=> 'test7',
                'content'=> 'test3test3test3test3test3',
                'country_id'=> '3',
                'occupation_id'=> '5',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'title'=> 'test8',
                'content'=> 'test3test3test3test3test3',
                'country_id'=> '3',
                'occupation_id'=> '1',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'title'=> 'test9',
                'content'=> 'test3test3test3test3test3',
                'country_id'=> '3',
                'occupation_id'=> '2',
            ],
        ]);
    }
}
