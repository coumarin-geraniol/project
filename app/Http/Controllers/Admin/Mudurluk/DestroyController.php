<?php

namespace App\Http\Controllers\Admin\Mudurluk;

use App\Http\Controllers\Controller;
use App\Models\Mudurluk;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Mudurluk $mudurluk)
    {
        $mudurluk->delete();

        return redirect()->route('admin.mudurluk.index');
    }
}
