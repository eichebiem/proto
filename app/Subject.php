<?php

namespace App;

class Subject extends Model
{
    public function curr()
    {
        return $this->belongsTo(Curr::class);
    }

}
