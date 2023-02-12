<?php

namespace App\Http\Controllers\User\Server;

use App\Http\Controllers\Controller;
use App\Models\Cpu;
use App\Models\Disk;
use App\Models\Ram;
use App\Models\Server;
use App\Models\System;

class EditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke(Server $server)
    {
        $cpus = Cpu::all();
        $rams = Ram::all();
        $disks = Disk::all();
        $systems = System::all();

        return view('user.server.edit', compact('server', 'cpus', 'rams', 'disks', 'systems'));
    }
}
