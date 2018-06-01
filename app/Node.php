<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $fillable = [
	'count',
	'id_esp',
	'local',
	'disp'
    ];
}
