<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RelationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        		    \App\Models\Relation::factory( 10)->create();

    }
}
