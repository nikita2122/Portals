@extends('layouts.app')

@section('content')

    <section role="main" class="content-body">
        <!-- start: page -->
        <section class="panel">
            <div class="panel-body col-md-8">
                <h2>Diocese Assigns</h2>
                <div class="">
                    <button class="btn btn-primary" id="btn-add" href="#">Add New Assign</button>
                </div>
                <div class="mt-sm">
                    <table class="table table-bordered table-contacts" id="diocese-table">
                        <thead>
                            <td>Name</td>
                            <td>Hostel for Male</td>
                            <td>Hostel for Female</td>
                            <td></td>
                        </thead>
                        <tbody>
                            @foreach($dioceses as $diocese)
                                <tr data-diocese='{{ $diocese }}'>
                                    <td>{{ $diocese['diocese'] }}</td>
                                    <td>{{ $diocese['male_hostel'] }}</td>
                                    <td>{{ $diocese['female_hostel'] }}</td>
                                    <td>
                                        <button class="btn-edit btn btn-sm">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </button>
                                        <button class="btn-delete btn btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
           </section>
        </section>

        <div id="diocese-edit-dialog" class="modal-block modal-sm mfp-hide">
            <section class="panel">
                <form method="post" action="/diocese/edit">
                <header class="panel-heading">
                    <h2 class="panel-title">Diocese</h2>
                </header>
                <div class="panel-body">
                    @csrf
                    <input type="hidden" name="id"/>
                    <label>Diocese</label>
                    <input type="text" class="form-control mb-sm" name="diocese" required/>
                    <label>Male Hostel</label>
                    <select name="male_hostel" class="form-control">
                        @foreach($hostels as $hostel)
                            <option value="{{ $hostel['name'] }}"> {{ $hostel['name'] }}</option>
                        @endforeach
                    </select>
                    <label>Female Hostel</label>
                    <select name="female_hostel" class="form-control">
                        @foreach($hostels as $hostel)
                            <option value="{{ $hostel['name'] }}"> {{ $hostel['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-default btn-primary dialog-ok" type="submit">Save</button>
                            <button class="btn btn-default dialog-cancel" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </footer>
                </form>
            </section>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        (function($) {
            'use strict';
            $('#diocese-table').DataTable();

            $('#btn-add').click(function () {
                $('input[name="id"]').val("");
                $('input[name="diocese"]').val("");

                $.magnificPopup.open({
                    items: {
                        src: '#diocese-edit-dialog',
                        type: 'inline'
                    },
                    modal: true,
                });
            });

            $('.btn-edit').click(function () {
                var $diocese = $(this).closest('tr').data('diocese');
                $('input[name="id"]').val($diocese['id']);
                $('input[name="diocese"]').val($diocese['diocese']);
                $('input[name="male_hostel"]').val($diocese['male_hostel']);
                $('input[name="female_hostel"]').val($diocese['female_hostel']);

                $.magnificPopup.open({
                    items: {
                        src: '#diocese-edit-dialog',
                        type: 'inline'
                    },
                    modal: true,
                });
            });

            $('.btn-delete').click(function () {
                var $hostel = $(this).closest('tr').data('hostel');
                onConfirm('delete', function () {
                    $.post('/diocese/delete', { id: $hostel.id }).then(function(res) {
                        history.go();
                    });
                });
            });
        }).apply(this, [jQuery]);
    </script>
@endsection


