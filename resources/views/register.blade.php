<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme.css" />
    <link rel="stylesheet" href="assets/stylesheets/theme-admin-extension.css" />
    <!-- Skin CSS -->
    <link rel="stylesheet" href="assets/stylesheets/skins/default.css" />
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme-custom.css">
    <!-- Head Libs -->
    <script src="assets/vendor/modernizr/modernizr.js"></script>
    <style>
        body {
            background: url("/assets/images/landing.jpg");
        }
        .body-sign{
            max-width: 1200px;
        }
        @media (min-width: 992px) {
            .p-sm-45 {
                padding-right: 45px;
            }
        }
    </style>
</head>
<body class="text-black">
<section  class="body-sign">
    <div class="center-sign">
        <div class="panel" style="padding-left: 20px; padding-right: 20px;">
            <div class="panel-body" style="padding: 30px;">
                <div style="position: relative">
                    <div class="panel-actions">
                        <a class="panel-action" href="/">
                            Go Back
                        </a>
                    </div>
                </div>
                <div class="form-group text-center mb-md">
                    <h3>
                        JGIYC 2023 Registration Page
                    </h3>
                </div>
                <br/>
                <div class="form-wizard" id="reg-wizard">
                    <div class="wizard-progress wizard-progress-lg">
                        <div class="steps-progress">
                            <div class="progress-indicator"></div>
                        </div>
                        <ul class="wizard-steps">
                            <li class="active max-width-none">
                                <a href="#w4-ask" data-toggle="tab"><span>1</span>Attendence</a>
                            </li>
                            <li>
                                <a href="#w4-find" data-toggle="tab"><span>2</span><label>Account Info</label></a>
                            </li>
                            <li>
                                <a href="#w4-detail1" data-toggle="tab"><span>3</span><label>Details</label></a>
                            </li>
                            <li>
                                <a href="#w4-detail2" data-toggle="tab"><span>4</span><label>Details</label></a>
                            </li>
                            <li>
                                <a href="#w4-detail3" data-toggle="tab"><span>5</span><label>Details</label></a>
                            </li>
                            <li>
                                <a href="#w4-detail4" data-toggle="tab"><span>6</span><label>Details</label></a>
                            </li>
                            <li>
                                <a href="#w4-detail5" data-toggle="tab"><span>7</span><label>Passport</label></a>
                            </li>
                            <li>
                                <a href="#w4-confirm" data-toggle="tab"><span>8</span><label>Confirm</label></a>
                            </li>
                        </ul>
                    </div>

                    <form class="form-horizontal" novalidate="novalidate" style="padding: 10px 30px 10px 30px;"
                        method="POST" action="/contact/add" id="form-register" enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content">
                            <div id="w4-ask" class="tab-pane active">
                                <div class="d-flex flex-column justify-content-center align-items-center" >
                                    <h4>Have you attended JGYIC before?</h4>
                                    <div class="d-flex align-items-center mt-sm fs-md">
                                        <div class="radio-custom radio-primary mb-none">
                                            <input type="radio" id="radioAttendYes" name="radioAttendBefore" value="Yes" checked>
                                            <label for="radioAttendYes">Yes</label>
                                        </div>

                                        <div class="radio-custom radio-primary ml-lg">
                                            <input type="radio" id="radioAttendNo" name="radioAttendBefore" value="No">
                                            <label for="radioAttendNo">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="w4-find" class="tab-pane">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label col-md-offset-1" for="inputOldUniqueId">Enter JGIYC 2022 Unique ID:</label>
                                    <div class="col-sm-4 d-flex">
                                        <input type="text" class="form-control" name="oldUniqueId" id="inputOldUniqueId">
                                        <button class="btn btn-custom ml-md" id="btn-find">FIND</button>
                                    </div>
                                    <br/>
                                </div>
                                <div class="form-group hidden" id="div-found">
                                    <label class="col-sm-4 control-label col-md-offset-1">Found:</label>
                                    <div id="found-contact" class="col-sm-4 text-weight-bold">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label col-md-offset-1">Can’t remember?:</label>
                                    <div class="col-sm-4">
                                        <button class="btn btn-custom-default" id="btn-new-register">REGISTER A FRESH</button>
                                    </div>
                                </div>
                            </div>
                            <div id="w4-detail1" class="tab-pane">
                                <div class="row mb-md">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-4 control-label" for="inputTitle">Title</label>
                                        <div class="col-sm-8">
                                            <select name="title" value="{{ old('title') }}" class="form-control">
                                                <option value="Mr">Mr</option>
                                                <option value="Mrs">Mrs</option>
                                                <option value="Master">Master</option>
                                                <option value="Miss">Miss</option>
                                                <option value="Rev'd">Rev'd</option>
                                                <option value="Canon">Canon</option>
                                                <option value="Ven.">Ven.</option>
                                                <option value="Ven Dr.">Ven Dr.</option>
                                                <option value="Rt Rev'd">Rt Rev'd</option>
                                                <option value="Most Rev'd">Most Rev'd</option>
                                                <option value="Evang.">Evang.</option>
                                                <option value="Engr.">Engr.</option>
                                                <option value="Prof.">Prof.</option>
                                                <option value="Architect">Architect</option>
                                                <option value="Dr.">Dr.</option>
                                                <option value="Pharm.">Pharm.</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-4 control-label" for="inputFirstName">First Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="firstName" value="{{ old('firstName') }}" id="inputFirstName" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-md">
                                        <label class="col-sm-4 control-label" for="inputLastName">Last Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" id="inputLastName" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-4 control-label" for="inputEmail">Email</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="inputEmail" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-md">
                                        <label class="col-sm-4 control-label" for="inputPhoneNo">Phone No</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="phoneNo" value="{{ old('phoneNo') }}" id="inputPhoneNo" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-4 control-label">Sex</label>
                                        <div class="col-sm-8">
                                            <select name="sex" value="{{ old('sex') }}" class="form-control" required>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-md">
                                        <label class="col-sm-4 control-label">Age Range</label>
                                        <div class="col-sm-8">
                                            <select name="age" value="{{ old('age') }}" class="form-control" required>
                                                <option value="15-20">15-20</option>
                                                <option value="21-25">21-25</option>
                                                <option value="26-30">26-30</option>
                                                <option value="31-35">31-35</option>
                                                <option value="36-40">36-40</option>
                                                <option value="41-45">41-45</option>
                                                <option value="45 and above">45 and above</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="w4-detail2" class="tab-pane">
                                <div class="row mb-md">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-4 control-label">Denomination</label>
                                        <div class="col-sm-8">
                                            <select name="denomination" value="{{ old('denomination') }}" class="form-control" required>
                                                <option value="Anglican" selected>Anglican</option>
                                                <option value="Non-Anglican">Non-Anglican</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row hidden div-province" >
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-4 control-label">Province</label>
                                        <div class="col-sm-8">
                                            <select name="province" value="{{ old('province') }}" class="form-control" id="selectProvince" required>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-md">
                                        <label class="col-sm-4 control-label">Diocese</label>
                                        <div class="col-sm-8">
                                            <select name="diocese" value="{{ old('diocese') }}" class="form-control" id="selectDiocese" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-md">
                                    <div class="form-group col-md-12 p-sm-45">
                                        <label class="col-sm-4 col-md-2 control-label">Church Name</label>
                                        <div class="col-sm-8 col-md-10">
                                            <input type="text" class="form-control" name="church" value="{{ old('church') }}" id="inputChurch" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-md">
                                    <div class="form-group col-md-12 p-sm-45">
                                        <label class="col-sm-4 col-md-2 control-label">Home Address</label>
                                        <div class="col-sm-8 col-md-10">
                                            <input type="text" class="form-control" name="home" value="{{ old('home') }}" id="inputHome" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-4 control-label">Country</label>
                                        <div class="col-sm-8">
                                            <div class="autocomplete" style="width: 100%;">
                                                <input type="text" class="form-control" name="country" value="{{ old('country') }}" id="inputCountry" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-md">
                                        <label class="col-sm-4 control-label">State</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="state" value="{{ old('state') }}" id="inputState" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="w4-detail3" class="tab-pane">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-4 control-label">Level of Education</label>
                                        <div class="col-sm-8">
                                            <select name="education" value="{{ old('education') }}" class="form-control" required>
                                                <option value="Secondary School">Secondary School</option>
                                                <option value="Bachelor">Bachelor</option>
                                                <option value="Master">Master</option>
                                                <option value="PhD">PhD</option>
                                                <option value="Clergy">Clergy</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-md">
                                        <label class="col-sm-4 control-label">Occupation</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="occupation" value="{{ old('occupation') }}" id="inputOccupation" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-4 control-label">Are you willing to join JGIYC workforce?</label>
                                        <div class="col-sm-8">
                                            <select name="join_workforce" value="{{ old('join_workforce') }}" class="form-control" required>
                                                <option value="Yes">Yes</option>
                                                <option value="No" selected="selected">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-md hidden div-workforce">
                                        <label class="col-sm-4 control-label">Select Workforce To Join</label>
                                        <div class="col-sm-8">
                                            <select name="workforce" value="{{ old('workforce') }}" class="form-control" required>
                                                <option value="Team 4- Catering & Meals">Team 4- Catering & Meals</option>
                                                <option value="Team 5- Medical (You must be a medical practitioner)">Team 5- Medical (You must be a medical practitioner)</option>
                                                <option value="Team 6-  Sports">Team 6-  Sports</option>
                                                <option value="Team 7- Media">Team 7- Media</option>
                                                <option value="Team 8- Registration">Team 8- Registration</option>
                                                <option value="Team 10- Transports">Team 10- Transports</option>
                                                <option value="Team 11- Prayer2">Team 11- Prayer2</option>
                                                <option value="Team 12- Protocol">Team 12- Protocol</option>
                                                <option value="Team 15- Guidance & Counselling">Team 15- Guidance & Counselling</option>
                                                <option value="Team 17- Accommodation">Team 17- Accommodation</option>
                                                <option value="Team 18- Security">Team 18- Security</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-4 control-label">Are you willing to join the prayer group of JGIYC?</label>
                                        <div class="col-sm-8">
                                            <select name="join_prayer" value="{{ old('join_prayer') }}" class="form-control" required>
                                                <option value="Yes">Yes</option>
                                                <option value="No" selected="selected">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-md hidden div-prayertime">
                                        <label class="col-sm-4 control-label">Choose Available time</label>
                                        <div class="col-sm-4">
                                            <select name="prayer_day" value="{{ old('prayer_day') }}" class="form-control" required>
                                                <option value="Mondays">Mondays</option>
                                                <option value="Tuesdays">Tuesdays</option>
                                                <option value="Wednesdays">Wednesdays</option>
                                                <option value="Thursdays">Thursdays</option>
                                                <option value="Fridays">Fridays</option>
                                                <option value="Saturdays">Saturdays</option>
                                                <option value="Sundays">Sundays</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select name="prayer_time" value="{{ old('prayer_time') }}" class="form-control" required>
                                                <option value="12.00am-12:30am">12.00am-12:30am</option>
                                                <option value="12:30am-1:00am">12:30am-1:00am</option>
                                                <option value="1:00am- 1:30am">1:00am- 1:30am</option>
                                                <option value="1:30am -2:00am">1:30am -2:00am</option>
                                                <option value="2:00asimple-line-iconsm-2:30am">2:00am-2:30am</option>
                                                <option value="2:30am-3:00am">2:30am-3:00am</option>
                                                <option value="3:00am-3:30am">3:00am-3:30am</option>
                                                <option value="3:30am-4:00am">3:30am-4:00am</option>
                                                <option value="4:00am-4:30am">4:00am-4:30am</option>
                                                <option value="4:30am-5:00am">4:30am-5:00am</option>
                                                <option value="5:00am-5:30am">5:00am-5:30am</option>
                                                <option value="5:30am-6:00am">5:30am-6:00am</option>
                                                <option value="6:00am-6:30am">6:00am-6:30am</option>
                                                <option value="6:30am-7:00am">6:30am-7:00am</option>
                                                <option value="7:00am-7:30am">7:00am-7:30am</option>
                                                <option value="7:30am-8:00am">7:30am-8:00am</option>
                                                <option value="8:00am-8:30am">8:00am-8:30am</option>
                                                <option value="8:30am-9:00am">8:30am-9:00am</option>
                                                <option value="9:00am-9:30am">9:00am-9:30am</option>
                                                <option value="9:30am-10:00am">9:30am-10:00am</option>
                                                <option value="10:00am-10:30am">10:00am-10:30am</option>
                                                <option value="10:30am-11:00am">10:30am-11:00am</option>
                                                <option value="11:00am-11:30am">11:00am-11:30am</option>
                                                <option value="11:30am-12:00pm">11:30am-12:00pm</option>
                                                <option value="12:00pm-12:30pm">12:00pm-12:30pm</option>
                                                <option value="12:30pm-1:00pm">12:30pm-1:00pm</option>
                                                <option value="1:00pm-1:30pm">1:00pm-1:30pm</option>
                                                <option value="1:30pm-2:00pm">1:30pm-2:00pm</option>
                                                <option value="2:00pm-2:30pm">2:00pm-2:30pm</option>
                                                <option value="2:30pm-3:00pm">2:30pm-3:00pm</option>
                                                <option value="3:00pm—4:00pm">3:00pm—4:00pm</option>
                                                <option value="4:00pm—4:30pm">4:00pm—4:30pm</option>
                                                <option value="4:30pm—5:00pm">4:30pm—5:00pm</option>
                                                <option value="5:00pm—5:30pm">5:00pm—5:30pm</option>
                                                <option value="5:30pm—6:00pm">5:30pm—6:00pm</option>
                                                <option value="6:00pm—6:30pm">6:00pm—6:30pm</option>
                                                <option value="6:30pm—7:00pm">6:30pm—7:00pm</option>
                                                <option value="7:00pm—7:30pm">7:00pm—7:30pm</option>
                                                <option value="7:30pm—8:00pm">7:30pm—8:00pm</option>
                                                <option value="8:00pm—8:30pm">8:00pm—8:30pm</option>
                                                <option value="8:30pm—9:00pm">8:30pm—9:00pm</option>
                                                <option value="9:00pm—9:30pm">9:00pm—9:30pm</option>
                                                <option value="9:30pm—10:00pm">9:30pm—10:00pm</option>
                                                <option value="10:00pm-10:30pm">10:00pm-10:30pm</option>
                                                <option value="10:30pm-11:00pm">10:30pm-11:00pm</option>
                                                <option value="11:00pm-11:30pm">11:00pm-11:30pm</option>
                                                <option value="11:30pm-12:00am">11:30pm-12:00am</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="w4-detail4" class="tab-pane">
                                <div class="row mb-md">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-4 control-label">Talent Category</label>
                                        <div class="col-sm-8">
                                            <select name="talent" value="{{ old('talent') }}" class="form-control" required>
                                                <option value="Creative Writing">Creative Writing</option>
                                                <option value="Art Works">Art Works</option>
                                                <option value="Music">Music</option>
                                                <option value="Dance">Dance</option>
                                                <option value="Beauty Pageant">Beauty Pageant</option>
                                                <option value="Poetry/Inspirational Speaking">Poetry/Inspirational Speaking</option>
                                                <option value="None">None</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-4 control-label">Are you Physically challenged?</label>
                                        <div class="col-sm-8">
                                            <select name="physical" value="{{ old('physical') }}" class="form-control" required>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-md">
                                        <label class="col-sm-4 control-label">Preferred Accommodation</label>
                                        <div class="col-sm-8">
                                            <select name="accommodation" value="{{ old('accommodation') }}" class="form-control" required>
                                                <option value="I have a personal accommodation">I have a personal accommodation</option>
                                                <option value="I want the free hostel">I want the free hostel</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-md">
                                    <div class="form-group col-md-12 p-sm-45">
                                        <label class="col-sm-4 col-md-2 control-label">Mode of Transportation to JGIYC 2023</label>
                                        <div class="col-sm-8 col-md-10">
                                            <div class="autocomplete" style="width: 100%;">
                                                <select name="transport" value="{{ old('transport') }}" class="form-control" required>
                                                    <option value="With our Diocesan Bus">With our Diocesan Bus</option>
                                                    <option value="Coming by air">Coming by air</option>
                                                    <option value="Coming personally by road">Coming personally by road</option>
                                                    <option value="Coming as a team with our bus">Coming as a team with our bus</option>
                                                    <option value="Coming with my private car">Coming with my private car</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="w4-detail5" class="tab-pane">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Upload Passport Photo</label>
                                    <div class="col-sm-8">
                                        <div>
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="input-append">
                                                    <div class="uneditable-input" style="min-width: 50px;">
                                                        <i class="fa fa-file fileupload-exists"></i>
                                                        <span class="fileupload-preview"></span>
                                                    </div>
                                                    <span class="btn btn-default btn-file">
                                                        <span class="fileupload-exists">Change</span>
                                                        <span class="fileupload-new">Select file</span>
                                                        <input type="file" name="photo" accept=".gif,.jpg,.jpeg,.png" id="filePhoto"/>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="" alt="image: passport" id="image-passport" style="width: 100%;"/>
                                    </div>
                                </div>

                                <input type="text" class="hidden" name="id"/>
                            </div>
                            <div id="w4-confirm" class="tab-pane">
                                <div class="row mb-md">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-4 control-label">Name</label>
                                        <div class="col-sm-8">
                                            <label id="lblName" class="control-label"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-4 control-label">Email</label>
                                        <div class="col-sm-8">
                                            <label id="lblEmail" class="control-label"></label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-md">
                                        <label class="col-sm-4 control-label">Phone No</label>
                                        <div class="col-sm-8">
                                            <label id="lblPhoneNo" class="control-label"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-4 control-label">Sex</label>
                                        <div class="col-sm-8">
                                            <label id="lblSex" class="control-label"></label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-md">
                                        <label class="col-sm-4 control-label">Age Range</label>
                                        <div class="col-sm-8">
                                            <label id="lblAge" class="control-label"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-4 control-label">Province</label>
                                        <div class="col-sm-8">
                                            <label id="lblProvince" class="control-label"></label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-md">
                                        <label class="col-sm-4 control-label">Diocese</label>
                                        <div class="col-sm-8">
                                            <label id="lblDiocese" class="control-label"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <div class="checkbox-custom">
                                            <input type="checkbox" name="terms" id="w4-terms" required>
                                            <label for="w4-terms">I've input all account informations correctly.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <ul class="pager" style="padding: 10px 30px 10px 30px; display: flex;">
                        <li class="previous disabled">
                            <button class="btn btn-custom-default" style="display: flex; align-items: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" style="width:25px; height: 25px;" fill="#000" class="mr-sm">
                                    <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Prev</span>
                            </button>
                        </li>
                        <li class="finish hidden" style="margin-left: auto;">
                            <button class="btn btn-custom" style="display: flex; align-items: center;">
                                <span>Finish</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" style="width:0px; height: 25px;" fill="#FFF" class="">
                                </svg>
                            </button>
                        </li>
                        <li class="next" style="margin-left: auto;">
                            <button class="btn btn-custom" style="display: flex; align-items: center;">
                                <span>Next</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" style="width:25px; height: 25px;" fill="#FFF" class="ml-sm">
                                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </li>
                    </ul>
                </div>
                <br/>
            </div>
        </div>

        <p class="text-center text-muted mt-md mb-md">&copy; Created 2023..</p>
    </div>

    <div id="info-dialog" class="modal-block mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Notify</h2>
            </header>
            <div class="panel-body">
                <p id="info-content"></p>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-custom dialog-ok">Confirm</button>
                    </div>
                </div>
            </footer>
        </section>
    </div>
</section>

<!-- end: page -->

<!-- Vendor -->
<script src="assets/vendor/jquery/jquery.js"></script>


<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="assets/vendor/jquery-validation/jquery.validate.js"></script>
<script src="assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
<script src="assets/vendor/pnotify/pnotify.custom.js"></script>
<script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="assets/javascripts/theme.init.js"></script>
<script src="assets/javascripts/pages/register.js?v=1"></script>

@if(Session::has('message'))
    <script>
        $(function(){
            toastr.warning("{{ Session::get('message') }}");
        });
    </script>
@endif

@if(Session::has('unique_id'))
    <script>
        $(function(){
            var name = "{{ Session::get('name') }}";
            var unique_id = "{{ Session::get('unique_id') }}";
            var content = "Done, " + name+ " <br/> You have successfully registered for the JGIYC Abuja 2023, your unique ID is " +
                "<strong>[" + unique_id + "]</strong>. <br/> Please check your email. Thank you";
            showInfo(content);
        });
    </script>
@endif
</body>
</html>
