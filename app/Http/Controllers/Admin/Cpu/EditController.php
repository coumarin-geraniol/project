<?php

namespace App\Http\Controllers\Admin\Cpu;

use App\Http\Controllers\Controller;
use App\Models\Cpu;
use Illuminate\Http\Request;
use Termwind\Components\Span;

class EditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Cpu $cpu)
    {
        return view('admin.cpu.edit', compact('cpu'));
    }
}
