<!DOCTYPE html>
<html>
<head>
  <title>Admin Home - Wadiya Park</title>

  <link href="<?php echo base_url().'assets/vendor/fontawesome-free/css/all.min.css' ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url().'assets/vendor/datatables/dataTables.bootstrap4.css' ?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/css/sb-admin.css' ?>" rel="stylesheet">

  <style type="text/css">
    #admin_image{width: 128px;height: 128px;border-radius: 100%;}
    .pro-img{margin-top: -80px;margin-bottom: 20px;}
    h3{color: #455a64;font-family: "poppins",sans-serif;font-weight: 400;}
    .carousel-header{text-align: center;color: #455a64;font-family: "poppins",sans-serif;font-weight: 400;}
  </style>
</head>
<body>
  

<body id="page-top" onload="getRegularUserDetails();">

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

  <?php  if($user_data['level'] == 1){ ?>
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
    <?php } else {?>
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
    <?php } ?>
    <div id="content-wrapper">
      <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="">Summary</a>
            </li>
            <li class="breadcrumb-item active">Regular Batch</li>
          </ol>


          <div class="container-fluid">
            <br>
            <div class="row">
              <div class="col-md-2">
                <button style="background-color: #969493;" id="filterBtn" type="button" class="btn btn-default btn-sm">
                    <i class="fa fa-filter" aria-hidden="true"></i>
                </button>
              </div>
              <div class="col-md-3 filterDiv" style="display: none;"><label>Please select any one option to get batch wise details.</label></div>
              <div class="col-md-3 filterDiv" style="display: none;">
                <select id="enrollment_type_filter" name="enrollment_type_filter" class="form-control form-control-line" onchange="getFilteredDetails();">
                        <option value="0">Select Level</option>
                        <option value="level1">Level 1</option>
                        <option value="level2">Level 2</option>
                        <option value="level3">Level 3</option>
                        <option value="level4">Level 4</option>
                        <option value="level5">Level 5</option>
                        <option value="general_member">General Member</option>
                      </select>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <table class="table table-striped" id="tab_regularUser">
                  <thead>
                    <tr>
                                <th>User Name</th>
                                <th>Contact Number</th>
                                <th>Enrollment Duration</th>
                                <th>Enrollment Type</th>
                                <th>Fees</th>
                                <th>Admission Date</th>
                                <!-- <th>Image</th> -->
                                <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="tab_regularUser_body"></tbody>
                </table>
              </div>
            </div><!-- row -->
          </div><!-- container fluid 2 -->
      </div><!-- container fluid 1 -->
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
  <!-- Edit User Modal -->
  <div class="modal fade" id="EditUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit User Information</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" name="edit_user_form"> 

            <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-3">
                      <input type="hidden" name="user_id_hidden" id="user_id_hidden">
                      <input type="text" name="edit_name" id="edit_name" class="form-control" placeholder="Name">
                    </div>
                    <div class="col-md-3">
                      <input type="text" name="edit_mobileno" placeholder="Mobile Number" id="edit_mobileno" class="form-control" maxlength="10">
                    </div>
                    <div class="col-md-3">
                      <input type="text" name="edit_whatsappno" placeholder="Whatsapp Number" id="edit_whatsappno" class="form-control" maxlength="10">
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control datepicker" name="edit_admission_date" id="edit_admission_date" disabled="disabled">
                    </div>
            </div>
          </div>

          <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-3">
                      <input type="text" name="edit_height" id="edit_height" class="form-control" placeholder="Height">
                    </div>
                    <div class="col-md-3">
                      <input type="text" name="edit_weight" placeholder="Weight" id="edit_weight" class="form-control">
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn" style="background-color: #D3D3D3" onclick="getBMI();">Calculate BMI    <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-md-4">
                      <input type="text" name="edit_bmi" placeholder="BMI" id="edit_bmi" class="form-control" value="">
                    </div>
            </div>
          </div>


            <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-3">
                      <input type="text" name="edit_fees_paid" class="form-control" placeholder="Fees Paid" id="edit_fees_paid">
                    </div>
                    <div class="col-md-3">
                      <input type="text" name="edit_batch_time" class="form-control" placeholder="Batch Timing" id="edit_batch_time" style="text-transform: uppercase;">
                    </div>
                    <div class="col-md-3">
                      <select id="edit_enrollment_type" name="edit_enrollment_type" class="form-control form-control-line">
                        <option value="level1">Level 1</option>
                        <option value="level2">Level 2</option>
                        <option value="level3">Level 3</option>
                        <option value="level4">Level 4</option>
                        <option value="level5">Level 5</option>
                        <option value="general_member">General Member</option>
                      </select>
                    </div>                    
                    <div class="col-md-3">
                      <select id="edit_enrollment_duration" name="edit_enrollment_duration" class="form-control form-control-line">
                        <option value="0">Enrollment Duration</option>
                        <option value="1">1 month</option>
                        <option value="3">3 month</option>
                        <option value="6">6 month</option>
                        <option value="12">1 Year</option>
                      </select>
                    </div>
                  </div>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" onclick="update_user();">Update</a>
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
    
     var BASEPATH = '<?php echo base_url();?>';

     $('#filterBtn').click(function(){
        $('.filterDiv').toggle();
     });

    function getFilteredDetails(){
      var enrollment_type = $('#enrollment_type_filter').val();
      $('#tab_regularUser').dataTable().fnDestroy();
      $('#tab_regularUser_body').empty();

       $.ajax({
         url:BASEPATH + 'C_adminHome/getFilteredDetails/'+enrollment_type, 
         type:'post',
         success:function(resp){
           var data = jQuery.parseJSON(resp);
           var str = " ";
           var path = BASEPATH + '/uploads';
           for(var i=0; i<data.length; i++){
               str += '<tr>'; 
               str += '<td>'+data[i].name+'</td>'; 
               str += '<td>'+data[i].mobile_number+'</td>'; 
               str += '<td>'+data[i].enrollment_duration+' Month'+'</td>'; 
               if(data[i].enrollment_type == 'level1'){
                str += '<td>Level 1</td>';  
               }else if(data[i].enrollment_type == 'level2'){
                str += '<td>Level 2</td>';  
               }else if(data[i].enrollment_type == 'level3'){
                str += '<td>Level 3</td>';  
               }else if(data[i].enrollment_type == 'level4'){
                str += '<td>Level 4</td>';  
               }else if(data[i].enrollment_type == 'level5'){
                str += '<td>Level 5</td>';  
               }else if(data[i].enrollment_type == 'level5'){
                str += '<td>General Member</td>';  
               }else{
                str += '<td>Other</td>';  
               }               
               str += '<td>'+data[i].fees_paid+'</td>'; 
               str += '<td>'+data[i].admission_date+'</td>'; 
               // str += '<td><img src="'+path+'/'+data[i].user_image+'" width=50% height=20%></td>'; 
               <?php if($user_data['level'] == 1){ ?>
                str += '<td><button class="btn btn-primary" data-toggle="modal" data-target="#EditUserModal" onclick="edit_user('+data[i].user_id+');">Edit</button>&nbsp;<button class="btn btn-primary" onclick="delete_user('+data[i].user_id+');">Delete</button></td> ';
              <?php }else{ ?>
                str += '<td><button class="btn btn-primary" data-toggle="modal" data-target="#EditUserModal" onclick="edit_user('+data[i].user_id+');">Edit</button></td>';
              <?php } ?>
               

               
               str += '</tr>'; 
            }
            
            $('#tab_regularUser_body').html(str);

            $("#tab_regularUser").DataTable({
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "order":[5,"desc"]
            });
       }
      });
    }

    

    function getRegularUserDetails(){

    var BASEPATH = '<?php echo base_url();?>';
    $('#tab_regularUser').dataTable().fnDestroy();
    $('#tab_regularUser_body').empty();

      $.ajax({
       url:BASEPATH + 'C_adminHome/getRegularUserDetails', 
       type:"POST",
       success:function(resp){
           var data = jQuery.parseJSON(resp);
           var str = " ";
           var path = BASEPATH + '/uploads';
           for(var i=0; i<data.length; i++){
               str += '<tr>'; 
               str += '<td>'+data[i].name+'</td>'; 
               str += '<td>'+data[i].mobile_number+'</td>'; 
               str += '<td>'+data[i].enrollment_duration+' Month'+'</td>'; 
               if(data[i].enrollment_type == 'level1'){
                str += '<td>Level 1</td>';  
               }else if(data[i].enrollment_type == 'level2'){
                str += '<td>Level 2</td>';  
               }else if(data[i].enrollment_type == 'level3'){
                str += '<td>Level 3</td>';  
               }else if(data[i].enrollment_type == 'level4'){
                str += '<td>Level 4</td>';  
               }else if(data[i].enrollment_type == 'level5'){
                str += '<td>Level 5</td>';  
               }else if(data[i].enrollment_type == 'level5'){
                str += '<td>General Member</td>';  
               }else{
                str += '<td>Other</td>';  
               }               
               str += '<td>'+data[i].fees_paid+'</td>'; 
               str += '<td>'+data[i].admission_date+'</td>'; 
               
               <?php if($user_data['level'] == 1){ ?>
                str += '<td><button class="btn btn-primary" data-toggle="modal" data-target="#EditUserModal" onclick="edit_user('+data[i].user_id+');">Edit</button>&nbsp;<button class="btn btn-primary" onclick="delete_user('+data[i].user_id+');">Delete</button></td> ';
              <?php }else{ ?>
                str += '<td><button class="btn btn-primary" data-toggle="modal" data-target="#EditUserModal" onclick="edit_user('+data[i].user_id+');">Edit</button></td>';
              <?php } ?>
               str += '</tr>'; 
            }
            
            $('#tab_regularUser_body').html(str);

            $("#tab_regularUser").DataTable({
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "order":[5,"desc"]
            });
       }
    });

    }

    function delete_user(user_id){
      var x = confirm('Delete this user ?');
      if(x === true){
        $.ajax({
         url:BASEPATH + 'C_adminHome/delete_user/'+user_id, 
         type:'post',
         success:function(msg){
          if(msg === '1'){
            alert('user Deleted Successfully');
            location.reload();
          }
         }
      });
    }
  }
    function edit_user(user_id){
       var BASEPATH = '<?php echo base_url();?>';
       $.ajax({
       url:BASEPATH + 'C_adminHome/edit_user/'+user_id, 
       type:"POST",
       success:function(resp){
           var data = jQuery.parseJSON(resp);
           var path = BASEPATH + '/uploads';
           for(var i=0; i<data.length; i++){
             document.getElementById('edit_name').value = data[i].name;
             document.getElementById('edit_mobileno').value = data[i].mobile_number;
             document.getElementById('edit_fees_paid').value = data[i].fees_paid;
             document.getElementById('edit_enrollment_type').value = data[i].enrollment_type;
            document.getElementById('edit_enrollment_duration').value = data[i].enrollment_duration;
            document.getElementById('edit_whatsappno').value = data[i].whatsapp_number;
             document.getElementById('edit_admission_date').value = data[i].admission_date;
             document.getElementById('edit_height').value = data[i].height;
             document.getElementById('edit_weight').value = data[i].weight;
             document.getElementById('edit_bmi').value = data[i].bmi;
             document.getElementById('edit_batch_time').value = data[i].batch_timing;
             document.getElementById('user_id_hidden').value = data[i].user_id;
           }
       }
     });
    }

    function getBMI(){
      var weight = $('#edit_weight').val();
      var height = $('#edit_height').val();
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

      document.getElementById('edit_bmi').value = (bmi+' ('+bmi_msg+')');

      
    }
    function update_user(){
      var edit_bmi = $('#edit_bmi').val();
      var user_id = $('#user_id_hidden').val();
      var edit_name = $('#edit_name').val();
      var edit_phone_no = $('#edit_mobileno').val();
      var edit_fees_paid = $('#edit_fees_paid').val();
      var edit_enrollment_duration = $('#edit_enrollment_duration').val();
      var edit_enrollment_type = $('#edit_enrollment_type').val();
      var edit_height = $('#edit_height').val();
      var edit_weight = $('#edit_weight').val();
      
      var edit_whatsappno = $('#edit_whatsappno').val();
      var edit_batch_timing = $('#edit_batch_time').val();

      $.ajax({
       url:BASEPATH + 'C_adminHome/update_user/'+ user_id, 
       type:'post',
       data:{'edit_name':edit_name,'edit_phone_no':edit_phone_no,'edit_enrollment_type':edit_enrollment_type,
              'edit_fees_paid':edit_fees_paid,'edit_enrollment_duration':edit_enrollment_duration,
              'edit_height':edit_height,'edit_weight':edit_weight,'edit_bmi':edit_bmi,
              'edit_whatsappno':edit_whatsappno,'edit_batch_timing':edit_batch_timing},
       success:function(msg){
         $.trim(msg);
          if(msg==1){
            alert('Updated Successfully');
            $('#EditUserModal').modal('hide');
            location.reload();
          }
       }
      });
    }
  </script>
  </html>