<!DOCTYPE html>
<html>
<head>
  <title>Admin Home - Wadiya Park</title>

  <link href="<?php echo base_url().'assets/vendor/fontawesome-free/css/all.min.css' ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url().'assets/vendor/datatables/dataTables.bootstrap4.css' ?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/css/sb-admin.css' ?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/css/slider.css' ?>" rel="stylesheet">

  <style type="text/css">
    #admin_image{width: 128px;height: 128px;border-radius: 100%;}
    .pro-img{margin-top: -80px;margin-bottom: 20px;}
    h3{color: #455a64;font-family: "poppins",sans-serif;font-weight: 400;}
    .carousel-header{text-align: center;color: #455a64;font-family: "poppins",sans-serif;font-weight: 400;}
  </style>
</head>
<body>
  

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?php echo base_url().'C_adminHome/homePage'?>">Wadia</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>


    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url().'C_adminHome/homePage'?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'C_adminHome/registerPage'?>">
          <i class="fas fa-fw fa-registered"></i>
          <span>Registration</span></a>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-swimmer"></i>
          <span>Advanced Batch</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo base_url().'C_adminHome/advancedBatch/0'?>">Time Audit sheet</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url().'C_adminHome/advancedBatch/1'?>">Monthly Report</a>
         </div>
      </li>


      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-swimmer"></i>
          <span>Batch Summary</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href='<?php echo base_url()."C_adminHome/regularBatchSummary"?>'>Summary</a>
         </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()."C_adminHome/regularBatchSummary"?>">
          <i class="fa fa-swimmer"></i>
          <span>Summary</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'C_adminHome/feesInfo'?>">
          <i class="fas fa-fw fa-registered"></i>
          <span>Fees Information</span></a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'C_adminHome/renewalinfo'?>">
          <i class="fas fa-fw fa-registered"></i>
          <span>Renewal</span></a>
      </li>

    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

    <div class="row">
    <!-- <div class="col-md-4">
      
        <div class="card">
          <img class="card-img-top" src="<?php echo base_url().'assets/image/profile-bg.jpg' ?>"" alt="Card image cap">
            <div class="card-block little-profile text-center">
                                <div class="pro-img"><img src="<?php echo base_url().'assets/image/30.jpg' ?>" alt="user" id="admin_image" /></div>
                                <h3 class="m-b-0">Sarvesh Deshmukh</h3>
                                <p>Swimming Coach</p>
                                
            </div>
          </div>
        </div> -->
        <div class="col-md-12">
        <div class="carousel-header">
          <h4>Swimming Pool</h4>
        </div>
        <div class="carousel slide" id="carousel-595110">
        <ol class="carousel-indicators">
          <li data-slide-to="0" data-target="#carousel-595110" class="active"></li>
          <li data-slide-to="1" data-target="#carousel-595110"></li>
          <li data-slide-to="2" data-target="#carousel-595110"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" style="height: 350px;" src="<?php echo base_url().'assets/image/wadiya-park1.jpg' ?>" />
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" style="height: 350px;" src="<?php echo base_url().'assets/image/wadiya-park2.jpg' ?>" />
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" style="height: 350px;" src="<?php echo base_url().'assets/image/wadiya-park3.jpg' ?>" />
          </div>
        </div> <a class="carousel-control-prev" href="#carousel-595110" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-595110" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
      </div>

        </div>
      </div> <!-- .row end-->
      
      <div class="col-sm-12">
      <h2><b>Head Coach Infomration </h2>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>   
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
          <div class="item carousel-item active">

         <div class="row">
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-left d-flex mr-3">
                    <a href="#">
                      <img src="../logo.jpg" alt="">
                    </a>
                  </div>
                  <div class="media-body">
                    <div class="testimonial">
                      <p>Lorem ipsum dolor sit amet, consec adipiscing elit. Nam eusem scelerisque tempor, varius quam luctus dui. Mauris magna metus nec.</p>
                      <p class="overview"><b>Sarvesh Deshmukh</b>, Ahmednagar</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-left d-flex mr-3">
                    <a href="#">
                      <img src="../logo.jpg" alt="">
                    </a>
                  </div>
                  <div class="media-body">
                    <div class="testimonial">
                      <p>Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra.</p>
                      <p class="overview"><b>Suraj Shinde</b>, Pune</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="item carousel-item">
            <div class="row">
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-left d-flex mr-3">
                    <a href="#">
                      <img src="../logo.jpg" alt="">
                    </a>
                  </div>
                  <div class="media-body">
                    <div class="testimonial">
                      <p>Lorem ipsum dolor sit amet, consec adipiscing elit. Nam eusem scelerisque tempor, varius quam luctus dui. Mauris magna metus nec.</p>
                      <p class="overview"><b>Pranjali Puranik</b>,Daund</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-left d-flex mr-3">
                    <a href="../logo.jpg">
                      <img src="../logo.jpg" alt="">
                    </a>
                  </div>
                  <div class="media-body">
                    <div class="testimonial">
                      <p>Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra.</p>
                      <p class="overview"><b>john Doe</b>, Manchar</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>      
          </div>
          
        </div>
      </div>
    </div>
  </div>

        

      </div>
      <!-- /.container-fluid -->

      

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo site_url('C_login/logout');?>">Logout</a>
        </div>
      </div>
    </div>
  </div>


</body>
<!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url().'assets/vendor/jquery/jquery.min.js' ?>"></script>
  <script src="<?php echo base_url().'assets/vendor/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url().'assets/vendor/jquery-easing/jquery.easing.min.js' ?>"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url().'assets/vendor/datatables/jquery.dataTables.js' ?>"></script>
  <script src="<?php echo base_url().'assets/vendor/datatables/dataTables.bootstrap4.js' ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url().'assets/js/sb-admin.min.js' ?>"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url().'assets/js/demo/datatables-demo.js' ?>"></script>
  <script type="text/javascript">
    $("#carousel-595110").carousel();
  </script>
  </html>