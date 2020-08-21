<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    protected $table = 'rekening';
    protected $guarded = [];

    public function setting()
    {
        return $this->hasOne(Setting::class);
    }
}
