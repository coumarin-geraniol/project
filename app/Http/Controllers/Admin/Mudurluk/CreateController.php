<?php

namespace App\Http\Controllers\Admin\Mudurluk;

use App\Http\Controllers\Controller;
use App\Models\Daire;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $daires = Daire::all();
        return view('admin.mudurluk.create', compact('daires'));
    }
}
