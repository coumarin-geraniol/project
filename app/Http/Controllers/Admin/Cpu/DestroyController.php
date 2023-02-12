<?php

namespace App\Http\Controllers\Admin\Cpu;

use App\Http\Controllers\Controller;
use App\Models\Cpu;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Cpu $cpu)
    {
        $cpu->delete();

        return redirect()->route('admin.cpu.index');

    }
}
