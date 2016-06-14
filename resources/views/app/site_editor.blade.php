@extends('layouts.app')

@section('content')
    <div style="margin:10px">
        <h2 style = "display:inline;">Sites</h2>
        <h3 style = "display:inline;">maintenance</h3>
        <p/>
        <p id="test1"></p>
        <p id="test2"></p>
        <div class="col-sm-9 main ">

            <table class="table table-striped table-bordered " id="sites" cellspacing="0" width="100%">
                <caption style = "text-align:left;">
                    <b>Sites</b>
                </caption>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>


    <script type="text/javascript">
        document.getElementById("test1").innerHTML = "sites data: '{!! route('get_sites_data') !!}'";

        var sitesTable;

        $(document).ready(function() {
            siteEditor = new $.fn.dataTable.Editor({
                ajax: {
                    url: '{!! route('post_site_data') !!}',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                },
                table: '#sites',
                idSrc: "id",
                fields: [
                    { "label": 'Site name',
                      "name": 'name' }
                ]
                }
            );

            sitesTable = $('#sites').DataTable(
                {
                    dom: "Blfrtip",
                    processing: true,
                    serverSide: true,
                    lengthChange: true,
                    "scrollY":  "350px",
                    "scrsitesTableollCollapse": true,
                    ajax: {
                        url: '{!! route('get_sites_data') !!}',
                        dataSrc: 'data'
                    },
                    columns: [
                        { data: 'id' },
                        { data: 'name' }
                    ],
                    select: { style: 'single' },
                    buttons: [
                        { extend: "create", editor: siteEditor },
                        { extend: "edit",   editor: siteEditor },
                        { extend: "remove", editor: siteEditor},
                        { extend: 'collection',
                            text: 'Export',
                            buttons: [
                                'copy',
                                'excel',
                                'csv',
                                'pdf',
                                'print'
                            ]
                        }
                    ]
                }
            );

            document.getElementById("test2").innerHTML =  '\nsitesTable end';
        } );
    </script>
@endsection


