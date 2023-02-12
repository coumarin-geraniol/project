<?php

namespace App\Http\Controllers\Admin\Disk;

use App\Http\Controllers\Controller;
use App\Models\Disk;

class IndexController extends Controller
{
    public function __invoke()
    {
        $disks = Disk::all();
        return view('admin.disk.index', compact('disks'));
    }
}
