<?php

namespace App\Http\Controllers\Admin\Mudurluk;

use App\Http\Controllers\Controller;
use App\Models\Mudurluk;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $mudurluks = Mudurluk::all();
        return view('admin.mudurluk.index', compact('mudurluks'));
    }
}
