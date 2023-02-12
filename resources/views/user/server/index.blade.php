@extends('layouts.table_pdf')

@section('title')
    Sunucu
@endsection


@section('head')
    <tr>
        <th>ID</th>
        <th>Durum<i class="text-white">.............</i></th>

        <th>CPU</th>
        <th>RAM</th>
        <th>Disk</th>
        <th>Isletim Sistemi Versiyonu</th>


        <th>A Kaydi<i class="text-white">.............</i></th>
        <th>Ag Turu</th>

        <th>Talep Edilme Sebebi<i class="text-white">....................</i></th>
        <th>Aciklama<i class="text-white">....................</i></th>


        <th>Yorum<i class="text-white">....................</i></th>


        <th><div class="d-flex align-items-center justify-content-center">Guncelle<i class="text-white">...........</i></div></th>
        <th>Talep Guncelleme Tarihi</th>

        <th>Talep Olusturma Tarihi</th>

    </tr>
@endsection



@section('body')
    @foreach($servers as $server)
        <tr>
            <td>{{ $server->id }}</td>
            <td>{{ $server->status_id }}</td>

            <td>{{ $server->cpu->name }}</td>
            <td>{{ $server->ram->name }}</td>
            <td>{{ $server->disk->name }}</td>
            <td>{{ $server->system->name }}</td>


            <td>{{ $server->kayit}}</td>
            <td>{{ $server->ic_ag ? 'Ic Ag' : ($server->dis_ag ? 'Dis Ag' : '') }}</td>
            <td>{{ $server->reason}}</td>
            <td>{{ $server->description}}</td>



            <td>{{ $server->comment }}</td>

            <td class="d-flex align-items-center justify-content-center">
                @if($server->status_id == 1)
                    <a href="{{ route('user.server.edit', $server->id) }}" class="mr-1">
                        <i class="fal fa-edit fa-lg"></i>
                    </a>
                    <form action="{{ route('user.server.delete', $server->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-white p-0">
                            <i class="text-primary fal fa-trash-alt fa-lg"></i>
                        </button>
                    </form>


                @else
                    <a href="javascript:void(0);" class="disabled mr-1">
                        <i class="fal fa-edit fa-lg"></i>
                    </a>
                    <a href="javascript:void(0);" class="disabled">
                        <i class="fal fa-trash-alt fa-lg"></i>
                    </a>
                @endif

            </td>
            <td>{{ \Carbon\Carbon::parse($server->updated_at)->format('Y-m-d') }}</td>
            <td>{{ \Carbon\Carbon::parse($server->created_at)->format('Y-m-d') }}</td>

        </tr>
    @endforeach
@endsection

