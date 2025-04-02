@extends('layout.default')
@section('content')
<div class="row">

    <div class="col-md-12">

        <form id="step-one-form" action="#" method="post">
            @csrf
            <fieldset>
                <h4 class="mb-3"></h4>
                <div class="row">
                    <div class="col-md-8">


                        <div class="form-group">
                            <label for="title">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                            <span class="error name_err" id="error_name">(min 4 char)</span>
                            <span id="spnNameStatus"></span>


                        </div>

                        <div class="form-group">
                            <label for="title">Email:</label>
                            <input type="text" class="form-control" name="email" id="email" required>
                            <span class="error email_err"></span>
                            <span id="spnEmailStatus"></span>


                        </div>

                        <div class="form-group">
                            <label for="title">Phone:</label>
                            <input type="text" class="form-control" name="phone" id="phone" required />
                            <span class="error phone_err"></span>
                            <span id="spnPhoneStatus"></span>


                        </div>

                        <div class="form-group">
                            <label for="title">Guardian:</label>
                            <input type="text" class="form-control" name="guardian" id="guardian" required />
                            <span class="error guardian_err"></span>
                            <span id="spnGuardianStatus"></span>



                        </div>
                        <div class="form-group">
                            <label for="description">Amount:</label>
                            <input type="text" class="form-control" id="amount" name="amount" required />
                            <span class="error amount_err"></span>
                            <span id="spnAmountStatus"></span>


                        </div>

                        <div class="form-group">
                            <label for="description"> Address:</label>
                            <textarea type="text" class="form-control" id="desc" name="desc"></textarea>

                        </div>
                    </div>
                </div>

                <input type="button" name="password" class="next btn btn-primary" value="Next" disabled />
            </fieldset>
            <fieldset style="display:none;">
                <h4 class="mb-3">Description</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Institute Name:</label>
                            <input type="text" class="form-control" id="iname" name="iname" required />
                            <span class="error name_err">(min 4 char)</span>
                            <span id="spniNameStatus"></span>


                        </div>
                        <div class="form-group">
                            <label for="title">Degree:</label>
                            <input type="text" class="form-control" name="degree" id="degree" required />
                            <span class="error degree_err"></span>
                            <span id="spnDegreeStatus"></span>


                        </div>

                        <div class="form-group">
                            <label for="description">year:</label>
                            <input type="text" class="form-control" id="year" name="year" required />
                            <span class="error year_err">(enter 4 char length)</span>
                            <span id="spnYearStatus"></span>


                        </div>
                    </div>
                </div>

                <hr class="mb-4">
                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="next" class="next btn btn-primary" value="Next" disabled />
            </fieldset>



            <fieldset id="step4" style="display:none;">
                <h4 class="mb-3"></h4>
                <div class="row">
                    <div class="col-md-12 mb-3">

                        <div class="form-group">
                            <label for="title">Update New Password:</label>
                            <input type="text" class="form-control" name="password" id="password" required>
                            <span class="error password_err">(min6-8)</span>
                            <span id="spnPasswordStatus"></span>


                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="next" class="next btn btn-primary" value="Next" disabled />
            </fieldset>

            <fieldset id="terms" style="display:none;">
                <h4 class="mb-3">Final Step of the form</h4>
                <p><button type="submit" class="btn btn-primary" id="step-one">Submit</button>
                </p>
            </fieldset>

        </form>
    </div>
