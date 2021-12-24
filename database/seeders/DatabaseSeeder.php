<?php

namespace Database\Seeders;

use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'activity_log',
            'failed_jobs',
        ]);

        $this->call(UpdateInformationSeeder::class);
        $this->call(AuthSeeder::class);
        $this->call(AnnouncementSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(SportSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(LeagueSeeder::class);
        $this->call(LandingPageSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(PlayerSeeder::class);
        $this->call(StatisticSeeder::class);
        $this->call(RankSeeder::class);
        $this->call(OldRankSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(PostTagSeeder::class);



        Model::reguard();
    }
}
