
@include('layouts3.app')






 
  
  
  
    <div class="page-height">
      <div class="container">
  
        
        <div class="mt-5 mb-4 row">
          <div class="col-md-12">
            <h2 class="mb-4 text-center">Complete your Profile</h2>
             <!-- Collapsible wrapper -->
       
  
        <div class="row">
          <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif
                
              
                <form method="POST" action="{{ route('remaining.details.post') }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" >
                    </div>
                    <div>
                        
                        {{-- <x-label for="phone_number" class="form-label"  :value="__('Phone Number')" /> --}}

                        <x-input id="phone_number" class="block w-full mt-1" type="text" name="phone_number"
                            :value="old('phone_number')" class="form-control" placeholder="Phone Number" required autofocus />
                            @if ($errors->has('phone_number'))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->get('phone_number') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    </div>
                    <div>
                        {{-- <x-label for="professional_license_number" :value="__('Professional License Number')" /> --}}

                        <x-input id="professional_license_number" class="block w-full mt-1 form-control" type="text"
                            name="professional_license_number" :value="old('professional_license_number')"
                            placeholder="Professional License Number" required />

                            @if ($errors->has('professional_license_number'))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->get('professional_license_number') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    </div>


                    <div>
                        {{-- <label for="state_of_licensure">State of Licensure</label> --}}

                        <select id="state_of_licensure" class="block w-full mt-1 form-control" name="state_of_licensure"
                            required>
                            <option value="">Select State of Licensure</option>
                            <option value="ME">Maine (ME) </option>

                            <!-- Add more options as needed -->
                            <option value="other">Other</option>
                        </select>
                        @if ($errors->has('state_of_licensure'))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->get('state_of_licensure') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    </div>


                    <div>
                        @php
                            $expertiseAreas = [  "Mood Disorders",    "Trauma and PTSD",    "Geriatric Psychiatry",    "Psychotic Disorders",    "Neurodevelopmental Disorders",
                                "Substance Abuse Counseling",    "Eating Disorders",    "Sleep Disorders",    "Anxiety Disorders",    "Personality Disorders"];
                        @endphp
                        <label for="areas_of_expertise">Areas of Expertise</label>

                        @foreach ($expertiseAreas as $index => $expertise)
                            <div>
                                <input id="area_of_expertise{{ $index }}" type="checkbox" name="areas_of_expertise[]" value="{{ $expertise }}">
                                <label for="area_of_expertise{{ $index }}">{{ $expertise }}</label>
                            </div>
                        @endforeach

                        <div>
                            <input id="area_of_expertise_other" type="checkbox"  >
                            <label for="area_of_expertise_other">Other</label>

                        </div>

                        <div id="otherInputContainer" style="display: none;">

                                <input type="text" name="areas_of_expertise[]" id="otherInput">


                        </div>
                        @if ($errors->has('areas_of_expertise'))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->get('areas_of_expertise') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    </div>









                    <div>
                        <x-label for="bio" :value="__('Bio')" />

                        <textarea id="bio" class="block w-full mt-1 form-control" name="bio" placeholder="Bio" required>{{ old('bio') }}</textarea>
                    </div>

                    {{-- <div>
                    <x-label for="profile_picture" :value="__('Profile Picture')" />

                    <x-input id="profile_picture" class="block w-full mt-1" type="text" name="profile_picture"
                        :value="old('profile_picture')" placeholder="Profile Picture" required />
                </div> --}}
                    <div>
                        <x-label for="profile_picture" :value="__('Profile Picture')" />

                        <input id="profile_picture" class="block w-full mt-1 form-control" type="file" name="profile_picture"
                            accept="image/*" />

                            @if ($errors->has('profile_picture'))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->get('profile_picture') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    </div>


                    {{-- <div>
                        <x-label for="work_address" :value="__('Work Address')" />

                        <x-input id="work_address" class="block w-full mt-1 form-control" type="text" name="work_address"
                            :value="old('work_address')" placeholder="Work Address" required />
                    </div> --}}

                    <div>
                        {{-- <x-label for="address_line1" :value="__('Address Line 1')" /> --}}

                        <textarea id="address_line1" class="block w-full mt-1 form-control" type="text" name="address_line1"
                            placeholder="Address line 1" required />{{ old('bio') }}</textarea>

                            @if ($errors->has('address_line1'))
                                        <span class="text-danger">{{ $errors->first('address_line1') }}</span>
                                    @endif
                    </div>

                    <div>
                        {{-- <x-label for="address_line2" :value="__('Address Line 2')" /> --}}

                        <textarea id="address_line2" class="block w-full mt-1 form-control" type="text" name="address_line2"
                             placeholder="Address line 2" required />{{ old('bio') }}</textarea>
                             @if ($errors->has('address_line2'))
                                        <span class="text-danger">{{ $errors->first('address_line2') }}</span>
                                    @endif
                    </div>

                    <div>
                        <x-label for="country-dropdown" :value="__('Country')" />
                        <select id="country-dropdown" id="country" class="form-control" name="country">
                            <option value="">-- Select Country --</option>
                            @foreach ($countries as $data)
                            <option value="{{ $data->id }}">
                                {{ $data->name }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('country'))
                                        <span class="text-danger">{{ $errors->first('country') }}</span>
                                    @endif
                    </div>
                    <div class="mb-3 form-group">
                        <x-label for="state-dropdown" :value="__('State')" />
                        <select id="state-dropdown" id="state" class="form-control" name="state">
                        </select>
                        @if ($errors->has('state'))
                                        <span class="text-danger">{{ $errors->first('state') }}</span>
                                    @endif
                    </div>
                    <div class="form-group">
                        <x-label for="city-dropdown" :value="__('City')" />
                        <select id="city-dropdown" class="form-control" name="city">
                        </select>
                        @if ($errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                    </div>
                    <div>
                        <x-label for="postal_code" :value="__('Postal Code')" />

                        <x-input id="postal_code" class="block w-full mt-1 form-control" type="text" name="postal_code"
                            :value="old('postal_code')" placeholder="Postal Code" required />
                            @if ($errors->has('postal_code'))
                                        <span class="text-danger">{{ $errors->first('postal_code') }}</span>
                                    @endif
                    </div>
                    



                    <div class="flex items-center justify-end mt-4">
                        {{-- <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a> --}}

                        <x-button class="ml-4 btn btn-primary">
                            {{ __('Complete Profile') }}
                        </x-button>
                    </div>
                </form>
            </div>
          </div>
        </div>
  
      </div>
    </div>
  
  
  
  
  
  
  
  
  
    <!-- MDB -->
    <script type="text/javascript" src="{{ asset('src/js/mdb.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#area_of_expertise_other').change(function() {
                var isChecked = $(this).prop('checked');
                var otherInputContainer = $('#otherInputContainer');
                var otherInput = $('#otherInput');

                if (isChecked) {
                    otherInputContainer.show();
                    otherInput.prop('required', true);
                } else {
                    otherInputContainer.hide();
                    otherInput.prop('required', false);
                }
            });


        });
    </script>
    <script>
        $(document).ready(function () {
    
            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#country-dropdown').on('change', function () {
                var idCountry = this.value;
                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dropdown').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function (key, value) {
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
            $('#state-dropdown').on('change', function () {
                var idState = this.value;
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
    
        });
    </script>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

  
 
@include('layouts3.footer')
  