</div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var current = 1,
            current_step, next_step, steps;
        steps = $("fieldset").length;

        $(document).on("click", ".next", function() {
            //if validation true
            // Validate form before submitting
            //  if (!validation()) {
            //                 return false;
            //             }
            // if($("#spnNameStatus,spnEmailStatus").html("Valid")){
            //$("input[type='button']").removeAttr("disabled");
            $("input[type='button']").attr("disabled", "disabled");

            current_step = $(this).parent("fieldset");
            next_step = $(this).parent("fieldset").next();
            next_step.show();
            current_step.hide();
            //}
        });
        $(document).on("click", ".previous", function() {
            current_step = $(this).parent("fieldset");
            next_step = $(this).parent("fieldset").prev();
            next_step.show();
            current_step.hide();
        });
        $(document).on("click", ".step-3", function() {
            current_step = $(this).closest("fieldset");
            next_step = $("#step3");
            next_step.show();
            current_step.hide();
        });
        $(document).on("click", ".step-4", function() {
            current_step = $(this).closest("fieldset");
            next_step = $("#step4");
            next_step.show();
            current_step.hide();
        });

        function validatePhone(txtPhone) {
            var a = document.getElementById(txtPhone).value;
            var filter = /^[0-9*#]{4,10}$/;
            if (filter.test(a)) {
                return true;
            } else {
                return false;
            }
        }

        function validateYear(txtPhone) {
            var a = document.getElementById(txtPhone).value;
            var filter = /^[0-9*#]{2,4}$/;
            if (filter.test(a)) {
                return true;
            } else {
                return false;
            }
        }

        function validateName(txtName) {
            var a = document.getElementById(txtName).value;
            var filter = /^[a-zA-Z ]{4,10}$/;
            //var min = /{4,10}/;
            if (filter.test(a)) {
                return true;
            } else {
                return false;
            }
        }

        function validatePassword(txtName) {
            var a = document.getElementById(txtName).value;
            var filter = /^[a-zA-Z0-9]{6,8}$/;
            //var min = /{4,10}/;
            if (filter.test(a)) {
                return true;
            } else {
                return false;
            }
        }



        function validateEmail(txtName) {
            var a = document.getElementById(txtName).value;
            var filter = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
            if (filter.test(a)) {
                return true;
            } else {
                return false;
            }
        }

        function validationFirst() {
            var isValid = true;
            if (validateName('name')) {
                $('#spnNameStatus').html('&#x2713;');
                $('#spnNameStatus').css('color', 'green');
                $('.error').html('');

            } else {
                $('#spnNameStatus').html('*Minimum 4 char length,Maximum 10 are accepted<br>*Numbers not allowed.');
                $('#spnNameStatus').css('color', 'red');

                isValid = false;

            }

            if (validateName('guardian')) {
                $('#spnGuardianStatus').html('&#x2713;');
                $('#spnGuardianStatus').css('color', 'green');
                $("#toggle-even").removeAttr("disabled");
                $('.error').html('');

            } else {
                $('#spnGuardianStatus').html('*Minimum 4 char length,Maximum 10 are accepted<br>*Numbers not allowed.');
                $('#spnGuardianStatus').css('color', 'red');

                isValid = false;

            }
            if (validatePhone('phone')) {
                $('#spnPhoneStatus').html('&#x2713;');
                $('#spnPhoneStatus').css('color', 'green');
                $("#toggle-even").removeAttr("disabled");
                $('.error').html('');



            } else {
                $('#spnPhoneStatus').html('Invalid');
                $('#spnPhoneStatus').css('color', 'red');

                isValid = false;

            }

            if (validatePhone('amount')) {
                $('#spnAmountStatus').html('&#x2713;');
                $('#spnAmountStatus').css('color', 'green');
                $("#toggle-even").removeAttr("disabled");
                $('.error').html('');


            } else {
                $('#spnAmountStatus').html('Invalid ');
                $('#spnAmountStatus').css('color', 'red');

                isValid = false;

            }

            if (validateEmail('email')) {
                $('#spnEmailStatus').html('&#x2713;');
                $('#spnEmailStatus').css('color', 'green');
                $('.error').html('');


            } else {
                $('#spnEmailStatus').html('Invalid');
                $('#spnEmailStatus').css('color', 'red');

                isValid = false;

            }

            return isValid;

        }

        function validationSecond() {
            isValid = true;
            if (validateName('iname')) {
                $('#spniNameStatus').html('&#x2713;');
                $('#spniNameStatus').css('color', 'green');
                $('.error').html('');

            } else {
                $('#spniNameStatus').html('*Minimum 4 char length,Maximum 10 are accepted<br>*Numbers not allowed.');
                $('#spniNameStatus').css('color', 'red');

                isValid = false;

            }

            if (validateName('degree')) {
                $('#spnDegreeStatus').html('&#x2713;');
                $('#spnDegreeStatus').css('color', 'green');
                $("#toggle-even").removeAttr("disabled");
                $('.error').html('');

            } else {
                $('#spnDegreeStatus').html('Invalid');
                $('#spnDegreeStatus').css('color', 'red');

                isValid = false;

            }

            if (validateYear('year')) {
                $('#spnYearStatus').html('&#x2713;');
                $('#spnYearStatus').css('color', 'green');
                $("#toggle-even").removeAttr("disabled");
                $('.error').html('');

            } else {
                $('#spnYearStatus').html('Invalid');
                $('#spnYearStatus').css('color', 'red');

                isValid = false;

            }
            return isValid;

        }

        function validationThird() {
            isValid = true;


            if (validatePassword('password')) {
                $('#spnPasswordStatus').html('&#x2713;');
                $('#spnPasswordStatus').css('color', 'green');
                $("#toggle-even").removeAttr("disabled");
                $('.error').html('');

            } else {
                $('#spnPasswordStatus').html('Invalid');
                $('#spnPasswordStatus').css('color', 'red');
                isValid = false;

            }
            return isValid;
        }
        $('#email,#name,#phone,#amount,#guardian').on("keyup", function() {
            //if validation true
            // Validate form before submitting
            if (!validationFirst()) {
                $("input[type='button']").attr("disabled", "disabled");

                return;
            }

            $("input[type='button']").removeAttr("disabled");


        });

        $('#degree,#iname,#year').on("keyup", function() {
            //if validation true
            // Validate form before submitting
            if (!validationSecond()) {
                $("input[type='button']").attr("disabled", "disabled");

                return;
            }

            $("input[type='button']").removeAttr("disabled");


        });
        $('#password').on("keyup", function() {
            //if validation true
            // Validate form before submitting
            if (!validationThird()) {
                $("input[type='button']").attr("disabled", "disabled");

                return;
            }

            $("input[type='button']").removeAttr("disabled");


        });
    });


    $('#step-one-form').on('submit', function(event) {

        event.preventDefault();
        var _token = $("input[name=_token]").val();
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var guardian = $('#guardian').val();
        var amount = $('#amount').val();
        var desc = $('#desc').val();
        var year = $('#year').val();
        var degree = $('#degree').val();
        var iname = $('#iname').val();
        var password = $('#password').val();



        $.ajax({
            url: "{{ route('products.form') }}",
            type: "POST",

            data: {
                _token: _token,
                name: name,
                email: email,
                phone: phone,
                guardian: guardian,
                amount: amount,
                desc: desc,
                iname: iname,
                year: year,
                degree: degree,
                password: password

            },
            success: function(data) {
                if ($.isEmptyObject(data.error)) {

                    alert(data.success);
                    //window.location.href = data.redirect_url;

                } else {
                    //printErrorMsg(data.error)
                }
                console.log(data);
            },

        });

        function printErrorMsg(msg) {
            $.each(msg, function(key, value) {
                console.log(key);
                $('.' + key + '_err').text(value);

            });
        }

        function checkError(msg) {
            console.log(msg);
            $.each(msg, function(key, value) {
                console.log(key);
                $('spn' + key + 'Status').text(value);

            });
        }
    });
</script>