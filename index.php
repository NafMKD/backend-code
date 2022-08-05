<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sales Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between m-lg-5">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Sales Dashboard</span>
      </a>
    </div><!-- End Logo -->

  </header><!-- End Header -->

  <main id="main" class="main" style="margin-left: 0 !important;">
    <div class="row">
      <div class="pagetitle col-8">
        <h1 style="padding: 6%; font-size: 40px;">Sales Performance Dashboard</h1>
      </div>
      <div class="col-4">
        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title">Buisness Closed</span></h5>
            <div class="ps-3">
              <h6 id="buisness" style="font-size: 28px; font-weight: 700;color: #012970;">
                <div class="spinner-border text-primary" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="section dashboard">
      <div class="row">

        <!-- Top  -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-3">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Call Attempts <span>| Total</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class='bx bxs-phone-call'></i>
                    </div>
                    <div class="ps-3">
                      <h6 id="totalCall">
                        <div class="spinner-border text-primary" role="status">
                          <span class="visually-hidden">Loading...</span>
                        </div>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-3">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Call Attempts <span>| Meaningfull</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class='bx bx-phone-call' ></i>
                    </div>
                    <div class="ps-3">
                      <h6 id="MeaningCall">
                        <div class="spinner-border text-primary" role="status">
                          <span class="visually-hidden">Loading...</span>
                        </div>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-3">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Quotation Issued</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class='bx bxs-report'></i>
                    </div>
                    <div class="ps-3">
                      <h6 id="quoIssue">
                        <div class="spinner-border text-primary" role="status">
                          <span class="visually-hidden">Loading...</span>
                        </div>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-3">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Quotation Value</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class='bx bx-money-withdraw'></i>
                    </div>
                    <div class="ps-3">
                      <h6 id="quoValue">
                        <div class="spinner-border text-primary" role="status">
                          <span class="visually-hidden">Loading...</span>
                        </div>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->
          </div>
        </div>

        <!-- bottom (charts)  -->
        <div class="col-lg-12">

          <div class="row">

            <!-- Reports -->
            <div class="col-4">
              
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Total Vs Meaningfull Calls</h5>

                  <!-- Line Chart -->
                  <div id="lineChart" style="min-height: 400px;" class="echart">
                    <div class="spinner-border text-primary" role="status">
                      <span class="visually-hidden">Loading...</span>
                    </div>
                  </div>

                  <!-- End Line Chart -->
    
                </div>
              </div>

            </div><!-- End Reports -->

            <!-- Reports -->
            <div class="col-4">

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Quotation Used by Sales Agent</h5>

                  <!-- Donut Chart -->
                  <div id="donutChart" style="min-height: 400px;" class="echart">
                    <div class="spinner-border text-primary" role="status">
                      <span class="visually-hidden">Loading...</span>
                    </div>
                  </div>
                  <!-- End Donut Chart -->
    
                </div>
              </div>

            </div><!-- End Reports -->

            <!-- Reports -->
            <div class="col-4">

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Quotation Value by Sales Agent</h5>

                  <!-- Pie Chart -->
                  <div id="pieChart" style="min-height: 400px;" class="echart">
                    <div class="spinner-border text-primary" role="status">
                      <span class="visually-hidden">Loading...</span>
                    </div>
                  </div>
                  <!-- End Pie Chart -->
    
                </div>
              </div>

            </div><!-- End Reports --> 

          </div>
          
        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="margin-left: 0 !important;">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="script.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>