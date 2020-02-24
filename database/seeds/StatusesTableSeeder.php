<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->delete();
        $statuses = file_get_contents(base_path('database/repositories/statuses.json'));
        $statuses = json_decode($statuses);
        foreach ($statuses as $status) {
            Status::create(array(
                "status_name" => $status));
        }
    }
}
