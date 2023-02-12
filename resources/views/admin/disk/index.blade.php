@extends('layouts.table_add')

@section('route')
    "admin/disks/create";
@endsection

@section('title')
    Disk
@endsection


@section('head')
    <tr>
        <th>ID</th>
        <th>Isim</th>
        <th>Kapasite</th>
        <th>Okuma Hizi</th>
        <th>Yazma Hizi</th>
        <th>Teknoloji</th>
        <th>Islemler</th>
    </tr>
@endsection



@section('body')

    @foreach($disks as $disk)
        <tr>
            <td>{{ $disk->id }}</td>
            <td>{{ $disk->name }}</td>
            <td>{{ $disk->capacity }}</td>
            <td>{{ $disk->read_speed }}</td>
            <td>{{ $disk->write_speed }}</td>
            <td>{{ $disk->technology }}</td>

            <td class="d-flex align-items-center justify-content-center">
                <a href="{{ route('admin.disk.edit', $disk->id) }}" class="mr-1">
                    <i class="fal fa-edit fa-lg"></i>
                </a>
                <form action="{{ route('admin.disk.delete', $disk->id) }}" method="POST">
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

