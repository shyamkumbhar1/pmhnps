@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1><strong>Update Your Details :</strong>
{{-- {{print_r($remaining_filed)}} --}}
                    </h1>
                    <form method="POST" action="{{ route('user.Dashboard.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Full Name')" />

                            <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name',$user->name)" required autofocus />
                        </div>
                        <div>
                            <label for="professional_title">Professional Title</label>

                            <select id="professional_title" class="block w-full mt-1" name="professional_title" required>
                                <option value="">Select Professional Title</option>
                                <option value="DNP" {{ old('professional_title', $user->professional_title) === 'DNP' ? 'selected' : '' }}>Doctor of Nursing Practice (DNP)</option>
                                <option value="MSN" {{ old('professional_title', $user->professional_title) === 'MSN' ? 'selected' : '' }}>Master of Science in Nursing (MSN)</option>
                                <option value="RN" {{ old('professional_title', $user->professional_title) === 'RN' ? 'selected' : '' }}> Registered Nurse (RN)</option>
                                <option value="PMHNP-BC" {{ old('professional_title', $user->professional_title) === 'PMHNP-BC' ? 'selected' : '' }}>Board Certified Psychiatric-Mental Health Nurse Practitioner (PMHNP-BC)</option>
                                <!-- Add more options as needed -->
                                <option value="other" {{ old('professional_title', $user->professional_title) === 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>


                        <div>
                            <x-label for="phone_number" :value="__('Phone Number')" />

                            <x-input id="phone_number" class="block w-full mt-1" type="text" name="phone_number" :value="old('phone_number', $remaining_filed['phone_number'])"
                                placeholder="Phone Number" required autofocus />
                        </div>
                        <div>
                            <x-label for="professional_license_number" :value="__('Professional License Number')" />

                            <x-input id="professional_license_number" class="block w-full mt-1" type="text"
                                name="professional_license_number" :value="old('professional_license_number', $remaining_filed['professional_license_number'])"
                                placeholder="Professional License Number" required />
                        </div>

                        <div>
                            <label for="state_of_licensure">State of Licensure</label>

                            <select id="state_of_licensure" class="block w-full mt-1" name="state_of_licensure" required>
                                <option value="">Select State of Licensure</option>
                                <option value="ME" {{ old('state_of_licensure', $remaining_filed['state_of_licensure']) === 'ME' ? 'selected' : '' }}>Maine (ME)</option>
                                <!-- Add more options as needed -->
                                <option value="other" {{ old('state_of_licensure', $remaining_filed['state_of_licensure']) === 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <div>
                            <x-label for="areas_of_expertise" :value="__('Areas of Expertise')" />

                            {{-- <div>
                                <input id="area_of_expertise1" type="checkbox" name="areas_of_expertise[]" value="child psychiatry" {{ in_array('child psychiatry', old('areas_of_expertise', $user->areas_of_expertise), true) ? 'checked' : '' }}>
                                <label for="area_of_expertise1">child psychiatry</label>
                            </div> --}}

                            <!-- Add more checkboxes as needed -->

                            {{-- <div>
                                <input id="area_of_expertise_other" type="checkbox" name="areas_of_expertise[]" value="other" {{ in_array('other', old('areas_of_expertise', $user->areas_of_expertise), true) ? 'checked' : '' }}>
                                <label for="area_of_expertise_other">Other</label>
                            </div> --}}
                        </div>

                        <div>
                            <x-label for="bio" :value="__('Bio')" />

                            <textarea id="bio" class="block w-full mt-1" name="bio" placeholder="Bio" required>{{ old('bio', $remaining_filed['bio']) }}</textarea>
                        </div>

                        {{-- <div>
                            <x-label for="profile_picture" :value="__('Profile Picture')" />

                            <input id="profile_picture" class="block w-full mt-1" type="file" name="profile_picture" accept="image/*" />
                        </div> --}}

                        <div>
                            <x-label for="work_address" :value="__('Work Address')" />

                            <x-input id="work_address" class="block w-full mt-1" type="text" name="work_address"
                                :value="old('work_address', $remaining_filed['work_address'])" placeholder="Work Address" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4">
                                {{ __('Update Profile') }}
                            </x-button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
