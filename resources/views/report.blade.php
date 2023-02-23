<?php
ini_set('max_execution_time', 300);
use App\Models\Contact;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
@foreach($contacts as $key=>$contact)
    <div style="position: relative;">
        <span>{{ $contact->group }}</span>
        <span>{{ $contact->subgroup.'-'.$contact->microgroup }}</span>
        <?php
            $title = $contact->title;
            $name = $title.' '.$contact->first_name.' '.$contact->last_name;
        ?>
        <span>{{$name}}</span>
        <span>{{"(".$contact->unique_idn.")"}}</span>
    </div>
@endforeach
</body>
</html>