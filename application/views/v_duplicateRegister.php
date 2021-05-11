<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>New User Registration - Wadiya Park</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url().'assets/vendor/fontawesome-free/css/all.min.css'?>" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url().'assets/vendor/datatables/dataTables.bootstrap4.css'?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/vendor/bootstrap/css/bootstrap-datepicker3.css'?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url().'assets/css/sb-admin.css'?>" rel="stylesheet">

</head>

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
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
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

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="new_registration">Registration</a>
          </li>
          <li class="breadcrumb-item active">New User Registration</li>
        </ol>

      </div>
      <!-- /.container-fluid 1-->

      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
            <div class="card card-register mx-auto mt-5" style="max-width: 60rem;">
              <div class="card-header">New User Registration Form</div>
              <div class="card-body">
                <form id="registerForm" name="registerForm" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-3">
                      <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="col-md-3">
                      <select class="form-control" name="user_gender" id="user_gender">
                        <option value="0">Gender</option>
                        <option value="Male">Male</option>
                        <option value="female">Female</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <select class="form-control" id="user_branch" name="user_branch">
                          <option value="0">Branch</option>
                          <option value="020">Pune</option>
                          <option value="0241">Ahemadnagar</option>
                          <option value="5">Daund</option>
                          <option value="2133">Manchar</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <input type="email" name="email_id" id="email_id" class="form-control" placeholder="Email_id">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-3">
                      <input type="text" name="address" placeholder="Residential Address" id="address" id="address" class="form-control" >
                    </div>                    
                    <div class="col-md-3">
                      <input type="text" name="mobileno" placeholder="Mobile Number" id="mobileno" class="form-control" maxlength="10">
                    </div>
                    <div class="col-md-3">
                      <input type="text" name="whatsapp_no" placeholder="Whatsapp Number" id="whatsapp_no" class="form-control" maxlength="10">
                    </div>
                    <div class="col-md-3">
                      <input type="text" name="ac_reg_no" class="form-control" placeholder="Academy Registration Number" id="ac_reg_no">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-3">
                      <select id="enrollment_type" name="enrollment_type" class="form-control form-control-line">
                        <option value="0">Enrollment Type</option>
                        <option value="level1">Level 1</option>
                        <option value="level2">Level 2</option>
                        <option value="level3">Level 3</option>
                        <option value="level4">Level 4</option>
                        <option value="level5">Level 5</option>
                        <option value="general_member">General Member</option>
                        <option value="school_level">School</option>
                      </select>
                    </div>                    
                    <div class="col-md-3">
                      <select id="enrollment_duration" name="enrollment_duration" class="form-control form-control-line">
                        <option value="0">Enrollment Duration</option>
                        <option value="1">1 month</option>
                        <option value="3">3 month</option>
                        <option value="6">6 month</option>
                        <option value="12">1 Year</option>
                        <option value="custom">Custom</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <input type="text" name="place_name" class="form-control" placeholder="School/Comapny Name" id="place_name">
                    </div>
                    <div class="col-md-3">
                      <input type="text" name="ref_name" class="form-control" placeholder="PT sir / HR Name" id="ref_name">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-3">
                      <input type="text" name="ref_location" class="form-control" placeholder="School / Comapany Location" id="ref_location">
                    </div>
                    <div class="col-md-3">
                      <input type="text" name="fees_paid" class="form-control" placeholder="Fees Paid" id="fees_paid">
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control datepicker" name="admission_date" id="admission_date" placeholder="Admission Date">
                    </div>
                    <div class="col-md-3">
                      <input type="text" name="fees_receipt_number" class="form-control" placeholder="Fees Receipt Number" id="fees_receipt_number">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-3">
                      <input type="text" name="dob" class="form-control datepicker" placeholder="Date of Birth" id="dob">
                    </div>
                    <div class="col-md-3">
                      <input type="text" name="batch_timing" class="form-control" placeholder="Batch Timing" id="batch_timing" style="text-transform: uppercase;">
                    </div>
                    <div class="col-md-3">
                      <input type="text" name="aadhar_number" class="form-control" placeholder="Aadhar Card Number" id="aadhar_number" maxlength="16">
                    </div>
                     <div class="col-md-3">
                      <input type="text" name="blood_group" id="blood_group" class="form-control" placeholder="Blood Group">
                    </div>
                    
                  </div>
              </div>

                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-3">
                      <input type="text" name="height" id="height" class="form-control" placeholder="Height in cms">
                    </div>
                    <div class="col-md-3">
                      <input type="text" name="weight" id="weight" placeholder="Weight" class="form-control">
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn" style="background-color: #D3D3D3" onclick="getBMI();">Calculate BMI    <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                    </div>
                    
                    <div class="col-md-4">
                      <input type="text" name="user_bmi" id="user_bmi" placeholder="BMI" class="form-control" value="">
                    </div>
                  </div>
              </div>
              
              <!-- <div class="form-group">
                <input type="file" name="user_image" id="user_image" class="form-control" title="Image">
              </div> -->
              

                <button id="editBtn" type="button" type="submit" id="btn_save" class="btn btn-primary" onclick="getRegister_user();">Save</button>
                
                </form>
              </div>
            </div>
          
        </div>
      </div><!-- /.container-fluid 2-->

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
<script src="<?php echo base_url().'assets/vendor/jquery/jquery.min.js'?>"></script>
<script src="<?php echo base_url().'assets/vendor/bootstrap/js/bootstrap-datepicker.min.js'?>"></script>

  <script src="<?php echo base_url().'assets/vendor/bootstrap/js/bootstrap.bundle.min.js'?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url().'assets/vendor/jquery-easing/jquery.easing.min.js'?>"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url().'assets/vendor/datatables/jquery.dataTables.js'?>"></script>
  <script src="<?php echo base_url().'assets/vendor/datatables/dataTables.bootstrap4.js'?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url().'assets/js/sb-admin.min.js' ?>"></script>
  <script src="<?php echo base_url().'assets/js/wadiya_park.js' ?>"></script>

  <!-- Demo scripts for this page-->
  
  <script src="<?php echo base_url().'assets/js/demo/datatables-demo.js' ?>"></script>

