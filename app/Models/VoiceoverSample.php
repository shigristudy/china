<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoiceoverSample extends Model
{
    protected $table = 'voiceover_samples';

    protected $guarded = [];
    //

    public function lang() {
        return $this->belongsTo(VoiceoverSample::class, 'lang_id');
    }
}
