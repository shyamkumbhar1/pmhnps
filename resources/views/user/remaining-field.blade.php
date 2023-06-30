@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

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

                                <x-input id="phone_number" class="block w-full mt-1" type="text" name="phone_number"
                                    :value="old('phone_number')" placeholder="Phone Number" required autofocus />
                            </div>
                            <div>
                                <x-label for="professional_license_number" :value="__('Professional License Number')" />

                                <x-input id="professional_license_number" class="block w-full mt-1" type="text"
                                    name="professional_license_number" :value="old('professional_license_number')"
                                    placeholder="Professional License Number" required />
                            </div>


                            <div>
                                <label for="state_of_licensure">State of Licensure</label>

                                <select id="state_of_licensure" class="block w-full mt-1" name="state_of_licensure"
                                    required>
                                    <option value="">Select State of Licensure</option>
                                    <option value="ME">Maine (ME) </option>

                                    <!-- Add more options as needed -->
                                    <option value="other">Other</option>
                                </select>
                            </div>


                            <div>
                                @php
                                    $expertiseAreas = ['Child Psychiatry', 'Geriatric Psychiatry', 'Substance Abuse Counseling'];
                                @endphp
                                <label for="areas_of_expertise">Areas of Expertise</label>

                                @foreach ($expertiseAreas as $index => $expertise)
                                    <div>
                                        <input id="area_of_expertise{{ $index }}" type="checkbox"
                                            name="areas_of_expertise[]" value="{{ $expertise }}">
                                        <label for="area_of_expertise{{ $index }}">{{ $expertise }}</label>
                                    </div>
                                @endforeach

                                <div>
                                    <input id="area_of_expertise_other" type="checkbox" name="areas_of_expertise[]"
                                        value="other">
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

                                <input id="profile_picture" class="block w-full mt-1" type="file" name="profile_picture"
                                    accept="image/*" />
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
@endsection
