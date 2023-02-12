@extends('layouts.table_add')

@section('route')
    "admin/rams/create";
@endsection

@section('title')
    RAM
@endsection


@section('head')
    <tr>
        <th>ID</th>
        <th>Isim</th>
        <th>Transfer Rate</th>
        <th>Clock Speed</th>
        <th>Bus Speed</th>
        <th>Islemler</th>
    </tr>
@endsection



@section('body')

    @foreach($rams as $ram)
        <tr>
            <td>{{ $ram->id }}</td>
            <td>{{ $ram->name }}</td>
            <td>{{ $ram->transfer_rate }}</td>
            <td>{{ $ram->clock_speed }}</td>
            <td>{{ $ram->bus_speed }}</td>

            <td class="d-flex align-items-center justify-content-center">
                <a href="{{ route('admin.ram.edit', $ram->id) }}" class="mr-1">
                    <i class="fal fa-edit fa-lg"></i>
                </a>
                <form action="{{ route('admin.ram.delete', $ram->id) }}" method="POST">
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

