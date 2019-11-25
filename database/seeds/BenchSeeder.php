<?php

use Illuminate\Database\Seeder;
use App\Bench;

class BenchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bombayBench = new Bench();
        $bombayBench->name = "Bombay";
        $bombayBench->save();
    }
}
