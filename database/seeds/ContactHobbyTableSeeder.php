<?php

use Illuminate\Database\Seeder;
use App\Contact;
use App\Hobby;

class ContactHobbyTableSeeder extends Seeder
{

    public function run()
    {
        $contacts =[
          'Rich Baughman' => ['cycling', 'travel'],
          'Lisa Thompson' => ['yoga', 'travel'],
          'Sarah Patches' => ['grad school', 'travel'],
          'Spenser Duehr' => ['Crossfit', 'cycling', 'travel', 'yoga'],
        ];

        foreach ($contacts as $full_name => $hobbies) {
            $contact = Contact::where('full_name', 'like', $full_name)->first();

            foreach ($hobbies as $hobby_name) {
                $hobby = Hobby::where('hobby_name', 'like', $hobby_name)->first();

                $contact->hobbies()->save($hobby);
            }
        }
    }
}
