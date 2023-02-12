<?php

namespace App\Http\Controllers\Admin\Daire;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Daire\StoreRequest;
use App\Models\Daire;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        Daire::create($data);
        return redirect()->route('admin.daire.index');
    }
}
