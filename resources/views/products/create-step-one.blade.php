@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="#" method="POST" id="step-one-form">
                @csrf
                <div class="card">
                    <div class="card-header">Order</div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="title">Name:</label>
                            <input type="text" class="form-control" name="name" id="name">
                            <span class="error name_err"></span>

                        </div>

                        <div class="form-group">
                            <label for="title">Email:</label>
                            <input type="text" class="form-control" name="email" id="email">
                            <span class="error email_err"></span>

                        </div>

                        <div class="form-group">
                            <label for="title">Phone:</label>
                            <input type="text" class="form-control" name="phone" id="phone">
                            <span class="error phone_err"></span>

                        </div>
                        
                        <div class="form-group">
                            <label for="title">Guardian:</label>
                            <input type="text" class="form-control" name="guardian" id="guardian">
                            <span class="error guardian_err"></span>

                        </div>
                        <div class="form-group">
                            <label for="description">Amount:</label>
                            <input type="text" class="form-control" id="amount" name="amount" />
                            <span class="error amount_err"></span>

                        </div>

                        <div class="form-group">
                            <label for="description"> Address:</label>
                            <textarea type="text" class="form-control" id="desc" name="desc"></textarea>

                        </div>

                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary" id="step-one">Next</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<style>
    .error
    {
        color:red;
    }
    </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        //alert('');
        $('#step-one-form').on('submit', function(event) {
            event.preventDefault();
            var _token = $("input[name=_token]").val();
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var guardian = $('#guardian').val();
            var amount = $('#amount').val();
            var desc = $('#desc').val();


            $.ajax({
                url: "{{ route('products.step-one') }}",
                type: "POST",

                data: {
                    _token: _token,
                    name: name,
                    email: email,
                    phone: phone,
                    guardian: guardian,
                    amount: amount,
                    desc: desc,

                },
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        //$('.name_err').text('');
                       // $('.amount_err').text('');
                        //$('.desc_err').text('');
                        alert(data.success);
                        window.location.href = data.redirect_url;

                    } else {
                        printErrorMsg(data.error)
                    }
                    console.log(data);
                },

            });

            function printErrorMsg(msg){
                $.each(msg, function(key,value) {
                    console.log(key);
                    $('.'+key+'_err').text(value);

                });
            }
        });


    }); //document.ready
</script>