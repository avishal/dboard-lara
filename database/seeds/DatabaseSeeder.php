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
        $this->call(RoleSeeder::class);
        $this->call(BenchSeeder::class);
        $this->call(CaseTypeSeeder::class);
        $this->call(SideSeeder::class);
        $this->call(StampRegisterSeeder::class);
    }
}
