@extends('layouts.app')

@section('content')
    <div style="margin:10px">
        <h2 style = "display:inline;">Users</h2>
        <h3 style = "display:inline;">&nbsp;maintenance</h3>
        <p/>
        <div class="col-sm-9 main ">

            <table class="table table-striped table-bordered " id="users" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Site</th>
                        <th>Updated at</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        var userEditor; // use a global for the submit and return data rendering in the examples
        $(document).ready(function() {
            userEditor = new $.fn.dataTable.Editor( {
                ajax: {
                    url: '{!! route('post_user_data') !!}',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                },
                table: '#users',
                idSrc: "users.id",
                fields: [
                    { "label": "First Name",
                       "name": "users.first_name" },
                    { "label": "Last Name",
                       "name": "users.last_name" },
                    {   label: "Site:",
                        name: "users.site_id",
                        type: "select",
                        placeholder: "Select a location"
                    }
                ]
            } );

            userTable = $('#users').DataTable(
                {
                    dom: "Blfrtip",
                    processing: true,
                    serverSide: true,
                    lengthChange: true,
                    "scrollY":  "350px",
                    "scrollCollapse": true,
                    ajax: {
                        url: '{!! route('get_users_data') !!}',
                        dataSrc: 'data'
                    },
                    {{--ajax: '{!! route('users.data') !!}',--}}
                    columns: [
                        { "data": "users.id" /* , className: "my_class */  },
                        { "data": "users.first_name" },
                        { "data": "users.last_name" },
                        { "data": "sites.name" },
                        { "data": "users.updated_at", name: 'users.updated_at' }
                    ],
                    select: { style: 'single' },
                    buttons: [
                        { extend: "create", editor: userEditor },
                        { extend: "edit",   editor: userEditor },
                        { extend: "remove", editor: userEditor },
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
        } );
    </script>
@endsection

