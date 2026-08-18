<?php

namespace Database\Seeders;

use App\Models\WebsiteInformation;
use Illuminate\Database\Seeder;

class WebsiteInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WebsiteInformation::query()->firstOrCreate([], WebsiteInformation::defaultAttributes());
    }
}
