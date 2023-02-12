<?php

namespace App\Http\Controllers\Admin\Daire;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Daire\UpdateRequest;
use App\Models\Daire;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(UpdateRequest $request, Daire $daire)
    {
        $data = $request->validated();

        $daire->update($data);

        return redirect()->route('admin.daire.index');

    }
}
