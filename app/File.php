<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = [];

    public function dloads()
    {
        return $this->hasMany(Download::class);
    }
}
