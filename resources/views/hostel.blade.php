@extends('layouts.app')

@section('content')

    <section role="main" class="content-body">
        <!-- start: page -->
        <section class="panel">
            <div class="panel-body col-md-8">
                <h2>Hostels</h2>
                <div class="">
                    <button class="btn btn-primary" id="btn-add" href="#">Add New Hostel</button>
                </div>
                <div class="mt-sm">
                    <table class="table table-bordered table-contacts">
                        <thead>
                            <td>Name</td>
                            <td>Rooms for Male</td>
                            <td>Rooms for Female</td>
                            <td></td>
                        </thead>
                        <tbody>
                            @foreach($hostels as $hostel)
                                <tr data-hostel='{{ $hostel }}'>
                                    <td>{{ $hostel['name'] }}</td>
                                    <td>{{ $hostel['male_room'] }}</td>
                                    <td>{{ $hostel['female_room'] }}</td>
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

        <div id="hostel-edit-dialog" class="modal-block modal-sm mfp-hide">
            <section class="panel">
                <form method="post" action="/hostel/edit">
                <header class="panel-heading">
                    <h2 class="panel-title">Hostel</h2>
                </header>
                <div class="panel-body">
                    @csrf
                    <input type="hidden" name="id"/>
                    <label>Name</label>
                    <input type="text" class="form-control mb-sm" name="name" required/>
                    <label>Rooms for Male</label>
                    <input type="number" class="form-control mb-sm" name="male_room" value="1"/>
                    <label>Rooms for Female</label>
                    <input type="number" class="form-control mb-sm" name="female_room" value="1"/>
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
            $('#btn-add').click(function () {
                $('input[name="id"]').val("");
                $('input[name="name"]').val("");
                $('input[name="male_room"]').val(1);
                $('input[name="female_room"]').val(1);


                $.magnificPopup.open({
                    items: {
                        src: '#hostel-edit-dialog',
                        type: 'inline'
                    },
                    modal: true,
                });
            });

            $('.btn-edit').click(function () {
                var $hostel = $(this).closest('tr').data('hostel');
                $('input[name="id"]').val($hostel['id']);
                $('input[name="name"]').val($hostel['name']);
                $('input[name="male_room"]').val($hostel['male_room']);
                $('input[name="female_room"]').val($hostel['female_room']);

                $.magnificPopup.open({
                    items: {
                        src: '#hostel-edit-dialog',
                        type: 'inline'
                    },
                    modal: true,
                });
            });

            $('.btn-delete').click(function () {
                var $hostel = $(this).closest('tr').data('hostel');
                onConfirm('delete', function () {
                    $.post('/hostel/delete', { id: $hostel.id }).then(function(res) {
                        history.go();
                    });
                });
            });
        }).apply(this, [jQuery]);
    </script>
@endsection


