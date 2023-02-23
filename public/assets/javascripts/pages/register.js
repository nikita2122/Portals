/*
Name: 			Forms / Wizard - Examples
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version: 	1.7.0
*/

var dioceses = [
    ["ABA","Aba"],
    ["ABA","Aba Ngwa North"],
    ["ABA","Arochukwu/Ohafia"],
    ["ABA","Ikwuano"],
    ["ABA","Isiala Ngwa"],
    ["ABA","Isiala Ngwa South"],
    ["ABA","Isuikwuato/Umunneochi"],
    ["ABA","Ukwa"],
    ["ABA","Umuahia"],
    ["ABUJA","Abuja"],
    ["ABUJA","Gboko"],
    ["ABUJA","Gwagwalada"],
    ["ABUJA","Kafanchan"],
    ["ABUJA","Kazi-Biam"],
    ["ABUJA","Kubwa"],
    ["ABUJA","Kwoi"],
    ["ABUJA","Lafia"],
    ["ABUJA","Markurdi"],
    ["ABUJA","Otukpo"],
    ["ABUJA","Zonkwa"],
    ["BENDEL","Akoko-Edo"],
    ["BENDEL","Asaba"],
    ["BENDEL","Benin"],
    ["BENDEL","Esan"],
    ["BENDEL","Etsako"],
    ["BENDEL","Ika"],
    ["BENDEL","Ndokwa"],
    ["BENDEL","Oleh"],
    ["BENDEL","Sabongibba-Ora"],
    ["BENDEL","Sapele"],
    ["BENDEL","Ughelli"],
    ["BENDEL","Warri"],
    ["BENDEL","Western Izon"],
    ["ENUGU","Abakaliki"],
    ["ENUGU","Afikpo"],
    ["ENUGU","Awgu/Aninri"],
    ["ENUGU","Eha-Amufu"],
    ["ENUGU","Enugu"],
    ["ENUGU","Enugu North"],
    ["ENUGU","Ikwo"],
    ["ENUGU","Ngbo"],
    ["ENUGU","Nike"],
    ["ENUGU","Nsukka"],
    ["ENUGU","Oji River"],
    ["ENUGU","Udi"],
    ["IBADAN","Ajayi Crowther"],
    ["IBADAN","Ibadan"],
    ["IBADAN","Ibadan North"],
    ["IBADAN","Ibadan South"],
    ["IBADAN","Ife"],
    ["IBADAN","Ife East"],
    ["IBADAN","Ijesa North"],
    ["IBADAN","Ijesa North East"],
    ["IBADAN","Ilesa"],
    ["IBADAN","Ilesa South West"],
    ["IBADAN","Ogbomoso"],
    ["IBADAN","Oke Ogun"],
    ["IBADAN","Oke-Osun"],
    ["IBADAN","Osun"],
    ["IBADAN","Osun North"],
    ["IBADAN","Osun North East"],
    ["IBADAN","Oyo"],
    ["JOS","Bauchi"],
    ["JOS","Bukuru"],
    ["JOS","Damaturu"],
    ["JOS","Gombe"],
    ["JOS","Jalingo"],
    ["JOS","Jos"],
    ["JOS","Langtang"],
    ["JOS","Maiduguri"],
    ["JOS","Pankshin"],
    ["JOS","Yola"],
    ["KADUNA","Bari"],
    ["KADUNA","Dutse"],
    ["KADUNA","Gusau"],
    ["KADUNA","Ikara"],
    ["KADUNA","Kaduna"],
    ["KADUNA","Kano"],
    ["KADUNA","Katsina"],
    ["KADUNA","Kebbi"],
    ["KADUNA","Sokoto"],
    ["KADUNA","Wusasa"],
    ["KADUNA","Zaria"],
    ["KWARA","Ekiti Kwara"],
    ["KWARA","Igbomina"],
    ["KWARA","Igbomina West"],
    ["KWARA","Jebba"],
    ["KWARA","Kwara"],
    ["KWARA","New Bussa"],
    ["KWARA","Offa"],
    ["KWARA","Omu-Aran"],
    ["LAGOS","Awori"],
    ["LAGOS","Badagry"],
    ["LAGOS","Egba"],
    ["LAGOS","Egba West"],
    ["LAGOS","Ifo"],
    ["LAGOS","Ijebu"],
    ["LAGOS","Ijebu North"],
    ["LAGOS","Ijebu South West"],
    ["LAGOS","Lagos"],
    ["LAGOS","Lagos Mainland"],
    ["LAGOS","Lagos West"],
    ["LAGOS","Remo"],
    ["LAGOS","Yewa"],
    ["LOKOJA","Bida"],
    ["LOKOJA","Doko"],
    ["LOKOJA","Idah"],
    ["LOKOJA","Ijumu"],
    ["LOKOJA","Kabba"],
    ["LOKOJA","Kontagora"],
    ["LOKOJA","Kutigi"],
    ["LOKOJA","Lokoja"],
    ["LOKOJA","Minna"],
    ["LOKOJA","Ogorimagongo"],
    ["LOKOJA","Okene"],
    ["NIGER DELTA","Ahoada"],
    ["NIGER DELTA","Calabar"],
    ["NIGER DELTA","Etche"],
    ["NIGER DELTA","Evo"],
    ["NIGER DELTA","Ikwerre"],
    ["NIGER DELTA","Niger Delta"],
    ["NIGER DELTA","Niger Delta North"],
    ["NIGER DELTA","Niger Delta West"],
    ["NIGER DELTA","Northern Izon"],
    ["NIGER DELTA","Ogbia"],
    ["NIGER DELTA","Ogoni"],
    ["NIGER DELTA","Okrika"],
    ["NIGER DELTA","Uyo"],
    ["ONDO","Akoko"],
    ["ONDO","Akure"],
    ["ONDO","Ekiti"],
    ["ONDO","Ekiti Oke"],
    ["ONDO","Ekiti West"],
    ["ONDO","Idoani"],
    ["ONDO","Ilaje"],
    ["ONDO","Ile-Oluji"],
    ["ONDO","Irele Ese Odo"],
    ["ONDO","On the Coast"],
    ["ONDO","Ondo"],
    ["ONDO","Owo"],
    ["ON THE NIGER","Aguata"],
    ["ON THE NIGER","Amichi"],
    ["ON THE NIGER","Awka"],
    ["ON THE NIGER","Ihiala"],
    ["ON THE NIGER","Mbamili"],
    ["ON THE NIGER","Niger West"],
    ["ON THE NIGER","Nnewi"],
    ["ON THE NIGER","Ogbaru"],
    ["ON THE NIGER","On the Niger"],
    ["OWERRI","Egbu"],
    ["OWERRI","Ideato"],
    ["OWERRI","Ikeduru"],
    ["OWERRI","Isimbalo"],
    ["OWERRI","Mbaise"],
    ["OWERRI","Ohaji/Egbema"],
    ["OWERRI","Okigwe"],
    ["OWERRI","Okigwe-South"],
    ["OWERRI","On the Lake"],
    ["OWERRI","Orlu"],
    ["OWERRI","Oru"],
    ["OWERRI","Owerri"],
    ["SECRETARIAT","Secretariat"],
    ["ADOTT","ADOTT"],
    ["ADOTW","ADOTW"],
    ["INSTITUTIONS","Ajayi Crowther University, Oyo"],
    ["INSTITUTIONS","Archbishop Vining College Of Theology,  Akure"],
    ["INSTITUTIONS","Bishop Crowther College of Theology,  Okene"],
    ["INSTITUTIONS","Crowther Graduate Theological Seminary, Abeokuta"],
    ["INSTITUTIONS","Ezekiel College  Of  Theology,  Ujoelen, Ekpoma"],
    ["INSTITUTIONS","IBRU International Ecumenical Centre, Agbarha-Otor"],
    ["INSTITUTIONS","Immanuel  College of  Theology And Christian Education, Ibadan"],
    ["INSTITUTIONS","Institute of Theology Paul University, Awka"],
    ["INSTITUTIONS","Nomadic Mission"],
    ["INSTITUTIONS","St. Francis of Assisi Theological College, Wusasa, Zaria"],
    ["INSTITUTIONS","Trinity Theological College, Umuahia"],
    ["OTHER","NON ANGLICANS"]
];

