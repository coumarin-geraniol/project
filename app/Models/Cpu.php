<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cpu extends Model
{
    use HasFactory;

    use SoftDeletes;
    public $someProperty;
    protected $table = 'cpus';
    protected $guarded = [];
}
