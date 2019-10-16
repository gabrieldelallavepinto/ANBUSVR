<?php

use Illuminate\Database\Seeder;

class GrabbsTableSeeder extends Seeder
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
        $participant = DB::table('participants')->first();
        $item = DB::table('items')->first();
        $items = DB::table('items')->where('project_id', $project->id)->get();

        srand(time());
        foreach($items as $item){
            $numberSeed = random_int(10, 150);
            for($i = 1;$i <= $numberSeed;$i++){
                DB::table('grabbs')->insert([
                    'project_id' => $project->id,
                    'item_id' => $item->id,
                    'participant_id' => $participant->id,
                    'sequence' => $i,
                    'timeStart' => random_int(25, 2000),
                    'timeEnd' => random_int(2000, 4000),
                ]);
            }
        }
    }
}
