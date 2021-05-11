  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class M_adminHome extends CI_Model {

    public function __construct() {
      parent::__construct();
    }

    function validate($username,$password){
    $this->db->where('role_username',$username);
    $this->db->where('role_password',$password);
    $result = $this->db->get('tab_role',1);
    return $result;

      }
    public function newUserRegistration($insert_user_array){
      
     $result=$this->db->insert('tab_user',$insert_user_array);
     return $result;
   }
   
   public function getRegularUserDetails(){
    $query = $this->db->query("select * from tab_user order by created_on desc");
    return $query->result();
  }

  function getFilteredDetails($enrollment_type){
    $query = $this->db->query("select * from tab_user where enrollment_type = '".$enrollment_type."' order by created_on desc");
    return $query->result();
  }
  public function getAdvancedUserDetails($user_id){
   $query = $this->db->query("select tab_user.* ,diet.morning_diet ,diet.afternoon_diet,diet.evening_diet,diet.night_diet,diet.post_workout_drink from tab_user LEFT JOIN tab_diet_details diet ON tab_user.user_id = diet.user_id where tab_user.user_id= $user_id");  
   return $query->result();
 }

 public function saveAdvancedUserData($insert_advanced_user_array){
  $result=$this->db->insert('tab_advanced_user_progress',$insert_advanced_user_array);
  if($result=='1'){
    $url=base_url().'C_adminHome/homePage/';
    echo'<h3>Registration is successfull..</h3>';
    echo'click on Back button to redirect to Home Page';
    echo'<a href="'.$url.'">Back</a>';
  }
}
public function create_diet_sheet($insert_diet_array){
  $result=$this->db->insert('tab_diet_details',$insert_diet_array);
  if($result=='1'){
    $url=base_url().'C_adminHome/advancedBatch/1';
    echo'<h3>Diet added successfully..</h3>';
    echo'click on Back button to redirect to Home Page';
    echo'<a href="'.$url.'">Back</a>';
  }
}
public function update_diet_sheet($update_diet_array,$user_id){
 $result = ($this->db->where('user_id', $user_id)->update('tab_diet_details', $update_diet_array));
 
 return $result;

 
}

public function getAdmission_date($user_id){
 $query = $this->db->query("select * from tab_user where user_id= $user_id");  
 return $query->result();
}

public function getReport($user_id,$end_date,$admission_date){

  $first_date = $admission_date.' 00:00:00';
  $second_date = $end_date.' 23:59:59';
  
  $query =$this->db->query("SELECT adv_user.*,tab_user.name,tab_user.fees_paid,
    tab_user.admission_date,tab_user.dob,adv_user.created_on as month_wise,adv_user.meter
    FROM 
    tab_advanced_user_progress adv_user
    LEFT JOIN
    tab_user 
    ON
    tab_user.user_id = adv_user.user_id
    WHERE 
    adv_user.user_id='".$user_id."' AND adv_user.created_on >= '".$first_date."' AND  adv_user.created_on <= '".$second_date."'"); 
  
  return $query->result_array();
}

public function get_diet_sheet($user_id){
  $query = $this->db->query("SELECT diet.*
    from 
    tab_diet_details diet
    where diet.user_id = '".$user_id."' ");
  return $query->result_array();
}

function edit_user($user_id){
  $query = $this->db->query("select * from tab_user where user_id ='".$user_id."'");  
  return $query->result();
}

function delete_user($user_id){
 $query = $this->db->query("DELETE from tab_user where user_id ='".$user_id."'");  
 return $query;
}

function update_user($update_array,$user_id){
  $result = ($this->db->where('user_id', $user_id)->update('tab_user', $update_array));
  return $result;
}

function saveRenewalUserDate($insert_renewal_user_array){
  
  $result=$this->db->insert('tab_user_renewal_details',$insert_renewal_user_array);
  return $result;
}

function getRenewalDetails($user_id){
  $query = $this->db->query(" SELECT 
                              user.name, user.admission_date, user.enrollment_duration as 
                              starting_duration, user.fees_paid as starting_fees_paid,
                              ren.renewal_count as renewal_count, ren.renewal_enrollment_duration,
                              ren.renewal_date ,ren.renewal_fees 
                              FROM 
                              tab_user_renewal_details ren
                              Left JOIN
                              tab_user user
                              ON
                              user.user_id = ren.user_id  
                              WHERE ren.user_id = '".$user_id."'
                              ORDER BY `user`.`admission_date`  DESC");
    return $query->result();
}

function getRenewalReport(){
  $query = $this->db->query(" SELECT 
                              user.academy_number as 'Academy_Registration_Number', user.name as 'Name', 
                              user.admission_date as 'Admission_Date', user.enrollment_duration as 
                              'Starting_Duration', user.fees_paid as 'Starting_Fees',
                              ren.renewal_count as 'Renewal_Count', ren.renewal_enrollment_duration as 'Renewal_Duration',
                              ren.renewal_date as 'Renewal_Date' ,ren.renewal_fees as 'Renewal_Fees' 
                              FROM 
                              tab_user_renewal_details ren
                              Left JOIN
                              tab_user user
                              ON
                              user.user_id = ren.user_id  
                              ORDER BY `user`.`admission_date`  DESC");
    return $query->result();
}

function getInfo(){
  $query = $this->db->query("select count(enrollment_type) as level, enrollment_type,gender, city.city_name
from tab_user 
LEFT JOIN
city
ON
city.city_id = tab_user.branch_id
GROUP BY city.city_name");
  return $query->result_array();
}
}
