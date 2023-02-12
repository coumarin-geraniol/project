<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Profile extends Authenticatable
{
    use HasFactory;

    use SoftDeletes;
    public $someProperty;
    protected $table = 'profiles';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function mudurluk()
    {
        return $this->belongsTo(Mudurluk::class, 'mudurluk_id', 'id');
    }

}
