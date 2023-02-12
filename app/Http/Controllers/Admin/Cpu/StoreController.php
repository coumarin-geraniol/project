<?php

namespace App\Http\Controllers\Admin\Cpu;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cpu\StoreRequest;
use App\Models\Cpu;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        Cpu::create($data);
        return redirect()->route('admin.cpu.index');
    }
}



