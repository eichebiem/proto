<?php

namespace App;

class Curr extends Model
{
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }

}
