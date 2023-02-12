<?php

namespace App\Http\Controllers\Admin\Disk;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Disk\UpdateRequest;
use App\Models\Disk;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(UpdateRequest $request, Disk $disk)
    {
        $data = $request->validated();

        $disk->update($data);

        return redirect()->route('admin.disk.index');
    }
}


