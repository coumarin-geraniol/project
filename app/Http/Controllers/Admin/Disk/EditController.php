<?php

namespace App\Http\Controllers\Admin\Disk;

use App\Http\Controllers\Controller;
use App\Models\Disk;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Disk $disk)
    {
        return view('admin.disk.edit', compact('disk'));

    }
}
