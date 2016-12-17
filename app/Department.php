<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Designation;
class Department extends Model
{
    protected $fillable=['department'];

    public function designations()
    {
        return $this->hasMany('App\Designation');

    }
}
