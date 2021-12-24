<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('landing_page')->insert([
            'title' => 'SportStats',
            'description' => 'A web application to display data for Sports Players, where each player will have their statistics, ranking(the logic behind each ranking) and the functionality to be scouted by verified Sport Managers. The application itself will also have a free view and a premium view for paid subscription accounts.',
            'title_aboutus'=>'About Us',
            'description_aboutus'=>'SportStats started from the NextWave Team in October 2021. Our goal is to process player data, create a ranking logic, and display it all to our users. ',
            'title_cards'=>'Info 1',
            'description_cards'=>'SporStats delivers premium content and engaging products that enhance the experience of fans across a number of major sports. LiveScore is also proud to be the Official Global Scoring Partner of LaLiga Santander.',
            'title2_cards'=>'Info 2',
            'description2_cards'=>'Sportstats is a brand-new sportsbook offering around the world customers a new and improved betting experience. Building on the existing user relationship with the trusted LiveScore brand that is already a core part of the live sport experience.',
            'title3_cards'=>'Info 3',
            'description3_cards'=>'With access to a huge range of betting markets across all the top sports, as well as the nation’s most popular casino products, Virgin Bet delivers a top quality experience for its customers and has the perfect line-up to disrupt the sportsbook industry.',
            'title_admin'=>'Admin Dashboard',
            'description_admin'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quas, similique animi temporibus fugiat aperiam quae officia earum nihil mollitia officiis at natus blanditiis amet tenetur, neque atque qui molestiae! Doloribus possimus ea quas qui odit animi obcaecati quaerat? Alias, sunt minima. Ratione mollitia provident veniam natus deserunt omnis. A provident amet dolores vel. Autem a porro ea minus quo.',
            'title_user'=>'User Dashboard',
            'description_user'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quas, similique animi temporibus fugiat aperiam quae officia earum nihil mollitia officiis at natus blanditiis amet tenetur, neque atque qui molestiae! Doloribus possimus ea quas qui odit animi obcaecati quaerat? Alias, sunt minima. Ratione mollitia provident veniam natus deserunt omnis. A provident amet dolores vel. Autem a porro ea minus quo.',
            'tab1'=>'ranking',
            'tab2'=>'player',
            'tab3'=>'team',
            'tab4'=>'statistics',
            'tab1_description'=>'The problem of evaluating the performance of soccer players is
            attracting the interest of many companies and the scientific community, thanks to the availability of massive data capturing all the
            events generated during a match (e.g., tackles, passes, shots, etc.).
            Unfortunately, there is no consolidated and widely accepted metric
            for measuring performance quality in all of its facets. In this paper,
            we design and implement PlayeRank, a data-driven framework that
            offers a principled multi-dimensional and role-aware evaluation of
            the performance of soccer players.',
            'tab2_description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti eveniet voluptates dicta perspiciatis laborum vitae quia, ea consequatur quisquam consectetur, nisi qui minima dolores quod veritatis molestiae at delectus neque?',
            'tab3_description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti eveniet voluptates dicta perspiciatis laborum vitae quia, ea consequatur quisquam consectetur, nisi qui minima dolores quod veritatis molestiae at delectus neque?',
            'tab4_description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti eveniet voluptates dicta perspiciatis laborum vitae quia, ea consequatur quisquam consectetur, nisi qui minima dolores quod veritatis molestiae at delectus neque?'
        
        ]);    
    }

}