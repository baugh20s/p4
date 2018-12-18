<?php

use Illuminate\Database\Seeder;
use App\Hobby;

class HobbiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
    {
        $hobbies = [
            ['yoga'],
            ['cycling'],
            ['Crossfit'],
            ['grad school'],
            ['triathlons'],
            ['painting'],
            ['travel'],
        ];

        $count = count($hobbies);

        foreach ($hobbies as $key => $hobbyData) {
            $hobby = new Hobby();

            $hobby->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $hobby->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $hobby->hobby_name = $hobbyData[0];

            $hobby->save();
            $count--;
        }

        /*
         compare to this from lecture:
         foreach ($tags as $tagName) {
            $tag = new Tag();
            $tag->name = $tagName;
            $tag->save();
        */
    }
}
