@extends('layouts.table_pdf')

@section('title')
    Kullanici
@endsection


@section('head')
    <tr>
        <th>Isim</th>
        <th>Soyisim</th>
        <th>Genel Mudurluk</th>
        <th>Daire Baskanligi</th>
        <th>Telefon</th>

        <th>Talep Edilme Sebebi</th>
        <th>Aciklama</th>
        <th>Talep Tarihi</th>
    </tr>
@endsection



@section('body')
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->profile->fname }}</td>
            <td>{{ $post->profile->lname }}</td>
            <td>{{ $post->profile->mudurluk->name }}</td>
            <td>{{ $post->profile->mudurluk->daire->name }}</td>
            <td>{{ $post->profile->phone }}</td>

            <td>{{ $ppost->category->name }}</td>
            <td>{{ $ppost->description }}</td>
            <td>{{ $post->created_at }}</td>
        </tr>
    @endforeach
@endsection


