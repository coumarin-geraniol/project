<?php

namespace App\Http\Controllers\Admin\Server;

use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request, $id)
    {
        $server = Server::findOrFail($id);
        $server->update($request->only(['comment', 'status_id']));
        return redirect()->route('admin.server.index');

    }
}
