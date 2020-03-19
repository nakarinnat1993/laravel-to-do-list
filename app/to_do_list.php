<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class To_do_list extends Model
{
    protected $fillable = ['topic','do_at','status'];
}
