<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </x-slot>
        <h1>Step 1 : Registration</h1>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register.step.one.post') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="full_name" :value="__('Full Name')" />

                <x-input id="full_name" class="block w-full mt-1" type="text" name="full_name" :value="old('name')" required autofocus />
            </div>
            <div>
                <label for="professional_title">Professional Title</label>

                <select id="professional_title" class="block w-full mt-1" name="professional_title" required>
                    <option value="">Select Professional Title</option>
                    <option value="DNP">DNP (Doctor of Nursing Practice)</option>
                    <option value="MSN"> MSN (Master of Science in Nursing)</option>
                    <option value="RN">RN (Registered Nurse)</option>
                    <option value="PMHNP-BC">PMHNP-BC (Board Certified Psychiatric-Mental Health Nurse Practitioner)</option>
                    <!-- Add more options as needed -->
                    <option value="other">Other</option>
                </select>
            </div>



            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block w-full mt-1"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block w-full mt-1"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
