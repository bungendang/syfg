<?php

namespace Syfg;

use Illuminate\Database\Eloquent\Model;

class ThtoId extends Model
{
    protected $table = "th_to_ina";
    protected $hidden = ['created_at', 'updated_at'];
}
