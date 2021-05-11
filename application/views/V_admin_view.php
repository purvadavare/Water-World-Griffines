<!DOCTYPE html>
<html>
<head>
  <title>Admin Home - Wadiya Park</title>

  <link href="<?php echo base_url().'assets/vendor/fontawesome-free/css/all.min.css' ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url().'assets/vendor/datatables/dataTables.bootstrap4.css' ?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/css/sb-admin.css' ?>" rel="stylesheet">


</head>
<body>
  

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?php echo base_url().'C_adminHome/homePage'?>">Wadiya</a>

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

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()."C_adminHome/displayUserInfoAdmin"?>">
          <i class="fas fa-fw fa-registered"></i>
          <span>User Information</span></a>
      </li>

        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()."C_adminHome/regularBatchSummary"?>">
          <i class="fa fa-swimmer"></i>
          <span>Summary</span></a>
      </li>
    </ul>

    <div id="content-wrapper">
 


    </div><!-- content-wrapper -->


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
          <a class="btn btn-primary" href="<?php echo base_url().'C_adminHome/logout'?>">Logout</a>
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
    
    function getRegularUserDetails(){

    var BASEPATH = '<?php echo base_url();?>';
    $('#tab_regularUserCoaching').dataTable().fnDestroy();
    $('#tab_regularUserCoaching_body').empty();

      $.ajax({
       url:BASEPATH + 'C_adminHome/getRegularUserDetails', 
       type:"POST",
       success:function(resp){
           var data = jQuery.parseJSON(resp);
           var str = " ";
           var path = BASEPATH + '/uploads';
           for(var i=0; i<data.length; i++){
              if(data[i].enrollment_type === 'Basic'){
                str += '<tr>'; 
                str += '<td>'+data[i].name+'</td>';
                str += '<td>'+data[i].mobile_number+'</td>'; 
                str += '<td>'+data[i].enrollment_duration+' Month'+'</td>'; 
                str += '<td>'+data[i].fees_paid+'</td>'; 
                str += '<td>'+data[i].admission_date+'</td>'; 
                str += '<td><img src="'+path+'/'+data[i].user_image+'" width=50% height=20%></td>'; 
                str += '<td><button class="btn btn-primary" onclick="edit_product('+data[i].user_id+');">Edit</button>&nbsp;<button class="btn btn-primary" onclick="delete_product('+data[i].user_id+');">Delete</button></td>'; 
                str += '</tr>'; 
            } 
          }
               
            
            $('#tab_regularUserCoaching_body').html(str);

            $("#tab_regularUserCoaching").DataTable({
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true
            });
       }
    });

    }

    function delete_product(user_id){
      var x = confirm('Delete this user ?');
      if(x === true){
        
      }
    }
  </script>
  </html>