  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-header">
      <!-- Container wrapper -->
      <div class="container align-items-center">

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
          data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar brand -->
          <a class="mt-2 navbar-brand mt-lg-0" href="#">
            <img src="{{ asset('src/img/logo.jpg') }}" alt="" loading="lazy" />
          </a>
          <!-- Left links -->
          <ul class="mb-2 navbar-nav mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">Find PMHNPs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">How it Works</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
          </ul>
          <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
      
        @if (Auth::user())
        <div class="dropdown">
          <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar"
              role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <img src="{{ asset('src/img/profilpic.jpg') }}" class="rounded-circle" height="25" alt="" loading="lazy" />
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
              <li>
                  <a class="dropdown-item" href="#">Update profile</a>
              </li>
              <li>
                  <a class="dropdown-item" href="#">My subscription</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">My reviews</a>
            </li>
              <li>
                  <a class="dropdown-item" href="#">Logout</a>
              </li>
          </ul>
        </div>
        @else
        <div class="d-flex align-items-center">
          <a class="text-reset nav-link-singin me-3" href="{{ route('login') }}">
            PMHNP Sign in
          </a>
          <a class="btn btn-primary btn-md" href="{{ route('register.step.one') }}">
            PMHNP Sign up
          </a>

        </div>
        @endif
        
      
        
      
    
        
       
        <!-- Right elements -->
      </div>
      
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

  </header>
  <!--Main Navigation-->