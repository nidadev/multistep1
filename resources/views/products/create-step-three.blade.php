@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="#" method="post" id="step-three-form">
@csrf
            <div class="card">
                    <div class="card-header">Update</div>
   
                    <div class="card-body">
  
                    <div class="form-group">
                            <label for="title">Update New Password:</label>
                            <input type="text" class="form-control" name="pwd" id="password">
                            <span class="error password_err"></span>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('products.step-two') }}" class="btn btn-danger pull-right">Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary" id="step-three">Submit</button>
                            </div>
                        </div>
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
        alert('');
        $('#step-three-form').on('submit', function(event) {
            event.preventDefault();
            var _token = $("input[name=_token]").val();
            var password = $('#password').val();
            
            $.ajax({
                url: "{{ route('products.step-three') }}",
                type: "POST",
                data: {
                    _token: _token,
                    password: password,                    
                },
                success: function(data) {
                   // alert(data.success);
                    if ($.isEmptyObject(data.error)) {
                        //alert('no-error');
                        $('.password_err').text('');                       
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