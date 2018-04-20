<?php

namespace App;

class Program extends Model
{
    public function curr()
    {
        return $this->hasMany(Curr::class);
    }

}
