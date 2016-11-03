<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{

    protected $fillable = [
        'url'
    ];

    public function note()
    {
        return $this->belongsTo('App\Note');
    }

}
