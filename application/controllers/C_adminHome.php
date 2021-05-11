    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class C_adminHome extends CI_Controller {


        public function __construct() {
            parent::__construct();
            if($this->session->userdata('logged_in') !== TRUE){
            redirect('C_login');
    }
        //$this->load->model('M_adminHome');
        }

        public function index() {

            if($this->session->userdata('level')==='2'){
                $this->load->view('V_adminHome');
            }else{
                echo "Access Denied";
            }
        }

        public function homePage(){
           $this->load->view('V_adminHome');  
       }


       public function feesInfo(){
            $this->load->view('V_feesInfo');  
       }

       public function renewalinfo(){
            $this->load->view('V_renewalInfo');  
       }
       public function displayUserInfoAdmin(){
            $this->load->model('M_adminHome');
            $data['info'] = $this->M_adminHome->getInfo();
            $this->load->view('V_displayUserInfoAdmin',$data);
       }

       
       public function admin(){
            
            if($this->session->userdata('level')==='1'){
                    $this->load->view('V_admin_view');
            }else{
                    echo "Access Denied";
            }
       }
    /**
    * this function creates diet plan for student and save it in db.
    **/
    public function create_diet_sheet(){
        $morning_diet = $afternoon_diet = $evening_diet = $night_diet = $post_workout_drink = $user_id ='';
        date_default_timezone_set('Asia/Kolkata');
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST){
        $morning_diet = $_POST['morning_diet'];
        $afternoon_diet = $_POST['afternoon_diet'];
        $evening_diet = $_POST['evening_diet'];
        $night_diet = $_POST['night_diet'];
        $post_workout_drink =$_POST['post_workout_drink'];
        $user_id = $_POST['user_id_hidden'];
    }
}
        $insert_diet_array = array(
            'morning_diet'=>$morning_diet,
            'afternoon_diet'=>$afternoon_diet,
            'evening_diet'=>$evening_diet,
            'night_diet'=>$night_diet,
            'post_workout_drink'=>$post_workout_drink,
            'user_id'=>$user_id,
            'created_on'=>date("Y-m-d h:i")
        );
        $this->load->model('M_adminHome');
        $ans = $this->M_adminHome->create_diet_sheet($insert_diet_array);
        echo $ans;
        
    }

    public function update_diet_sheet($user_id){
        date_default_timezone_set('Asia/Kolkata');
    $morning_diet = $afternoon_diet = $evening_diet = $night_diet = $post_workout_drink = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST){
        $morning_diet = $_POST['morning_diet'];
        $afternoon_diet = $_POST['afternoon_diet'];
        $evening_diet = $_POST['evening_diet'];
        $night_diet = $_POST['night_diet'];
        $post_workout_drink =$_POST['post_workout_drink'];
    }
}
        $update_diet_array = array(
            'morning_diet'=>$morning_diet,
            'afternoon_diet'=>$afternoon_diet,
            'evening_diet'=>$evening_diet,
            'night_diet'=>$night_diet,
            'post_workout_drink'=>$post_workout_drink,
            'user_id'=>$user_id,
            'created_on'=>date("Y-m-d h:i")
        );
        $this->load->model('M_adminHome');
        $ans = $this->M_adminHome->update_diet_sheet($update_diet_array,$user_id);
        echo $ans;
    }
    public function registerPage(){
         //$this->load->view('V_userRegistration');  
     $this->load->view('V_duplicateRegister');  
 }
 public function regularBatchSummary(){
     $data['user_data'] = $this->session->userdata;
    $this->load->view('V_regularBatchSummary',$data);
}

public function advancedBatch($flag1){
   if($flag1 == 0){
    $this->load->view('V_advancedUserTest');
}else{
   $this->load->view('V_advancedUserReport');

}
}

public function process(){  
    $user = $this->input->post('admin_username');  
    $pass = $this->input->post('admin_password');  
    if ($user=='admin' && $pass=='admin')   
    {  
            //declaring session  
        $this->session->set_userdata(array('admin_username'=>$user));  
        $this->load->view('V_adminHome');  
    }  
    else{  
        $data['error'] = 'Your Account is Invalid';  
        $this->load->view('V_adminLogin', $data);  
    }  
}  
public function logout()  
{  
        //removing session  
    $this->session->unset_userdata('user');  
    redirect("C_login");  
}  

