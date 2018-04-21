<?php

namespace App;

use App\AcadYear;

class AcadYear extends Model
{
    public static function year()
    {
        return static::where('status', 1)->first();
    }

}
