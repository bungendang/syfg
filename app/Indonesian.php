<?php

namespace Syfg;

use Illuminate\Database\Eloquent\Model;

class Indonesian extends Model
{
    protected $table = 'indonesians';
    protected $hidden = ['created_at', 'updated_at'];
}
