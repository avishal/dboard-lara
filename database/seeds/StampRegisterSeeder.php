<?php

use Illuminate\Database\Seeder;
use App\StampRegister;
class StampRegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new StampRegister();
        $type->name = "Stamp";
        $type->code = "S";
        $type->save();

        $rtype = new StampRegister();
        $rtype->name = "Register";
        $rtype->code = "R";
        $rtype->save();
    }
}
