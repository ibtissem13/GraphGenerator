<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GraphsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		    \App\Models\Graph::factory( 10)->create();

    }
}
