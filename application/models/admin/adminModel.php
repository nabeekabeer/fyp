<?php 
/**
* 
*/
class AdminModel extends CI_Model
{
	public function loginAccount($value)
	{
		$uname=$value['user_name'];
		$pass=$value['password'];
		$select_login=$this->db->query("SELECT * FROM login_table l inner join employee_table e on e.emp_id=l.emp_id WHERE l.user_name='$uname' AND l.password='$pass'");
		$qq=$select_login->num_rows();
		if ($qq>0) {
			$data=$select_login->result_array();
			$_SESSION['login_data']=$data;
			return true;
		}else{
			return false;
		}
		

		
	}
	public function updateLoginInfo($data)
	{
	$login_id=$data['login_id'];
	$user_name=$data['user_name'];
	$password=$data['password'];
	$qry=$this->db->query("UPDATE login_table SET user_name='$user_name', password='$password' WHERE login_id ='$login_id'");
	if ($qry) {
		$select_login=$this->db->query("SELECT * FROM login_table l inner join employee_table e on e.emp_id=l.emp_id WHERE l.user_name='$user_name' AND l.password='$password'");
		$qq=$select_login->num_rows();
		if ($qq>0) {
			$data=$select_login->result_array();
			$_SESSION['login_data']=$data;
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
	
    }//function
	public function no_of_amount_received()
	{
		$select_pamount=$this->db->query("SELECT sum(`paid_amount`) as `paid_amount` FROM `payment_table`");
		$qq=$select_pamount->num_rows();
		if ($qq>0) {
			$data=$select_pamount->result_array();
			return $data[0]['paid_amount'];
		}else{
			return 0;
		}
	}
	public function no_of_emp()
	{
		$query=$this->db->query("SELECT count(emp_id) as empId from employee_table ");
        $re=$query->result_array();
        return $re[0]['empId'];
	}
	public function get_dataArea($value)
       {
        $query=$this->db->query("SELECT * from area_table a inner join connection_table c on c.con_area_id=a.area_id inner join consumer_table t on c.con_consumer_id=t.consumer_id inner join reading_table r on c.connection_id = r.reading_conn_id where area_id='$value'");
        $r=$query->num_rows();
        if($r>0):
        $re=$query->result_array();
        return $re;
    else:
    	return 0;
    endif;

       }
	public function show_meter_readers()
	{
		$select_meter_readers=$this->db->query("SELECT * FROM employee_table e inner join employee_type_table et on e.emp_emp_type_id=et.emp_type_id WHERE et.emp_type_name like 'meter reader'");
	if ($select_meter_readers) {
	return	$qq=$select_meter_readers->result_array();
		//print_r($qq); exit;
	}
	}
	public function meterReaderPlacement($data)
	{
	$area_id=$data['area_id'];
	$emp_id=$data['emp_id'];
	$asign_role=$data['asign_role'];
	$asign_date=$data['asign_date'];
	
	$select_area=$this->db->query("SELECT count(area_id) as area_id FROM `emp_area_asign_table` WHERE area_id ='$area_id'");
	$row=$select_area->num_rows();
	   if($row<3){
		   	$row1=$select_area->result_array();
		   	$areas=$row1[0]['area_id'];
		   	if($areas>3){
			   	return false;
			   }else{
				   	$select_emp_id=$this->db->query("SELECT * FROM `emp_area_asign_table` WHERE employee_id ='$emp_id'");
				   	$row2=$select_emp_id->num_rows();
				   	if($row2>0){
				   		return false;
				   	}else{
					   $ins=$this->db->query("INSERT INTO `emp_area_asign_table`( `employee_id`, `area_id`, `asign_date`, `asign_role`) VALUES ('$emp_id','$area_id','$asign_date','$asign_role')");
					return true;	
				   }
			   } 
	    }else{
		return false;
	    }
}//function
public function deleteAsignedMeterReader($id)
{
	$this->db->query("DELETE FROM `emp_area_asign_table` WHERE emp_area_asign_id='$id'");
}

public function searchConLedger($con_consumer_new_no)
{
	$search=$this->db->query("SELECT connection_id FROM connection_table where con_consumer_new_no='$con_consumer_new_no'");
	$row=$search->num_rows();
	if($row>0){
		 $data=$search->result_array();
		 $id=$data[0]['connection_id'];
		 return $id;
	}else{
		return 0;
	}
}
public function showConsumerLedger($id)
{
	$search=$this->db->query("SELECT * FROM consumer_table n inner join connection_table c on n.consumer_id=c.con_consumer_id  inner join area_table a on a.area_id=c.con_area_id inner join connection_type_table t on c.con_con_type_id=t.con_type_id inner join reading_history_table r on c.connection_id= r.conn_rhistory_id where c.connection_id='$id' order by reading_history_id DESC");
	$row=$search->num_rows();
	if($row>0){
		 $data=$search->result_array();
		 //$id=$data[0]['consumer_id'];
		 return $data;
	}else{
		return 0;
	}	
}
public function showAllConOfaConsumer($cnic)
{
	$search=$this->db->query("SELECT consumer_id FROM consumer_table where cons_cnic='$cnic'");
	$row=$search->num_rows();
	if($row>0){
		 $data=$search->result_array();
		 $id=$data[0]['consumer_id'];
		 return $id;
	}else{
		return 0;
	}
}
public function showAllConnectionsOfaConsumer($id)
{
	$search=$this->db->query("SELECT * FROM consumer_table n inner join connection_table c on n.consumer_id=c.con_consumer_id inner join area_table a on a.area_id=c.con_area_id inner join connection_type_table t on c.con_con_type_id=t.con_type_id where n.consumer_id='$id'");
	$row=$search->num_rows();
	if($row>0){
		 $data=$search->result_array();
		 //$id=$data[0]['consumer_id'];
		 return $data;
	}else{
		return 0;
	}	
}
public function meterReaderList()
{
	$select_meter_readers=$this->db->query("SELECT * FROM `emp_area_asign_table` eea inner join employee_table e on eea.`employee_id`=e.emp_id inner join area_table a on eea.`area_id` = a.area_id");
	$row=$select_meter_readers->num_rows();
	if($row>0){
		return $data=$select_meter_readers->result_array();
	}else{
		return 0;
	}
}
public function no_of_meterReader()
{
	$select_meter_readers=$this->db->query("SELECT count(eea.employee_id) as empNo FROM `emp_area_asign_table` eea inner join employee_table e on eea.`employee_id`=e.emp_id inner join area_table a on eea.`area_id` = a.area_id");
	$row=$select_meter_readers->num_rows();
	if($row>0){
		 $data=$select_meter_readers->result_array();
		 return $data[0]['empNo'];
	}else{
		return 0;
	}
}
public function newRegister($data){
	$fname=$data['first_name'];
	$lname=$data['last_name'];
	$uname=$data['user_name'];
	$emp_type=$data['emp_type'];
	$empNo=$data['emp_number'];
	$pass=$data['password'];

	$select_empt_id=$this->db->query("SELECT emp_type_id FROM `employee_type_table` WHERE `emp_type_name`='Clerk'");
	if ($select_empt_id) {
		$qq=$select_empt_id->result_array();
	    $empt_id=$qq[0]['emp_type_id'];
	   if($empt_id==$emp_type){
		$emp=$this->db->query("SELECT emp_id FROM `employee_table` WHERE `emp_fname`='$fname' AND `emp_lname`='$lname' AND `emp_number`='$empNo'");
		if($emp){
		$row=$emp->num_rows();
		if ($row>0) {
			$aremp_id=$emp->result_array();
		    $empId=$aremp_id[0]['emp_id'];
		    $empIdLogin=$this->db->query("SELECT emp_id FROM `login_table` WHERE `emp_id`='$empId'");
		    $rowlogin=$empIdLogin->num_rows();
		    if($rowlogin>0)
		    { return false;}
			else{
			  return $this->db->insert('login_table',['user_name'=>$uname,'password'=>$pass,'emp_id'=>$empId]);
			}
		}else{
			return false;
		}
	   }else{
	   	return false;
	   }
	}else{
		return false;
	}}else{
		return false;
	}
	
}
//complaints
public function deleteComplaint($id)
{
	$sql="DELETE FROM `complaint_table` WHERE comp_id='$id'";
	return $this->db->query($sql);
}
public function showAllComplaint()
{
	$sql = "SELECT * FROM `complaint_table` m inner join connection_table c on m.`con_id`=c.connection_id inner join consumer_table n on c.con_consumer_id=n.consumer_id";
	$q=$this->db->query($sql);
	$complaints=$q->result_array();
	return $complaints;
}
public function addComplaint($data)
{
	$name=$data['name'];
	$cons_new_number=$data['cons_new_number'];
	$email=$data['email'];
	$subject=$data['subject'];
	$message=$data['message'];

	$q=$this->db->query("SELECT connection_id FROM connection_table WHERE con_consumer_new_no='$cons_new_number'");
	$qq=$q->num_rows();
	if($q && $qq>0){
		$connId=$q->result_array();
		$con_id=$connId[0]['connection_id'];
		$complaint=$this->db->query("INSERT INTO `complaint_table`( `comp_name`, `comp_email`, `comp_subject`, `comp_message`, con_id) VALUES ('$name','$email','$subject','$message','$con_id')");
	if ($complaint) 
		return true;
	else
		return false;
	}else{
		return false;
	}

	
}
//reports
public function monthWiseElectricityConsumption1($v)
{
	$month=$v['month'];
	$year=$v['year']; 
	$sql = "SELECT * FROM `reading_history_table` r inner join connection_table c on r.`conn_rhistory_id`=c.connection_id inner join consumer_table n on n.consumer_id=c.con_consumer_id inner join area_table a on a.area_id=c.con_area_id WHERE (`rh_billing_month` like '%$month%') and (`rh_billing_month` like '%$year%')";
	$q=$this->db->query($sql);
	$rows=$q->num_rows();
	if($rows>0):
	 $defList=$q->result_array();
	 else: $defList=0;
	 endif;
	return $defList;
}
public function reports()
{
	$q=$this->db->query("select * from area_table");
	$qq=$q->num_rows();
	return $qq;
}
public function DateWisePaymentSearch($v)
{
	$to_date=$v['to_date'];
	$from_date=$v['from_date']; 
	$sql = "SELECT * FROM `payment_table` p inner join connection_table c on p.`payee_conn_id`=c.connection_id inner join consumer_table n on n.consumer_id=c.con_consumer_id WHERE p.`payment_date` between '$from_date' and '$to_date'";
	$q=$this->db->query($sql);
	$rows=$q->num_rows();
	if($rows>0):
	 $defList=$q->result_array();
	 else: $defList=0;
	 endif;
	return $defList;
}
public function unitConsumptionGraph()
{
	$sql= "SELECT con_consumer_new_no, (new_reading-last_reading) as new_reading FROM reading_table inner join connection_table on connection_id=reading_conn_id ORDER BY reading_id";
    $q=$this->db->query($sql);
	$de=$q->result_array();
	return $de;
    //print json_encode($data);
}
public function areawiseConsumerChart()
{
	$sql= "SELECT count(c.con_area_id) as total_consumer, a.area_name FROM connection_table c join area_table a on c.con_area_id=a.area_id group by a.area_id";
    $q=$this->db->query($sql);
	$de=$q->result_array();
	return $de;
    //print json_encode($data);
}
public function defualter_list()
{
	$sql = "SELECT * FROM `arrear_table` a inner join connection_table c on a.`arr_connection_id`=c.connection_id inner join consumer_table n on c.con_consumer_id=n.consumer_id inner join area_table r on r.area_id=c.con_area_id where arrear_amount !=0 ";
	$q=$this->db->query($sql);
	$rows=$q->num_rows();
	if($rows>0):
	 $defList=$q->result_array();
	 else: $defList=0;
	 endif;
	return $defList;
}
public function print_bill($va)
{
	$sql="SELECT * FROM reading_history_table r inner join connection_table c on r.conn_rhistory_id=c.connection_id  where c.con_consumer_new_no='$va' order by reading_history_id DESC limit 5";
	$qry=$this->db->query($sql);
	$data=$qry->result_array();
	return $data;
}

public function check_connnection_cn($v)
{
	$qry=$this->db->query("select * from connection_table where con_consumer_new_no='$v' ");
	$data=$qry->num_rows();
	if($data>0){
		return true;
	}
	else{
    return false;
	}
}
public function select_conn_to_update($va)
{
	$qry=$this->db->query("select * from connection_table where con_consumer_new_no='$va' ");
	$data=$qry->result_array();
	return $data;
}
public function updateConnDetails($va)
{
	$uid=$va['connection_idd'];
	$cons_area=$va['cons_area'];
	$cons_old_number=$va['cons_old_number'];
	$cons_conn_type=$va['cons_conn_type'];
	$cons_conn_date=$va['cons_conn_date'];
	$cons_meter_no=$va['cons_meter_no'];
	$cons_meter_type=$va['cons_meter_type'];
	$conn_status=$va['conn_status'];
	$qry=$this->db->query("UPDATE connection_table SET con_consumer_old_no='$cons_old_number', con_meter_number='$cons_meter_no', con_date='$cons_conn_date', con_con_type_id = '$cons_conn_type', cons_meter_type_id ='$cons_meter_type', con_area_id ='$cons_area', con_status ='$conn_status' WHERE connection_id ='$uid'");
	if ($qry) {
		return true;
	}else{
		return false;
	}
}
public function show_all_consumer()
{
		$q=$this->db->query("select * from consumer_table");
	    $qq=$q->result_array();
		return $qq;	
}
public function selectToUpdateConsumer($lu)
{
	$q=$this->db->query("select * from consumer_table where consumer_id=$lu");
	    $qq=$q->result_array();
		return $qq;
}
public function deleteConsumer($v)
{
	$qry=$this->db->query("delete from consumer_table where consumer_id=$v");
	if ($qry) {
	return true;
	}else{
		return false;
	}
}
public function updateConsumerDetails($va)
{
	$uid=$va['up_id'];
	$cons_fname=$va['cons_fname'];
	$cons_lname=$va['cons_lname'];
	$cons_fathername=$va['cons_fathername'];
	$cons_gender=$va['cons_gender'];
	$cons_dob=$va['cons_dob'];
	$cons_cnic1=$va['cons_cnic1'];
	$cons_phone=$va['cons_phone'];
	$cons_cellnumber=$va['cons_cellnumber'];
	$cons_permanent_address=$va['cons_permanent_address'];
	$cons_current_address=$va['cons_current_address'];
	$cons_email=$va['cons_email'];
	$qry=$this->db->query("UPDATE consumer_table SET cons_fname='$cons_fname', cons_lname='$cons_lname', cons_father_name ='$cons_fathername', cons_gender='$cons_gender', cons_dob='$cons_dob', cons_cnic ='$cons_cnic1', cons_phone_number='$cons_phone',cons_cell_number='$cons_cellnumber', cons_email ='$cons_email', cons_permanent_address='$cons_permanent_address', cons_current_address='$cons_current_address' WHERE consumer_id='$uid'");
	if ($qry) {
		return true;
	}else{
		return false;
	}
}
public function connection_detail()
{
	//$sql = "SELECT * FROM connection_table conc join consumer_table cons on conc.con_consumer_id = cons.consumer_id";
	$sql="SELECT cn.`con_consumer_old_no`,cn.`con_consumer_new_no`,cn.`con_meter_number`,cn.`con_date`,cn.`con_status`,cs.`cons_fname`,cs.`cons_lname`,cs.`cons_father_name`,cs.`cons_email`, cs.`cons_dob`,cs.`cons_gender`,cs.`cons_phone_number`,cs.`cons_cell_number`,cs.`cons_cnic`, cs.`cons_permanent_address`,cs.`cons_current_address`,ct.`con_type_name`, ar.`area_name` FROM (((connection_table cn INNER JOIN consumer_table cs ON cn.`con_consumer_id`= cs.consumer_id) INNER JOIN area_table ar ON ar.area_id = cn.`con_area_id`) INNER JOIN connection_type_table ct ON ct.con_type_id = cn.`con_con_type_id`) ORDER BY `cs`.`consumer_id` ASC";
	$q=$this->db->query($sql);
	$qq=$q->result_array();
	
		return $qq;
}

public function consumed_unit_in_current_month()
{
	$q=$this->db->query("SELECT sum(new_reading-last_reading ) as total_units FROM `reading_table`");
	$qq=$q->result_array();
	return $qq;
}
public function no_of_connection_closed()
{
	$q=$this->db->query("select connection_id from connection_table where con_status='1'");
	$qq=$q->num_rows();
	
		return $qq;
}
public function connection_closed_detail()
{
	//$sql = "SELECT * FROM connection_table conc join consumer_table cons on conc.con_consumer_id = cons.consumer_id";
	$sql="SELECT cn.`con_consumer_old_no`,cn.`con_consumer_new_no`,cn.`con_meter_number`,cn.`con_date`,cn.`con_status`,cs.`cons_fname`,cs.`cons_lname`,cs.`cons_father_name`,cs.`cons_email`, cs.`cons_dob`,cs.`cons_gender`,cs.`cons_phone_number`,cs.`cons_cell_number`,cs.`cons_cnic`, cs.`cons_permanent_address`,cs.`cons_current_address`,ct.`con_type_name`, ar.`area_name` FROM (((connection_table cn INNER JOIN consumer_table cs ON cn.`con_consumer_id`= cs.consumer_id) INNER JOIN area_table ar ON ar.area_id = cn.`con_area_id`) INNER JOIN connection_type_table ct ON ct.con_type_id = cn.`con_con_type_id`) WHERE con_status='1' ORDER BY `cs`.`consumer_id` ASC";
	$q=$this->db->query($sql);
	$qq=$q->result_array();
	
		return $qq;
}
public function no_of_connection()
{
	$q=$this->db->query("select connection_id from connection_table");
	$qq=$q->num_rows();
	
		return $qq;
}

public function show_one_consumer($id)
{
	$q=$this->db->query("SELECT * FROM `consumer_table` WHERE `consumer_id`='$id'");
	$qq=$q->result_array();
	return $qq;
}
public function newConsumerRegisteration($va)
{
	$cons_fname=$va['cons_fname'];
	$cons_lname=$va['cons_lname'];
	$cons_fathername=$va['cons_fathername'];
	$cons_gender=$va['cons_gender'];
	$cons_dob=$va['cons_dob'];
	$cons_cnic1=$va['cons_cnic1'];
	$cons_phone=$va['cons_phone'];
	$cons_cellnumber=$va['cons_cellnumber'];
	$cons_permanent_address=$va['cons_permanent_address'];
	$cons_current_address=$va['cons_current_address'];
	$cons_email=$va['cons_email'];

	$cons_area=$va['cons_area'];
	$cons_old_number=$va['cons_old_number'];
	$cons_new_number=$va['cons_new_number'];
	$cons_conn_type=$va['cons_conn_type'];
	$cons_conn_date=$va['cons_conn_date'];
	$cons_meter_no=$va['cons_meter_no'];
	$cons_meter_type=$va['cons_meter_type'];

	$q=$this->db->insert('consumer_table',['cons_fname'=>$cons_fname,'cons_lname'=>$cons_lname, 'cons_father_name'=>$cons_fathername,'cons_gender'=>$cons_gender,'cons_dob'=>$cons_dob,'cons_cnic'=>$cons_cnic1,'cons_phone_number'=>$cons_phone,'cons_cell_number'=>$cons_cellnumber,'cons_permanent_address'=>$cons_permanent_address,'cons_current_address'=>$cons_current_address,'cons_email'=>$cons_email]);
if ($q) {
	$qry=$this->db->query("SELECT consumer_id FROM consumer_table WHERE cons_cnic='$cons_cnic1'");
	$ins_id=$qry->row()->consumer_id;
	//$last_id=$ins_id['consumer_id'];

	$sql=$this->db->insert('connection_table',['con_consumer_old_no'=>$cons_old_number,'con_consumer_new_no'=>$cons_new_number, 'con_meter_number'=>$cons_meter_no,'con_date'=>$cons_conn_date,'con_con_type_id'=>$cons_conn_type,'cons_meter_type_id'=>$cons_meter_type, 'con_consumer_id'=>$ins_id,'con_area_id'=>$cons_area,'con_status'=>0]);

	if ($sql) {
		return true;
	}
	else{
		return false;
	}
}
else{
	return false;
}

	//print_r($va);
	//exit;
	
	
}
public function addConnectionToConsumer($va,$v)
{   $cons_cnic1=$v;
	$cons_area=$va['cons_area'];
	$cons_old_number=$va['cons_old_number'];
	$cons_new_number=$va['cons_new_number'];
	$cons_conn_type=$va['cons_conn_type'];
	$cons_conn_date=$va['cons_conn_date'];
	$cons_meter_no=$va['cons_meter_no'];
	$cons_meter_type=$va['cons_meter_type'];

	$qry=$this->db->query("SELECT consumer_id FROM consumer_table WHERE cons_cnic='$cons_cnic1'");
	$ins_id=$qry->row()->consumer_id;
	//$last_id=$ins_id['consumer_id'];

	$sql=$this->db->insert('connection_table',['con_consumer_old_no'=>$cons_old_number,'con_consumer_new_no'=>$cons_new_number, 'con_meter_number'=>$cons_meter_no,'con_date'=>$cons_conn_date,'con_con_type_id'=>$cons_conn_type,'cons_meter_type_id'=>$cons_meter_type, 'con_consumer_id'=>$ins_id,'con_area_id'=>$cons_area,'con_status'=>0]);

	if ($sql) {
		return true;
	}
	else{
		return false;
	}
}

public function check_con_cnic($v)
{
	//$cnic=$v['cons_cnic'];
	$cnic=$v;
	$qry=$this->db->query("select * from consumer_table where cons_cnic='$cnic' ");
	$data=$qry->num_rows();
	if($data>0){
		return true;
	}
	else{
    return false;
	}
}
//
public function conType_det()
{
	$qry=$this->db->query('select * from connection_type_table ');
	$data=$qry->result_array();
	return $data;
}

public function show_tariffs($id)
{   
	$qry=$this->db->query("select * from tariff_table where t_conn_type_id=$id");
	$data=$qry->result_array();
	return $data;
}
//meter type start
public function updateMeterType($va)
{
	$name=$va['meter_type_name'];
	$id=$va['meter_type_id'];
	$qry=$this->db->query("UPDATE meter_type_table SET meter_type_name='$name'  WHERE meter_type_id='$id'");
	if ($qry) {
		return true;
	}else{
		return false;
	}
}

public function selectToUpdateMeterType($id)
{
	$q=$this->db->query("select * from meter_type_table where meter_type_id='$id'");
	$qq=$q->result_array();
	return $qq;
}
public function show_metertype()
{
	$qry=$this->db->query('select * from meter_type_table');
	$data=$qry->result_array();
	return $data;
}
public function check_metertype($v)
{
	$name=$v['meter_type_name'];
	//$q=$this->db->get_where('area_table',['area_name'=>$name,'area_code'=>$code]);
	$q=$this->db->query("select * from meter_type_table where meter_type_name='$name'");
	$qq=$q->result_array();
	if ($qq) {
	return true;
	}else{
		return false;
	}
}
public function addNewMeterType($mt_data){
	$name=$mt_data['meter_type_name'];
	$q=$this->db->insert('meter_type_table',['meter_type_name'=>$name]);
	//$iid=mysqli_insert_id($q);
	//echo $iid;
	//exit;
	return $q;
  }
  public function delete_meterType($delId)
  {
  	$qry=$this->db->query("delete from meter_type_table where meter_type_id=$delId");
	if ($qry) {
	return true;
	}else{
		return false;
	}
  }
  //meter type close
//bill rates start
public function check_billratetype($v)
{
	$sel=$v['select_conn_type'];
	$sf=$v['unit_range_from'];
	$q=$this->db->query("select * from tariff_table where t_conn_type_id='$sel' and unit_range_from ='$sf'");
	$qq=$q->result_array();
	if ($qq) {
	return true;
	}else{
		return false;
	}
}
public function addBillRate($h)
{   
	$sel=$h['select_conn_type'];
	$sf=$h['unit_range_from'];
	$st=$h['unit_range_to'];
	$ur=$h['per_unit_rate'];
	$q=$this->db->insert('tariff_table',['unit_range_from'=>$sf,'unit_range_to'=>$st,'per_unit_rate'=>$ur,'t_conn_type_id'=>$sel]);
	return $q;
}

public function show_tariff()
{
	$qry=$this->db->query('select * from tariff_table t join connection_type_table c on t.t_conn_type_id= c.con_type_id');
	$data=$qry->result_array();
	return $data;
}
public function delete_tariff($did)
{
	$qry=$this->db->query("delete from tariff_table where tariff_id=$did");
	if ($qry) {
	return true;
	}else{
		return false;
	}
}
public function updateBill_Rate($va)
{
	$uid=$va['tariff_id'];
	$urt=$va['unit_range_to'];
	$urf=$va['unit_range_from'];
	$pur=$va['per_unit_rate'];
	$qry=$this->db->query("UPDATE tariff_table SET unit_range_from='$urf',unit_range_to='$urt',per_unit_rate='$pur'  WHERE tariff_id='$uid'");
	if ($qry) {
		return true;
	}else{
		return false;
	}
}

public function selectToUpdateBillRate($id)
{
	$q=$this->db->query("select * from tariff_table where tariff_id='$id'");
	$qq=$q->result_array();
	return $qq;
}
//bill rates close

//employee type start 
public function check_emptype($v)
{
	$name=$v['emp_type_name'];
	//$q=$this->db->get_where('area_table',['area_name'=>$name,'area_code'=>$code]);
	$q=$this->db->query("select * from employee_type_table where emp_type_name='$name'");
	$qq=$q->result_array();
	if ($qq) {
	return true;
	}else{
		return false;
	}
}
public function addNewEmpType($et_data){
	$name=$et_data['emp_type_name'];
	$q=$this->db->insert('employee_type_table',['emp_type_name'=>$name]);
	return $q;
  }
  public function show_emptype()
{
	$qry=$this->db->query('select * from employee_type_table');
	$data=$qry->result_array();
	return $data;
}
  public function delete_empType($val)
  {
  	$qry=$this->db->query("delete from employee_type_table where emp_type_id=$val");
	if ($qry) {
	return true;
	}else{
		return false;
	}
  }

public function updateEmpTypem($va)
{
	$name=$va['emp_type_name'];
	$id=$va['emp_type_id'];
	$qry=$this->db->query("UPDATE employee_type_table SET emp_type_name='$name'  WHERE emp_type_id='$id'");
	if ($qry) {
		return true;
	}else{
		return false;
	}
}

public function selectToUpdateEmpType($id)
{
	$q=$this->db->query("select * from employee_type_table where emp_type_id='$id'");
	$qq=$q->result_array();
	return $qq;
}


//employee type close

//area start
public function addNewArea($area_data){
	$name=$area_data['area_name'];
	$code=$area_data['area_code'];
	$q=$this->db->insert('area_table',['area_name'=>$name,'area_code'=>$code]);
	return $q;
  }
public function checkArea($area_data){
	$name=$area_data['area_name'];
	$code=$area_data['area_code'];
	//$q=$this->db->get_where('area_table',['area_name'=>$name,'area_code'=>$code]);
	$q=$this->db->query("select * from area_table where area_name='$name' or area_code='$code'");
	$qq=$q->result_array();
	if ($qq) {
	return true;
	}else{
		return false;
	}
	//return $q;
}
public function selectToUpdateArea($uid)
{
	$q=$this->db->query("select * from area_table where area_id='$uid'");
	$qq=$q->result_array();
	return $qq;
}
public function update_area($va)
{	
	$name=$va['area_name'];
	$code=$va['area_code'];
	$id=$va['area_id'];
	$qry=$this->db->query("UPDATE area_table SET area_name='$name', area_code ='$code' WHERE area_id='$id'");
	if ($qry) {
		return true;
	}else{
		return false;
	}
}
public function delete_area($ue)
{
	$qry=$this->db->query("delete from area_table where area_id=$ue");
	if ($qry) {
	return true;
	}else{
		return false;
	}
}
public function show_area()
{
	$qry=$this->db->query('select * from area_table');
	$data=$qry->result_array();
	return $data;
}
//area close
//charges
public function update_charges($va)
{	
	$name=$va['area_name'];
	$amount=$va['area_code'];
	$id=$va['area_id'];
	$qry=$this->db->query("UPDATE charges_table SET charge_type='$name', charge_amount ='$amount' WHERE charges_id='$id'");
	if ($qry) {
		return true;
	}else{
		return false;
	}
}
public function selectToUpdateCharge($uid)
{
	$q=$this->db->query("select * from charges_table where charges_id='$uid'");
	$qq=$q->result_array();
	return $qq;
}
public function show_charge_type()
{
	$qry=$this->db->query('select * from charges_table');
	$data=$qry->result_array();
	return $data;
}
public function checkCharges($charges_data){
	$name=$charges_data['ct_name'];
	$amount=$charges_data['ct_amount'];
	//$q=$this->db->get_where('area_table',['area_name'=>$name,'area_code'=>$code]);
	$q=$this->db->query("select * from charges_table where charge_type='$name' or charge_amount='$amount'");
	$qq=$q->result_array();
	if ($qq) {
	return true;
	}else{
		return false;
	}
	//return $q;
}
public function addNewCharge($ctdata){
	$name=$ctdata['ct_name'];
	$amount=$ctdata['ct_amount'];
	$q=$this->db->insert('charges_table',['charge_type'=>$name,'charge_amount'=>$amount]);
	return $q;
  }
//charges
//connection type start
public function updateConType($va)
{
	$name=$va['con_type_name'];
	$id=$va['con_type_id'];
	$qry=$this->db->query("UPDATE connection_type_table SET con_type_name='$name'  WHERE con_type_id='$id'");
	if ($qry) {
		return true;
	}else{
		return false;
	}
}

public function selectToUpdateConnType($id)
{
	$q=$this->db->query("select * from connection_type_table where con_type_id='$id'");
	$qq=$q->result_array();
	return $qq;
}
public function show_conntype()
{
	$qry=$this->db->query('select * from connection_type_table');
	$data=$qry->result_array();
	return $data;
}
public function check_conntype($v)
{
	$name=$v['con_type_name'];
	//$q=$this->db->get_where('area_table',['area_name'=>$name,'area_code'=>$code]);
	$q=$this->db->query("select * from connection_type_table where con_type_name='$name'");
	$qq=$q->result_array();
	if ($qq) {
	return true;
	}else{
		return false;
	}
}
public function addNewConType($ct_data){
	$name=$ct_data['con_type_name'];
	$q=$this->db->insert('connection_type_table',['con_type_name'=>$name]);
	return $q;
  }
  public function delete_connType($val)
  {
  	$qry=$this->db->query("delete from connection_type_table where con_type_id=$val");
	if ($qry) {
	return true;
	}else{
		return false;
	}
  }//connection type close

  //employee
  public function check_emp_no($emp_no)
  {
  	$q=$this->db->query("SELECT * FROM `employee_table` WHERE emp_number='$emp_no'");
  	$data=$q->num_rows();
	if($data>0){
		return true;
	}
	else{
    return false;
	}
  }
  public function selectToUpdateEmp($id)
{
	$q=$this->db->query("select * from employee_table where emp_id=$id");
	    $qq=$q->result_array();
		return $qq;
}
public function updateEmployee($va)
{
	$emp_id=$va['emp_id'];
	$emp_fname=$va['cons_fname'];
	$emp_lname=$va['cons_lname'];
	$emp_fathername=$va['cons_fathername'];
	$emp_gender=$va['cons_gender'];
	$emp_dob=$va['cons_dob'];
	$emp_cnic=$va['cons_cnic'];
	$emp_phone=$va['cons_phone'];
	$emp_cellnumber=$va['cons_cellnumber'];
	$emp_permanent_address=$va['cons_permanent_address'];
	$emp_current_address=$va['cons_current_address'];
	$emp_no=$va['empNo'];
	$Joining_date=$va['Joining_date'];
	$emp_email=$va['cons_email'];
	$emp_type=$va['emp_type'];

	$qry=$this->db->query("UPDATE employee_table SET emp_fname='$emp_fname', emp_lname='$emp_lname', emp_father_name ='$emp_fathername', emp_gender='$emp_gender', emp_dob='$emp_dob', emp_cnic ='$emp_cnic', emp_phone_no='$emp_phone',emp_cell_no='$emp_cellnumber', emp_email ='$emp_email', emp_permanent_add='$emp_permanent_address', emp_current_add='$emp_current_address', emp_joining_date='$Joining_date', emp_number='$emp_no', emp_emp_type_id='$emp_type' WHERE emp_id='$emp_id'");
	if ($qry) {
		return true;
	}else{
		return false;
	}

}
  public function employees_detail()
  {
  	$q=$this->db->query("SELECT * FROM `employee_table`");
	return $qq=$q->result_array();
  }
  public function show_emp_type()
  {
  	$q=$this->db->query("SELECT * FROM `employee_type_table`");
	return $qq=$q->result_array();
  }
  public function addNewEmployee($va)
  {
  	$emp_fname=$va['cons_fname'];
	$emp_lname=$va['cons_lname'];
	$emp_fathername=$va['cons_fathername'];
	$emp_gender=$va['cons_gender'];
	$emp_dob=$va['cons_dob'];
	$emp_cnic=$va['cons_cnic1'];
	$emp_phone=$va['cons_phone'];
	$emp_cellnumber=$va['cons_cellnumber'];
	$emp_permanent_address=$va['cons_permanent_address'];
	$emp_current_address=$va['cons_current_address'];
	$emp_email=$va['cons_email'];
	$emp_number=$va['emp_no'];
	$emp_joining_date=$va['Joining_date'];
	$emp_type=$va['emp_type'];

   $q=$this->db->insert('employee_table',['emp_fname'=>$emp_fname, 'emp_lname'=>$emp_lname, 'emp_father_name'=>$emp_fathername, 'emp_gender'=>$emp_gender, 'emp_dob'=>$emp_dob, 'emp_cnic'=>$emp_cnic, 'emp_phone_no'=>$emp_phone, 'emp_cell_no'=>$emp_cellnumber, 'emp_permanent_add'=>$emp_permanent_address, 'emp_current_add'=>$emp_current_address, 'emp_email'=>$emp_email, 'emp_joining_date'=>$emp_joining_date, 'emp_number'=>$emp_number, 'emp_emp_type_id'=>$emp_type]);
	return $q;

  }

  //android sync data 
  public function storeReading($readingId, $consumerNewNumber,$newReading)
  {

  	$qry=$this->db->query("select connection_id from connection_table where con_consumer_new_no='$consumerNewNumber' and con_status='0' ");
  	$constatus=$qry->num_rows();
  	if($constatus>0)
  	{
			$data=$qry->result_array();
			//print_r($data); exit;
			$connectionId=$data[0]['connection_id'];

		   $qry1=$this->db->query("SELECT new_reading FROM reading_table WHERE reading_conn_id='$connectionId'");
			
			$de=$qry1->num_rows();
			if($de>0)
			{
			 $data1=$qry1->result_array();
			 $last_reading=$data1[0]['new_reading'];
		    }else{
		    	$last_reading=0;
		    }

		    $reading_date= date('Y/m/d');
		    if(date('d')<20):
		    	$due_date= date('Y/m/').(date('d')+10);
			else:
				$due_date= date('Y/').(date('m')+1).'/'.(date('d')-20);
			endif;
		    $billing_month= (date('m')-1).date('/Y');

				$cd=date('Y')."/".date('m', strtotime("- 1 months"))."/";
				$chary = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		        $return_str = "";
		        for ( $x=0; $x<=9; $x++ ) {
		        		$return_str .= $chary[rand(0, count($chary)-1)];
		           } 
		           $bill_no= $cd.$return_str;

//test

//test
		     $qry11=$this->db->query("SELECT new_reading FROM reading_table WHERE reading_conn_id='$connectionId' && new_reading<='$newReading'");
			
			$dee=$qry11->num_rows();
			if ($de>0) {
			if ($dee>0) {
		 	

			    	$arrearQ=$this->db->query("SELECT (new_reading-last_reading) as consumedUnit, bill_number FROM reading_table WHERE payment_status='0' AND reading_conn_id='$connectionId' ");
					$arrearRow=$arrearQ->num_rows();
					if ($arrearRow>0) {
						$arrearD=$arrearQ->result_array();
						$rh_bill_number=$arrearD[0]['bill_number'];

						$no_of_month=1;
						$average_unit_con=$arrearD[0]['consumedUnit']/$no_of_month;

						$unit_rates=$this->db->query("select con_con_type_id from connection_table where connection_id='$connectionId' ");
				        $n=$unit_rates->result_array();
				        $m=$n[0]['con_con_type_id'];

				        $select_unit_rates="SELECT  t.`unit_range_from`, t.`unit_range_to`, t.`per_unit_rate`FROM `tariff_table` t inner join connection_type_table c on t.`t_conn_type_id`=c.con_type_id  where c.con_type_id='$m' ORDER BY unit_range_from";
				       $queryRate=$this->db->query($select_unit_rates);
				       $datum=$queryRate->result_array();

						$total_amount=0;
			            foreach($datum as $rate):
			            	if($average_unit_con==0) break;
			          		if($rate['unit_range_to']!='above'):
			          			$next= ($rate['unit_range_to']-$rate['unit_range_from'])+1;
			                    if($average_unit_con>=$next):
			                        $average_unit_con=$average_unit_con-$next;
			                        $rates=$next*$rate['per_unit_rate'];
			                        
			                    elseif($average_unit_con<$next):
			                        $rates=$average_unit_con*$rate['per_unit_rate'];
			                        $total_amount+=$rates;
			                        break;
			                    endif;
			                else:
			                    $rates= $average_unit_con*$rate['per_unit_rate'];
			                endif;
			                          
			               $total_amount+=$rates; 
			           endforeach;

			        $selectArr=$this->db->query("SELECT arrear_amount FROM arrear_table WHERE arr_connection_id='$connectionId'");
			        $dataArrRow=$selectArr->num_rows();
			        if ($dataArrRow>0) {
				    $dataArr=$selectArr->result_array();
				    $arrear_amountt=$dataArr[0]['arrear_amount'];
				     $total_amount=$total_amount+$arrear_amountt;
			        $q1=$this->db->query("UPDATE arrear_table SET arrear_amount = '$total_amount' WHERE arr_connection_id='$connectionId'");
			        $q12=$this->db->query("UPDATE reading_history_table SET payment_status='1'  WHERE rh_bill_number='$rh_bill_number'");
			        }else{
			            $q1=$this->db->insert('arrear_table',['arrear_amount'=>$total_amount,'arr_connection_id'=>$connectionId]);
			            $q12=$this->db->query("UPDATE reading_history_table SET payment_status='1'  WHERE rh_bill_number='$rh_bill_number'");
			        }
			       }

					 $q=$this->db->query("UPDATE reading_table SET last_reading='$last_reading', new_reading ='$newReading', reading_date='$reading_date', reading_conn_id ='$connectionId', bill_number='$bill_no', billing_month='$billing_month', due_date='$due_date', payment_status='0' WHERE reading_conn_id='$connectionId'");

				    $q1=$this->db->query("INSERT INTO reading_history_table (new_reading, last_reading , conn_rhistory_id , reading_date, rh_bill_number , rh_billing_month, rh_due_date , payment_status) VALUES('$newReading', '$last_reading', '$connectionId', '$reading_date', '$bill_no','$billing_month', '$due_date', '0')");
				  return true;
				  }else{
		        	return false;
		        }
			    }else{
			  	   $result =$this->db->query("INSERT INTO reading_table(last_reading, new_reading, reading_date, reading_conn_id, bill_number, billing_month, due_date) VALUES ('$last_reading', '$newReading', '$reading_date', '$connectionId', '$bill_no', '$billing_month', '$due_date')");

			  	   $q1=$this->db->query("INSERT INTO reading_history_table (new_reading, last_reading , conn_rhistory_id , reading_date, rh_bill_number , rh_billing_month, rh_due_date , payment_status) VALUES('$newReading', '$last_reading', '$connectionId', '$reading_date', '$bill_no','$billing_month', '$due_date', '0')");

				        if ($result) {
			            return true;
				        } else {

				            if( mysql_errno() == 1062) {

				                return true;

				            } else {

				                return false;
				            }            
			            }
		        }
		    
			}else{
 				return false;
				}
		}
}
 ?>
