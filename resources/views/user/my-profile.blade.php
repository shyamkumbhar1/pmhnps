@extends('layouts2.app')

@section('content')
    <div class="page-height">
        <div class="container">


            <div class="mt-5 mb-4 row">
                <div class="col-md-12">



                    <h1>My profile Page</h1>



                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#country-dropdown').on('change', function() {
                var idCountry = this.value;
                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{ url('api/fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dropdown').html(
                            '<option value="">-- Select State --</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                    }
                });
            });

            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#state-dropdown').on('change', function() {
                var idState = this.value;
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{ url('api/fetch-cities') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function(key, value) {
                            $("#city-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

        });
    </script>
@endsection
