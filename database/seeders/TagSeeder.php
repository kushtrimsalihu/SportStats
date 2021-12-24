<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag= [
    [
       'name'=>'reus'
    ],
    [
        'name'=>'halaand'
    ],
    [
        'name'=>'dortmund'
    ]
    ];
        DB::table('tag')->insert(
            $tag
        );
    }
}
