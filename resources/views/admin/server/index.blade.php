@extends('layouts.table_pdf')

@section('title')
    Sunucu
@endsection

@section('head')
    <tr>

        <th>ID</th>
        <th>Durum</th>

        <th>Isim<i class="text-white">.</i>Soyisim<i class="text-white">....................</i></th>



        <th>CPU<i class="text-white">...................</i></th>
        <th>RAM<i class="text-white">...................</i></th>
        <th>Disk<i class="text-white">..................</i></th>

        <th>Isletim<i class="text-white">.</i>Sistemi Versiyonu</th>

        <th>A<i class="text-white">.</i>Kaydi<i class="text-white">..............</i></th>


        <th>Ag<i class="text-white">.</i>Turu</th>
        <th>Comment</th>

        <th class="text-center">Yorumla</th>





        <th>Talep Edilme Sebebi</th>
        <th>Aciklama</th>

        <th>Genel Mudurluk</th>
        <th>Daire Baskanligi</th>
        <th>Telefon</th>


        <th>Talep Guncelleme Tarihi</th>
        <th>Talep Olusturma Tarihi</th>

    </tr>
@endsection


@section('body')
    @foreach($servers as $server)
        <tr>
            <td>{{ $server->id }}</td>
            <td>{{ $server->status_id }}</td>

            <td>{{ $server->profile->fname }} {{ $server->profile->lname }}</td>


            <td>{{ $server->cpu->name }}</td>
            <td>{{ $server->ram->name }}</td>
            <td>{{ $server->disk->name }}</td>

            <td>{{ $server->system->name }}</td>
            <td>{{ $server->kayit }}</td>
            <td>{{ $server->ic_ag ? 'Ic Ag' : ($server->dis_ag ? 'Dis Ag' : '') }}</td>

            <td>{{ $server->comment }}</td>
            <td class="text-center">
                <a href="javascript:void(0);" data-id="{{ $server->id }}" data-comment="{{ $server->comment }}" data-status_id="{{ $server->status_id }}"  data-status="{{ $server->status->name }}" class="edit-btn"><i class="fal fa-comment-alt fa-lg"></i></a>
            </td>



            <td>{{ $server->reason }}</td>
            <td>{{ $server->description }}</td>

            <td>{{ $server->profile->mudurluk->name }}</td>
            <td>{{ $server->profile->mudurluk->daire->name }}</td>
            <td>{{ $server->profile->phone }}</td>


            <td>{{ \Carbon\Carbon::parse($server->updated_at)->format('Y-m-d') }}</td>
            <td>{{ \Carbon\Carbon::parse($server->created_at)->format('Y-m-d') }}</td>

        </tr>
    @endforeach
@endsection

@section('action')

    <script>
        $(document).ready(function () {
            $('.edit-btn').click(function () {
                var id = $(this).data('id');
                var comment = $(this).data('comment');
                var status = $(this).data('status');
                var status_id = $(this).data('status_id');

                $.get('admin/servers/' + id + '/edit', function (data) {
                    bootbox.dialog({
                        title: 'Edit Server',
                        message:
                            '<form action="admin/servers/' + id + '" method="post">' +
                            '<input type="hidden" name="_method" value="PATCH">' +
                            '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                            '<div class="form-group">' +
                            '<label>comment:</label>' +
                            '<input type="text" name="comment" value="' + comment + '" class="form-control">' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label>Status:</label>' +
                            '<select name="status_id" class="form-control">' +
                            '<option value="1"' + (status_id == 1 ? 'selected' : '') + '>Olusturuldu</option>' +
                            '<option value="2"' + (status_id == 2 ? 'selected' : '') + '>Incelemeye Alindi</option>' +
                            '<option value="3"' + (status_id == 3 ? 'selected' : '') + '>Cozuldu</option>' +
                            '<option value="4"' + (status_id == 4 ? 'selected' : '') + '>Reddedildi</option>' +
                            '</select>' +
                            '</div>' +
                            '</form>',
                        buttons: {
                            update: {
                                label: 'Update',
                                className: 'btn-primary',
                                callback: function () {
                                    $('form').submit();
                                }
                            }
                        }
                    });
                });
            });
        });
    </script>

@endsection


