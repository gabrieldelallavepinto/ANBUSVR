<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();
        $project = DB::table('projects')->first();
        $numberSeed = 5;

        for($i = 1;$i <= $numberSeed;$i++){
            DB::table('items')->insert([
                'project_id' => $project->id,
                'name' => "item$i",
            ]);
        }
    }
}
