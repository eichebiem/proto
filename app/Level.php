<?php

namespace App;

class Level extends Model
{
    public function curr()
    {
        return $this->hasMany(Curr::class);
    }

}
