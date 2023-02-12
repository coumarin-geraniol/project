<?php

namespace App\Http\Controllers\Admin\Ram;

use App\Http\Controllers\Controller;
use App\Models\Ram;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $rams = Ram::all();
        return view('admin.ram.index', compact('rams'));
    }
}
