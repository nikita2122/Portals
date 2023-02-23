@extends('layouts.app')

@section('content')

    <section role="main" class="content-body">
        <!-- start: page -->
        <section class="panel">
            
            <div class="panel-body">
                <div class="pl-sm">
                    <center> <h1>Welcome to JGYIC </h1></center>
                    <br/>
                    <center><img src="assets/images/logo.png" alt="" width="25%"/></center>
                    <br/>
                    <center class="text-md"> JGYIC is a conference where everyone meets for friendship </center>
                    <center class="text-md fs-md">
                        <br/>
                        <div>Total number of registrations: <span class="text-weight-bold"> {{ $all }}</span></div>
                        <br/>
                        <div>Total number of men: <span class="text-weight-bold"> {{ $male }}</span></div>
                        <br/>
                        <div>Total number of women: <span class="text-weight-bold"> {{ $female }}</span></div>
                        <br/>
                    </center>
                </div>
            </div>
           </section>
        </section>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        (function($) {
            'use strict';
        }).apply(this, [jQuery]);
    </script>
@endsection


