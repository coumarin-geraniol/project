@extends('layouts.table_add')

@section('route')
    "admin/cpus/create";
@endsection

@section('title')
    CPU
@endsection


@section('head')
    <tr>
        <th>ID</th>
        <th>Isim</th>
        <th>Clock</th>
        <th>Core</th>
        <th>Islemler</th>
    </tr>
@endsection



@section('body')

    @foreach($cpus as $cpu)
        <tr>
            <td>{{ $cpu->id }}</td>
            <td>{{ $cpu->name }}</td>
            <td>{{ $cpu->clock }}</td>
            <td>{{ $cpu->core }}</td>

            <td class="d-flex align-items-center justify-content-center">
                <a href="{{ route('admin.cpu.edit', $cpu->id) }}" class="mr-1">
                    <i class="fal fa-edit fa-lg"></i>
                </a>
                <form action="{{ route('admin.cpu.delete', $cpu->id) }}" method="POST">
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
