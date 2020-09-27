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
        $this->call(CoverRequirementSeeder::class);
        $this->call(CoverQuestionSeeder::class);
        
                                                
        $this->call(HealthCoverAmountSeeder::class);
        $this->call(HealthPremiumSeeder::class);
        $this->call(HealthBenefitsSeeder::class);
        $this->call(HealthNotCoveredSeeder::class);
        $this->call(HealthWaitingPeriodSeeder::class);

        $this->call(HealthAdditionalSeeder::class);
        $this->call(HealthAdditionlPremiumSeeder::class);
        $this->call(HealthAdditionalBenefitSeeder::class);
        $this->call(HealthAdditionalNotCoveredSeeder::class);
        $this->call(HealthAdditionalWaitingPeriodSeeder::class);


        // ! Motor Insurance Seeders. 
        $this->call(PrivateCostDetailSeeder::class);
        $this->call(PrivateComprehensiveCoverSeeder::class);
        $this->call(PrivateThirdPartyCoverSeeder::class);
        $this->call(CommercialClassSeeder::class);
        $this->call(CommercialComprehensiveCostSeeder::class);        
        $this->call(CommercialTypeOfThirdPartyCostSeeder::class);
        
        

    }
}
