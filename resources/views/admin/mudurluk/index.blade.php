@extends('layouts.table_add')

@section('route')
    "admin/mudurluks/create";
@endsection

@section('title')
    Genel Mudurluk
@endsection


@section('head')
    <tr>
        <th>ID</th>
        <th>Isim</th>
        <th>Daire Baskanligi Bolumu</th>
        <th>Islemler</th>
    </tr>
@endsection



@section('body')

    @foreach($mudurluks as $mudurluk)
        <tr>
            <td>{{ $mudurluk->id }}</td>
            <td>{{ $mudurluk->name }}</td>
            <td>{{ $mudurluk->daire->name }}</td>

            <td class="d-flex align-items-center justify-content-center">
                <a href="{{ route('admin.mudurluk.edit', $mudurluk->id) }}" class="mr-1">
                    <i class="fal fa-edit fa-lg"></i>
                </a>
                <form action="{{ route('admin.mudurluk.delete', $mudurluk->id) }}" method="POST">
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

