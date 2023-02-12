@extends('layouts.table_add')

@section('route')
    "admin/daires/create";
@endsection

@section('title')
    Daire Baskanligi Bolumleri
@endsection


@section('head')
    <tr>
        <th>ID</th>
        <th>Isim</th>
        <th>Islemler</th>
    </tr>
@endsection



@section('body')

    @foreach($daires as $daire)
        <tr>
            <td>{{ $daire->id }}</td>
            <td>{{ $daire->name }}</td>

            <td class="d-flex align-items-center justify-content-center">
                <a href="{{ route('admin.daire.edit', $daire->id) }}" class="mr-1">
                    <i class="fal fa-edit fa-lg"></i>
                </a>
                <form action="{{ route('admin.daire.delete', $daire->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-white p-0">
                        <i class="text-primary fal fa-trash-alt fa-lg"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@endsection

