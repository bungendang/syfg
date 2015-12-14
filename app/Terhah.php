<?php

namespace Syfg;

use Illuminate\Database\Eloquent\Model;

class Terhah extends Model
{
    protected $table = 'terhahs';

    protected $hidden = ['created_at', 'updated_at'];

    public function indonesian()
    {
        return $this->hasMany('Syfg\ThtoId');
    }
    public function english()
    {
        return $this->hasMany('Syfg\ThtoEn');
    }
}
