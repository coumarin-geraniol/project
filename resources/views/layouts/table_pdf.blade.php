@extends('layouts.main')

@section('content')
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> DataTables: <span class='fw-300'>Responsive</span>
                <sup class='badge badge-primary fw-500'>ADDON</sup>
                <small>
                    Create headache free searching, sorting and pagination tables without any complex
                    configuration
                </small>
            </h1>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Example <span class="fw-300"><i>Table</i></span>
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip"
                                    data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                                    data-offset="0,10" data-original-title="Fullscreen"></button>
                        </div>
                    </div>

                    <div class="panel-container show">
                        <div class="panel-content">
                            <!-- datatable start -->
                            <table id="dt-basic-example"
                                   class="table table-bordered table-hover table-striped w-100">
                                <thead>
                                @yield('head')
                                </thead>


                                <tbody>
                                @yield('body')

                                </tbody>
                            </table>
                            <!-- datatable end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


@section('script')


    <script>
        $(document).ready(function () {
            // initialize datatable
            $('#dt-basic-example').dataTable(
                {
                    responsive: true,
                    lengthChange: false,
                    dom:
                    /*	--- Layout Structure
                        --- Options
                        l	-	length changing input control
                        f	-	filtering input
                        t	-	The table!
                        i	-	Table information summary
                        p	-	pagination control
                        r	-	processing display element
                        B	-	buttons
                        R	-	ColReorder
                        S	-	Select

                        --- Markup
                        < and >				- div element
                        <"class" and >		- div with a class
                        <"#id" and >		- div with an ID
                        <"#id.class" and >	- div with an ID and a class

                        --- Further reading
                        https://datatables.net/reference/option/dom
                        --------------------------------------
                     */
                        "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            text: 'Excel',
                            titleAttr: 'Generate Excel',
                            className: 'btn-outline-success btn-sm mr-1'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: 'PDF',
                            titleAttr: 'Generate PDF',
                            className: 'btn-outline-danger btn-sm mr-1'
                        },
                    ],
                    columnDefs: [

                        {
                            targets: 1,
                            /*	The `data` parameter refers to the data for the cell (defined by the
                                `data` option, which defaults to the column being worked with, in this case `data: 16`.*/
                            render: function(data, type, full, meta)
                            {
                                var badge = {
                                    1:
                                        {
                                            'title': 'Olusturuldu',
                                            'class': 'badge-secondary'
                                        },
                                    2:
                                        {
                                            'title': 'Incelemeye Alindi',
                                            'class': 'badge-warning'
                                        },
                                    3:
                                        {
                                            'title': 'Cozuldu',
                                            'class': 'badge-success'
                                        },
                                    4:
                                        {
                                            'title': 'Reddedildi',
                                            'class': 'badge-danger'
                                        },
                                };
                                if (typeof badge[data] === 'undefined')
                                {
                                    return data;
                                }
                                return '<span class="badge ' + badge[data].class + ' badge-pill">' + badge[data].title + '</span>';
                            },
                        },
                        {
                            "targets": 0,
                            "width": "5%"
                        },
                    ],
                });
        });
    </script>

@yield('action')

@endsection
