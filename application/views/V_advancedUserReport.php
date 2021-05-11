<!DOCTYPE html>
<html>
<head>
  <title>Monthly Report Advanced Batch</title>

  <link href="<?php echo base_url().'assets/vendor/fontawesome-free/css/all.min.css' ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url().'assets/vendor/datatables/dataTables.bootstrap4.css' ?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/css/sb-admin.css' ?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/css/select2.min.css' ?>" rel="stylesheet">

  <style type="text/css">
    #admin_image{width: 128px;height: 128px;border-radius: 100%;}
    .pro-img{margin-top: -80px;margin-bottom: 20px;}
    h3{color: #455a64;font-family: "poppins",sans-serif;font-weight: 400;}
    .carousel-header{text-align: center;color: #455a64;font-family: "poppins",sans-serif;font-weight: 400;}
    
  </style>
</head>
<body>
  
  <!-- query to get advanced user list-->
    <?php 
      $query = $this->db->query("select user_id,name from tab_user where enrollment_type IN ('level4' ,'level5')");
      $result = $query->result_array();
    ?>
  <!-- end of query-->

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


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-swimmer"></i>
          <span>Batch Summary</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href='<?php echo base_url()."C_adminHome/regularBatchSummary"?>'>Summary</a>
         </div>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Level 4 & 5</li>
          <li class="breadcrumb-item active">Monthly Report</li>
        </ol>

      </div>
      <!-- /.container-fluid -->

      <div class="container-fluid">

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-3"></div>
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
          <div class="col-md-3">
              <button type="submit" class="btn btn-primary" onclick="getAdvancedUserDetails_forReport();">Go</button>
          </div>
          
        </div><!--row-->
      </div>

        <div class="form-group">
        <div class="form-row">
          <div class="col-md-2">
            <input type="hidden" name="user_id_hidden_report" id="user_id_hidden_report">
          </div>
          <div class="col-md-3">
            <input type="text" name="admission_date" id="admission_date" placeholder="Admission Date" class="form-control">
          </div>
          <div class="col-md-3">
            <input type="text" name="user_name" id="user_name" placeholder="User Name" class="form-control">
          </div>
          <div class="col-md-2">
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#dietModal">Create Diet Sheet</button>
          </div>
          <div class="col-md-2"></div>
        </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-2"></div>
            <div class="col-md-3">
            <form method="post">
              <input type="text" name="start_date" id="start_date" placeholder="Start Date" class="form-control datepicker">
            </div>
            <div class="col-md-3">
              <input type="hidden" name="user_id_for_report" id="user_id_for_report">
              <input type="text" name="end_date" id="end_date" placeholder="End Date" class="form-control datepicker">
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary" onclick="getReport();">Generate Report</button>
            </div>
            </form>
            <div class="col-md-2"></div>
          </div>
        </div>

        
      </div>
      

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
          <a class="btn btn-primary" href="<?php echo base_url().'C_adminHome/logout'?>">Logout</a>
        </div>
      </div>
    </div>
  </div>


<!-- Diet Sheet Modal-->
  <div class="modal fade" id="dietModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Diet Sheet</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form id="diet_sheet_form" name="diet_sheet_form" method="post" action="<?php echo base_url().'C_adminHome/create_diet_sheet'?>">
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <label>Select Name</label>
              <select style="width:100%;" class="form-control" onchange="getAdmission_date();" id="userDropdownMonthlyReport">
                <option value="0">Select User</option>
                 <?php 
                    $length = sizeof($result);
                    for($i=0;$i<$length;$i++){ ?>
                      <option value="<?php echo $result[$i]['user_id']?>"><?php echo $result[$i]['name']?></option>
                    <?php } ?>
              </select>
            </div>
            <div class="col-md-6">
              <label>Admission Date</label>
              <input type="text" name="user_admision_date" id="user_admision_date" class="form-control" placeholder="Admission Date" disabled="disabled">
              <input type="hidden" name="user_id_hidden" id="user_id_hidden">
            </div>
          </div>
        </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Morning</label>
                <textarea name="morning_diet" id="morning_diet" class="form-control"></textarea>
              </div>
              <div class="col-md-6">
                <label>Afternoon</label>
                <textarea name="afternoon_diet" id="afternoon_diet" class="form-control"></textarea>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Evening</label>
                <textarea name="evening_diet" id="evening_diet" class="form-control"></textarea>
              </div>
              <div class="col-md-6">
                <label>Night</label>
                <textarea name="night_diet" id="night_diet" class="form-control"></textarea>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Post Work-Out Drink</label>
                <textarea name="post_workout_drink" id="post_workout_drink" class="form-control"></textarea>
              </div>
            </div>
          </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-info" type="button" data-dismiss="modal" onclick="download_diet_sheet();">Download</button>
          <button type="submit" class="btn btn-primary" id="saveBtn" onclick="form_submit();">Save</button>
          <button type="submit" class="btn btn-primary" id="updateBtn" onclick="update_diet_sheet();" style="display:none;">Update</button>
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
  <link href="<?php echo base_url().'assets/vendor/bootstrap/css/bootstrap-datepicker3.css'?>" rel="stylesheet">

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url().'assets/js/demo/datatables-demo.js' ?>"></script>
  <script src="<?php echo base_url().'assets/js/select2.min.js' ?>"></script>
  <script type="text/javascript">

  var BASEPATH = '<?php echo base_url();?>';

  $("#advanced_user").select2( {
    
  placeholder: "Select Name",
  allowClear: true
  } );

  $("#userDropdownMonthlyReport").select2( {
    
  placeholder: "Select Name",
  allowClear: true
  } );

    function getAdmission_date(){
       var user_id = $('#userDropdownMonthlyReport option:selected').val();
       $.ajax({
          url:BASEPATH + 'C_adminHome/getAdvancedUserDetails/'+user_id, 
          type:"POST",
          success:function(resp){
            var data = jQuery.parseJSON(resp);
            for(var i=0;i<data.length;i++){
            document.getElementById('user_admision_date').value = data[i].admission_date;
            document.getElementById('user_id_hidden').value = data[i].user_id;
            if(data[i].morning_diet === null){
              $('#saveBtn').show();
              $('#updateBtn').hide();
            }else{
              $('#updateBtn').show();
              $('#saveBtn').hide();
            }
            document.getElementById('morning_diet').value = data[i].morning_diet ? data[i].morning_diet : '-';
            document.getElementById('afternoon_diet').value = (data[i].afternoon_diet) ? data[i].afternoon_diet : '-';
            document.getElementById('evening_diet').value = (data[i].evening_diet) ? data[i].evening_diet : '-';
            document.getElementById('night_diet').value = (data[i].night_diet) ? data[i].night_diet : '-';
            document.getElementById('post_workout_drink').value = (data[i].post_workout_drink) ? data[i].post_workout_drink : '-';
        }
          }
      });

    }

  function form_submit() {
    document.getElementById("diet_sheet_form").submit();
  }
  function update_diet_sheet() {
   var user_id = $('#user_id_hidden').val();
   var morning_diet = $('#morning_diet').val();
   var afternoon_diet = $('#afternoon_diet').val();
   var evening_diet = $('#evening_diet').val();
   var night_diet = $('#night_diet').val();
   var post_workout_drink = $('#post_workout_drink').val();
    $.ajax({
          url:BASEPATH + 'C_adminHome/update_diet_sheet/'+user_id, 
          type:"POST",
          data:{'morning_diet':morning_diet,'afternoon_diet':afternoon_diet,'evening_diet':evening_diet,'night_diet':night_diet,'post_workout_drink':post_workout_drink},
          success:function(resp){
            if(resp === '1'){
              alert('Diet Sheet Updated Successfully.');
               $( '#diet_sheet_form' ).each(function(){
                  this.reset();
              });
              $('#dietModal').modal('hide');
            }
          }
      });
  }

  function getReport(){
    var end_date = $('#end_date').val();
    var admission_date =$('#admission_date').val();
    var user_id = $('#user_id_for_report').val();

    if(end_date === ''){
      alert('Enter End Date for Report');
      return false;
    }
   var url = BASEPATH + 'C_adminHome/getReport/'+ user_id +'/' +end_date+'/'+admission_date;
   window.open(url, '_blank');
  }  

  function download_diet_sheet(){
    var user_id = $('#user_id_hidden').val();
    var url = BASEPATH + 'C_adminHome/download_diet_sheet/'+ user_id;
    $('#dietModal').modal('hide');
    $( '#diet_sheet_form' ).each(function(){
                  this.reset();
    });
    window.open(url, '_blank');
  }
      
  $('.datepicker').datepicker({
      format:'yyyy-mm-dd'
    });

    
    function getAdvancedUserDetails_forReport(){
       
       var user_id = $('#advanced_user').val();
       $.ajax({
       url:BASEPATH + 'C_adminHome/getAdvancedUserDetails/'+user_id, 
       type:"POST",
       success:function(resp){
        
        var data = jQuery.parseJSON(resp);
         for(var i=0;i<data.length;i++){
            document.getElementById('admission_date').value = data[i].admission_date;
            document.getElementById('user_name').value = data[i].name;
            document.getElementById('user_id_hidden_report').value = data[i].user_id;
            document.getElementById('user_id_for_report').value = data[i].user_id;
            document.getElementById('start_date').value = data[i].admission_date;
        }
      }
    });
    }    
      

    //}
  </script>
  </html>