<script type="text/javascript">

    $('.datepicker').datepicker({
      dateFormat:'yyyy-mm-dd'
    });

    function getBMI(){
      var weight = $('#weight').val();
      var height = $('#height').val();
      if(weight ===''){
        alert('Enter weight');
        return false;
      }
      if(height === ''){
        alert('Enter Height');
        return false; 
      }
      var height1 = height/100;
      
      var bmi_msg = '';
      var bmi = (weight / (height1*height1)).toFixed(2);
      if(bmi < 18.5){
        bmi_msg = 'Underweight';
      }else if(bmi >= 18.5 && bmi <= 24.9){
        bmi_msg = 'Normal';
      }else if(bmi > 24.9 && bmi <= 29.9){
        bmi_msg = 'Overweight';
      }else{
        bmi_msg = 'Obese';
      }

      document.getElementById('user_bmi').value = (bmi+' ('+bmi_msg+')');

      
    }
    function getRegister_user(){
    
    var form = document.getElementById('registerForm');
    var formdata = new FormData(form);

    // *****************   Validation starts ************************* //
  var user_bmi = getBMI();

      var name = $('#name').val();
    if(name===''){
      alert('Enter Name');
      return false;
    }

var gender = $('#user_gender option:selected').val();

    if(document.getElementById("user_gender").value == "0"){
      alert('Select Gender');
      return false;
    }

var branch = $('#user_branch option:selected').val();
     if(document.getElementById("user_branch").value == "0"){
      alert('Select Branch');
      return false;
    }

var email_id = $('#email_id').val();
    // if(email_id===''){
    //  alert('Enter Email Id');
    //   return false; 
    // }

var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(email_id){
    if (!filter.test(email_id)) {
      alert('Email Id Invalid');
      return false;
    }}

var address = $('#address').val();
    if(address===''){
      alert('Enter Address');
      return false;
    }

var mobileno = $('#mobileno').val();
    if(mobileno===''){
      alert('Enter Phone Number');
      return false;
    }

var whatsapp_no = $('#whatsapp_no').val();

var academy_number = $('#ac_reg_no').val();
    if(academy_number===''){
      alert('Enter Academy Registration Number');
      return false;
    }

var enrollment_duration = $('#enrollment_duration option:selected').val();
    if(document.getElementById("enrollment_duration").value == "0"){
      alert('Select Enrollment Duration');
      return false;
    }

var enrollment_type = $('#enrollment_type option:selected').val();
    if(document.getElementById("enrollment_type").value == "0"){
      alert('Select Enrollment Type');
      return false;
    }   

var place_name = $('#place_name').val();
    if(place_name===''){
      alert('Enter Comapny/School Name');
      return false;
    }

var ref_name = $('#ref_name').val();
    if(ref_name===''){
      alert('Enter HR / PT Sir Name');
      return false;
    }

var ref_location = $('#ref_location').val();
    if(ref_location===''){
      alert('Enter Comapny/School Location');
      return false;
    }

var fees_paid = $('#fees_paid').val();
    if(fees_paid===''){
      alert('Enter Fees');
      return false;
    }        

var admission_date = $('#admission_date').val();
    if(admission_date===''){
      alert('Enter Admission Date');
      return false;
    }

var fees_receipt_number = $('#fees_receipt_number').val();
    if(fees_receipt_number===''){
      alert('Enter Fees Receipt Number');
      return false;
    }

var height = $('#height').val();
    if(height===''){
      alert('Enter Height');
      return false;
    }

var weight = $('#weight').val();
    if(weight===''){
      alert('Enter Weight');
      return false;
    }  


    

var blood_group = $('#blood_group').val();
    if(blood_group===''){
      alert('Enter Blood Group');
      return false;
    }

var dob=$('#dob').val();
    if(dob===''){
      alert('Enter Date of Birth');
      return false;
    }   

var batch_timing=$('#batch_timing').val();
    if(batch_timing===''){
      alert('Enter Batch Timing');
      return false;
    }   

var aadhar_number = $('#aadhar_number').val();
    // if(aadhar_number===''){
    //   alert('Enter Aadhar Number');
    //   return false;
    // }

   
    // *****************   validation end  *************************** //
     

    formdata.append(name,name);
    formdata.append(email_id,email_id);
    formdata.append(address,address);
    formdata.append(mobileno,mobileno);
    formdata.append(enrollment_duration,enrollment_duration);
    formdata.append(enrollment_type,enrollment_type);
    formdata.append(fees_paid,fees_paid);
    formdata.append(admission_date,admission_date);
    formdata.append(aadhar_number,aadhar_number);
    formdata.append(dob,dob);
    formdata.append(blood_group,blood_group);
    formdata.append(height,height);
    formdata.append(weight,weight);
    formdata.append(user_bmi,user_bmi);
    
    formdata.append(gender,gender);
    formdata.append(branch,branch);
    formdata.append(whatsapp_no,whatsapp_no);
    formdata.append(academy_number,academy_number);
    formdata.append(place_name,place_name);
    formdata.append(ref_name,ref_name);
    formdata.append(ref_location,ref_location);
    formdata.append(fees_receipt_number,fees_receipt_number);
    formdata.append(batch_timing,batch_timing);



     var BASEPATH = '<?php echo base_url();?>';

     $.ajax({
       url:BASEPATH + 'C_adminHome/newUserRegistration/',
       type:"POST",
       data:formdata,
       processData: false,
       contentType: false,
       success:function(resp){
        $.trim(resp);
        if(resp==1){
          alert('Registration is Successful');
          $( '#registerForm' ).each(function(){
            this.reset();
          });
          window.location = BASEPATH + "<?php  echo ('C_adminHome/regularBatchSummary'); ?>";
        }else{
          alert('Error Occured');
        }
        }
      
    });
  
    }
    
   
   
 </script>
</html>
