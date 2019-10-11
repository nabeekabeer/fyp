<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class BillController extends CI_Controller
{


	 public function __construct()
        {
                parent::__construct();
                if (!$this->session->userdata('login_data')){
                    return redirect('adminController/login');               
                }
        }
public function create_bill()
{
	$this->load->view("admin/create_bill");
}
public function collect_bill()
{
	$this->load->model('admin/billModel','bm');
	$m['points']=$this->bm->showAllCollectionPoints();
	$this->load->view("admin/billCollectionForm",$m);
	
}
public function billCollectionForm()
{
	$this->load->model('admin/billModel','bm');
	$m['points']=$this->bm->showAllCollectionPoints();
	$this->load->view("admin/billCollectionForm",$m);
}
public function collection_points()
{
	$this->load->model('admin/billModel','bm');
	$m['points']=$this->bm->showAllCollectionPoints();
	$this->load->view("admin/bill_collection_points",$m);
	
}
public function updateCollectionPoint1()
{
	$this->load->model('admin/billModel','bm');
	$this->form_validation->set_rules("receiving_point_name","Point Name","required|trim");
 	$this->form_validation->set_error_delimiters("<p class='text-danger' style='color: red;'></p>");
 	$m['points']=$this->bm->showAllCollectionPoints();
 	if ($this->form_validation->run()) 
 	{
 		$data=$this->input->post();
 		$mm=$this->bm->updateCollectionPoint($data);
 		if($mm){
 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:green;'>Bill Collection Point Edited Successfully.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
		$m['points']=$this->bm->showAllCollectionPoints();
 		$this->load->view("admin/bill_collection_points", $m);
 	}else{
 		$this->load->view("admin/bill_collection_points", $m);
 	}
}else{
 		$this->load->view("admin/bill_collection_points",$m);
 	}
}
public function updateCollectionPoints()
{
	$this->load->model('admin/billModel','bm');
	$m['points']=$this->bm->showAllCollectionPoints();

	$m['id']=$_POST['id'];
	$m['rpname']=$_POST['receiving_point_name'];
	$this->load->view("admin/bill_collection_points", $m);
}
public function deleteColloctionPoint($id)
{
	$this->load->model('admin/billModel','bm');
	$del=$this->bm->deleteCollectionPoint($id);
	if ($del) {
		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:red;'>Collection Point Deleted Successfully.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
		$m['points']=$this->bm->showAllCollectionPoints();
 		$this->load->view("admin/bill_collection_points", $m);
	}else{
		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:red;'>Failed to delete.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
		$m['points']=$this->bm->showAllCollectionPoints();
 		$this->load->view("admin/bill_collection_points", $m);
	}
}
public function addRecievingPoint()
{
	$this->load->model('admin/billModel','bm');
	$this->form_validation->set_rules("receiving_point_name","Point Name","required|trim");
 	//$this->form_validation->set_rules("cheque_no","Cheque No","required|trim");
 	$this->form_validation->set_error_delimiters("<p class='text-danger' style='color: red;'></p>");
 	$m['points']=$this->bm->showAllCollectionPoints();
 	if ($this->form_validation->run()) 
 	{
 		$data=$this->input->post();
 		$mm=$this->bm->newReceivingPoint($data);
 		if($mm){
 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:green;'>New Bill Collection Point Registered Successfully.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
		$m['points']=$this->bm->showAllCollectionPoints();
 		$this->load->view("admin/bill_collection_points", $m);
 	}else{
 		$m['mge']='<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:red;'>New Bill Collection Point Register Failed. Data Already Exit...!</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div>';
		$m['points']=$this->bm->showAllCollectionPoints();
 		$this->load->view("admin/bill_collection_points", $m);
 	}
}else{
 		$this->load->view("admin/bill_collection_points",$m);
 	}
 }
public function newReading(){
    $this->load->helper("url");
	$this->load->helper("html");
	 $m['t']=false;
 	//$this->load->view("logInForm");
	$this->load->view("admin/newReading",$m);
   }
public function addNewReading()
{  
	$this->load->model('admin/billModel','bm');
    if(isset($_POST['reading_scroll'])){
	 $this->form_validation->set_rules("new_reading","New Reading","required|trim");
	 $this->form_validation->set_rules("reading_date","Reading Date","required|trim");
	 $this->form_validation->set_rules("bill_number","Bill Number","required|trim");
	 //$this->form_validation->set_rules("bill4month","Bill for the Month","required|trim");
	 $this->form_validation->set_rules("bill4year","Year","required|trim");
	 $this->form_validation->set_error_delimiters("<p class='text-danger' style='color: red;'></p>");
	   	if ($this->form_validation->run()) 
	 	{
	 		$data=$this->input->post();
	 		$mm=$this->bm->readingAdd($data);
	 		if($mm){
	 		$m['mge']='<div class="container" id="card-header-msg">
				 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
							    <div class="modal-header">'."
							            <b style='color:green;'>Reading Added Succesfully</b>".'
						        	<button class="close" type="button" id="closeBtn">
						              <span>×</span>
						            </button>
						        </div>
						    </div>
						 </div>';
					unset($_SESSION['cons_new_num']);
			        $m['t']=false;
				 	$this->load->view('admin/newReading',$m); 
			 	 }else{
			 	 	$m['mge']='<div class="container" id="card-header-msg">
				 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
							    <div class="modal-header">'."
							            <b style='color:red;'>Please check month and year</b>".'
						        	<button class="close" type="button" id="closeBtn">
						              <span>×</span>
						            </button>
						        </div>
						    </div>
						 </div>';
					        $m['t']=true;
						 	$m['conn_reading_qry']=$this->bm->select_conn_reading($_SESSION['cons_new_num']);
						 	$mid=$this->bm->select_conn_Id($_SESSION['cons_new_num']);
			                $m['last_reading']=$this->bm->select_last_reading($mid);
						 	//unset($_SESSION['cons_new_num']);
				 	        $this->load->view('admin/newReading',$m); 
		 	}
		}else{
			$m['t']=true;
			$m['conn_reading_qry']=$this->bm->select_conn_reading($_SESSION['cons_new_num']);
			$mid=$this->bm->select_conn_Id($_SESSION['cons_new_num']);
			$m['last_reading']=$this->bm->select_last_reading($mid);
		 	$this->load->view("admin/newReading", $m);
		 }
   }else{
   	        $m['t']=false;
   	        unset($_SESSION['cons_new_num']);
		 	$this->load->view("admin/newReading", $m);
        }
}
public function viewBill($id)
{				$this->load->model('admin/billModel','bm');
	            $m['t']=true;
			 	$m['bank_charge']=$this->bm->select_bank_charge();
			 	$m['late_pay_charge']=$this->bm->select_late_pay_charge();
			 	$m['conn_reading_qry']=$this->bm->view_bill_reading($id);
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
public function editReading()
{
	    $this->load->model('admin/billModel','bm');
	    $data=$this->input->post();
	 	$mm=$this->bm->readingUpdate($data);
	 		if($mm){
	 		$m['mge']='<div class="container" id="card-header-msg">
				 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
							    <div class="modal-header">'."
							            <b style='color:green;'>Changes Saved Succesfully</b>".'
						        	<button class="close" type="button" id="closeBtn">
						              <span>×</span>
						            </button>
						        </div>
						    </div>
						 </div>'; 
				 	$this->load->view("syncAndroidData/viewuser",$m);
			 	 }else{
				 $m['mge']='<div class="container" id="card-header-msg">
				 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
							    <div class="modal-header">'."
							            <b style='color:red;'>Save Failed. Try again please.</b>".'
						        	<button class="close" type="button" id="closeBtn">
						              <span>×</span>
						            </button>
						        </div>
						    </div>
						 </div>';
				 	$this->load->view("syncAndroidData/viewuser",$m);
		 	}
}
public function editBill($id)
{
	$this->load->model('admin/billModel','bm');
 	$m['readings']=$this->bm->select_to_edit_readings($id);
	$this->load->view('admin/editBill',$m);
}
public function searchConnByCNumToCreateBill()
   { 
   	 $this->load->model('admin/billModel','bm');
   	if (isset($_POST['submit_Search_showBill'])) {
	$_SESSION['cons_new_num']=$this->input->post('cons_new_num');
 	$u=$this->bm->check_connnection_cn($_SESSION['cons_new_num']);
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
			 	 unset($_SESSION['cons_new_num']);
			 	 $this->load->view('admin/create_bill',$m); 
			  }else{
			 	$m['t']=true;
			 	$m['bank_charge']=$this->bm->select_bank_charge();
			 	$m['conn_reading_qry']=$this->bm->select_conn_reading($_SESSION['cons_new_num']);
			 	$mid=$this->bm->select_conn_Id($_SESSION['cons_new_num']);
			 	$m['last_reading']=$this->bm->select_last_reading($mid); 
			 	$m['readings']= $this->bm->select_readings($mid);
			 	$m['bill_rates']= $this->bm->select_unit_rates($mid);
				 $m['mes']=$this->bm->print_bill($_SESSION['cons_new_num']);
				 unset($_SESSION['cons_new_num']);
				$this->load->view('admin/create_bill',$m);

					
			 	
			 	//$this->load->view('admin/create_bill',$m); 
		    }
		 }else{
		 	$m['t']=false;
		 	unset($_SESSION['cons_new_num']);
		 	$this->load->view('admin/create_bill',$m); 
		 }
	}

   public function searchConnByCNum()
   { 
 	$this->load->model('admin/billModel','bm');
	if(isset($_POST['submit_SearchCN'])){
	$_SESSION['cons_new_num']=$this->input->post('cons_new_num');
 	$u=$this->bm->check_connnection_cn($_SESSION['cons_new_num']);
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
			 	 unset($_SESSION['cons_new_num']);
			 	 $this->load->view('admin/newReading',$m); 
			  }else{
			  	$n=$this->bm->check_connnection_status($_SESSION['cons_new_num']);
			  	if($n){
			  			$m['mge']= '<div class="container" id="card-header-msg">
			 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
						    <div class="modal-header">'."
						            <b style='color:red;'>This Consumer's ".$_SESSION['cons_new_num']." connection has been closed.</b>".'
					        	<button class="close" type="button" id="closeBtn">
					              <span>×</span>
					            </button>
					        </div>
					    </div>
					 </div><br>';
			 	 $m['t']=false;
			 	 unset($_SESSION['cons_new_num']);
			 	 $this->load->view('admin/newReading',$m); 
			  	}else{
			 	$m['t']=true;
			 	$m['conn_reading_qry']=$this->bm->select_conn_reading($_SESSION['cons_new_num']);
			 	$mid=$this->bm->select_conn_Id($_SESSION['cons_new_num']);
			 	$m['last_reading']=$this->bm->select_last_reading($mid);
			 	$this->load->view('admin/newReading',$m); 
		    }}
		 }else{
		 	$m['t']=false;
		 	unset($_SESSION['cons_new_num']);
		 	$this->load->view('admin/newReading',$m); 
		 }
   }
   public function updatePaidBillsDetail($id)
   {
   	$this->load->model('admin/billModel','bm');
   	$m['paid_bills_edit']=$this->bm->showPaymentDetail($id);
   	$m['points']=$this->bm->showAllCollectionPoints();
   	$this->load->view('admin/editBillPaymentReceives',$m);
   }
   public function paymentEdit()
   {
   		$this->load->model('admin/billModel','bm');
   		
   		   $data=$this->input->post();
	 		//print_r($data);exit;
	 		$mm=$this->bm->billpaymentEdit($data);
	 		if ($mm) {
	 			$m['mge']='<div class="container" id="card-header-msg">
				 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
							    <div class="modal-header">'."
							            <b style='color:green;'>Changes Saved Succesfully.</b>".'
						        	<button class="close" type="button" id="closeBtn">
						              <span>×</span>
						            </button>
						        </div>
						    </div>
						 </div>';
	 		}else{
	 			$m['mge']='<div class="container" id="card-header-msg">
				 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
							    <div class="modal-header">'."
							            <b style='color:red;'>Save Failed. Try again please.</b>".'
						        	<button class="close" type="button" id="closeBtn">
						              <span>×</span>
						            </button>
						        </div>
						    </div>
						 </div>';
	 		}
	 	$m['paid_bills_detail']=$this->bm->showAllPaymentDetails();
		$this->load->view('admin/showAllPaymentReceives',$m);
   }
   public function showAllPaymentReceives()
   {
   		$this->load->model('admin/billModel','bm');
   		$m['paid_bills_detail']=$this->bm->showAllPaymentDetails();
		$this->load->view('admin/showAllPaymentReceives',$m); 


   }
   public function showAllPaymentReceives1()
   {
   		$this->load->model('admin/billModel','bm');
   		$m['paid_bills_detail']=$this->bm->showAllPaymentDetails();
		$this->load->view('admin/showAllPaymentReceives1',$m); 


   }
   public function billPayment()
   {
   	$this->load->model('admin/billModel','bm');
    //if(isset($_POST['pay_bill'])){
	 $this->form_validation->set_rules("bill_collection_point","bill collection point","required|trim");
	 $this->form_validation->set_rules("bill_no","bill no","required|trim");
	 $this->form_validation->set_rules("bill_paid_date","bill paid date","required|trim");
	 $this->form_validation->set_rules("paid_amount","paid amount","required|trim");
	
	 $this->form_validation->set_error_delimiters("<p class='text-danger' style='color: red;'></p>");
	   	if ($this->form_validation->run()) 
	 	{
	 		$data=$this->input->post();
	 		//print_r($data);exit;
	 		$mm=$this->bm->billpayment($data);
	 		if($mm){
	 		$m['mge']='<div class="container" id="card-header-msg">
				 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
							    <div class="modal-header">'."
							            <b style='color:green;'>Payment Added Succesfully</b>".'
						        	<button class="close" type="button" id="closeBtn">
						              <span>×</span>
						            </button>
						        </div>
						    </div>
						 </div>';
					//unset($_POST);
			        $m['t']=false;
			        $m['points']=$this->bm->showAllCollectionPoints();
				 	$this->load->view('admin/billCollectionForm',$m); 
			 	 }else{
					        $m['t']=true;
						 	$m['mge']='<div class="container" id="card-header-msg">
				 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
							    <div class="modal-header">'."
							            <b style='color:red;'>Failed to add please check bill number and amount.</b>".'
						        	<button class="close" type="button" id="closeBtn">
						              <span>×</span>
						            </button>
						        </div>
						    </div>
						 </div>';
					//unset($_POST);
						 $m['points']=$this->bm->showAllCollectionPoints();
				 	     $this->load->view('admin/billCollectionForm',$m); 
		 				}
		}else{
			$data=$this->input->post();
	 		//print_r($data);exit;
			$m['t']=true;
			$m['points']=$this->bm->showAllCollectionPoints();
		 	$this->load->view("admin/billCollectionForm", $m);
		 }
   // }else{
   // 	        $m['t']=false;
   // 	        $m['points']=$this->bm->showAllCollectionPoints();
		 // 	$this->load->view("admin/billCollectionForm", $m);
   //      }
   }//function
   public function add_connection_load()
   {
   	$this->load->model('admin/billModel','bm');
   	//($_POST);exit;
   	        $data=$this->input->post();
	 		$mm=$this->bm->connection_load_charge($data);
	 		if($mm){
	 		$m['mge']='<div class="container" id="card-header-msg">
				 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
							    <div class="modal-header">'."
							            <b style='color:green;'>Reading Added Succesfully</b>".'
						        	<button class="close" type="button" id="closeBtn">
						              <span>×</span>
						            </button>
						        </div>
						    </div>
						 </div>';
					unset($_SESSION['cons_new_num']);
			        $m['t']=false;
				 	$this->load->view('admin/newReading',$m); 
			 	 }else{
					 $m['t']=true;
					 $m['mge']='<div class="container" id="card-header-msg">
				 	 		<div style="background: #dafecb;  box-shadow: 5px 10px #888888; border-radius:5px;" class="modal-content">
							    <div class="modal-header">'."
							            <b style='color:red;'>Operation Failed...!</b>".'
						        	<button class="close" type="button" id="closeBtn">
						              <span>×</span>
						            </button>
						        </div>
						    </div>
						 </div>';
					 $m['conn_reading_qry']=$this->bm->select_conn_reading($_SESSION['cons_new_num']);
					 $mid=$this->bm->select_conn_Id($_SESSION['cons_new_num']);
			         $m['last_reading']=$this->bm->select_last_reading($mid);
						 	//unset($_SESSION['cons_new_num']);
				 	 $this->load->view('admin/newReading',$m); 
		 	}
   }
}//class
?>