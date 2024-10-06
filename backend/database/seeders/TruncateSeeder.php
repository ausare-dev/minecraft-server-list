<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TruncateSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('category_server')->truncate();
        DB::table('categories')->truncate();
        DB::table('servers')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
