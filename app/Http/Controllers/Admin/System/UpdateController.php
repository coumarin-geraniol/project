<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\System\UpdateRequest;
use App\Models\System;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(UpdateRequest $request, System $system)
    {
        $data = $request->validated();

        $system->update($data);

        return redirect()->route('admin.system.index');
    }
}
