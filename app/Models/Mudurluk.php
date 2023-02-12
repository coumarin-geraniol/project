<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mudurluk extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $someProperty;
    protected $table = 'mudurluks';
    protected $guarded = [];

    public function daire()
    {
        return $this->belongsTo(Daire::class, 'daire_id', 'id');
    }
}
