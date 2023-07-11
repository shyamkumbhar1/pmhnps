
@extends('layouts2.app')




@section('content')
<div class="page-height">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="steps-row">
          <ul>
            <li class="active">
              <a href="{{ route('register.step.one') }}"> <span>1</span> Step 1 </a>
            </li>
            <li><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
            <li>
              <a href="{{ route('plans.all') }}"> <span><i class="fa fa-check" aria-hidden="true"></i></span> Step 2 </a>
            </li>
            <li><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
            <li>
              <a href="#"> <span><i class="fa fa-check" aria-hidden="true"></i> </span> Step 3 </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="mb-4 row">
      <div class="col-md-12">
        <h2 class="mb-4 text-center">Sign up As PMHNP Professional</h2>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
        <div class="card">
            
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
            @endif

            <div class="card-body">
                <form method="POST" action="{{ route('register.step.one.post') }}">
                    @csrf

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __(' Full Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="professional_title" class="col-md-4 col-form-label text-md-end">Professional Title</label>
                        <div class="col-md-6">
                        <select id="professional_title" class="block w-full mt-1 form-control" name="professional_title" required>
                            <option value="">Select Professional Title</option>
                            <option value="DNP">DNP (Doctor of Nursing Practice)</option>
                            <option value="MSN"> MSN (Master of Science in Nursing)</option>
                            <option value="RN">RN (Registered Nurse)</option>
                            <option value="PMHNP-BC">PMHNP-BC (Board Certified Psychiatric-Mental Health Nurse Practitioner)</option>
                            <!-- Add more options as needed -->
                            <option value="other">Other</option>
                        </select>
                    </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="mb-0 row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Sign Up') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
@section('script')
   <!-- Custom scripts -->
   <script type="text/javascript">
      
    function togglePasswordVisibility() {
      var passwordInput = document.getElementById("password");
      var toggleButton = document.querySelector(".toggle-password");

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleButton.parentNode.classList.add("password-visible");
      } else {
        passwordInput.type = "password";
        toggleButton.parentNode.classList.remove("password-visible");
      }
    }

  </script>
@endsection
    
  
  
  
  
   
  
  
  
  
  
  

  
  

  


  



 


