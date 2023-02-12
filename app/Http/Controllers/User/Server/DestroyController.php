<?php

namespace App\Http\Controllers\User\Server;

use App\Http\Controllers\Controller;
use App\Models\Cpu;
use App\Models\Disk;
use App\Models\Ram;
use App\Models\Server;
use App\Models\System;

class DestroyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke(Server $server)
    {
        $server->delete();

        return redirect()->route('user.server.index');
    }
}
