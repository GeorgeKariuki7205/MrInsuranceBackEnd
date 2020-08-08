<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CompanySeeder::class);
        $this->call(CoverSeeder::class);
        $this->call(SubCategoryCoverSeeder::class);
        $this->call(InsuranceProviderSeeder::class);

        // $this->call(HealthCoverAmountSeeder::class);

        $this->call(HealthPremiumSeeder::class);
        $this->call(HealthBenefitsSeeder::class);
        $this->call(HealthNotCoveredSeeder::class);
        $this->call(HealthWaitingPeriodSeeder::class);
        $this->call(HealthAdditionalPremiumSeeder::class);
        $this->call(HealthAdditionalBenefitsSeeder::class);
        $this->call(HealthAdditionalNotCoveredSeeder::class);
        $this->call(HealthAdditionalWaitingPeriodSeeder::class);
    }
}
