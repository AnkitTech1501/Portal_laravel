<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EmployerBond;

class EmployerBondSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployerBond::create(['bond_duration' => '6 months']);
        EmployerBond::create(['bond_duration' => '1 years']);
        EmployerBond::create(['bond_duration' => '2 years']);
        EmployerBond::create(['bond_duration' => '3 years']);
        EmployerBond::create(['bond_duration' => '4 years']);
    }
}
