@extends('layouts.table_add')

@section('route')
    "admin/categories/create";
@endsection

@section('title')
    Sorun Tipleri
@endsection


@section('head')
    <tr>
        <th>ID</th>
        <th>Isim</th>
        <th>Islemler</th>
    </tr>
@endsection



@section('body')

    @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>

            <td>{{ $category->name }}</td>

            <td class="d-flex align-items-center justify-content-center">
                <a href="{{ route('admin.category.edit', $category->id) }}" class="mr-1">
                    <i class="fal fa-edit fa-lg"></i>
                </a>
                <form action="{{ route('admin.category.delete', $category->id) }}" method="POST">
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
