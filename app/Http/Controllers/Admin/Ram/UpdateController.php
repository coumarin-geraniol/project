<?php

namespace App\Http\Controllers\Admin\Ram;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ram\UpdateRequest;
use App\Models\Ram;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(UpdateRequest $request, Ram $ram)
    {
        $data = $request->validated();

        $ram->update($data);

        return redirect()->route('admin.ram.index');
    }
}
