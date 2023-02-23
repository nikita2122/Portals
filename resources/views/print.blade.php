<?php
    use chillerlan\QRCode\QRCode
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style type="text/css">
        @page{
            margin:0;
        }
        body{
            font-weight: bold;
        }
        .contact{
            width: 50%;
            height:14.5cm;
            position: absolute;
        }
        .name {
            position: absolute;
            left: 3cm;
            top: 8.35cm;
            font-size: 0.45cm;
            word-wrap: break-word;
            width: 6cm;
            line-height: 0.42cm;
        }
        .unique-id {
            position: absolute;
            left: 4.2cm;
            top: 8.97cm;
            font-size: 0.45cm;
        }
        .group {
            color:white;
            position: absolute;
            left: 4.5cm;
            top: 9.84cm;
            font-size: 0.41cm;
        }
        .subgroup {
            color:white;
            position: absolute;
            left: 4.3cm;
            top: 10.24cm;
            font-size: 0.41cm;
        }
        .gate {
            color:white;
            position: absolute;
            left: 4.5cm;
            top: 10.63cm;
            font-size: 0.41cm;
        }
        .hostel{
            color:white;
            position: absolute;
            left: 3.9cm;
            top: 11.1cm;
            font-size: 0.35cm;
        }
        .qrcode {
            width:0.82cm;
            height: 0.88cm;
            position: absolute;
            left: 7.92cm;
            top: 10.09cm;
            background: white;
        }
        .image{
            margin-top: 15%;
            margin-left: 11.5%;
            position: absolute;
            width: 8cm;
            height: 12cm;
            z-index: -1000;
        }
        .passportimage {
            width: 2.81cm;
            height: 3.33cm;
            top: 4.73cm;
            left: 3.73cm;
            position: absolute;
        }
        .page {
             page-break-after: always;
         }
        .page:last-child {
            page-break-after: unset;
        }
    </style>
</head>
<body>
@foreach($contacts as $key=>$contact)
    <div class="contact {{$key%4 == 3 ? "page" : ""}}" style="
            top: {{ (($key%4-$key%2)/2) * 14.5}}cm;
            left: {{ ($key%2) * 10.5}}cm;
            ">
        <img class="passportimage" src="{{$contact->passport_photo}}" alter="Passport Photo"/>
        <img class="image" src="assets/images/back/{{$contact->group}}.jpg"/>
        <?php
            $namefont = 0.45;
            $lineheight = 0.4;
            $top = 8.37;
            $title = $contact->title;
            if ($title == 'Other')
                $title = $contact->enter_title;
            $name = $title.' '.$contact->first_name.' '.$contact->last_name;
            if (strlen($name) >= 24) {
                $namefont = 0.38;
                $lineheight = 0.34;
                $top = 8.41;
            }
            if (strlen($name) >= 27) {
                $top = 8.35;
            }
        ?>
        <label class="name" style="font-size: {{$namefont}}.cm; line-height: {{$lineheight}}.cm; top: {{$top}}cm;">
            {{ $name }}
        </label>
        <label class="unique-id">{{ "00".$contact->unique_id }}</label>
        <label class="group">{{ $contact->group }}</label>
        <label class="subgroup">{{ str_pad($contact->subgroup, 2, "0", STR_PAD_LEFT).'-'.str_pad($contact->microgroup, 2, "0", STR_PAD_LEFT) }}</label>
        <?php
            $subgroup = (int)$contact->subgroup;
            if ($contact->occupation == 'Clergy') {
                $gate = '5A';
            } else if ($contact->group == 'JO') {
                if ($subgroup < 49) {
                    $gate = ((int)(($subgroup-1)/8)) * 2 + 9;
                    $gate = $gate.(($subgroup-1)%8 < 4 ? 'A' : 'B');
                }
                else
                    $gate = '8B';
            } else if ($contact->group == 'YO') {
                if ($subgroup < 5)
                    $gate = '8A';
                else if ($subgroup < 9)
                    $gate = '10A';
                else if ($subgroup < 13)
                    $gate = '10B';
                else if ($subgroup < 17)
                    $gate = '12A';

                if ($subgroup < 49 && $subgroup > 16) {
                    $gate = ((int)(($subgroup-1)/8)) * 2 + 10;
                    $gate = $gate.(($subgroup-1)%8 < 4 ? 'A' : 'B');
                }
                if ($subgroup >= 49)
                    $gate = '12B';
            } else if ($contact->group == 'GE') {
                if ($subgroup < 49) {
                    $gate = ((int)(($subgroup-1)/8)) * 2 + 21;
                    $gate = $gate.(($subgroup-1)%8 < 4 ? 'A' : 'B');
                }
                else
                    $gate = '26B';
            } else if ($contact->group == 'CO') {
                if ($subgroup < 5)
                    $gate = '22B';
                else if ($subgroup < 9)
                    $gate = '22B';
                else if ($subgroup < 13)
                    $gate = '24A';
                else if ($subgroup < 17)
                    $gate = '24B';
                else if ($subgroup < 21)
                    $gate = '26A';
                else if ($subgroup < 25)
                    $gate = '28A';
                else if ($subgroup < 29)
                    $gate = '30A';
                else if ($subgroup < 33)
                    $gate = '30B';
                else if ($subgroup < 37)
                    $gate = '33A';
                else if ($subgroup < 41)
                    $gate = '33B';
                else if ($subgroup < 45)
                    $gate = '32A';
                else if ($subgroup < 49)
                    $gate = '32B';
                else
                    $gate = '28B';
            }
        ?>
        <label class="gate">{{ $gate }}</label>
        <?php
            $hostelStyle = "";
            if (strlen($contact->hostel) <= 10)
                $hostelStyle = "font-size: 0.43cm; top: 11.1cm; left:4.26cm;"
        ?>
        <label class="hostel" style="{{$hostelStyle}}">{{ $contact->hostel  }}</label>
        <img class="qrcode" src="{{(new QRCode)->render($contact->last_name.'_00'.$contact->unique_id)}}" alt="QR Code" />
    </div>
@endforeach
</body>
</html>