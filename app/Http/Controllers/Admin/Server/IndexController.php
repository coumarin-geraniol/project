<?php

namespace App\Http\Controllers\Admin\Server;

use App\Http\Controllers\Controller;
use App\Models\Server;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $servers = Server::orderBy('id', 'ASC')->get();

        return view('admin.server.index', compact('servers'));

    }
}
