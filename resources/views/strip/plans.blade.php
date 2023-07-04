
@include('layouts2.app')




<body>

  
  
  
  
  
    <div class="page-height">
      <div class="container">
  
        <div class="row">
          <div class="col-md-12">
            <div class="steps-row">
              <ul>
                <li class="">
                  <a href="#"> <span><i class="fa fa-check" aria-hidden="true"></i></span> Step 1 </a>
                </li>
                <li><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                <li class="active">
                  <a href="#"> <span>2</span> Step 2 </a>
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
            <h2 class="mb-4 text-center">Compair plans</h2>
          </div>
        </div>
  
        <div class="mb-4 row">
          <div class="col-lg-12">
  
            <div class="div-responsive">
              <div class="compair-plan">
  
                <div class="col1">
                  <h4 class="mb-4">Key Features</h4>
                  <ul>
                    <li> Create and manage a professionl profile </li>
                    <li>Publicity visible profiles to potential patients</li>
                    <li>Direct messaging with patients</li>
                    <li>Receive reviews and feedback from patients</li>
                    <li>Connect with a wider patient base</li>
                  </ul>
                </div>
  
                <div class="col2">
                  <h3>MONTHLY</h3>
                  <h5>$50/ <small>month</small></h5>
                  <div class="mt-3 mb-4 text-center">
                    <button type="submit" class="btn btn-lg btn-plan-select btn-md">
                       <a href=" {{ route('plans.checkout', $basic->plan_id) }}">Select</a>
                    </button>
                  </div>
                  <ul>
                    <li><span class="checkcircle"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                    <li><span class="checkcircle"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                    <li><span class="checkcircle"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                    <li><span class="checkcircle"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                    <li><span class="checkcircle"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                  </ul>
                </div>
  
                <div class="col3">
                  <H3>ANNUAL <span class="popular">Popular</span></H3>
                  <h5>$500/ <small>year</small></h5>
                  <div class="mt-3 mb-4 text-center">
                    <button type="submit" class="btn btn-lg btn-plan-select selected btn-md">
                        <a href=" {{ route('plans.checkout', $professional->plan_id) }}">Select</a>
                    </button>
                  </div>
                  <ul>
                    <li><span class="checkcircle"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                    <li><span class="checkcircle"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                    <li><span class="checkcircle"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                    <li><span class="checkcircle"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                    <li><span class="checkcircle"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                  </ul>
                </div>
  
              </div>
            </div>
  
          </div>
        </div>
  
      </div>
    </div>
  
  
  
  
  
  
  
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
  
    <!-- Custom scripts -->
    <script type="text/javascript">
  
    </script>
  
  </body>
  

@include('layouts2.footer')
  



 


