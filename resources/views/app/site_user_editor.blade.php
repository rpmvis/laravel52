@extends('layouts.app')

@section('content')
    <div style="margin:10px">
        <h2 style = "display:inline;">Sites-Users</h2>
        <h3 style = "display:inline;">&nbsp;maintenance</h3>
        <p/>
        <div class="col-sm-9 main ">

            <table class="table table-striped table-bordered " id="sites" cellspacing="0" width="100%">
                <caption style = "text-align:left;">
                    <b>Sites</b>
                </caption>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        {{--<th>Count of users</th>--}}
                    </tr>
                </thead>
            </table>
            <br>
            <table class="table table-striped table-bordered " id="users" cellspacing="0" width="100%">
                <caption style = "text-align:left;">
                    <b>Users</b>
                </caption>        <h2 style = "display:inline;">Users</h2>
        <h3 style = "display:inline;">&nbsp;maintenance</h3>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Updated at</th>
                        <th>Site</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        var sitesTable;
        var usersTable;
        var siteEditor;
        var userEditor;

        $(document).ready(function() {
            siteEditor = new $.fn.dataTable.Editor( {
                ajax: {
                    url: '{!! route('post_SU_site_data') !!}',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                },
                table: '#sites',
                idSrc: "id",
                fields: [
                    { "label": 'Site name',
                      "name": 'name' }
                ]
            } );

            siteEditor.on( 'onInitEdit', function () {
//                siteEditor.disable('id');
//                siteEditor.disable('count_users');
            } );

            userEditor = new $.fn.dataTable.Editor( {
                ajax: {
                    url: '{!! route('post_SU_user_data') !!}',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: function ( d ) {
                        var selected = sitesTable.row( { selected: true } );

                        if ( selected.any() ) {
                            d.site_id = selected.data().id;
                            // alert('site id: ' + selected.data().id);
                        }
                    }
                },
                table: '#users',
                idSrc: "users.id",
                fields: [
                    { "label": "First Name",
                        "name": "users.first_name" },
                    { "label": "Last Name",
                        "name": "users.last_name" },
//                    { "label": "Site Id",
//                        "name": "site_id"}
                    {   label: "Site:",
                        name: "users.site_id",
                        type: "select",
                        placeholder: "Select a location"
                    }
                    ]
            } );

            sitesTable = $('#sites').DataTable(
                    {
                        dom: "Blfrtip",
                        processing: true,
                        serverSide: true,
                        lengthChange: true,
                        "scrollY":  "350px",
                        "scrollCollapse": true,
                        ajax: {
                            url: '{!! route('get_SU_sites_data') !!}',
                            dataSrc: 'data'
                        },
                        columns: [
                            { data: 'id' },
                            { data: 'name' }
//                            { data: 'users', render: function ( data ) {
//                                return data.length;
//                            } }
//                            { data: 'count_users' }
//                            { data: 'users_count.aggregate', render: function ( data ) {
//                                if (users_count.aggregate) return users_count.aggregate;
//                                else return 0;
//                            } }
                        ],
                        select: { style: 'single' },
                        buttons: [
                            { extend: "create", editor: siteEditor },
                            { extend: "edit",   editor: siteEditor },
                            { extend: "remove", editor: siteEditor },
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
                    } );

            usersTable = $('#users').DataTable( {
                dom: "Blfrtip",
                processing: true,
                serverSide: true,
                lengthChange: true,
                "scrollY":  "350px",
                "scrollCollapse": true,
                ajax: {
                    url: '{!! route('get_SU_users_data') !!}',
                    dataSrc: 'data',
                    data: function ( d ) {
                        var selected = sitesTable.row( { selected: true } );

                        if ( selected.any() ) {
                            d.site_id = selected.data().id;
                            // alert('d.site_id: ' + d.site_id)
                        }
                    }
                },
                columns: [
                    { data: 'users.id' },
                    { data: 'users.first_name' },
                    { data: 'users.last_name' },
                    { data: 'users.updated_at' },
                    { data: 'sites.name' }
                ],
                select: { style: 'single' },
                buttons: [
                    { extend: 'create', editor: userEditor },
                    { extend: 'edit',   editor: userEditor },
                    { extend: 'remove', editor: userEditor },
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
            } );

            sitesTable.on( 'select', function () {
                usersTable.ajax.reload();

//                userEditor
//                    .field( 'users.site_id' )
//                    .def( sitesTable.row( { selected: true } ).data().id );
                // alert(2);
            } );

            sitesTable.on( 'deselect', function () {
                usersTable.ajax.reload();
            } );

            siteEditor.on( 'submitSuccess', function () {
                usersTable.ajax.reload();
            } );

            userEditor.on( 'submitSuccess', function () {
                sitesTable.ajax.reload();
            } );            
            
            // alert(1);site_id
        } );

    </script>
@endsection


