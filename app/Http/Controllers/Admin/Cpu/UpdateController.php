<?php

namespace App\Http\Controllers\Admin\Cpu;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cpu\UpdateRequest;
use App\Models\Cpu;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(UpdateRequest $request, Cpu $cpu)
    {
        $data = $request->validated();

        $cpu->update($data);

        return redirect()->route('admin.cpu.index');
    }
}
