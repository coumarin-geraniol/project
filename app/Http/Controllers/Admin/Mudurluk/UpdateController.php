<?php

namespace App\Http\Controllers\Admin\Mudurluk;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Mudurluk\UpdateRequest;
use App\Models\Mudurluk;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(UpdateRequest $request, Mudurluk $mudurluk)
    {
        $data = $request->validated();

        $mudurluk->update($data);

        return redirect()->route('admin.mudurluk.index');
    }
}
