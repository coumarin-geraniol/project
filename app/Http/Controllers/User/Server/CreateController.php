<?php

namespace App\Http\Controllers\User\Server;

use App\Http\Controllers\Controller;
use App\Models\Cpu;
use App\Models\Disk;
use App\Models\Ram;
use App\Models\System;

class CreateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke()
    {
        $cpus = Cpu::all();
        $rams = Ram::all();
        $disks = Disk::all();
        $systems = System::all();

        return view('user.server.create', compact('cpus', 'rams', 'disks', 'systems'));
    }
}
