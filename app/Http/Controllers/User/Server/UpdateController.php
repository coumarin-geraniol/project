<?php

namespace App\Http\Controllers\User\Server;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request, Server $server)
    {
        $data = \request()->validate([
            'cpu_id' => 'required|string',
            'ram_id' => 'required|string',
            'disk_id' => 'required|string',
            'system_id' => 'required|string',
            'ag' => 'required|string',
            'reason' => 'required|string',
            'description' => 'required|string',
            'kayit' => 'required|string',
        ]);

        $data['ic_ag'] = $data['ag'] === 'ic_ag';
        $data['dis_ag'] = $data['ag'] === 'dis_ag';
        unset($data['ag']);


        $server->update($data);

        return redirect()->route('user.server.index');

    }
}
