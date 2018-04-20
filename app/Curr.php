<?php

namespace App;

class Curr extends Model
{
    public function level()
    {
        return $this->belongsTo(Program::class);
    }
}
