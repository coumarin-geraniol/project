<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Controller;
use App\Models\System;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $systems = System::all();
        return view('admin.system.index', compact('systems'));
    }
}
