<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseDate extends Model
{
    protected $fillable = ['matter_id','next_date', 'description', 'srno', 'crno', 'srno', 'remark'];
    protected $dates = ['next_date'];

    public function matter()
    {
        return $this->belongsTo('App\Matter', 'matter_id');
    }
}
