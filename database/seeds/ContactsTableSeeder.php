<?php

use Illuminate\Database\Seeder;
use App\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [
            ['Lisa', 'Thompson', 'Lisa Thompson', 'personal', 'lthompson@test.com', 'mobile', '6177970000'],
            ['Rich', 'Baughman', 'Rich Baughman', 'personal', 'rich@test.com', 'mobile', '7812900000'],
            ['Spenser', 'Duehr', 'Spenser Duehr', 'personal', 'spenser@test.com', 'mobile', '2623050000'],
            ['Sarah', 'Patches', 'Sarah Patches', 'personal', 'sarah@test.com', 'mobile', '2155200000'],
            ['Lily', 'Fesler', 'Lily Felser', 'personal', 'lilyfesler0@gmail.com', 'mobile', '7817990000'],
        ];

        $count = count($contacts);

        foreach ($contacts as $key => $contactData) {
        $contact = new Contact();

        $contact->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
        $contact->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
        $contact->first_name = $contactData[0];
        $contact->last_name = $contactData[1];
        $contact->full_name = $contactData[2];
        $contact->email_type = $contactData[3];
        $contact->email = $contactData[4];
        $contact->phone_type = $contactData[5];
        $contact->phone = $contactData[6];

        $contact->save();
        $count--;
        }
    }
}
