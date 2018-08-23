<?php

use Illuminate\Database\Seeder;
use App\Models\Replay;

class ReplaysTableSeeder extends Seeder
{
    public function run()
    {
//        $replays = factory(Replay::class)->times(50)->make()->each(function ($replay, $index) {
//            if ($index == 0) {
//                // $replay->field = 'value';
//            }
//        });
//
//        Replay::insert($replays->toArray());

        $user_id = \App\Models\User::all()->pluck("id")->toArray();
        $topic_id = \App\Models\Topic::all()->pluck("id")->toArray();

        $facker = app(Faker\Generator::class);

        $replays = factory(Replay::class)->times(200)->make()->each(function($replay,$index)use($user_id,$topic_id,$facker){

            $replay->user_id = $facker->randomElement($user_id);
            $replay->topic_id = $facker->randomElement($topic_id);
        });

        Replay::insert($replays->toArray());
    }

}

