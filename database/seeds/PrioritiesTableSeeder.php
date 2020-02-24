<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Priority;

class PrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->delete();
        $priorities = file_get_contents(base_path('database/repositories/priorities.json'));
        $priorities = json_decode($priorities);
        foreach ($priorities as $priority) {
            Priority::create(array(
                "priority_name" => $priority));
        }
    }
}
