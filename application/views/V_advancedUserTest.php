<!DOCTYPE html>
<html>
<head>
  <title>Advanced User Audit Sheet - Wadiya Park</title>

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


       <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()."C_adminHome/regularBatchSummary"?>">
          <i class="fa fa-swimmer"></i>
          <span>Summary</span></a>
      </li>
    </ul>
    
    <!-- query to get advanced user list-->
    <?php 
      $query = $this->db->query("select user_id,name from tab_user where  enrollment_type IN ('level4' ,'level5')");
      $result = $query->result_array();
    ?>
    <!-- end of query-->

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Level 4 & 5 Batch</li>
          <li class="breadcrumb-item active">Time Calculation</li>
        </ol>

      </div>
      <!-- /.container-fluid1 -->

      <div class="container-fluid">

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
              <button type="submit" class="btn btn-primary" onclick="getAdvancedUserDetails();">Go</button>
            </div>
            <div class="col-md-3"></div>
        </div><!--row-->

      <div class="card card-register mx-auto mt-5" id="advanced_user_card_div" style="display: none;">
          <div class="card-header">Advanced User Audit Sheet</div>
          <div class="card-body">
              <form id="advanced_user_progress_form" name="advanced_user_progress_form" method="post" action="<?php echo base_url().'C_adminHome/saveAdvancedUserData'?>" >
                
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="hidden" name="advanced_user_id" id="advanced_user_id">
                    <input type="text" name="get_admsn_date" id="get_admsn_date" class="form-control" placeholder="Admission Date" disabled="disabled">
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="user_height" id="user_height" class="form-control" placeholder="Height">
                  </div>
                </div>
              </div>
            
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="text" name="user_dob" id="user_dob" class="form-control datepicker" placeholder="Date Of Birth">
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="user_bmi" id="user_bmi" class="form-control" placeholder="BMI">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6">
                  <select class="form-control" name="inp_meter" id="inp_meter">
                      <option value="0">Select Meter you want to take</option>
                      <option value="50">50 Meter</option>
                      <option value="100">100 Meter</option>
                      <option value="200">200 Meter</option>
                      <option value="400">400 Meter</option>
                      <option value="800">800 Meter</option>
                      <option value="1500">1500 Meter</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="user_weight" id="user_weight" class="form-control" placeholder="Weight">
                  </div>
                </div>
              </div>


              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-4">
                    <input type="text" name="freestyle" id="freestyle" value="Free Style" class="form-control" disabled="disabled">
                  </div>
                  <div class="col-md-4">
                    <input type="text" name="inp_freestyle" id="inp_freestyle" class="form-control" placeholder="Enter Value">
                  </div>
                  <!-- <div class="col-md-3">
                    <select class="form-control">
                      <option value="50m">50 Meter</option>
                      <option value=100m>100 Meter</option>
                    </select>
                  </div> -->
                  <div class="col-md-4">
                    <input type="text" value="seconds" class="form-control" disabled="disabled">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-4">
                    <input type="text" name="BreastStroke" id="BreastStroke" value="BreastStroke" class="form-control" disabled="disabled">
                  </div>
                  <div class="col-md-4">
                    <input type="text" name="inp_beast_stroke" id="inp_beast_stroke" class="form-control" placeholder="Enter Value">
                  </div>
                  <!-- <div class="col-md-3">
                    <select class="form-control">
                      <option value="50m">50 Meter</option>
                      <option value=100m>100 Meter</option>
                    </select>
                  </div> -->
                  <div class="col-md-4">
                    <input type="text" value="seconds" class="form-control" disabled="disabled">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-4">
                    <input type="text" name="butterFly_stroke" id="butterFly_stroke" value="ButterFly Stroke" class="form-control" disabled="disabled">
                  </div>
                  <div class="col-md-4">
                    <input type="text" name="inp_butterfly" id="inp_butterfly" class="form-control" placeholder="Enter Value">
                  </div>
                  <!-- <div class="col-md-3">
                    <select class="form-control">
                      <option value="50m">50 Meter</option>
                      <option value=100m>100 Meter</option>
                    </select>
                  </div> -->
                  <div class="col-md-4">
                    <input type="text" value="seconds" class="form-control" disabled="disabled">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-4">
                    <input type="text" name="backstroke" id="backstroke" value="Back Stroke" class="form-control" disabled="disabled">
                  </div>
                  <div class="col-md-4">
                    <input type="text" name="inp_backstroke" id="inp_backstroke" class="form-control" placeholder="Enter Value">
                  </div>
                  <!-- <div class="col-md-3">
                    <select class="form-control">
                      <option value="50m">50 Meter</option>
                      <option value=100m>100 Meter</option>
                    </select>
                  </div> -->
                  <div class="col-md-4">
                    <input type="text" value="seconds" class="form-control" disabled="disabled">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-3">
                    <input type="text" name="individual_midlay" id="individual_midlay" value="Individual midley" class="form-control" disabled="disabled">
                  </div>
                  <div class="col-md-3">
                    <input type="text" name="inp_individual_midley" id="name="inp_individual_midley class="form-control" placeholder="Enter value">
                  </div>
                  <div class="col-md-3">
                    <input type="text" value="200 Meter" name="meter" class="form-control" disabled="disabled">
                    <!-- <select class="form-control">
                      <option>200 Meter</option>
                    </select> -->
                  </div>
                  <div class="col-md-3">
                    <input type="text" value="seconds" class="form-control" disabled="disabled">
                  </div>
                </div>
              </div>              

              <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>          
            </form>
          </div><!--card body-->
        </div><!--card-->
            
          



      </div><!--container-fluid2-->

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

    $('.datepicker').datepicker({
      dateFormat:'yyyy-mm-dd'
    });

      $("#advanced_user").select2( {
    
        placeholder: "Select Name",
        allowClear: true
        } );

    
    var BASEPATH = '<?php echo base_url();?>';
    function getAdvancedUserDetails(){
       
       var user_id = $('#advanced_user').val();

       $.ajax({
       url:BASEPATH + 'C_adminHome/getAdvancedUserDetails/'+user_id, 
       type:"POST",
       success:function(resp){
        
        var data = jQuery.parseJSON(resp);
         for(var i=0;i<data.length;i++){
            document.getElementById('get_admsn_date').value = data[i].admission_date;
            document.getElementById('advanced_user_id').value = data[i].user_id;
            document.getElementById('user_height').value = data[i].height;
            document.getElementById('user_dob').value = data[i].dob;
            document.getElementById('user_weight').value = data[i].weight;
            document.getElementById('user_bmi').value = data[i].bmi;

            $('#advanced_user_card_div').show();
        }
      }
    });
    }

    var myForm = document.forms["advanced_user_progress_form"];
    myForm.onsubmit = function() { 

    
      //var form = document.getElementById('advanced_user_progress_form');
      //var formdata = new FormData(form);

       var user_id = $('#advanced_user_id').val();
       
       var user_height = $('#user_height').val();
       var user_dob = $('#user_dob').val();
       var user_bmi = $('#user_bmi').val();
       var inp_freestyle = $('#inp_freestyle').val();
       var inp_beast_stroke = $('#inp_beast_stroke').val();
       var inp_butterfly =$('#inp_butterfly').val();
       var inp_backstroke=$('#inp_backstroke').val();
       var inp_individual_midley = $('#inp_individual_midley').val();
       var inp_meter = $('#inp_meter option:selected').val();

       // formdata.append(user_id,user_id);
       // formdata.append(user_height,user_height);
       // formdata.append(user_dob,user_dob);
       // formdata.append(user_bmi,user_bmi);
       // formdata.append(inp_freestyle,inp_freestyle);
       // formdata.append(inp_beast_stroke,inp_beast_stroke);
       // formdata.append(inp_butterfly,inp_butterfly);
       // formdata.append(inp_backstroke,inp_backstroke);
       // formdata.append(inp_individual_midley,inp_individual_midley);
       // formdata.append(inp_meter,inp_meter);

       //console.log(formdata);

        //Validation starts
        if(document.getElementById("inp_meter").value == "0"){
          alert('Select Meter');
          return false;
        }

        if(user_height===''){
          alert('Enter User Height');
          return false;
        }

        if(user_dob===''){
          alert('Enter User Date of birth');
          return false;
        }

        if(user_bmi===''){
          alert('Enter User BMI');
          return false;
        }

        if(inp_freestyle===''){
          alert('Enter User Freestyle speed');
          return false;
        }
        if(inp_beast_stroke===''){
          alert('Enter User Breast Stroke speed');
          return false;
        }
        if(inp_butterfly===''){
          alert('Enter User Butterfly Stroke speed');
          return false;
        }
        if(inp_backstroke===''){
          alert('Enter User Backstroke speed');
          return false;
        }
        if(inp_individual_midley===''){
          alert('Enter User Individual midley speed');
          return false;
        }
        //validation ends

    //   $.ajax({
    //    url:BASEPATH + 'C_adminHome/test/', 
    //    type:"POST",
    //    data:{'user_id':user_id,'user_height':user_height,'user_bmi':user_bmi,'user_dob':user_dob,
    //         'inp_freestyle':inp_freestyle,'inp_backstroke':inp_backstroke,'inp_butterfly':inp_butterfly,
    //         'inp_meter':inp_meter,'inp_individual_midley':inp_individual_midley,'inp_beast_stroke':inp_beast_stroke},
    //    processData: true,
    //    contentType: false,
    //    success:function(resp){
    //       alert('hi----'+resp);
    //     }
      
    // });

    }
  </script>
  </html>