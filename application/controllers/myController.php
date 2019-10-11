<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class MyController extends CI_Controller
	
{

	 public function __construct()
        {
                parent::__construct();
                if (!$this->session->userdata('login_data')){
                   return redirect('adminController/login');               
                }
        }

 public function index()
 {
 	$this->load->helper("url");
	$this->load->helper("html");
 	$this->load->view("logInForm");
	$this->load->view("homepage/homepage");
 }
 public function graph()
 {
 	$this->load->view("reports/graph");
 }
 public function editProfile()
 {
 	//$this->load->model('admin/adminModel','am');
 	//print_r($_SESSION);exit;
 	//$id=$_SESSION['login_data'][0][''];
	//$m['profile_detail']=$this->am->profile_detail($id);
 	$this->load->view("admin/Login_profile");
 }
 public function updateLoginInfo()
 {
 	$this->load->model("admin/adminModel",'am');
     if(isset($_POST['save_profile'])){
	    $data=$this->input->post();
	 	$u=$this->am->updateLoginInfo($data);
	 	if($u){
	 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:green;'>Changes saved Successfully.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
 	        $this->load->view("admin/Login_profile",$m);
	 	}else{
	 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:red;'>Failed to save changes...!</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
 	    $this->load->view("admin/Login_profile",$m);
 }}
 }//meterReaderPlacement
 public function meterReaderPlacement()
 {
 	$this->load->model('admin/adminModel','am');
	$m['area_detail']=$this->am->show_area();
	$m['meter_reasers']=$this->am->show_meter_readers();
	$m['meterReaderList']=$this->am->meterReaderList();
 	$this->load->view("admin/meter_reader_placement",$m);
 }
 public function add_meter_reader_placement()
 {
 	 $this->load->model("admin/adminModel",'am');
     if(isset($_POST['save_placement'])){
	    $data=$this->input->post();
	 	$u=$this->am->meterReaderPlacement($data);
	 	if($u){
	 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:green;'>Data added Successfully.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
			$m['area_detail']=$this->am->show_area();
			$m['meterReaderList']=$this->am->meterReaderList();
	        $m['meter_reasers']=$this->am->show_meter_readers();
 	        $this->load->view("admin/meter_reader_placement",$m);
	 	}else{
	 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:red;'>Add Failed Data already exist...!</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
	 	$m['area_detail']=$this->am->show_area();
	    $m['meter_reasers']=$this->am->show_meter_readers();
	    $m['meterReaderList']=$this->am->meterReaderList();
 	    $this->load->view("admin/meter_reader_placement",$m); 
	 }
 }else{
 	       $m['area_detail']=$this->am->show_area();
	       $m['meter_reasers']=$this->am->show_meter_readers();
	       $m['meterReaderList']=$this->am->meterReaderList();
 	       $this->load->view("admin/meter_reader_placement",$m);
 }
 }
 public function get_dataaArea()
      {
      if (isset($_POST['area_wise_bill'])) {
           $value=$_POST['area_wise_bill'];
           $this->load->model("admin/adminModel","a");
            $m['area_wise_bill'] = $this->a->get_dataArea($value);
            $m['area_detail']=$this->a->show_area();
            $this->load->view("reports/areaWiseBillReport",$m);
            //print_r($data); exit;
            // echo "<tr><td colspan='5'>".$value."<td></tr>";
            // foreach($data as $d)
            // {

            //   echo "<tr><td colspan='5'>".$d['area_name']."<td></tr>";
            // }

      }
    }
 public function deleteAsignedMeterReader($id)
 {
 	$this->load->model("admin/adminModel",'am');
	$this->am->deleteAsignedMeterReader($id);
	$m['area_detail']=$this->am->show_area();
	$m['meter_reasers']=$this->am->show_meter_readers();
	$m['meterReaderList']=$this->am->meterReaderList();
 	$this->load->view("admin/meter_reader_placement",$m);
 } public function meterReaderList($value='')
 {
 	$this->load->model("admin/adminModel",'am');
	$m['meterReaderList']=$this->am->meterReaderList();
	$m['no_of_meterReader']=$this->am->no_of_meterReader();
 	$this->load->view("admin/meterReaderList",$m);
 }
 //charges
 public function charges()
 {
 	$this->load->model('admin/adminModel','am');
 	$m['charges']=$this->am->show_charge_type();
	$this->load->view("admin/charges",$m);
 }
  public function addCharge(){
 	$this->load->model('admin/adminModel','am');
 	

 	$this->form_validation->set_rules("ct_name","Charge Type Name","required|trim");
 	$this->form_validation->set_rules("ct_amount","Amount","required|trim");
 	$this->form_validation->set_error_delimiters("<p class='text-danger' style='color: red;'></p>");
 	if ($this->form_validation->run()) 
 	{
	 	$charges_data=$this->input->post();
	 	$u=$this->am->checkCharges($charges_data);
	 	 if (!$u) {
	 	 	$msg=$this->am->addNewCharge($charges_data);
	 	 	if ($msg) {
	 			$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:green;'>Charge Type Added successfully.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div><br>';
				$m['charges']=$this->am->show_charge_type();
	 			$this->load->view('admin/charges',$m);
	 		}else{
	 			$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:red;'>Failed to add.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div><br>';
	 			$m['charges']=$this->am->show_charge_type();
	 			$this->load->view('admin/charges',$m);
	 		}
	 	 }else{
	 	 	$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:red;'>Add New Failed. Data already exist...!</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div><br>';
			 	$m['mge']="";
			 	$m['charges']=$this->am->show_charge_type();
			 	$this->load->view('admin/charges',$m);
			 }
 	}else{
 		   $m['charges']=$this->am->show_charge_type();
 			$this->load->view('admin/charges',$m);
 	 }
 	//$this->load->view('admin/charges',$m);
 
 }
  public function updateCharge()
 {
 	$this->load->model("admin/adminModel",'am');
 	if(isset($_GET['edit_id'])){
	 	$upId=$_GET['edit_id'];
		$m['upd']=$this->am->selectToUpdateCharge($upId);
		 $m['charges']=$this->am->show_charge_type();
 			$this->load->view('admin/charges',$m);	
	}else{
		$arUp=$this->input->post();
	 	$u=$this->am->update_charges($arUp);
	 	if($u){
	 		$m['mge']="Updated successfully.";
	 		 $m['charges']=$this->am->show_charge_type();
 			$this->load->view('admin/charges',$m);
	 	}else{
	 		$m['mge']="Updated Failed.";
	 		 $m['charges']=$this->am->show_charge_type();
 			$this->load->view('admin/charges',$m);
	 	}

	}
 }
public function Employees()
{
	$this->load->model('admin/adminModel','am');
 	$m['emp_type']=$this->am->show_emp_type();
	$this->load->view("admin/employees",$m);
}
//complaint
public function deleteComplaint($id)
{
	$this->load->model("admin/adminModel",'am');
	$u=$this->am->deleteComplaint($id);
	 if (!$u) {
		 $m['mge']= '<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:red;'>Failed to delete this.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div><br>';
				 $m['complaints']=$this->am->showAllComplaint();
			 	 $this->load->view('admin/showAllcomplaint',$m); 
			  }else{
			 	$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="success">
						    <div class="modal-header">'."
						            <b style='color:green;'>Complaint Deleted Successfully.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
				$m['complaints']=$this->am->showAllComplaint();
			 	$this->load->view('admin/showAllcomplaint',$m); 
		    }
}
public function ShowAllComplaints()
{
	$this->load->model("admin/adminModel",'am');
	if (isset($_POST['sendComp'])) {
		$comp=$this->input->post();
	 	$u=$this->am->addComplaint($comp);
	 	if ($u) {
	 		$m['mge']="Your Complaint has been successfully send.";
	 		$this->load->view("homepage/homepage",$m);
	 	}else{
	 		$m['mge']="Your Complaint could not be send at this time, please try again later...!";
	 		$this->load->view("homepage/homepage",$m);
	 	}
	}else{
		$m['complaints']=$this->am->showAllComplaint();
		$this->load->view("admin/showAllcomplaint",$m);
	}
}
 //Connection searchConnByCNum

public function searchConnByCNum()
 {
 	$this->load->model('admin/adminModel','am');
 	$m['meter_type_detail']=$this->am->show_metertype();
	$m['con_type_detail']=$this->am->show_conntype();
	$m['area_detail']=$this->am->show_area();
	if(isset($_POST['submit_SearchCN'])){
	$_SESSION['cons_new_num']=$this->input->post('cons_new_num');
 	$u=$this->am->check_connnection_cn($_SESSION['cons_new_num']);
	 	 if (!$u) {
		 $m['mge']= '<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:red;'>The Consumer Number ".$_SESSION['cons_new_num']." You Entered is Not Found...!.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div><br>';
			 	 $m['t']=false;
			 	 $this->load->view('admin/updateConnectionDetails',$m); 
			  }else{
			 	$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="success">
						    <div class="modal-header">'."
						            <b style='color:green;'>Data Found...!</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
			 	$m['t']=true;
			 	$m['conn_detail_to_update']=$this->am->select_conn_to_update($_SESSION['cons_new_num']);
			 	$this->load->view('admin/updateConnectionDetails',$m); 
		    }
		 }else{
		 	unset($_SESSION['cons_new_num']);
		 	$this->load->view('admin/updateConnectionDetails',$m); 
		 }
}
 public function updateConnectionDetail()
{
	$this->load->model('admin/adminModel','am');
	$m['meter_type_detail']=$this->am->show_metertype();
	$m['con_type_detail']=$this->am->show_conntype();
	$m['area_detail']=$this->am->show_area();
 	$m['conn_detail']=$this->am->show_all_consumer();
 	$m['t']=false;
	$this->load->view("admin/updateConnectionDetails",$m);
}
public function updateConnectionDetail2()
{
	$this->load->model("admin/adminModel",'am');
     if(isset($_POST['modify_connection'])){
	    $mtUp=$this->input->post();
	 	$u=$this->am->updateConnDetails($mtUp);
	 	if($u){
	 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:green;'>Changes Saved Successfully.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
					 $m['consumer_detail']=$this->am->show_all_consumer();
	                $this->load->view("admin/updateConnectionDetails",$m);
	 	}else{
	 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:green;'>Fail to save changes.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
	 		$m['t']=false;
	        $this->load->view("admin/updateConnectionDetails",$m);
	 }
 }else{
 	        $m['t']=false;
	        $this->load->view("admin/updateConnectionDetails",$m);
 }
}
 //consumer
public function consumerLedger()
{
	$this->load->view("admin/consumerLedger");
}
public function searchConLedger()
{	
	$this->load->model('admin/adminModel','am');
	if(isset($_POST['con_sub'])){
			$con_new_num=$_POST['con_new_num'];
		 	$id=$this->am->searchConLedger($con_new_num);
		 	if ($id!=0) {
		 	$m['ledger']=$this->am->showConsumerLedger($id);
		 	$this->load->view("admin/consumerLedger",$m);

		 	}else{
		 	$m['ledger']=0;
		 	 $this->load->view("admin/showAllConnectionOfaConsumer",$m);
		 	}
	}
}
public function searchAllConecctionOfaConsumer()
{	
	$this->load->model('admin/adminModel','am');
	if(isset($_POST['con_sub'])){
			$cnic=$_POST['con_cnic'];
		 	$id=$this->am->showAllConOfaConsumer($cnic);
		 	if ($id!=0) {
		 	$m['allConnection']=$this->am->showAllConnectionsOfaConsumer($id);
		 	$this->load->view("admin/showAllConnectionOfaConsumer",$m);

		 	}else{
		 	$m['allConnection']=0;
		 	 $this->load->view("admin/showAllConnectionOfaConsumer",$m);
		 	}
	}
}
public function showAllConnectionOfaConsumer()
{
	$this->load->model('admin/adminModel','am');
	$this->load->view("admin/showAllConnectionOfaConsumer");
}
public function viewConsumerDetail($id)
{
	$this->load->model('admin/adminModel','am');
 	$m['consumer_detail']=$this->am->show_one_consumer($id);
	$this->load->view("admin/showConsumerProfile",$m);
}
public function editConsumerDetail()
{
	$this->load->model('admin/adminModel','am');
 	$m['consumer_detail']=$this->am->show_all_consumer();
	$this->load->view("admin/editConsumerDetail",$m);
}
public function deleteConsumer($v)
{    
	$this->load->model('admin/adminModel','am');
	$u=$this->am->deleteConsumer($v);
	 	if($u){
	 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:green;'>Consumer Record Removed Successfully.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
					 $m['consumer_detail']=$this->am->show_all_consumer();
	                $this->load->view("admin/editConsumerDetail",$m);
	 	}else{
	 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:green;'>Failed to Delete.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
	 		$m['consumer_detail']=$this->am->show_all_consumer();
	        $this->load->view("admin/editConsumerDetail",$m);
	 	}
}
public function updateConsumerDetail()
{
	$this->load->model("admin/adminModel",'am');
 	if(isset($_GET['edit_id'])){
	 	$upId=$_GET['edit_id'];
		$m['update']=$this->am->selectToUpdateConsumer($upId);
		$this->load->view('admin/updateConsumer',$m);	
	}
}
public function updateConsumerDetail2()
{
	 $this->load->model("admin/adminModel",'am');
	//$mu_id=$this->input->post('up_id');
     if(isset($_POST['up_id'])){
	    $mtUp=$this->input->post();
	 	$u=$this->am->updateConsumerDetails($mtUp);
	 	if($u){
	 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:green;'>Consumer Record Edited Successfully.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
					 $m['consumer_detail']=$this->am->show_all_consumer();
	                $this->load->view("admin/editConsumerDetail",$m);
	 	}else{
	 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:green;'>Update Failed.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
	 		$m['consumer_detail']=$this->am->show_all_consumer();
	        $this->load->view("admin/editConsumerDetail",$m);
	 }
 }else{
 	        $m['consumer_detail']=$this->am->show_all_consumer();
	        $this->load->view("admin/editConsumerDetail",$m);
 }
 }
 public function searchConCNIC()
 {

 	//$cnic_data=$this->input->post();
 	//$_SESSION['cons_cnic']=$this->input->post('cons_cnic');
 	$this->load->model('admin/adminModel','am');
 	$m['meter_type_detail']=$this->am->show_metertype();
	$m['con_type_detail']=$this->am->show_conntype();
	$m['area_detail']=$this->am->show_area();
	if(isset($_POST['submitSearch'])){
	//$this->form_validation->set_rules("cons_fname","First Name","required|trim");
 	$_SESSION['cons_cnic']=$this->input->post('cons_cnic');
 	$u=$this->am->check_con_cnic($_SESSION['cons_cnic']);
	//$m['cnic']=$_SESSION['cnic'];
	 	 if (!$u) {
		 $m['mge']= '<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:red;'>The CNIC ".$_SESSION['cons_cnic']." You Entered is Not Found...! Please Register it As New Consumer.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div><br>';
			 	 $m['t']=false;
			 	 $this->load->view('admin/new_connection',$m); 
			  }else{
			 	$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="success">
						    <div class="modal-header">'."
						            <b style='color:green;'>Data already exist...!</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
			 	$m['t']=true;
			 	$this->load->view('admin/new_connection',$m); 
		    }
		 }else{
		 	unset($_SESSION['cons_cnic']);
		 	$this->load->view('admin/new_connection',$m); 
		 }
}
 
 public function showAllConnection()
 {
 	$this->load->model('admin/adminModel','amd');
	$m['connection_detail']=$this->amd->connection_detail();
	$this->load->view('admin/showAllconnection',$m); 
 }
 public function newConnection(){
 	$this->load->model("admin/adminModel",'am');
	$m['meter_type_detail']=$this->am->show_metertype();
	$m['con_type_detail']=$this->am->show_conntype();
	$m['area_detail']=$this->am->show_area();

	if(isset($_POST['add_new_connection'])){
	$this->form_validation->set_rules("cons_fname","First Name","required|trim");
 	$this->form_validation->set_rules("cons_lname","Last Name","required|trim");
 	$this->form_validation->set_rules("cons_fathername","Father Name","required|trim");
 	$this->form_validation->set_rules("cons_gender","Gender","required|trim");
 	$this->form_validation->set_rules("cons_dob","Date of Birth","required|trim");
 	$this->form_validation->set_rules("cons_cnic1","CNIC","required|trim");
 	$this->form_validation->set_rules("cons_phone","Phone","required|trim");
 	$this->form_validation->set_rules("cons_cellnumber","Cell Number","required|trim");
 	$this->form_validation->set_rules("cons_permanent_address","Permanent Address","required|trim");
 	$this->form_validation->set_rules("cons_current_address","Current Address","required|trim");
 	$this->form_validation->set_rules("cons_area","Select Area","required|trim");
 	$this->form_validation->set_rules("cons_old_number","Consumer Old Number","required|trim");
 	$this->form_validation->set_rules("cons_new_number","Consumer New Number","required|trim");
 	$this->form_validation->set_rules("cons_conn_type","Select Connection Type","required|trim");
 	$this->form_validation->set_rules("cons_conn_date","Connection Date","required|trim");
 	//$this->form_validation->set_rules("cons_meter_no","Meter Number","required|trim");
 	//$this->form_validation->set_rules("cons_meter_type","Select Meter Type","required|trim");
 	$this->form_validation->set_error_delimiters("<p class='text-danger' style='color: red;'></p>");

                // $config['upload_path']          = './uploads/';
                // $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                // $this->load->library('upload', $config);

                // if ( ! $this->upload->do_upload('cons_img'))
                // {
                //         $error = array('error' => $this->upload->display_errors());

                //         $this->load->view('admin/new_connection', $error);
                // }
                // else
                // {
                //         $data = array('upload_data' => $this->upload->data());

                //         $this->load->view('admin/new_connection', $data);
                // }
        
 	//$u=$this->am->check_con_cnic($_SESSION['cons_cnic']);
 	if ($this->form_validation->run()) 
 	{
 		$data=$this->input->post();
 		$mm=$this->am->newConsumerRegisteration($data);
 		if($mm){
 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:green;'>New Consumer Registered Successfully.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
		unset($_SESSION['cons_cnic']);
 		$this->load->view("admin/new_connection", $m);
 	}else{
 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:green;'>New Consumer Registered Failed..!</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
		unset($_SESSION['cons_cnic']);
	 	$this->load->view("admin/new_connection", $m); 
	 	}
	}else{
		$m['t']=false;
	 	$this->load->view("admin/new_connection", $m);
	 }
 }elseif(isset($_POST['add_to_existing_connection'])){
		$this->form_validation->set_rules("cons_area","Select Area","required|trim");
 	$this->form_validation->set_rules("cons_old_number","Consumer Old Number","required|trim");
 	$this->form_validation->set_rules("cons_new_number","Consumer New Number","required|trim");
 	$this->form_validation->set_rules("cons_conn_type","Select Connection Type","required|trim");
 	$this->form_validation->set_rules("cons_conn_date","Connection Date","required|trim");
 	//$this->form_validation->set_rules("cons_meter_no","Meter Number","required|trim");
 	//$this->form_validation->set_rules("cons_meter_type","Select Meter Type","required|trim");
 	$this->form_validation->set_error_delimiters("<p class='text-danger' style='color: red;'></p>");

 	//$u=$this->am->check_con_cnic($_SESSION['cons_cnic']);
 	if ($this->form_validation->run()) 
 	{
 		$data=$this->input->post();
 		$mn=$this->am->addConnectionToConsumer($data,$_SESSION['cons_cnic']);
 		if($mn){
 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:green;'>Connection Registered Successfully.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
		unset($_SESSION['cons_cnic']);
 		$this->load->view("admin/new_connection", $m);
 	}else{
 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:red;'>Failed to add new connection..!</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
		unset($_SESSION['cons_cnic']);
	 	$this->load->view("admin/new_connection", $m); 
	 	}

 	}else{
 		$m['t']=true;
	 	$this->load->view("admin/new_connection", $m);
 	}
 }else{
 	unset($_SESSION['cons_cnic']);
   $this->load->view("admin/new_connection", $m);
 }
}
public function connectionClosed()
 {
 	$this->load->helper("url");
	$this->load->helper("html");
	$this->load->model('admin/adminModel','amd');
	$m['total_connection_closed']=$this->amd->no_of_connection_closed();
	//$m['total_amount']=$this->amd->no_of_amount_received();
	//$m['total_unit_consumed']=$this->amd->consumed_unit_in_current_month();
 	$m['connection_detail']=$this->amd->connection_closed_detail();
	$this->load->view("reports/connectionClosed",$m);
 }
 //connection close
 
 public function home()
 {
 	$this->load->helper("url");
	$this->load->helper("html");
	$this->load->model('admin/adminModel','amd');
	$m['total_connection']=$this->amd->no_of_connection();
	$m['total_amount']=$this->amd->no_of_amount_received();
	$m['total_unit_consumed']=$this->amd->consumed_unit_in_current_month();
 	$m['connection_detail']=$this->amd->connection_detail();
	$this->load->view("admin/home",$m);
 }
 public function contactUs()
 {
 	$this->load->view("admin/contactUs");
 }
 
 
 //  public function newlogin(){
 // 	$this->form_validation->set_rules("user_name","User Name","required|trim");
 // 	$this->form_validation->set_rules("password","Password","required|trim");
 // 	$this->form_validation->set_error_delimiters("<p class='text-danger' style='color: red;'></p>");
 // 	if ($this->form_validation->run()) 
 // 	{
 // 		$data=$this->input->post();
 // 		$this->load->model('admin/adminModel','am');
 // 		$message=$this->am->newLogin($data);
 // 		$this->load->view('registration/index');
 // 	}else{
 // 	$this->load->view('registration/login'); 
 // 	}
 // }
 
public function about_us(){
 	$this->load->view("admin/aboutUs");
 }
 //reports
 public function monthWiseElectricityConsumption()
 {
 	$this->load->view("admin/monthWiseElectricityConsumption");
 }
 public function monthWiseElectricityConsumption1()
 {
 		$this->load->model('admin/adminModel','am');
 		$d=$this->input->post();
 		$m['month']=$_POST['month'];
 		$m['yearr']=$_POST['year'];
 		//print_r($_POST);exit;
	 	$m['month_wise_bill']=$this->am->monthWiseElectricityConsumption1($d);
	 	
	 	$this->load->view('admin/monthWiseElectricityConsumption',$m);
 }
 public function area_wise_electricity_consumption()
 {
 	 $this->load->model('admin/adminModel','am');
 	//$message=$this->am->areawiseConsumerChart();
 	//print json_encode($message);
      $this->load->view("admin/area_wise_electricity_consumption");
 }
 public function viewAreawiseConsumer()
 {
 $this->load->model('admin/adminModel','am');
 	$message=$this->am->areawiseConsumerChart();
 	//print json_encode($message);
      $this->load->view("admin/areawiseConsumerChart",$message);
  }
 public function showAllConsumers()
 {
 	$this->load->model('admin/adminModel','amd');
	$m['total_connection']=$this->amd->no_of_connection();
	$m['total_unit_consumed']=$this->amd->consumed_unit_in_current_month();
 	$m['connection_detail']=$this->amd->connection_detail();
	$this->load->view("reports/showAllConsumer",$m);
 }
 public function reports()
 {
	$this->load->model('admin/adminModel','am');
	$m['total_connection']=$this->am->no_of_connection();
	$m['total_connection_closed']=$this->am->no_of_connection_closed();
 	$m['mes']=$this->am->reports();
 	$this->load->view("admin/reports",$m);
 }
 public function areaWiseBillReport()
 {
 	$this->load->model('admin/adminModel','adm');
 	$m['area_detail']=$this->adm->show_area();
 	$this->load->view("reports/areaWiseBillReport",$m);
 }
  public function unitConsumptionGraph()
 {
 	$this->load->model('admin/adminModel','am');
 	$message=$this->am->unitConsumptionGraph();
 	//print json_encode($message);
      $this->load->view("admin/unitConsumptionGraph",$message);
 }
 public function graphConsunedU()
 {
 	//print_r($message['mess']);exit;
 	$this->load->model('admin/adminModel','am');
 	$message=$this->am->unitConsumptionGraph();

 	//print json_encode($message);
 	
 }
 public function viewAllUnpaidBill()
 {
 	           $this->load->model('admin/billModel','bm');
	            $m['t']=true;
			 	$m['bank_charge']=$this->bm->select_bank_charge();
			 	$m['late_pay_charge']=$this->bm->select_late_pay_charge();
			 	$m['conn_reading_qry']=$this->bm->view_bill_reading_all();
			 	$mid=$this->bm->select_id_of_connection($id);
			 	$m['arrear_amount']=$this->bm->select_arrear($mid); 
			 	$m['last_reading']=$this->bm->select_last_reading($mid); 
			 	$m['readings']= $this->bm->select_readings($mid);
			 	$m['bill_rates']= $this->bm->select_unit_rates($mid);
				$m['mes']=$this->bm->reading_history_of($id);
				$m['no_of_months']=$this->bm->reading_No_of_month($id);
			// echo '<pre>'; print_r($m);exit;
				$this->load->view('admin/view_bill',$m);
 }

 public function defualterList()
 {
 	$this->load->model('admin/adminModel','am');
 	$message['defList']=$this->am->defualter_list();
 	$this->load->view("reports/defaulterList",$message);
 }
 public function login(){
 	$this->load->view("registration/login");
 }



 //addMeterTpye start 
public function addNewMeterType()
 {
 	$this->load->model("admin/adminModel",'am');
	$m['meter_type_detail']=$this->am->show_metertype();
 	$this->load->view("admin/meter_type",$m);
 }
 public function updateMeterType()
 {
 	$this->load->model("admin/adminModel",'am');
 	if(isset($_GET['edit_id'])){
	 	$upId=$_GET['edit_id'];
		$m['updmt']=$this->am->selectToUpdateMeterType($upId);
		$m['meter_type_detail']=$this->am->show_metertype();
		$this->load->view('admin/meter_type',$m);	
	}else{
		$mtUp=$this->input->post();
	 	$u=$this->am->updateMeterType($mtUp);
	 	if($u){
	 		$m['mge']="Updated successfully.";
	 		$m['meter_type_detail']=$this->am->show_metertype();
	 		$this->load->view('admin/meter_type',$m);
	 	}else{
	 		$m['mge']="Updated Failed.";
	 		$m['meter_type_detail']=$this->am->show_conntype();
	 		$this->load->view('admin/meter_type',$m);
	 	}

	}
 }
 public function deleteMeterType()
 {
 	if (isset($_GET['del_id'])) {
 		$id=$_GET['del_id'];
 		$this->load->model("admin/adminModel",'am');
	 	$m['meter_type_detail']=$this->am->show_metertype();
	 	$mdel=$this->am->delete_meterType($id);
		if ($mdel) {
				$m['mge']="deleted successfully.";
				$m['meter_type_detail']=$this->am->show_metertype();
			 	$this->load->view('admin/meter_type',$m);
			}else
			{ 
				$m['mge']="could not delete..!";
				$m['meter_type_detail']=$this->am->show_conntype();
			 	$this->load->view('admin/meter_type',$m);
			}
 	}else{
 		$m['mge']="could not delete..!";
 		$this->load->model("admin/adminModel",'am');
	 	$m['meter_type_detail']=$this->am->show_metertype();
		$this->load->view('admin/meter_type',$m);
 	}
 }

 public function addMeterTpye()
 {
 	$this->form_validation->set_rules("meter_type_name","Meter Type Name","required|trim");
 	//$this->form_validation->set_rules("area_code","Area Code","required|trim");
 	$this->form_validation->set_error_delimiters("<p class='text-danger' style='color: red;'></p>");
 	


 	$this->load->model("admin/adminModel",'am');
	$m['meter_type_detail']=$this->am->show_metertype();
 	if ($this->form_validation->run()) 
 	{
	 	$mt_data=$this->input->post();
	 	$u=$this->am->check_metertype($mt_data);
	 	 if (!$u) {
			 	 	$msg=$this->am->addNewMeterType($mt_data);
			 	 	if ($msg) {
			 			$m['mge']="Added successfully.";
			 			$m['meter_type_detail']=$this->am->show_metertype();
			 			$this->load->view('admin/meter_type',$m);
			 		}else{
			 			$m['mge']="Failed...!";
			 			$m['meter_type_detail']=$this->am->show_metertype();
			 			$this->load->view('admin/meter_type',$m);
			 		}
			  }else{
			 	$m['mge']="Add New Failed. Data already exist...!";
			 	$this->load->view('admin/meter_type',$m); 
			   }
 	}else{
 			$this->load->view('admin/meter_type',$m); 
 	 }
 }
//meter type close
//bill rate start
public function billRate()
{
   $this->load->model("admin/adminModel",'am');
	$m['con_type']=$this->am->show_conntype();
	$m['bill_rate_detail']=$this->am->show_tariff();
 	$this->load->view("admin/billRate",$m);
}
public function addbillRate()
{
	$this->form_validation->set_rules("select_conn_type","Connection Type Name","required|trim");
 	$this->form_validation->set_rules("unit_range_from","unit range from","required|trim");
 	$this->form_validation->set_rules("unit_range_to","unit range to","required|trim");
 	$this->form_validation->set_rules("per_unit_rate","unit rate","required|trim");
 	$this->form_validation->set_error_delimiters("<p class='text-danger' style='color: 
 		red;'></p>");
 	
 	$this->load->model("admin/adminModel",'am');
	$m['con_type']=$this->am->show_conntype();
	$m['bill_rate_detail']=$this->am->show_tariff();
 	if ($this->form_validation->run()) 
 	{
	 	$br_data=$this->input->post();
	 	$u=$this->am->check_billratetype($br_data);
	 	 if (!$u) {
			 	 	$msg=$this->am->addBillRate($br_data);
			 	 	if ($msg) {
			 			$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:green;'>Bill rate added successfully.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
			 			$m['con_type']=$this->am->show_conntype();
			 			$m['bill_rate_detail']=$this->am->show_tariff();
			 			$this->load->view('admin/billRate',$m);
			 		}else{
			 			$m['mge']="Failed...!";
			 			$m['con_type']=$this->am->show_conntype();
			 			$m['bill_rate_detail']=$this->am->show_tariff();
			 			$this->load->view('admin/billRate',$m);
			 		}
			  }else{
			 	$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:red;'>Add New Failed. Data already exist..!</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
			 	$this->load->view('admin/billRate',$m); 
			   }
 	}else{
 			$this->load->view('admin/billRate',$m); 
 	 }
}
public function delete_bill_rate()
{
	if (isset($_GET['del_id'])) {
 		$id=$_GET['del_id'];
 		$this->load->model("admin/adminModel",'am');
	 	$m['con_type']=$this->am->show_conntype();
	 	$m['bill_rate_detail']=$this->am->show_tariff();
	 	$mdel=$this->am->delete_tariff($id);
		if ($mdel) {
				$m['mge']="deleted successfully.";
				$m['con_type']=$this->am->show_conntype();
	 	        $m['bill_rate_detail']=$this->am->show_tariff();
			 	$this->load->view('admin/billRate',$m);
			}else
			{ 
				$m['mge']="could not delete..!";
				$m['con_type']=$this->am->show_conntype();
	 	        $m['bill_rate_detail']=$this->am->show_tariff();
			 	$this->load->view('admin/billRate',$m);
			}
 	}else{
 		$m['mge']="Select again to delete..!";
 		$this->load->model("admin/adminModel",'am');
	 	$m['con_type']=$this->am->show_conntype();
	 	$m['bill_rate_detail']=$this->am->show_tariff();
		$this->load->view('admin/billRate',$m);
 	}
}
public function updateBillRate()
{
	$this->load->model("admin/adminModel",'am');
 	if(isset($_GET['edit_id'])){
	 	$upId=$_GET['edit_id'];
	 	$m['UconTname']=$_GET['et_ctname'];
		$m['upd']=$this->am->selectToUpdateBillRate($upId);
		$m['con_type']=$this->am->show_conntype();
	 	$m['bill_rate_detail']=$this->am->show_tariff();
		$this->load->view('admin/billRate',$m);	
	}else{
		$etUp=$this->input->post();
	 	$u=$this->am->updateBill_Rate($etUp);
	 	if($u){
	 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:green;'>Changes Saved successfully.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
	 		$m['con_type']=$this->am->show_conntype();
	 	    $m['bill_rate_detail']=$this->am->show_tariff();
	 		$this->load->view('admin/billRate',$m);
	 	}else{
	 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:red;'>Failed to save Changes.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
	 		$m['con_type']=$this->am->show_conntype();
	 	    $m['bill_rate_detail']=$this->am->show_tariff();
	 		$this->load->view('admin/billRate',$m);
	 	}

	}
}
 //bill rate
//employee type start
 public function empType()
 {
 	$this->load->model("admin/adminModel",'am');
	$m['emp_type_detail']=$this->am->show_emptype();
 	$this->load->view("admin/emp_type",$m);
 }

 public function updateEmpType()
 {
 	$this->load->model("admin/adminModel",'am');
 	if(isset($_GET['edit_id'])){
	 	$upId=$_GET['edit_id'];
		$m['updet']=$this->am->selectToUpdateEmpType($upId);
		$m['emp_type_detail']=$this->am->show_emptype();
		$this->load->view('admin/emp_type',$m);	
	}else{
		$etUp=$this->input->post();
	 	$u=$this->am->updateEmpTypem($etUp);
	 	if($u){
	 		$m['mge']="Updated successfully.";
	 		$m['emp_type_detail']=$this->am->show_emptype();
	 		$this->load->view('admin/emp_type',$m);
	 	}else{
	 		$m['mge']="Updated Failed.";
	 		$m['emp_type_detail']=$this->am->show_emptype();
	 		$this->load->view('admin/emp_type',$m);
	 	}

	}
 }
 public function deleteEmpType()
 {
 	if (isset($_GET['del_id'])) {
 		$id=$_GET['del_id'];
 		$this->load->model("admin/adminModel",'am');
	 	$m['emp_type_detail']=$this->am->show_emptype();
	 	$mdel=$this->am->delete_empType($id);
		if ($mdel) {
				$m['mge']="deleted successfully.";
				$m['emp_type_detail']=$this->am->show_emptype();
			 	$this->load->view('admin/emp_type',$m);
			}else
			{ 
				$m['mge']="could not delete..!";
				$m['emp_type_detail']=$this->am->show_emptype();
			 	$this->load->view('admin/emp_type',$m);
			}
 	}else{
 		$m['mge']="Select again to delete..!";
 		$this->load->model("admin/adminModel",'am');
	 	$m['emp_type_detail']=$this->am->show_emptype();
		$this->load->view('admin/emp_type',$m);
 	}
 }

 public function addEmpTpye()
 {
 	$this->form_validation->set_rules("emp_type_name","Employee Type Name","required|trim");
 	//$this->form_validation->set_rules("area_code","Area Code","required|trim");
 	$this->form_validation->set_error_delimiters("<p class='text-danger' style='color: red;'></p>");
 	
 	$this->load->model("admin/adminModel",'am');
	$m['emp_type_detail']=$this->am->show_emptype();
 	if ($this->form_validation->run()) 
 	{
	 	$empt_data=$this->input->post();
	 	$u=$this->am->check_emptype($empt_data);
	 	 if (!$u) {
			 	 	$msg=$this->am->addNewEmpType($empt_data);
			 	 	if ($msg) {
			 			$m['mge']="Added successfully.";
			 			$m['emp_type_detail']=$this->am->show_emptype();
			 			$this->load->view('admin/emp_type',$m);
			 		}else{
			 			$m['mge']="Failed...!";
			 			$m['emp_type_detail']=$this->am->show_emptype();
			 			$this->load->view('admin/emp_type',$m);
			 		}
			  }else{
			 	$m['mge']="Add New Failed. Data already exist...!";
			 	$this->load->view('admin/emp_type',$m); 
			   }
 	}else{
 			$this->load->view('admin/emp_type',$m); 
 	 }
 }
//employee type close

 
 //Connection Type Start
 public function addNewConnectionType()
 {
 	$this->load->model("admin/adminModel",'am');
	$m['con_type_detail']=$this->am->show_conntype();
 	$this->load->view("admin/new_connection_type",$m);
 }
 public function updateConnType()
 {
 	$this->load->model("admin/adminModel",'am');
 	if(isset($_GET['edit_id'])){
	 	$upId=$_GET['edit_id'];
		$m['updct']=$this->am->selectToUpdateConnType($upId);
		$m['con_type_detail']=$this->am->show_conntype();
		$this->load->view('admin/new_connection_type',$m);	
	}else{
		$ctUp=$this->input->post();
	 	$u=$this->am->updateConType($ctUp);
	 	if($u){
	 		$m['mge']="Updated successfully.";
	 		$m['con_type_detail']=$this->am->show_conntype();
	 		$this->load->view('admin/new_connection_type',$m);
	 	}else{
	 		$m['mge']="Updated Failed.";
	 		$m['con_type_detail']=$this->am->show_conntype();
	 		$this->load->view('admin/new_connection_type',$m);
	 	}

	}
 }
 public function deleteConnType()
 {
 	if (isset($_GET['del_id'])) {
 		$id=$_GET['del_id'];
 		$this->load->model("admin/adminModel",'am');
	 	$m['con_type_detail']=$this->am->show_conntype();
	 	$mdel=$this->am->delete_connType($id);
		if ($mdel) {
				$m['mge']="deleted successfully.";
				$m['con_type_detail']=$this->am->show_conntype();
			 	$this->load->view('admin/new_connection_type',$m);
			}else
			{ 
				$m['mge']="could not delete..!";
				$m['con_type_detail']=$this->am->show_conntype();
			 	$this->load->view('admin/new_connection_type',$m);
			}
 	}else{
 		$m['mge']="could not delete..!";
 		$this->load->model("admin/adminModel",'am');
	 	$m['con_type_detail']=$this->am->show_conntype();
		$this->load->view('admin/new_connection_type',$m);
 	}
 }

 public function addConnectionTpye()
 {
 	$this->form_validation->set_rules("con_type_name","Connection Type Name","required|trim");
 	//$this->form_validation->set_rules("area_code","Area Code","required|trim");
 	$this->form_validation->set_error_delimiters("<p class='text-danger' style='color: red;'></p>");
 	


 	$this->load->model("admin/adminModel",'am');
	$m['con_type_detail']=$this->am->show_conntype();
 	if ($this->form_validation->run()) 
 	{
	 	$cont_data=$this->input->post();
	 	$u=$this->am->check_conntype($cont_data);
	 	 if (!$u) {
			 	 	$msg=$this->am->addNewConType($cont_data);
			 	 	if ($msg) {
			 			$m['mge']="Added successfully.";
			 			$m['con_type_detail']=$this->am->show_conntype();
			 			$this->load->view('admin/new_connection_type',$m);
			 		}else{
			 			$m['mge']="Failed...!";
			 			$m['con_type_detail']=$this->am->show_conntype();
			 			$this->load->view('admin/new_connection_type',$m);
			 		}
			  }else{
			 	$m['mge']="Add New Failed. Data already exist...!";
			 	$this->load->view('admin/new_connection_type',$m); 
			   }
 	}else{
 			$this->load->view('admin/new_connection_type',$m); 
 	 }
 }
 //Connection Type Finished
 //area details......
 public function addNewArea(){
 	$this->load->model('admin/adminModel','adm');
 	$mv['area_detail']=$this->adm->show_area();
 	$this->load->view('admin/add_area',$mv);
 
 }
 public function updateArea()
 {
 	$this->load->model("admin/adminModel",'am');
 	if(isset($_GET['edit_id'])){
	 	$upId=$_GET['edit_id'];
		$m['upd']=$this->am->selectToUpdateArea($upId);
		$m['area_detail']=$this->am->show_area();
		$this->load->view('admin/add_area',$m);	
	}else{
		$arUp=$this->input->post();
	 	$u=$this->am->update_area($arUp);
	 	if($u){
	 		$m['mge']="Updated successfully.";
	 		$m['area_detail']=$this->am->show_area();
	 		$this->load->view('admin/add_area',$m);
	 	}else{
	 		$m['mge']="Updated Failed.";
	 		$m['area_detail']=$this->am->show_area();
	 		$this->load->view('admin/add_area',$m);
	 	}

	}
 }
 public function deleteArea()
 {
 	$del=$_GET['del_id'];
 	$this->load->model("admin/adminModel",'am');
	$mdel=$this->am->delete_area($del);
	$m['area_detail']=$this->am->show_area();
	if ($mdel) {
		$m['mge']="deleted successfully.";
		$m['area_detail']=$this->am->show_area();
	 	$this->load->view('admin/add_area',$m);
	}else
	{ 
		$m['mge']="could not delete..!";
		$m['area_detail']=$this->am->show_area();
	 	$this->load->view('admin/add_area',$m);
	}
 }
 public function newArea(){
 	$this->form_validation->set_rules("area_name","Area Name","required|trim");
 	$this->form_validation->set_rules("area_code","Area Code","required|trim");
 	$this->form_validation->set_error_delimiters("<p class='text-danger' style='color: red;'></p>");
 	$this->load->model("admin/adminModel",'am');
	$m['area_detail']=$this->am->show_area();
 	if ($this->form_validation->run()) 
 	{
	 	$area_data=$this->input->post();
	 	$u=$this->am->checkArea($area_data);
	 	 if (!$u) {
	 	 	$msg=$this->am->addNewArea($area_data);
	 	 	if ($msg) {
	 			$m['mge']="Area added successfully.";
	 			$m['area_detail']=$this->am->show_area();
	 			$this->load->view('admin/add_area',$m);
	 		}else{
	 			$m['mge']="Failed...!";
	 			$m['area_detail']=$this->am->show_area();
	 			$this->load->view('admin/add_area',$m);
	 		}
	 	 }else{
			 	$m['mge']="Add New Failed. Data already exist...!";
			 	$m['area_detail']=$this->am->show_area();
			 	$this->load->view('admin/add_area',$m); 
			 }
 	}else{
 			$this->load->view('admin/add_area',$m); 
 	 }
 } 
 //Area close
 //employees
 public function updateEmployeeDetail()
 {
 	    $this->load->model("admin/adminModel",'am');
 	    $data=$this->input->post();
 		$mm=$this->am->updateEmployee($data);
 		if($mm){
 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:green;'>Changes Saved Successfully.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';

 	    $m['employees_detail']=$this->am->employees_detail();
	    $this->load->view('admin/showAllEmployees',$m); 
 	}else{
 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:red;'>Changes Not Saved...!</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
			$m['employees_detail']=$this->am->employees_detail();
	        $this->load->view('admin/showAllEmployees',$m); 
	 	}
 }
public function updateEmpDetail($emp_id)
{
	    $this->load->model("admin/adminModel",'am');
		$m['updateEmp']=$this->am->selectToUpdateEmp($emp_id);
		$m['emp_type']=$this->am->show_emp_type();
		$this->load->view('admin/updateEmployee',$m);
	
}
 public function showEmployees()
 {
 	$this->load->model('admin/adminModel','amd');
	$m['employees_detail']=$this->amd->employees_detail();
	$this->load->view('admin/showAllEmployees',$m); 
 }
 public function showEmployeesReports()
 {
 	$this->load->model('admin/adminModel','amd');
	$m['employees_detail']=$this->amd->employees_detail();
	$m['no_of_emp']=$this->amd->no_of_emp();
	$this->load->view('reports/Report_showAllEmployees',$m); 
 }
 public function addemployee()
 {
 	if(isset($_POST['addEmp'])){
	$this->form_validation->set_rules("cons_fname","First Name","required|trim");
 	$this->form_validation->set_rules("cons_lname","Last Name","required|trim");
 	$this->form_validation->set_rules("cons_fathername","Father Name","required|trim");
 	$this->form_validation->set_rules("cons_gender","Gender","required|trim");
 	$this->form_validation->set_rules("cons_dob","Date of Birth","required|trim");
 	$this->form_validation->set_rules("cons_cnic1","CNIC","required|trim");
 	$this->form_validation->set_rules("cons_phone","Phone","required|trim");
 	$this->form_validation->set_rules("cons_cellnumber","Cell Number","required|trim");
 	$this->form_validation->set_rules("cons_permanent_address","Permanent Address","required|trim");
 	$this->form_validation->set_rules("cons_current_address","Current Address","required|trim");
 	$this->form_validation->set_rules("emp_type","employee type","required|trim");
 	$this->form_validation->set_rules("Joining_date","Connection Date","required|trim");
 	$this->form_validation->set_rules("emp_no","Employee Number","required|trim");
 	//$this->form_validation->set_rules("cons_meter_type","Select Meter Type","required|trim");
 	$this->form_validation->set_error_delimiters("<p class='text-danger' style='color: red;'></p>");
 	$this->load->model('admin/adminModel','am');
                // $config['upload_path']          = './uploads/';
                // $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                // $this->load->library('upload', $config);

                // if ( ! $this->upload->do_upload('cons_img'))
                // {
                //         $error = array('error' => $this->upload->display_errors());

                //         $this->load->view('admin/new_connection', $error);
                // }
                // else
                // {
                //         $data = array('upload_data' => $this->upload->data());

                //         $this->load->view('admin/new_connection', $data);
                // }
        
 	$u=$this->am->check_emp_no($_POST['emp_no']);
 	if ($this->form_validation->run() && !$u) 
 	{
 		$data=$this->input->post();
 		$mm=$this->am->addNewEmployee($data);
 		if($mm){
 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:green;'>New Employee Detail Added Successfully.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';

 	    $m['emp_type']=$this->am->show_emp_type();
 		$this->load->view("admin/employees", $m);
 	}else{
 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:red;'>New Employee Add Failed..!</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
			 $m['emp_type']=$this->am->show_emp_type();
 		     $this->load->view("admin/employees", $m);
	 	}
	}else{
		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:red;'>New Employee Add Failed..!</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
		$m['emp_type']=$this->am->show_emp_type();
 		$this->load->view("admin/employees", $m);
	 }
 }
 }

 public function dateWisePaymentReceives()
 {
 	$this->load->view("reports/DateWisePaymentReceives");
 }
 public function DateWisePaymentSearch()
 {	$this->load->model('admin/adminModel','am');
 	if (isset($_POST['sub'])) {
 		$data=$this->input->post();
 		$m['paid_bills_detail']=$this->am->DateWisePaymentSearch($data);
 		$this->load->view("reports/DateWisePaymentReceives", $m);
 	}
 	
 }
}



?>