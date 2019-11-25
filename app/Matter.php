<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    protected $fillable = [
        "case_number",
        "year",
        "bench_id",
        "case_side_id",
        "case_type_id",
        "stamp_register_id"];

    /*$attributeNames = array(
       'bench_id' => 'Bench',
       'case_side_id' => 'Side',
    );*/

    public function clients()
    {
        return $this->belongsToMany("App\Client",'client_matters','matter_id', 'client_id');
    }


    public function bench()
    {
        return $this->belongsTo("App\Bench");
    }
    public function case_side()
    {
        return $this->belongsTo("App\CaseSide");
    }
    public function case_type()
    {
        return $this->belongsTo("App\CaseType");
    }
    public function stamp_register()
    {
        return $this->belongsTo("App\StampRegister");
    }

    public function case_dates()
    {
        return $this->hasMany("App\CaseDate");
    }

    public function matterTest($x, $y)
    {
        if($x > 0 && $y > 0)
        {
            return $x + $y;
        }
        else
        {
            return 0;
        }
    }
}
