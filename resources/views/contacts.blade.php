@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-fileupload/bootstrap-fileupload.min.css')}}">
@endsection

@section('content')

    <section role="main" class="content-body">
        <!-- start: page -->
        <section class="panel">
            <div class="panel-body">
                <h2>Registrations</h2>
                <div class="text-right">
                    <button class="btn btn-primary print-selected" href="#">Print Selected Tags</button>
                    <button class="btn btn-primary ml-2 print-unprinted">Print Unprinted Tags (Max 1000)</button>
                    <button class="btn btn-primary ml-md btn-report">Report</button>
                    <button class="btn btn-primary ml-2 btn-report-jo" style="background: rgba(0, 0, 255, 0.3); border: 1px solid rgba(0, 0, 255, 0.3); ">JO</button>
                    <button class="btn btn-info ml-2 btn-report-yo">YO</button>
                    <button class="btn btn-success ml-2 btn-report-ge">GE</button>
                    <button class="btn btn-danger ml-2 btn-report-co">CO</button>
                    <button class="btn btn-success ml-sm btn-csv">Download Csv</button>
                </div>
                <div class="mt-sm">
                    <table class="table table-bordered table-contacts">
                        <thead>
                        <tr>
                            <td>UniqueId</td>
                            <td>Name</td>
                            <td>Gender</td>
                            <td>Group</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Province</td>
                            <td>Diocese</td>
                            <td>Hostel</td>
                            <td>Printed</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="qs-unique_idn form-control"/>
                            </td>
                            <td>
                                <input type="text" class="qs-name form-control"/>
                            </td>
                            <td>
                                <input type="text" class="qs-gender form-control"/>
                            </td>
                            <td>
                                <input type="text" class="qs-group form-control"/>
                            </td>
                            <td>
                                <input type="text" class="qs-email form-control"/>
                            </td>
                            <td>
                                <input type="text" class="qs-phone form-control"/>
                            </td>
                            <td>
                                <input type="text" class="qs-province form-control"/>
                            </td>
                            <td>
                                <input type="text" class="qs-diocese form-control"/>
                            </td>
                            <td>
                                <input type="text" class="qs-hostel form-control"/>
                            </td>
                            <td>
                                <input type="text" class="qs-is_printed form-control"/>
                            </td>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
           </section>
        </section>
        <div id="diocese-edit-dialog" class="modal-block modal-sm mfp-hide">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Diocese</h2>
                </header>
                <div class="panel-body">
                    <label>Name</label>
                    <label class="text-weight-bold text-primary ml-sm" id="label-contact-name"></label>
                    <br/>
                    <label>Hostel</label>
                    <select class="form-control mb-sm" name="hostel" required>
                        @foreach($hostels as $hostel)
                            <option value="{{ $hostel['name'] }}">{{ $hostel['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary dialog-ok">Save</button>
                            <button class="btn btn-default dialog-cancel">Cancel</button>
                        </div>
                    </div>
                </footer>
            </section>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        var lastSearchParam = {};
        tbTask = $('.table-contacts').dataTable({
            "serverSide": true,
            "ajax": '/contacts/list',

            "pageLength": 50,
            "processing": true,
            "ordering": false,
            "scrollY": "450px",
            "scrollCollapse": true,
            "dom": '<"table-responsive"t>pri',
            "orderCellsTop": true,
            "select": true,
            "columns": [
                {
                    "data": "unique_idn"
                },
                {
                    "data": "name",
                    render: function (val, meta, row) {
                        return (row['title'] || '') + ' ' + row['first_name'] + ' ' + row['last_name'];
                    }
                },
                {
                    "data": 'gender'
                },
                {
                    "data": "group",
                    render: function (val, meta, row) {
                        return row['group'] + row['subgroup'] + '-' + row['microgroup'];
                    }
                },
                {
                    "data": 'email'
                },
                {
                    "data": 'phone'
                },
                {
                    "data": 'province'
                },
                {
                    "data": 'diocese'
                },
                {
                    "data": 'hostel',
                    render:function (val, meta, row) {
                        return val + '<a href="#" class="ml-sm btn-edit-hostel">' +
                            '<i class="fa fa-pencil"></i> </a>';
                    }
                },
                {
                    "data": "is_printed",
                    render:function (val, meta, row) {
                        if (val) {
                            return '<label class="text-green">Yes</label>';
                        }
                        return '';
                    }
                }
            ],
            serverParams: function (params) {
                var filter = {};
                $.each(params['columns'], function (index, value) {
                    filter[value['data']] = $('.qs-'+value['data']).val();
                });
                lastSearchParam = JSON.stringify(filter);
                params['filter'] = lastSearchParam;
                return params;
            }
        });

        $(".table-contacts input").on('keypress', function (e) {
            if(e.key == 'Enter')
                tbTask.fnDraw();
        });

        $(".print-selected").click(function () {
            window.open('/contacts/print?filter='+lastSearchParam, '_blank');
        });
        $(".print-unprinted").click(function () {
            window.open('/contacts/print?unprinted=1', '_blank');
        });
        $(".btn-report").click(function () {
            window.open('/contacts/reportlist?filter='+lastSearchParam, '_blank');
        });

        $(".btn-report-jo").click(function () {
            window.open('/contacts/report?group=JO', '_blank');
        });
        $(".btn-report-yo").click(function () {
            window.open('/contacts/report?group=YO', '_blank');
        });
        $(".btn-report-ge").click(function () {
            window.open('/contacts/report?group=GE', '_blank');
        });
        $(".btn-report-co").click(function () {
            window.open('/contacts/report?group=CO', '_blank');
        });

        $(".btn-csv").click(function () {
            window.open('/contacts/csvdownload?filter='+lastSearchParam, '_blank');
        });

        var $currentData;
        tbTask.on('click', '.btn-edit-hostel', function () {
            var $row = $(this).closest('tr');
            var $data = tbTask.fnGetData($row[0]);
            var name = $data['first_name'] + ' ' + $data['last_name'];

            var $hostel = $('select[name="hostel"]');

            $('#label-contact-name').text(name);
            $hostel.val($data['hostel']);

            $.magnificPopup.open({
                items: {
                    src: '#diocese-edit-dialog',
                    type: 'inline'
                },
                modal: true,
            });

            $currentData = $data;
        });

        $('#diocese-edit-dialog .dialog-ok').click(function () {
            var $hostel = $('select[name="hostel"]');

            $.post('/contact/hostel', {
                id: $currentData['id'],
                hostel: $hostel.val()
            }).then(function (res) {
                tbTask.fnDraw();
                $.magnificPopup.close();
            });
        });
    </script>
@endsection


