<?php

namespace App;

class Reminder extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
