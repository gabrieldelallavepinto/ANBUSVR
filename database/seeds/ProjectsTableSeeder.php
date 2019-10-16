<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();
        $numberSeed = 5;

        for($i = 1;$i <= $numberSeed;$i++){
            DB::table('projects')->insert([
                'user_id' => $user->id,
                'name' => "prueba$i",
                'token_key' => Str::random(60),
            ]);
        }
    }
}
