<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Remaining details</title>
    <style>
        body {
          background-color: #f8f9fa;
        }

        .container {
          margin-top: 50px;
        }

        .card {
          border-radius: 10px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-header {
          background-color: #f8f9fa;
          border-bottom: none;
        }

        .card-body {
          padding: 30px;
        }

        .alert {
          border-radius: 10px;
        }

        .form-group {
          margin-bottom: 20px;
        }

        .form-label {
          font-weight: bold;
        }

        .form-control {
          border-radius: 5px;
        }

        .btn-primary {
          background-color: #007bff;
          border-color: #007bff;
        }

        .btn-primary:hover {
          background-color: #0069d9;
          border-color: #0062cc;
        }

        .btn-primary:focus,
        .btn-primary.focus {
          box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
        }

      </style>
  </head>
  <body>
    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <h1> Complete Remaining details :</h1>
                        {{-- {{ __('You are logged in!') }} --}}
                        <form method="POST" action="{{ route('remaining.details.post') }}" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                <x-label for="phone_number" :value="__('Phone Number')" />

                                <x-input id="phone_number" class="block w-full mt-1" type="text" name="phone_number" :value="old('phone_number')"
                                    placeholder="Phone Number" required autofocus />
                            </div>
                            <div>
                                <x-label for="professional_license_number" :value="__('Professional License Number')" />

                                <x-input id="professional_license_number" class="block w-full mt-1" type="text"
                                    name="professional_license_number" :value="old('professional_license_number')" placeholder="Professional License Number"
                                    required />
                            </div>


                            <div>
                                <label for="state_of_licensure">State of Licensure</label>

                                <select id="state_of_licensure" class="block w-full mt-1" name="state_of_licensure" required>
                                    <option value="">Select State of Licensure</option>
                                    <option value="ME">Maine (ME) </option>

                                    <!-- Add more options as needed -->
                                    <option value="other">Other</option>
                                </select>
                            </div>


                            <div>
                                <x-label for="areas_of_expertise" :value="__('Areas of Expertise')" />

                                <div>
                                    <input id="area_of_expertise1" type="checkbox" name="areas_of_expertise[]" value="child psychiatry" {{ in_array('child psychiatry', old('areas_of_expertise', [])) ? 'checked' : '' }}>
                                    <label for="area_of_expertise1">Child Psychiatry</label>
                                </div>

                                <div>
                                    <input id="area_of_expertise2" type="checkbox" name="areas_of_expertise[]" value="geriatric psychiatry" {{ in_array('geriatric psychiatry', old('areas_of_expertise', [])) ? 'checked' : '' }}>
                                    <label for="area_of_expertise2">Geriatric Psychiatry</label>
                                </div>

                                <div>
                                    <input id="area_of_expertise3" type="checkbox" name="areas_of_expertise[]" value="substance abuse counseling" {{ in_array('substance abuse counseling', old('areas_of_expertise', [])) ? 'checked' : '' }}>
                                    <label for="area_of_expertise3">Substance Abuse Counseling</label>
                                </div>

                                <!-- Add more checkboxes as needed -->

                                <div>
                                    <input id="area_of_expertise_other" type="checkbox" name="areas_of_expertise[]" value="other" {{ in_array('other', old('areas_of_expertise', [])) ? 'checked' : '' }}>
                                    <label for="area_of_expertise_other">Other</label>
                                </div>
                            </div>



                            <div>
                                <x-label for="bio" :value="__('Bio')" />

                                <textarea id="bio" class="block w-full mt-1" name="bio" placeholder="Bio" required>{{ old('bio') }}</textarea>
                            </div>

                            {{-- <div>
                                <x-label for="profile_picture" :value="__('Profile Picture')" />

                                <x-input id="profile_picture" class="block w-full mt-1" type="text" name="profile_picture"
                                    :value="old('profile_picture')" placeholder="Profile Picture" required />
                            </div> --}}
                            <div>
                                <x-label for="profile_picture" :value="__('Profile Picture')" />

                                <input id="profile_picture" class="block w-full mt-1" type="file" name="profile_picture" accept="image/*"  />
                            </div>


                            <div>
                                <x-label for="work_address" :value="__('Work Address')" />

                                <x-input id="work_address" class="block w-full mt-1" type="text" name="work_address"
                                    :value="old('work_address')" placeholder="Work Address" required />
                            </div>



                            <div class="flex items-center justify-end mt-4">
                                {{-- <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a> --}}

                                <x-button class="ml-4 btn btn-primary" >
                                    {{ __('Complete Profile') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



  </body>
</html>


