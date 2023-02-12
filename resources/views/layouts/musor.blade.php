<main id="js-page-content" role="main" class="page-content">

    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">


                <div class="panel-container show">
                    <div class="panel-content">
                        <!-- datatable start -->
                        <table id="dt-basic-example"
                               class="table table-bordered table-hover table-striped w-100">
                            <thead>
                            <tr>
                                <th>Isim</th>

                                <th>Durum<i class="text-white">...........</i></th>

                            </tr>
                            </thead>


                            <tbody>
                            @foreach($servers as $server)
                                <tr>
                                    <td>{{ $server->profile->fname }}</td>

                                    <td>{{ $server->id }},{{ $server->status_id }}</td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <!-- datatable end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<!-- datatble responsive bundle contains:
+ jquery.dataTables.js
+ dataTables.bootstrap4.js
+ dataTables.autofill.js
+ dataTables.buttons.js
+ buttons.bootstrap4.js
+ buttons.html5.js
+ buttons.print.js
+ buttons.colVis.js
+ dataTables.colreorder.js
+ dataTables.fixedcolumns.js
+ dataTables.fixedheader.js
+ dataTables.keytable.js
+ dataTables.responsive.js
+ dataTables.rowgroup.js
+ dataTables.rowreorder.js
+ dataTables.scroller.js
+ dataTables.select.js
+ datatables.styles.app.js
+ datatables.styles.buttons.app.js -->
<script src="js/datagrid/datatables/datatables.bundle.js"></script>
<!-- datatbles buttons bundle contains:
+ "jszip.js",
+ "pdfmake.js",
+ "vfs_fonts.js"
NOTE: 	The file size is pretty big, but you can always use the
    build.json file to deselect any components you do not need under "export" -->

<script>
    $(document).ready(function () {
        // initialize datatable
        $('#dt-basic-example').dataTable(
            {
                responsive: true,
                columnDefs: [

                    {
                        targets: 8,
                        /*	The `data` parameter refers to the data for the cell (defined by the
                            `data` option, which defaults to the column being worked with, in this case `data: 16`.*/
                        render: function (data, type, full, meta) {
                            var lastWord = data.split(',').pop();
                            var badge = {
                                1:
                                    {
                                        'title': 'Olusturuldu',
                                        'class': 'warning'
                                    },
                                2:
                                    {
                                        'title': 'Incelemeye Alindi',
                                        'class': 'success'
                                    },
                                3:
                                    {
                                        'title': 'Canceled',
                                        'class': 'secondary'
                                    },
                            };
                            if (typeof badge[lastWord] === 'undefined') {
                                return lastWord;
                            }
                            return '<a href="javascript:void(0);" id="js-bootbox-example-11" class="badge badge-' + badge[lastWord].class + ' badge-pill">' + badge[lastWord].title + '<i class="text-' + badge[lastWord].class + '"> ' + data + '</i>' + '</a>';
                        },
                    }],
            });
    });
</script>

<script>
    $(document).ready(function () {
        "use strict";
        $("#js-bootbox-example-11").on("click", function () {
            var data = $(this).text();
            var value = data.split(' ').pop();
            var id = value.split(',')[0];
            var status_id = value.split(',').pop();
            bootbox.prompt(
                {
                    title: "This is a prompt with a set of radio inputs!",
                    message: '<p>Please select an option below:</p>',
                    inputType: 'radio',
                    inputOptions: [
                        {
                            text: value,
                            value: '1',
                        },
                        {
                            text: id,
                            value: '2',
                        },
                        {
                            text: status_id,
                            value: '3',
                        }],
                    callback: function (result) {
                    ??????
                    }
                });
        });

    });

</script>
