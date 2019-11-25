<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $fillable = ["client_name"];

    public function matters()
    {
        return $this->belongsToMany("App\Matter",'client_matters','client_id', 'matter_id');
    }
}
