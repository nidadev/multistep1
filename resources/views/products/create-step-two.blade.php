@extends('layout.default')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="#" method="POST" id="step-two-form">
                @csrf
                <div class="card">
                    <div class="card-header">Education</div>
  
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
                            <label for="description">Institute Name:</label>
                            <input type="text" class="form-control" id="name1" name="name" />
                            <span class="error name1_err"></span>

                        </div>
                        <div class="form-group">
                            <label for="title">Degree:</label>
                            <input type="text" class="form-control" name="degree" id="degree" />
                            <span class="error degree_err"></span>

                        </div>

                        <div class="form-group">
                            <label for="description">year:</label>
                            <input type="text" class="form-control" id="year" name="year" />
                            <span class="error year_err"></span>

                        </div>

                       
  
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('products.step-one') }}" class="btn btn-danger pull-right">Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary" id="step-two">Next</button>
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
        //alert('');
        $('#step-two-form').on('submit', function(event) {
            event.preventDefault();
            var _token = $("input[name=_token]").val();
            var name1 = $('#name1').val();
            var year = $('#year').val();
            var degree = $('#degree').val();
            //alert(name1);
            //alert(year);
            //alert(degree);
            $.ajax({
                url: "{{ route('products.step-two') }}",
                type: "POST",
                data: {
                    _token: _token,
                    name: name1,
                    degree: degree,
                    year: year,
                },
                success: function(data) {
                   // alert(data.success);
                    if ($.isEmptyObject(data.error)) {
                        alert('no-error');
                        $('.name1_err').text('');
                        $('.year_err').text('');
                        $('.degree_err').text('');

                        //$('.desc_err').text('');
                        alert(data.success);
                        window.location.href = data.redirect_url;

                    } else {
                        printErrorMsg(data.error)
                    }
                    //console.log(data);
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