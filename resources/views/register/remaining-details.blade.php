<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </x-slot>
        <h1>Complete Remaining Details :- </h1>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('remaining.details.store') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="phone_number" :value="__('Phone Number')" />

                <x-input id="phone_number" class="block w-full mt-1" type="text" name="phone_number" :value="old('phone_number')" placeholder="Phone Number" required autofocus />
            </div>
            <div>
                <x-label for="professional_license_number" :value="__('Professional License Number')" />

                <x-input id="professional_license_number" class="block w-full mt-1" type="text" name="professional_license_number" :value="old('professional_license_number')" placeholder="Professional License Number" required />
            </div>
            <div>
                <x-label for="state_of_licensure" :value="__('State of Licensure')" />

                <x-input id="state_of_licensure" class="block w-full mt-1" type="text" name="state_of_licensure" :value="old('state_of_licensure')" placeholder="State of Licensure" required />
            </div>
            <div>
                <x-label for="areas_of_expertise" :value="__('Areas of Expertise')" />

                <x-input id="areas_of_expertise" class="block w-full mt-1" type="text" name="areas_of_expertise" :value="old('areas_of_expertise')" placeholder="Areas of Expertise" required />
            </div>
            <div>
                <x-label for="bio" :value="__('Bio')" />

                <x-input id="bio" class="block w-full mt-1" type="text" name="bio" :value="old('bio')" placeholder="Bio" required />
            </div>
            <div>
                <x-label for="profile_picture" :value="__('Profile Picture')" />

                <x-input id="profile_picture" class="block w-full mt-1" type="text" name="profile_picture" :value="old('profile_picture')" placeholder="Profile Picture" required />
            </div>
            <div>
                <x-label for="work_address" :value="__('Work Address')" />

                <x-input id="work_address" class="block w-full mt-1" type="text" name="work_address" :value="old('work_address')" placeholder="Work Address" required />
            </div>



            <div class="flex items-center justify-end mt-4">
                {{-- <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a> --}}

                <x-button class="ml-4">
                    {{ __('Complete Profile') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
