<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $types = [
            'Insurance Company',
            'Reinsurance Company',
            'Insurtech Company',
            'Microfinance Institutions',
            'Agritech Company',
            'E-Marketplace Company',
            'Technology Development Company',
            'Mobile Network Operator',
            'Telecommunication Value Added Service',
            'Bank',
            'Non-Banking Financial Institutions',
            'Agri-Input Company',
            'Startup',
            'Veterinary Medicine/Vaccine Company',
        ];

        foreach ($types as $type) {
            DB::table('organization_types')->insert([
                'type' => $type,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
