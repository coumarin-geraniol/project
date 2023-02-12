@extends('layouts.table_pdf')

@section('title')
    Sunucu
@endsection


@section('head')
    <tr>
        <th>Isim</th>
        <th>Soyisim</th>
        <th>Genel Mudurluk</th>
        <th>Daire Baskanligi</th>
        <th>Telefon</th>

        <th>CPU</th>
        <th>RAM</th>
        <th>Disk</th>
        <th>Isletim Sistemi Versiyonu</th>

        <th>A Kaydi</th>
        <th>Ag Turu</th>

        <th>Talep Edilme Sebebi</th>
        <th>Aciklama</th>

        <th>Talep Tarihi</th>

        <th>Durum</th>

    </tr>
@endsection



@section('body')
    @foreach($servers as $server)
        <tr>
            <td>{{ $server->profile->fname }}</td>
            <td>{{ $server->profile->lname }}</td>
            <td>{{ $server->profile->mudurluk->name }}</td>
            <td>{{ $server->profile->mudurluk->daire->name }}</td>
            <td>{{ $server->profile->phone }}</td>

            <td>{{ $server->cpu->name }}</td>
            <td>{{ $server->ram->name }}</td>
            <td>{{ $server->disk->name }}</td>
            <td>{{ $server->system->name }}</td>

            <td>{{ $server->kayit }}</td>
            <td>{{ $server->ic_ag ? 'Ic Ag' : ($server->dis_ag ? 'Dis Ag' : '') }}</td>

            <td>{{ $server->reason }}</td>
            <td>{{ $server->description }}</td>

            <td>{{ \Carbon\Carbon::parse($server->created_at)->format('Y-m-d') }}</td>
            <td>
                <!-- If status is "created", show "Take to Inspection" and "Solved" options, else show the current status -->
                @if ($server->status_id == 1)
                    <select onchange="updateStatus(this, {{ $server->status_id }})">
                        <option value="1" selected>Created</option>
                        <option value="2">Take to Inspection</option>
                        <option value="3">Solved</option>
                    </select>
                @else
                    {{ $server->status->name }}
                @endif
            </td>
        </tr>
    @endforeach
@endsection



