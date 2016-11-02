<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    protected $fillable = [
        'title','description','category_id','user_id'
    ];

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }

    public function links()
    {
        return $this->hasMany('App\Link');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
