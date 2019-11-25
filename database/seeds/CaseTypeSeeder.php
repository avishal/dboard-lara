<?php

use Illuminate\Database\Seeder;
use App\CaseType;
class CaseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new CaseType();
        $type->name = "Civil Writ Petition";
        $type->code = "WP";
        $type->save();
    }
}
