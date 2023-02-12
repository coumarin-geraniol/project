<?php

namespace App\Http\Controllers\Admin\Daire;

use App\Http\Controllers\Controller;
use App\Models\Daire;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Daire $daire)
    {
        return view('admin.daire.edit', compact('daire'));
    }
}
