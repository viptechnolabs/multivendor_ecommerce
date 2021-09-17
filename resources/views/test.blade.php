<!DOCTYPE html>
<html>
<head>
    <title>jQuery Multi Step Form Wizard Plugin With Demo</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>.wizard {
            margin: 20px auto;
            background: #fff;
        }

        .wizard .nav-tabs {
            position: relative;
            margin: 40px auto;
            margin-bottom: 0;
            border-bottom-color: #e0e0e0;
        }

        .wizard > div.wizard-inner {
            position: relative;
        }

        .connecting-line {
            height: 2px;
            background: #e0e0e0;
            position: absolute;
            width: 80%;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: 50%;
            z-index: 1;
        }

        .wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
            color: #555555;
            cursor: default;
            border: 0;
            border-bottom-color: transparent;
        }

        span.round-tab {
            width: 70px;
            height: 70px;
            line-height: 70px;
            display: inline-block;
            border-radius: 100px;
            background: #fff;
            border: 2px solid #e0e0e0;
            z-index: 2;
            position: absolute;
            left: 0;
            text-align: center;
            font-size: 25px;
        }
        span.round-tab i{
            color:#555555;
        }
        .wizard li.active span.round-tab {
            background: #fff;
            border: 2px solid #5bc0de;

        }
        .wizard li.active span.round-tab i{
            color: #5bc0de;
        }

        span.round-tab:hover {
            color: #333;
            border: 2px solid #333;
        }

        .wizard .nav-tabs > li {
            width: 25%;
        }

        .wizard li:after {
            content: " ";
            position: absolute;
            left: 46%;
            opacity: 0;
            margin: 0 auto;
            bottom: 0px;
            border: 5px solid transparent;
            border-bottom-color: #5bc0de;
            transition: 0.1s ease-in-out;
        }

        .wizard li.active:after {
            content: " ";
            position: absolute;
            left: 46%;
            opacity: 1;
            margin: 0 auto;
            bottom: 0px;
            border: 10px solid transparent;
            border-bottom-color: #5bc0de;
        }

        .wizard .nav-tabs > li a {
            width: 70px;
            height: 70px;
            margin: 20px auto;
            border-radius: 100%;
            padding: 0;
        }

        .wizard .nav-tabs > li a:hover {
            background: transparent;
        }

        .wizard .tab-pane {
            position: relative;
            padding-top: 50px;
        }

        .wizard h3 {
            margin-top: 0;
        }

        @media( max-width : 585px ) {

            .wizard {
                width: 90%;
                height: auto !important;
            }

            span.round-tab {
                font-size: 16px;
                width: 50px;
                height: 50px;
                line-height: 50px;
            }

            .wizard .nav-tabs > li a {
                width: 50px;
                height: 50px;
                line-height: 50px;
            }

            .wizard li.active:after {
                content: " ";
                position: absolute;
                left: 35%;
            }
        }</style>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        (function ( $ ) {
            $.fn.multiStepForm = function(args) {
                if(args === null || typeof args !== 'object' || $.isArray(args))
                    throw  " : Called with Invalid argument";
                var form = this;
                var tabs = form.find('.tab');
                var steps = form.find('.step');
                steps.each(function(i, e){
                    $(e).on('click', function(ev){
                    });
                });
                form.navigateTo = function (i) {/*index*/
                    /*Mark the current section with the class 'current'*/
                    tabs.removeClass('current').eq(i).addClass('current');
                    // Show only the navigation buttons that make sense for the current section:
                    form.find('.previous').toggle(i > 0);
                    atTheEnd = i >= tabs.length - 1;
                    form.find('.next').toggle(!atTheEnd);
                    // console.log('atTheEnd='+atTheEnd);
                    form.find('.submit').toggle(atTheEnd);
                    fixStepIndicator(curIndex());
                    return form;
                }
                function curIndex() {
                    /*Return the current index by looking at which section has the class 'current'*/
                    return tabs.index(tabs.filter('.current'));
                }
                function fixStepIndicator(n) {
                    steps.each(function(i, e){
                        i == n ? $(e).addClass('active') : $(e).removeClass('active');
                    });
                }
                /* Previous button is easy, just go back */
                form.find('.previous').click(function() {
                    form.navigateTo(curIndex() - 1);
                });

                /* Next button goes forward iff current block validates */
                form.find('.next').click(function() {
                    if('validations' in args && typeof args.validations === 'object' && !$.isArray(args.validations)){
                        if(!('noValidate' in args) || (typeof args.noValidate === 'boolean' && !args.noValidate)){
                            form.validate(args.validations);
                            if(form.valid() == true){
                                form.navigateTo(curIndex() + 1);
                                return true;
                            }
                            return false;
                        }
                    }
                    form.navigateTo(curIndex() + 1);
                });
                form.find('.submit').on('click', function(e){
                    if(typeof args.beforeSubmit !== 'undefined' && typeof args.beforeSubmit !== 'function')
                        args.beforeSubmit(form, this);
                    /*check if args.submit is set false if not then form.submit is not gonna run, if not set then will run by default*/
                    if(typeof args.submit === 'undefined' || (typeof args.submit === 'boolean' && args.submit)){
                        form.submit();
                    }
                    return form;
                });
                /*By default navigate to the tab 0, if it is being set using defaultStep property*/
                typeof args.defaultStep === 'number' ? form.navigateTo(args.defaultStep) : null;

                form.noValidate = function() {

                }
                return form;
            };
        }( jQuery ));
    </script>
    <style>
        * {box-sizing: border-box;}
        .tab{display: none; width: 100%; height: 50%;margin: 0px auto;}
        .current{display: block;}

        body {background-color: #f1f1f1;}

        form {background-color: #ffffff; margin: 100px auto; font-family: Raleway; padding: 40px; width: 40%; min-width: 300px; }

        h1 {text-align: center; }

        input {padding: 10px; width: 100%; font-size: 17px; font-family: Raleway; border: 1px solid #aaaaaa; }

        button {background-color: #4CAF50; color: #ffffff; border: none; padding: 10px 20px; font-size: 17px; font-family: Raleway; cursor: pointer; }

        button:hover {opacity: 0.8; }

        .previous {background-color: #bbbbbb; }

        /* Make circles that indicate the steps of the form: */
        .step {height: 30px; width: 30px; cursor: pointer; margin: 0 2px; color: #fff; background-color: #bbbbbb; border: none; border-radius: 50%; display: inline-block; opacity: 0.8; padding: 5px}

        .step.active {opacity: 1; background-color: #69c769;}

        .step.finish {background-color: #4CAF50; }

        .error {color: #f00; }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $.validator.addMethod('date', function(value, element, param) {
                return (value != 0) && (value <= 31) && (value == parseInt(value, 10));
            }, 'Please enter a valid date!');
            $.validator.addMethod('month', function(value, element, param) {
                return (value != 0) && (value <= 12) && (value == parseInt(value, 10));
            }, 'Please enter a valid month!');
            $.validator.addMethod('year', function(value, element, param) {
                return (value != 0) && (value >= 1900) && (value == parseInt(value, 10));
            }, 'Please enter a valid year not less than 1900!');
            $.validator.addMethod('username', function(value, element, param) {
                var nameRegex = /^[a-zA-Z0-9]+$/;
                return value.match(nameRegex);
            }, 'Only a-z, A-Z, 0-9 characters are allowed');

            var val	=	{
                // Specify validation rules
                rules: {
                    fname: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required:true,
                        minlength:10,
                        maxlength:10,
                        digits:true
                    },
                    date:{
                        date:true,
                        required:true,
                        minlength:2,
                        maxlength:2,
                        digits:true
                    },
                    month:{
                        month:true,
                        required:true,
                        minlength:2,
                        maxlength:2,
                        digits:true
                    },
                    year:{
                        year:true,
                        required:true,
                        minlength:4,
                        maxlength:4,
                        digits:true
                    },
                    username:{
                        username:true,
                        required:true,
                        minlength:4,
                        maxlength:16,
                    },
                    password:{
                        required:true,
                        minlength:8,
                        maxlength:16,
                    }
                },
                // Specify validation error messages
                messages: {
                    fname: 		"First name is required",
                    email: {
                        required: 	"Email is required",
                        email: 		"Please enter a valid e-mail",
                    },
                    phone:{
                        required: 	"Phone number is requied",
                        minlength: 	"Please enter 10 digit mobile number",
                        maxlength: 	"Please enter 10 digit mobile number",
                        digits: 	"Only numbers are allowed in this field"
                    },
                    date:{
                        required: 	"Date is required",
                        minlength: 	"Date should be a 2 digit number, e.i., 01 or 20",
                        maxlength: 	"Date should be a 2 digit number, e.i., 01 or 20",
                        digits: 	"Date should be a number"
                    },
                    month:{
                        required: 	"Month is required",
                        minlength: 	"Month should be a 2 digit number, e.i., 01 or 12",
                        maxlength: 	"Month should be a 2 digit number, e.i., 01 or 12",
                        digits: 	"Only numbers are allowed in this field"
                    },
                    year:{
                        required: 	"Year is required",
                        minlength: 	"Year should be a 4 digit number, e.i., 2018 or 1990",
                        maxlength: 	"Year should be a 4 digit number, e.i., 2018 or 1990",
                        digits: 	"Only numbers are allowed in this field"
                    },
                    username:{
                        required: 	"Username is required",
                        minlength: 	"Username should be minimum 4 characters",
                        maxlength: 	"Username should be maximum 16 characters",
                    },
                    password:{
                        required: 	"Password is required",
                        minlength: 	"Password should be minimum 8 characters",
                        maxlength: 	"Password should be maximum 16 characters",
                    }
                }
            }
            $("#myForm").multiStepForm(
                {
                    // defaultStep:0,
                    beforeSubmit : function(form, submit){
                        console.log("called before submiting the form");
                        console.log(form);
                        console.log(submit);
                    },
                    validations:val,
                }
            ).navigateTo(0);
        });
    </script>
</head>
<body style="background-color: darkslategray;">
{{--<h1 style="margin-top:50px; color: white;">jQuery Multi Step Form Wizard Plugin With Demo</h1>--}}
{{--<form id="myForm" action="#" method="POST">--}}
{{--    <h1>Registration Form</h1>--}}
{{--    <!-- One "tab" for each step in the form: -->--}}
    <div class="tab">Name:
        <p><input placeholder="First name..." name="fname"></p>
        <p><input placeholder="Last name..." name="lname"></p>
    </div>
    <div class="tab">Contact Info:
        <p><input placeholder="E-mail..." name="email"></p>
        <p><input placeholder="Phone..." name="phone"></p>
    </div>
    <div class="tab">Birthday:
        <p><input placeholder="dd" name="date"></p>
        <p><input placeholder="mm" name="month"></p>
        <p><input placeholder="yyyy" name="year"></p>
    </div>
    <div class="tab">Login Info:
        <p><input placeholder="Username..." name="username"></p>
        <p><input placeholder="Password..." name="password" type="password"></p>
    </div>
    <div style="overflow:auto;">
        <div style="float:right; margin-top: 5px;">
            <button type="button" class="previous">Previous</button>
            <button type="button" class="next">Next</button>
            <button type="button" class="submit">Submit</button>
        </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step">1</span>
        <span class="step">2</span>
        <span class="step">3</span>
        <span class="step">4</span>
    </div>

    <div class="container">
        <div class="row">
            <section>
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <form role="form">
                        <div class="tab-content">
                            <div class="tab-pane active tab" role="tabpanel" id="step1">
                                <h3>Step 1</h3>
                                <p>This is step 1</p>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane tab" role="tabpanel" id="step2">
                                <h3>Step 2</h3>
                                <p>This is step 2</p>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                    <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane tab" role="tabpanel" id="step3">
                                <h3>Step 3</h3>
                                <p>This is step 3</p>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                    <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                                    <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane tab" role="tabpanel" id="complete">
                                <div style="overflow:auto;">
                                    <div style="float:right; margin-top: 5px;">
                                        <button type="button" class="previous">Previous</button>
                                        <button type="button" class="next">Next</button>
                                        <button type="button" class="submit">Submit</button>
                                    </div>
                                </div>
                                <!-- Circles which indicates the steps of the form: -->
                                <div style="text-align:center;margin-top:40px;">
                                    <span class="step">1</span>
                                    <span class="step">2</span>
                                    <span class="step">3</span>
                                    <span class="step">4</span>
                                </div>
                                <h3>Complete</h3>
                                <p>You have successfully completed all steps.</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
{{--</form>--}}
</body>
</html>
