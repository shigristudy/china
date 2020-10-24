<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    protected $table = 'langs';

    public function lang_factor() {
        return $this->belongsTo(LangFactor::class);
    }

    public function lang_price() {
        return $this->hasMany(LangPrice::class);
    }

}
