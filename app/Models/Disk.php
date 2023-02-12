<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disk extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $someProperty;
    protected $table = 'disks';
    protected $guarded = [];
}
