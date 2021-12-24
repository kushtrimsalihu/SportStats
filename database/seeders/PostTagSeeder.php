<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {$posttag=[
        [
            'tag_id' => '1',
            'post_id'=> '3'
        ],
        [
            'tag_id' => '2',
            'post_id'=> '3'
        ],
        [
            'tag_id' => '3',
            'post_id'=> '3'
        ],
    ];
        DB::table('posttag')->insert(
            $posttag
        );
    }
}