public function newUserRegistration(){
    
    $name = $email_id = $address = $mobileno = $enrollment_type = $enrollment_duration = $fees = $admission_date = '';
    $aadhar_number = $dob = $blood_group = $weight = $height = $bmi = '';
    date_default_timezone_set('Asia/Kolkata');
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST){
                $name = $this->input->post('name');
                $email_id = $this->input->post('email_id');
                $address = $this->input->post('address');
                $mobileno = $this->input->post('mobileno');
                $enrollment_type=$this->input->post('enrollment_type');
                $enrollment_duration = $this->input->post('enrollment_duration');
                $fees = $this->input->post('fees_paid');
                $admission_date = date('Y-m-d',strtotime($this->input->post('admission_date')));
                $aadhar_number = $this->input->post('aadhar_number');
                $dob = date('Y-m-d',strtotime($this->input->post('dob')));
                $blood_group = $this->input->post('blood_group');
                $weight = $this->input->post('weight');
                $height = $this->input->post('height');
                $bmi = $this->input->post('user_bmi');

                $gender = $this->input->post('user_gender');
                $branch_id = $this->input->post('user_branch');
                $whatsapp_number = $this->input->post('whatsapp_no');
                $academy_number = $this->input->post('ac_reg_no');
                $school_company_name = $this->input->post('place_name');
                $ref_name = $this->input->post('ref_name');
                $school_company_location = $this->input->post('ref_location');
                $fees_receipt_number = $this->input->post('fees_receipt_number');
                $batch_timing = $this->input->post('batch_timing');
        }
    }
        // $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/wadiya_park/uploads/';

        // $uploadfile = $uploaddir . basename($_FILES['user_image']['name']);
        // $filename = basename($_FILES['user_image']['name']);


        // if (move_uploaded_file($_FILES['user_image']['tmp_name'], $uploadfile)) {
        //     // echo "File is valid, and was successfully uploaded.\n";
        // } else {
        //     //echo "Upload failed";
        // }


    $insert_user_array = array(
        'name' => $name,
        'email_id'=>$email_id,
        'address'=>$address,
        'mobile_number'=>$mobileno,
        'fees_paid'=>$fees,
        'admission_date'=>$admission_date,
        'aadhar_number'=>$aadhar_number,
        'dob'=>$dob,
        'enrollment_type'=>$enrollment_type,
        'enrollment_duration'=>$enrollment_duration,
        //'user_image'=>$filename,
        'created_on'=>date("Y-m-d h:i"),
        'blood_group'=>$blood_group,
        'weight'=>$weight,
        'height'=>$height,
        'bmi'=>$bmi,
        'gender'=>$gender,
        'branch_id'=>$branch_id,
        'whatsapp_number'=>$whatsapp_number,
        'academy_number'=>$academy_number,
        'school_company_name'=>$school_company_name,
        'ref_name'=>$ref_name,
        'school_company_location'=>$school_company_location,
        'fees_receipt_number'=>$fees_receipt_number,
        'batch_timing'=>$batch_timing

    );

    $this->load->model('M_adminHome');
    $ans = $this->M_adminHome->newUserRegistration($insert_user_array);
    echo $ans;


}

public function getRegularUserDetails(){
    $this->load->model('M_adminHome');
    $data = $this->M_adminHome->getRegularUserDetails();
    echo json_encode($data);
}
public function getFilteredDetails($enrollment_type){
    $this->load->model('M_adminHome');
    $data = $this->M_adminHome->getFilteredDetails($enrollment_type);
    echo json_encode($data);   
}
public function getAdvancedUserDetails($user_id){
    $this->load->model('M_adminHome');
    $data = $this->M_adminHome->getAdvancedUserDetails($user_id);
    echo json_encode($data);
}

public function saveAdvancedUserData(){

    $freestyle = $breast_stroke = $butterfly_stroke = $backstroke = $individual_midlay = $meter = $user_id = '';
    date_default_timezone_set('Asia/Kolkata');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST){
            $freestyle = $this->input->post('inp_freestyle');
            $breast_stroke=$this->input->post('inp_beast_stroke');
            $butterfly_stroke = $this->input->post('inp_butterfly');
            $backstroke = $this->input->post('inp_backstroke');
            $individual_midlay = $this->input->post('inp_individual_midley');
            $meter = $this->input->post('inp_meter');
            $user_id = $this->input->post('advanced_user_id');
        }
    }
    $insert_advanced_user_array=array(
        'freestyle'=>$freestyle,
        'butterfly_stroke'=>$butterfly_stroke,
        'backstroke'=>$backstroke,
        'breast_stroke'=>$breast_stroke,
        'individual_midlay'=>$individual_midlay,
        'meter'=>$meter,
        'user_id'=>$user_id,
        'created_on'=>date("Y-m-d h:i")
    );

    $this->load->model('M_adminHome');
    $ans = $this->M_adminHome->saveAdvancedUserData($insert_advanced_user_array);

}

function getReport($user_id,$end_date,$admission_date){

    include(APPPATH.'third_party\mpdf\mpdf.php');
    $this->load->model('M_adminHome');
    $data['report_data'] = $this->M_adminHome->getReport($user_id,$end_date,$admission_date);
    $data['user_data'] = $this->M_adminHome->getAdvancedUserDetails($user_id,$end_date,$admission_date);
    $name= $data['user_data'][0]->name;
    $mpdf=new mPDF();
    $mpdf->debug = true;
    $mpdf->simpleTables = true;
    $mpdf->SetTitle('Individual Timing Report');
    $html = $this->load->view('V_userRegistration', $data, true);
    $mpdf->WriteHTML("Hallo World".$html);
    $mpdf->Output($name.'_monthly_report.pdf',true);
    exit;
}

