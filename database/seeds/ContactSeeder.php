<?php

use Illuminate\Database\Seeder;
use EPink\Contact\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'name' => 'Leonardo da Vinci',
            'email' => 'leonardo@davinci.com',
            'phone' => '600000001',
            'subject' => 'Information request',
            'message' => 'Once you have tasted flight, you will forever walk the earth with your eyes 
                turned skyward, for there you have been, and there you will always long to return.',
            'form' => 'contact'
        ]);

        Contact::create([
            'name' => 'Michelangelo Buonarroti',
            'email' => 'michelangelo@buonarroti',
            'phone' => '600000002',
            'subject' => 'Contact',
            'message' => 'The greater danger for most of us lies not in setting our aim too high and 
                falling short; but in setting our aim too low, and achieving our mark.',
            'form' => 'contact'
        ]);

        Contact::create([
            'name' => 'Miguel de Cervantes',
            'email' => 'miguel@decervantes',
            'phone' => '600000003',
            'subject' => 'Hello',
            'message' => 'Finally, from so little sleeping and so much reading, his brain dried up 
                and he went completely out of his mind.',
            'form' => 'contact'
        ]);

        Contact::create([
            'name' => 'Salvador Dalí',
            'email' => 'miguel@decervantes',
            'phone' => '600000004',
            'subject' => 'Contact request',
            'message' => 'At the age of six I wanted to be a cook. At seven I wanted to be Napoleon. 
                And my ambition has been growing steadily ever since.',
            'form' => 'contact'
        ]);
    }
}
