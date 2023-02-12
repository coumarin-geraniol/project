<?php

namespace App\Http\Controllers\Admin\Mudurluk;

use App\Http\Controllers\Controller;
use App\Models\Daire;
use App\Models\Mudurluk;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Mudurluk $mudurluk)
    {
        $daires = Daire::all();
        return view('admin.mudurluk.edit', compact('mudurluk', 'daires'));
    }
}
