<?php

namespace App\Http\Controllers\Admin\Daire;

use App\Http\Controllers\Controller;
use App\Models\Daire;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $daires = Daire::all();
        return view('admin.daire.index', compact('daires'));
    }
}
