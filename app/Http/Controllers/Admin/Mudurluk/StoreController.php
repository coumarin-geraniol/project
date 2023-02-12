<?php

namespace App\Http\Controllers\Admin\Mudurluk;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Mudurluk\StoreRequest;
use App\Models\Mudurluk;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        Mudurluk::create($data);
        return redirect()->route('admin.mudurluk.index');
    }
}
