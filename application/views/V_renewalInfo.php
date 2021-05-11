<!DOCTYPE html>
<html>
<head>
  <title>User Renewal</title>

  <link href="<?php echo base_url().'assets/vendor/fontawesome-free/css/all.min.css' ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url().'assets/vendor/datatables/dataTables.bootstrap4.css' ?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/css/sb-admin.css' ?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/css/select2.min.css' ?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/vendor/bootstrap/css/bootstrap-datepicker3.css'?>" rel="stylesheet">

  <style type="text/css">
    #admin_image{width: 128px;height: 128px;border-radius: 100%;}
    .pro-img{margin-top: -80px;margin-bottom: 20px;}
    h3{color: #455a64;font-family: "poppins",sans-serif;font-weight: 400;}
    .carousel-header{text-align: center;color: #455a64;font-family: "poppins",sans-serif;font-weight: 400;}
    .thClass{
      font-weight: normal;
    }
  </style>
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


     <!--  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-swimmer"></i>
          <span>Regular Batch</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url().'C_adminHome/regularBatchSummary'?>">Summary</a>
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

    <!-- query to get advanced user list-->
    <?php
      $query = $this->db->query("select user_id,name from tab_user");
      $result = $query->result_array();
      //print_r($result);
    ?>
    <!-- end of query-->
    <div id="content-wrapper">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-4">
              <select id="advanced_user" class="form-control">
                 <option disabled selected="">Select Name</option>
                  <?php 
                    $length = sizeof($result);
                    for($i=0;$i<$length;$i++){ ?>
                      <option value="<?php echo $result[$i]['user_id']?>"><?php echo $result[$i]['name']?></option>
                    <?php } ?>
              </select>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary" onclick="getAdvancedUserDetails();getRenewalDetails();">Go</button>
            </div>
            <div class="col-md-3">
              <button class="btn btn-primary" onclick="getRenewalReport();">Get Renewal Report</button>
            </div>
        </div><!--row-->

        <div class="row">
        <div class="card card-register mx-auto mt-5" id="user_card_div" style="max-width: 52rem;">
          <div class="card-header">User Renewal Form</div>
          <div class="card-body">
              <form id="user_renewal_form" name="user_renewal_form" method="post" action="#" >
                
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-3">
                    <input type="hidden" name="user_id" id="user_id">
                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="User Name" disabled="disabled">
                    
                  </div>
                  <div class="col-md-3">
                  <input type="text" name="get_admsn_date" id="get_admsn_date" class="form-control" placeholder="Admission Date" disabled="disabled">
                    
                  </div>
                  <div class="col-md-3">
                    <input type="text" name="user_fees" id="user_fees" class="form-control" placeholder="Fess" disabled="disabled">
                  </div>

                  <div class="col-md-3">
                    <input type="text" name="enrollment_duration" id="enrollment_duration" class="form-control" placeholder="Enrollment Duration" disabled="disabled">
                  </div>
                </div>
              </div>
            
              <div class="form-group">
                <div class="form-row">
                  
                  <div class="col-md-3">
                    <input type="text" name="user_renewal_date" id="user_renewal_date" class="form-control datepicker" placeholder="Renewal Date">
                  </div>
                
                
                  <div class="col-md-3">
                    <input type="text" name="user_renewal_count" id="user_renewal_count" class="form-control" placeholder="Renewal Count">
                  </div>
                  <div class="col-md-3">
                    <input type="text" name="renewal_fees" id="renewal_fees" class="form-control" placeholder="Renewal Fees">
                  </div>
                  <div class="col-md-3">
                    <select id="renewal_enrollment_duration" name="renewal_enrollment_duration" class="form-control form-control-line">
                        <option value="0">Enrollment Duration</option>
                        <option value="1">1 month</option>
                        <option value="3">3 month</option>
                        <option value="6">6 month</option>
                        <option value="12">1 Year</option>
                        <option value="custom">Custom</option>
                    </select>
                  </div>
                  </div>
                </div>

             
              <button type="submit" class="btn btn-primary" id="saveBtn" onclick="saveRenewalUserDate();">Save</button>          
            </form>
          </div><!--card body-->
        </div><!--card-->
        </div>
        
              
              <div class="card card-register mx-auto mt-5" style="max-width: 60rem;">
              <div class="card-header">Individual Renewal Details</div>
              <div class="card-body">
                <table class="table table-striped" id="tab_userRenewal">
                  <thead>
                    <tr>
                                <th class="thClass">Admission Date</th>
                                <th class="thClass">Starting Enrollment Duration</th>
                                <th class="thClass">Starting Fees Paid</th>
                                <th class="thClass">Renewal Count</th>
                                <th class="thClass">Renewal Enrollment Duration</th>
                                <th class="thClass">Renewal Date</th>
                                <th class="thClass">Renewal Fees</th>
                    </tr>
                  </thead>
                  <tbody id="tab_userRenewal_body"></tbody>
                </table>
              </div>
            </div><!-- row -->
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
  <script src="<?php echo base_url().'assets/vendor/bootstrap/js/bootstrap-datepicker.min.js'?>"></script>
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
  <script src="<?php echo base_url().'assets/js/select2.min.js' ?>"></script>
  <script type="text/javascript">
   var BASEPATH = '<?php echo base_url();?>';

    $("#advanced_user").select2( {
    
        placeholder: "Select Name",
        allowClear: true
        } );

    $('.datepicker').datepicker({
      dateFormat:'yyyy-mm-dd'
    });

    function getRenewalDetails(){

      var user_id = $('#advanced_user').val();
      $('#tab_userRenewal').dataTable().fnDestroy();
      $('#tab_userRenewal_body').empty();

      $.ajax({
       url:BASEPATH + 'C_adminHome/getRenewalDetails/'+user_id,  
       type:"POST",
       success:function(resp){
           var data = jQuery.parseJSON(resp);
           var str = " ";
           for(var i=0; i<data.length; i++){
               str += '<tr>'; 
               str += '<td>'+data[i].admission_date+'</td>'; 
               str += '<td>'+data[i].starting_duration+' Month'+'</td>'; 
               str += '<td>'+data[i].starting_fees_paid+'</td>'; 
               str += '<td>'+data[i].renewal_count+'</td>'; 
               str += '<td>'+data[i].renewal_enrollment_duration+'</td>'; 
               str += '<td>'+data[i].renewal_date+'</td>';
               str += '<td>'+data[i].renewal_fees+'</td>'; 
               str += '</tr>'; 
            }
            
            $('#tab_userRenewal_body').html(str);

            $("#tab_userRenewal").DataTable({
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                "paging": true,
                "searching": true,
                "ordering": false,
                "order":[5,"desc"]
            });
       }
    });
    }

    function getAdvancedUserDetails(){
       
       var user_id = $('#advanced_user').val();

       $.ajax({
       url:BASEPATH + 'C_adminHome/getAdvancedUserDetails/'+user_id, 
       type:"POST",
       success:function(resp){
        
        var data = jQuery.parseJSON(resp);
         for(var i=0;i<data.length;i++){
            document.getElementById('get_admsn_date').value = data[i].admission_date;
            document.getElementById('user_id').value = data[i].user_id;
            document.getElementById('user_fees').value = data[i].fees_paid;
            document.getElementById('user_name').value = data[i].name;
            if(data[i].enrollment_duration == '1'){
                document.getElementById('enrollment_duration').value = '1 Month';
               }else if(data[i].enrollment_duration == '3'){
                document.getElementById('enrollment_duration').value = '3 Month';
               }else if(data[i].enrollment_duration == '6'){
                document.getElementById('enrollment_duration').value = '6 Month';
               }else if(data[i].enrollment_duration == '12'){
                document.getElementById('enrollment_duration').value = '1 Year';
               }else if(data[i].enrollment_duration == 'custom'){
                document.getElementById('enrollment_duration').value = 'Custome';
               }else{
                document.getElementById('enrollment_duration').value = 'other';
               }        
        }
      }
    });
    }

    function saveRenewalUserDate(){
      var user_id = $('#user_id').val();
      var renewal_date = $('#user_renewal_date').val();
      var renewal_count = $('#user_renewal_count').val();
      var renewal_fees = $('#renewal_fees').val();
      var renewal_enrollment_duration = $('#renewal_enrollment_duration option:selected').val();
      
      if(renewal_date == ''){
        alert('Enter Renewal Date');
        return false;
      } 
      if(renewal_count == ''){
        alert('Enter Renewal Count');
        return false;
      }
      if(renewal_enrollment_duration == ''){
        alert('Enter Renewal Duration');
        return false;
      }
      if(renewal_fees == ''){
        alert('Enter Renewal Fees');
        return false;
      }

       $.ajax({
       url:BASEPATH + 'C_adminHome/saveRenewalUserDate/', 
       type:"POST",
       data:{'renewal_date':renewal_date,'renewal_count':renewal_count,'renewal_fees':renewal_fees,
            'renewal_enrollment_duration':renewal_enrollment_duration,'user_id':user_id},
       success:function(resp){
        $.trim(resp);
        if(resp==1){
          alert('User Renewal Successfully completed');
        }else{
          alert('some Error');
        }
       }
     });


    }

    function getRenewalReport(){
      var url = BASEPATH + 'C_adminHome/getRenewalReport/';
      window.open(url, '_blank');
      return;
    } 
  </script>
  
  </html>