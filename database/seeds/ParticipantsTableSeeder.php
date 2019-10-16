<?php

use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Types\Integer;

class ParticipantsTableSeeder extends Seeder
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
            DB::table('participants')->insert([
                'project_id' => $project->id,
                'name' => "participant$i",
                'age' => random_int(18, 80),
                'gender' => 'male',
            ]);
        }
    }
}