public function download_diet_sheet($user_id){
    include(APPPATH.'third_party\mpdf\mpdf.php');
    $this->load->model('M_adminHome');
    $data['user_data'] = $this->M_adminHome->getAdvancedUserDetails($user_id,$end_date,$admission_date);
    $data['diet'] = $this->M_adminHome->get_diet_sheet($user_id);
    $name= $data['user_data'][0]->name;
    $mpdf=new mPDF();
    $mpdf->debug = true;
    $mpdf->simpleTables = true;
    $mpdf->SetTitle('Individual Diet Sheet');
    $html = $this->load->view('V_diet_sheet', $data, true);
    $mpdf->WriteHTML($html);
    $mpdf->Output($name.'_diet_sheet_plan.pdf',true);
    exit;
}
function edit_user($user_id){
    $this->load->model('M_adminHome');
    $data = $this->M_adminHome->edit_user($user_id);
    echo json_encode($data);
}
function delete_user($user_id){
    $this->load->model('M_adminHome');
    $data = $this->M_adminHome->delete_user($user_id);
    echo $data;   
}

function update_user($user_id){
    $update_array = array(
        'name' => $this->input->post('edit_name'),
        'mobile_number' => $this->input->post('edit_phone_no'),
        'fees_paid' =>$this->input->post('edit_fees_paid'),
        'enrollment_duration' => $this->input->post('edit_enrollment_duration'),
        'enrollment_type' => $this->input->post('edit_enrollment_type'),
        'height'=>$this->input->post('edit_height'),
        'weight'=>$this->input->post('edit_weight'),
        'bmi'=>$this->input->post('edit_bmi'),
        'whatsapp_number'=>$this->input->post('edit_whatsappno'),
        'batch_timing'=>$this->input->post('edit_batch_timing')
    );
    $this->load->model('M_adminHome');
    $data = $this->M_adminHome->update_user($update_array,$user_id);
    echo $data;
}

function saveRenewalUserDate(){

    $renewal_date = $renewal_count = $renewal_fees = $user_id = '';
    date_default_timezone_set('Asia/Kolkata');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST){
            $renewal_date=$this->input->post('renewal_date');
            $renewal_count = $this->input->post('renewal_count');
            $renewal_fees = $this->input->post('renewal_fees');
            $renewal_enrollment_duration = $this->input->post('renewal_enrollment_duration');
            $user_id = $this->input->post('user_id');
        }
    }
    $insert_renewal_user_array=array(
        'renewal_date'=>date('Y-m-d',strtotime($renewal_date)),
        'renewal_count'=>$renewal_count,
        'renewal_fees'=>$renewal_fees,
        'renewal_enrollment_duration'=> $renewal_enrollment_duration,
        'user_id'=>$user_id,
        'created_on'=>date("Y-m-d h:i")
    );

    $this->load->model('M_adminHome');
    $ans = $this->M_adminHome->saveRenewalUserDate($insert_renewal_user_array);
    echo $ans;
}

 function getRenewalDetails($user_id){
    $this->load->model('M_adminHome');
    $data = $this->M_adminHome->getRenewalDetails($user_id);
    echo json_encode($data);    
}
function getRenewalReport(){
        $date = date("Y-m-d");
        $columns = array('Academy Registration Number','Name','Admission Date','Starting Duration',
                     'Starting Fees','Renewal Count', 'Renewal Duration', 'Renewal Date', 
                     'Renewal Fees'); 
        $this->load->model('M_adminHome');
        $data = $this->M_adminHome->getRenewalReport();
        $filename = "All_User_Renewal_data_" . $date.".CSV"; 
        $this->create_csv_for_renewal_report($filename, $columns, $data);
   }

function create_csv_for_renewal_report($file_name, $columns, $data) {
        try {
            // echo '<pre>';print_r($data);exit();
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=' . $file_name);
            $output = fopen("php://output", "w");
            fputcsv($output, $columns);
            $arr = array();
            for ($i = 0; $i < count($data); $i++) {
                //$arr[] = '-';
                $arr[] = isset($data[$i]->Academy_Registration_Number) ? $data[$i]->Academy_Registration_Number : '-';
                $arr[] = isset($data[$i]->Name) ? $data[$i]->Name : '-';
                $arr[] = isset($data[$i]->Admission_Date) ? $data[$i]->Admission_Date : '-';
                $arr[] = isset($data[$i]->Starting_Duration) ? $data[$i]->Starting_Duration : '-';
                $arr[] = isset($data[$i]->Starting_Fees) ? $data[$i]->Starting_Fees : '-';
                $arr[] = isset($data[$i]->Renewal_Count) ? $data[$i]->Renewal_Count : '-';
                $arr[] = isset($data[$i]->Renewal_Duration) ? $data[$i]->Renewal_Duration : '-';
                $arr[] = isset($data[$i]->Renewal_Date) ? $data[$i]->Renewal_Date : '-';
                $arr[] = isset($data[$i]->Renewal_Fees) ? $data[$i]->Renewal_Fees : '-';
                fputcsv($output, $arr);
                $arr = null;
            }
            fclose($output);
        } catch (Exception $ex) {
            
        }
    }
}
