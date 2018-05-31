<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tv extends Model
{
    protected $fillable = [
	'count',
	'id_esp',
	'owner'
    ];
}
