<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = "ksclass";
    protected $primaryKey = "c_id";
    public $timestamps = false;
    protected $guarede = [];
}
