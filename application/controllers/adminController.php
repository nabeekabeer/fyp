<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminController extends CI_Controller
{

	 public function __construct()
        {
                parent::__construct();
                //if (!$this->session->userdata('log')){
                  //  return redirect('myController/login');               
               // }
        }
 public function index()
 {
 	unset($_SESSION['login_data']);
 	$this->load->helper("url");
	$this->load->helper("html");
 	//$this->load->view("logInForm");
	$this->load->view("homepage/homepage");
 }
  //consumer
public function consumerLedger()
{
	$this->load->view("homepage/consumerLedger");
}
public function searchConLedger()
{	
	$this->load->model('admin/adminModel','am');
	if(isset($_POST['con_sub'])){
			$con_new_num=$_POST['con_new_num'];
		 	$id=$this->am->searchConLedger($con_new_num);
		 	if ($id!=0) {
		 	$m['ledger']=$this->am->showConsumerLedger($id);
		 	$this->load->view("homepage/consumerLedger",$m);

		 	}else{
		 	$m['ledger']=0;
		 	 $this->load->view("homepage/showAllConnectionOfaConsumer",$m);
		 	}
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
public function searchAllConecctionOfaConsumer()
{	
	$this->load->model('admin/adminModel','am');
	if(isset($_POST['con_sub'])){
			$cnic=$_POST['con_cnic'];
		 	$id=$this->am->showAllConOfaConsumer($cnic);
		 	if ($id!=0) {
		 	$m['allConnection']=$this->am->showAllConnectionsOfaConsumer($id);
		 	$this->load->view("homepage/showAllConnectionOfaConsumer",$m);

		 	}else{
		 	$m['allConnection']=0;
		 	 $this->load->view("homepage/showAllConnectionOfaConsumer",$m);
		 	}
	}
}
public function showAllConnectionOfaConsumer()
{
	$this->load->model('admin/adminModel','am');
	$this->load->view("homepage/showAllConnectionOfaConsumer");
}
  public function graphConsunedU()
 {
 	
 	$this->load->model('admin/adminModel','am');
 	$message=$this->am->unitConsumptionGraph();
 	print json_encode($message);
 	
 }
  public function login(){
 	$this->load->view("registration/login");
 }
 public function printBill()
 {
	$this->load->model('admin/adminModel','am');
	if (isset($_POST['cn'])) {
		 $mee['mes']=$this->am->print_bill($_POST['cn']);
 	     $this->load->view("homepage/print_bill",$mee);

	}else{
 	
 	$this->load->view("homepage/print_bill");
 }
 }
 public function newRegistration(){
 	$this->load->model('admin/adminModel','am');
 	$m['emp_type_detail']=$this->am->show_emptype();
 	$this->load->view("registration/new_registration",$m);
 }



 public function AddRegistration(){
 	$this->load->model('admin/adminModel','am');
 	$this->form_validation->set_rules("user_name","User Name","required|trim");
 	$this->form_validation->set_rules("emp_number","Employee Number","required|trim");
 	$this->form_validation->set_rules("first_name","First Name","required|trim");
 	$this->form_validation->set_rules("last_name","Last Name","required|trim");
 	$this->form_validation->set_rules("password","Password","required|trim");
 	$this->form_validation->set_rules("re_password","Password","required|trim");
 	$this->form_validation->set_error_delimiters("<p class='text-danger' style='color: red;'></p>");
 	if ($this->form_validation->run()) 
 	{
 		$data=$this->input->post();
 		$this->load->model('admin/adminModel','am');
 		$m=$this->am->newRegister($data);
 		if ($m) {
 			$this->load->model('admin/adminModel','am');
		 	$m['total_connection']=$this->amd->no_of_connection();
			$m['total_unit_consumed']=$this->amd->consumed_unit_in_current_month();
			$m['connection_detail']=$this->amd->connection_detail();
			$this->load->view("admin/home",$m);
 		}else{
 			$m['mge']="<div class='center' style='color: red;'>Incorrect name or employee number or You are Not Authorize to register any account.</div>";
 			$m['emp_type_detail']=$this->am->show_emptype();
 	        $this->load->view('registration/new_registration',$m);
 		}
 	}else{
 	$m['emp_type_detail']=$this->am->show_emptype();
 	$this->load->view('registration/new_registration',$m); 
 	}
 }

 public function forgot_password(){
 	$this->load->view("registration/password_lost");
 }

 public function home_admin()
 {
 	$this->load->helper("url");
	$this->load->helper("html");
	$this->form_validation->set_rules("user_name","User Name","required|trim");
 	$this->form_validation->set_rules("password","Password","required|trim");
 	$this->form_validation->set_error_delimiters("<p class='text-danger' style='color: red;'></p>");
 	if($this->form_validation->run()){
	$login_data=$this->input->post();
	$this->load->model('admin/adminModel','amd');
	$login=$this->amd->loginAccount($login_data);
	if ($login) {
		$this->load->model('admin/adminModel','amd');
	 	$m['connection_detail']=$this->amd->connection_detail();
	 	$m['total_connection']=$this->amd->no_of_connection();
	    $m['total_unit_consumed']=$this->amd->consumed_unit_in_current_month();
		$this->load->view("admin/home",$m);

	}else{
		$message['msg']="<div class='center' style='color: red;'>User Name and Password doesn't match...!</div>";
		$this->load->view("registration/login",$message);
	}}else{
		$this->load->view("registration/login");
	}
 }
 public function tariffs()
 {
 	$m['controll']=$this;
 	$m['model']=$this->load->model('admin/adminModel');
 	$this->load->model('admin/adminModel','amd');
 	$m['con_ty']=$this->amd->conType_det();
 	$m['MyController']=$this; 
	$this->load->view("homepage/show_tariff",$m);
 	
 }
 public function show_conection_type($id)
 {
 	$this->load->model('admin/adminModel','amd');
 	$m['tariffs']=$this->amd->show_tariffs($id);
 	//print_r($m['tariffs']);exit;
 	return $m['tariffs'];
 }
}?>