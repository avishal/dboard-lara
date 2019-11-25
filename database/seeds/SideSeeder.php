<?php

use Illuminate\Database\Seeder;
use App\CaseSide;

class SideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $side = new CaseSide();
        $side->name = "Civil";
        $side->code = "C";
        $side->save();
    }
}
