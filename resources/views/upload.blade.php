@extends('layouts.app')

@section('header')
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}">
@endsection

@section('content')

    <section role="main" class="content-body">
        <!-- start: page -->
        <section class="panel">
            <div class="content p-5 main-content">
                @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('error')}}
                    </div>
                @endif
                <form action="/upload" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-sm">
                        <label class="control-label">Excel Upload</label>
                        <div>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input" style="min-width: 350px;">
                                        <i class="fa fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                <span class="fileupload-exists">Change</span>
                                <span class="fileupload-new">Select file</span>
                                <input type="file" name="excel"/>
                            </span>
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-upload" type="submit">Upload</button>
                </form>
            </div>
        </section>
    </section>

@endsection

@section('script')
    <script src="{{ asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
    <script type="text/javascript">
        $(function () {

            "use strict";
            $(".btn-upload").on('click', function() {
                setTimeout(function () {
                    $('.loader_bg').fadeToggle();
                }, 200);
            });
        });
    </script>
@endsection


