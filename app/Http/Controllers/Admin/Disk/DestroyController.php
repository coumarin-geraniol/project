<?php

namespace App\Http\Controllers\Admin\Disk;

use App\Http\Controllers\Controller;
use App\Models\Disk;

class DestroyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Disk $disk)
    {
        $disk->delete();

        return redirect()->route('admin.disk.index');

    }
}
