<?php

namespace App\Http\Controllers\Admin\Ram;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ram\StoreRequest;
use App\Models\Ram;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        Ram::create($data);
        return redirect()->route('admin.ram.index');
    }
}
