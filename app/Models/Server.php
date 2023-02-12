<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Server extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'name',
        'profile_id',
        'cpu_id',
        'ram_id',
        'disk_id',
        'system_id',
        'ic_ag',
        'dis_ag',
        'kayit',
        'reason',
        'description',
        'comment',
        'status_id',
    ];

    public $someProperty;
    protected $table = 'servers';
    protected $guarded = [];

    public function cpu()
    {
        return $this->belongsTo(Cpu::class, 'cpu_id', 'id');
    }

    public function ram()
    {
        return $this->belongsTo(Ram::class, 'ram_id', 'id');
    }

    public function disk()
    {
        return $this->belongsTo(Disk::class, 'disk_id', 'id');
    }

    public function system()
    {
        return $this->belongsTo(System::class, 'system_id', 'id');
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

}
