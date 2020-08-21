<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';

    protected $guarded = [];

    public function rekening()
    {
       return $this->belongsTo(Rekening::class);
    }
}
