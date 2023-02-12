<?php

namespace App\Http\Controllers\Admin\Ram;

use App\Http\Controllers\Controller;
use App\Models\Ram;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Ram $ram)
    {
        $ram->delete();

        return redirect()->route('admin.ram.index');
    }
}
