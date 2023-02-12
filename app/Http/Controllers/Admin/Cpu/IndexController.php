<?php

namespace App\Http\Controllers\Admin\Cpu;

use App\Http\Controllers\Controller;
use App\Models\Cpu;

class IndexController extends Controller
{
    public function __invoke()
    {
        $cpus = Cpu::orderBy('id', 'ASC')->get();
        return view('admin.cpu.index', compact('cpus'));
    }
}
