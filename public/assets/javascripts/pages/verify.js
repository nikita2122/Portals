(function($) {

    'use strict';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#btn-verify').click(function (e) {
        $('#div-found').addClass('hidden');
        $('#div-notfound').addClass('hidden');
        $.post('/contact/verify', { phone: $('#inputPhoneNo').val() }).then((res) => {
            if (!res || res.length == 0 || !res[0]['unique_idn']) {
                $('#div-notfound').removeClass('hidden');
            } else {
                $('#div-found').removeClass('hidden');
                $('#contact-uniqueId').text(res[0]['unique_idn']);
                $('#contact-name').text(res[0]['title'] + ' ' + res[0]['first_name'] + ' ' + res[0]['last_name']);
            }
        });
    });
}).apply(this, [jQuery]);
