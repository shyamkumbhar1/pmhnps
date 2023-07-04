<footer class="bg-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3 col-md-12 copyright d-lg-flex d-sm-block justify-content-center align-items-center">
          <div class="text-center d-sm-block text-sm-center">
          <span> © 2022 </span> <a class="text-dark" href="#">PMHNP.com</a>
        </div>
        <div class="text-center d-sm-block text-sm-center"> | <a href="#">PRIVACY POLITY</a> | <a
            href="#">TERMS OF USE</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="footer-social">
            <a href="#"><img src="{{ asset('src/img/facebook.png') }}" alt="" /></a>
            <a href="#"><img src="{{asset('src/img/linkedin.png')}}" alt="" /></a>
            <a href="#"><img src="{{ asset('src/img/youtube.png') }}" alt="" /></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

    <!-- MDB -->
  <script type="text/javascript" src="{{ asset('src/js/mdb.min.js') }}"></script>

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

</body>

</html>