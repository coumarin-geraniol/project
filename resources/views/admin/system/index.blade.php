@extends('layouts.table_add')

@section('route')
    "admin/systems/create";
@endsection

@section('title')
    Isletim Versiyonu
@endsection


@section('head')
    <tr>
        <th>ID</th>
        <th>Isim</th>
        <th>Architecture</th>
        <th>Islemler</th>
    </tr>
@endsection



@section('body')

    @foreach($systems as $system)
        <tr>
            <td>{{ $system->id }}</td>
            <td>{{ $system->name }}</td>
            <td>{{ $system->architecture }}</td>

            <td class="d-flex align-items-center justify-content-center">
                <a href="{{ route('admin.system.edit', $system->id) }}" class="mr-1">
                    <i class="fal fa-edit fa-lg"></i>
                </a>
                <form action="{{ route('admin.system.delete', $system->id) }}" method="POST">
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
