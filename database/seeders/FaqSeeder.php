<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faq = [
            [
               
                'questions' => 'How long should it take to receive my membership package?',
                'answers' => 'The processing, shipping, and delivery of your PDGA membership package may take 6-10 weeks. Once the PDGA Fulfillment Office prints the shipping label for your membership package, you will receive a confirmation email with the tracking information. Thank you for your patience.'

            ],
            [
                'questions' => 'Where can you find out how the PDGA Player Rating System works?',
                'answers' => 'You can get the most up-to-date information about the ratings system in the PDGA Ratings System guide.'
            ],
            [
                'questions' => 'Is it true that players earn better ratings for the same score when a bunch of top, higher rated players compete in the event?',
                'answers' => 'Yes, it can sometimes be true by a few percentage points. However, heres the catch. Its not because these top players have higher ratings. A couple factors are in play. There can be additional tournament pressure in higher tier events especially when local players are grouped with traveling pros.'
            ],
            [
                'questions' => 'When are ratings updated?',
                'answers' => 'Ratings updates occur on the second Tuesday of each month. The online event report submission deadline is the Sunday prior to the ratings publication date. However, reports submitted via email must be received the Thursday prior to the publication date.'
            ],
            [
                'questions' => 'What are the benefits of being a member?',
                'answers' => 'A full list of member benefits can be found here'
            ],
            [
                'questions' => 'Can I get a refund for my membership?',
                'answers' => 'PDGA memberships are non-refundable and non-transferable. PDGA membership benefits and services are available to you immediately upon completing the registration process.'
            ],


        ];
        DB::table('faq')->insert(
            $faq
        );
    }
}
