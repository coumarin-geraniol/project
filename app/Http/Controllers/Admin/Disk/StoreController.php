<?php

namespace App\Http\Controllers\Admin\Disk;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Disk\StoreRequest;
use App\Models\Disk;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        Disk::create($data);
        return redirect()->route('admin.disk.index');
    }
}