$(".dialog-ok").click(function () {
    $.magnificPopup.close();
});

function showInfo (content) {
    $("#info-content").html(content);

    $.magnificPopup.open({
        items: {
            src: '#info-dialog',
            type: 'inline'
        },
        modal: true,
    });
}

(function($) {

    'use strict';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var $w4finish = $('#reg-wizard').find('ul.pager li.finish'),
        $w4validator = $("#reg-wizard form").validate({
            highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            success: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
                $(element).remove();
            },
            errorPlacement: function( error, element ) {
                element.parent().append( error );
            }
        });

    $w4finish.on('click', function( ev ) {
        ev.preventDefault();
        var validated = $('#reg-wizard form').valid();
        if ( validated ) {
            $('#form-register').submit();
        }
    });

    var wizard = $('#reg-wizard').bootstrapWizard({
        tabClass: 'wizard-steps',
        nextSelector: 'ul.pager li.next',
        previousSelector: 'ul.pager li.previous',
        firstSelector: null,
        lastSelector: null,
        onNext: function( tab, navigation, index, newindex ) {
            var validated = $('#reg-wizard form').valid();
            if( !validated ) {
                $w4validator.focusInvalid();
                return false;
            }
            if ((newindex == 7 || index == 7) && $('#filePhoto').val() == "") {
                if ($('input[name="id"]').val() == "") {
                    toastr.warning('Please select a photo!');
                    return false;
                }
            }
        },
        onTabClick: function( tab, navigation, index, newindex ) {
            if ( newindex == index + 1 ) {
                return this.onNext( tab, navigation, index, newindex);
            } else if ( newindex > index + 1 ) {
                return false;
            } else {
                return true;
            }
        },
        onTabChange: function( tab, navigation, index, newindex ) {
            if (newindex == 1 && $('input[name="radioAttendBefore"]:checked').val() == "No") {
                if (index == 0) {
                    setTimeout(() => wizard.bootstrapWizard('next'), 100);
                    initValues();
                }
                else
                    setTimeout(() => wizard.bootstrapWizard('previous'), 100);
            }
            var $total = navigation.find('li').length - 1;
            $w4finish[ newindex != $total ? 'addClass' : 'removeClass' ]( 'hidden' );
            $('#reg-wizard').find(this.nextSelector)[ newindex == $total ? 'addClass' : 'removeClass' ]( 'hidden' );
        },
        onTabShow: function( tab, navigation, index ) {
            var $total = navigation.find('li').length - 1;
            var $current = index;
            var $percent = Math.floor(( $current / $total ) * 100);
            $('#reg-wizard').find('.progress-indicator').css({ 'width': $percent + '%' });
            tab.prevAll().addClass('completed');
            tab.nextAll().removeClass('completed');
            if (index == 7) {
                var title = $('select[name="title"]').val();
                var first = $('input[name="firstName"]').val();
                var last = $('input[name="lastName"]').val();
                $('#lblName').text(title + ' ' + first + ' ' + last);
                $('#lblEmail').text($('input[name="email"]').val());
                $('#lblAge').text($('select[name="age"]').val());
                $('#lblSex').text($('select[name="sex"]').val());
                $('#lblPhoneNo').text($('input[name="phoneNo"]').val());
                $('#lblProvince').text($('select[name="province"]').val());
                $('#lblDiocese').text($('select[name="diocese"]').val());
            }
            if (index == 2) {
                if ($('#div-found').hasClass("hidden")) {
                    initValues();
                }
            };
        }
    });

    var countries = ["Nigeria", "Abuja", "Mbaise", "BOTSWANA", "Rwanda", "Ihiala", "Uganda", "Delta", "Sapele", "Umuahia south", "Magongo", "United States", "Obosi", "Bwari",
        "Enugu", "GWAGWALADA", "Zaria", "Equatorial Guinea", "Nnewi", "Isoko south", "Kachia", "Sokoto", "Masaka", "Saki", "IMO state", "South sudan", "Orumba south", "Chizaram",
        "Rivers State", "Ayegunle", "Ikwo", "Anambra", "Irekpai", "Ogun state", "ivory coast", "Ibadan", "Benin", "Gboko", "Gombe", "Obiaruku"];

    autocomplete(document.getElementById("inputCountry"), countries);

    var provinces = {};
    dioceses.forEach(u => {
        if (provinces[u[0]]) {
            provinces[u[0]].dioceses.push(u[1]);
        } else {
            provinces[u[0]] = {
                dioceses: [u[1]]
            }
        }
    });

    var html = "";
    Object.keys(provinces).forEach(prov => {
        html += "<option value='" + prov + "'>" + prov + "</option>";
    });
    $('#selectProvince').html(html);

    function initEvents () {
        $('#btn-new-register').click(function (e) {
            e.preventDefault();
            wizard.bootstrapWizard('next');
            initValues();
            return false;
        });

        $('#btn-find').click(function (e) {
            e.preventDefault();
            var uniqueId = $('#inputOldUniqueId').val();
            if (uniqueId == "") {
                toastr.warning("Please input Unique Id");
                return;
            }
            $('#div-found').addClass('hidden');
            $.post('/contact/find', {uniqueId: uniqueId}).then((res) => {
                if (res.length == 0) {
                    toastr.error("Not Found");
                } else {
                    var exist = res[0];
                    $('#div-found').removeClass('hidden');
                    $('#found-contact').html('Email: ' + exist.email + '<br/> Name: ' +
                        exist.first_name + ' ' + exist.last_name);

                    var province = exist['province'];
                    if (!province) {
                        dioceses.forEach(u => {
                           if(u[1] == exist['diocese'])
                               province = u[0];
                        });
                    }
                    $('select[name="title"]').val(exist['title']);
                    $('input[name="firstName"]').val(exist['first_name']);
                    $('input[name="lastName"]').val(exist['last_name']);
                    $('input[name="email"]').val(exist['email']);
                    $('input[name="phoneNo"]').val(exist['phone']);
                    $('select[name="age"]').val(exist['age_range']);
                    $('select[name="denomination"]').val(exist['denomination']).change();
                    $('select[name="province"]').val(province).change();
                    $('select[name="diocese"]').val(exist['diocese']);
                    $('input[name="church"]').val(exist['church']);
                    $('input[name="home"]').val(exist['home']);
                    $('input[name="state"]').val(exist['state']);
                    $('input[name="country"]').val(exist['country']);
                    $('select[name="education"]').val(exist['education']);
                    $('input[name="occupation"]').val(exist['occupation']);
                    $('input[name="talent"]').val(exist['talent_category']);
                    $('select[name="physical"]').val(exist['physical']);
                    $('select[name="accommodation"]').val(exist['preferred_accommodation']);
                    $('select[name="transport"]').val(exist['transport_mode']);
                    $('select[name="sex"]').val(exist['gender']);
                    $('select[name="join_workforce"]').val(exist['join_workforce']).change();
                    $('select[name="workforce"]').val(exist['workforce']);
                    $('select[name="join_prayer"]').val(exist['join_prayer']).change();
                    $('select[name="prayer_day"]').val(exist['prayer_day']).change();
                    $('select[name="prayer_time"]').val(exist['prayer_time']).change();
                    $('input[name="id"]').val(exist['id']);
                    $('#image-passport').attr('src', exist['passport_photo']);
                }
            });
        });

        $('#filePhoto').change(function () {
            const [file] = $(this)[0].files;

            if (file)
                $("#image-passport").attr("src", URL.createObjectURL(file));
            else
                $("#image-passport").attr("src", "");
        });

        $('select[name="denomination"]').change(function () {
            if ($(this).val() == 'Anglican') {
                $(".div-province").removeClass("hidden");
            } else {
                $(".div-province").addClass("hidden");

                $('#selectProvince').val("OTHER").change();
                $('#selectDiocese').val("NON ANGLICANS");
            }
        }).change();

        $('select[name="join_prayer"]').change(function () {
            if ($(this).val() == 'Yes') {
                $(".div-prayertime").removeClass("hidden");
            } else {
                $(".div-prayertime").addClass("hidden");
            }
        }).change();

        $('select[name="join_workforce"]').change(function () {
            if ($(this).val() == 'Yes') {
                $(".div-workforce").removeClass("hidden");
            } else {
                $(".div-workforce").addClass("hidden");
            }
        }).change();

        $("#selectProvince").change(function () {
            var oldVal = $('#selectDiocese').val();
            var vl = $(this).val();
            var html = "";
            if (vl && provinces[vl]) {
                var dios = provinces[vl]['dioceses'];
                dios.forEach(diocese => {
                    html += "<option value='" + diocese + "'>" + diocese + "</option>";
                });
            }
            $('#selectDiocese').html(html);
            $('#selectDiocese').val(oldVal);
        }).change();
    }

    function initValues () {
        $('input[type="text"]').val('');
        $('input[type="email"]').val('');
        $('input[type="checkbox"]').val('');
        $('select').val('');
    }

    initValues();
    initEvents();
}).apply(this, [jQuery]);
