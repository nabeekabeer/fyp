<?php 
/**
* 
*/
class BillModel extends CI_Model
{

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
public function check_connnection_status($v)
{
	$qry=$this->db->query("select * from connection_table where con_consumer_new_no='$v' and con_status='1' ");
	$data=$qry->num_rows();
	if($data>0){
		return true;
	}
	else{
    return false;
	}
}
public function print_bill($va)
{
	$sql="SELECT * FROM reading_history_table r inner join connection_table c on r.conn_rhistory_id=c.connection_id where c.con_consumer_new_no='$va' order by `reading_history_id` Desc limit 3";
	$qry=$this->db->query($sql);
	$data=$qry->result_array();
	return $data;

}
public function newReceivingPoint($data)
{
		$name=$data['receiving_point_name'];
		$qry1=$this->db->query("SELECT * FROM bill_collection_point_table WHERE bill_collection_point_name='$name'");
		$rows=$qry1->num_rows();
	if($rows>0):
		return false;
	else:
		$qry=$this->db->insert('bill_collection_point_table',['bill_collection_point_name'=>$name]);
		return true;
	endif;
}
public function showAllCollectionPoints()
{
	$qry=$this->db->query("SELECT * FROM bill_collection_point_table");
	$data=$qry->result_array();
	return $data;
}
public function updateCollectionPoint($data)
{
	$id=$data['id'];
	$name=$data['receiving_point_name'];
	$qry=$this->db->query("UPDATE bill_collection_point_table SET bill_collection_point_name='$name' where bill_collection_point_id=$id");
	return true;
}
public function select_to_edit_readings($id)
{
	$qry=$this->db->query("SELECT * FROM reading_table WHERE reading_id='$id'");
	$data=$qry->result_array();
	return $data;
}
public function readingUpdate($v)
{
	$reading_id=$v['reading_id'];
	$new_reading=$v['new_reading'];
	$last_reading=$v['last_reading'];
	$reading_date=$v['reading_date'];
	$bill_number=$v['bill_number'];
	$bill4month=$v['bill4month'];
	$bill4year=$v['bill4year'];
	$last_date=$v['last_date'];
	if (count($bill4month)<=1) {
		$bill4month=$bill4month[0];
	}else{
	echo $bill4month=implode("/", $bill4month);
    }
	$billing_month=$bill4month.'/'.$bill4year;

	
		 $q=$this->db->query("UPDATE reading_table SET last_reading='$last_reading', new_reading ='$new_reading', reading_date='$reading_date',  bill_number='$bill_number', billing_month='$billing_month', due_date='$last_date' WHERE reading_id='$reading_id'");
		 $q1=$this->db->query("UPDATE reading_history_table SET new_reading='$new_reading', last_reading='$last_reading', reading_date='$reading_date', rh_billing_month='$billing_month', rh_due_date='$last_date' WHERE rh_bill_number='$bill_number'");
	    if ($q && $q1) {
	    	return true;
	    }else{
	    	return false;
	    }
	
}
public function deleteCollectionPoint($id)
{
 $qry=$this->db->query("DELETE FROM bill_collection_point_table where bill_collection_point_id=$id");
	if($qry)
		return true;
	else
		return false;
}
public function select_last_reading($va)
{
	//echo $va;
	$qry=$this->db->query("SELECT new_reading FROM reading_table WHERE reading_conn_id='$va'");
	$data=$qry->result_array();
	$de=$qry->num_rows();
	if($de>0)
	{
	 $d=$data[0]['new_reading'];
	 $_SESSION['row_reading']=$de;
	return $d;
    }else{
    	return '0';
    }
}
public function select_readings($id)
{
	$qry=$this->db->query("SELECT * FROM reading_table WHERE reading_conn_id='$id'");
	$data=$qry->result_array();
	return $data;
}
public function select_unit_rates($con_id)
{
	$qry=$this->db->query("select con_con_type_id from connection_table where connection_id='$con_id' ");
	$data=$qry->result_array();
	$d=$data[0]['con_con_type_id'];

	$sql="SELECT  t.`unit_range_from`, t.`unit_range_to`, t.`per_unit_rate`FROM `tariff_table` t inner join connection_type_table c on t.`t_conn_type_id`=c.con_type_id  where c.con_type_id='$d' ORDER BY unit_range_from";
	$query=$this->db->query($sql);
	$datum=$query->result_array();
	return $datum;
}
public function select_conn_Id($va)
{
	$qry=$this->db->query("select connection_id from connection_table where con_consumer_new_no='$va' ");
	$data=$qry->result_array();
	$d=$data[0]['connection_id'];
	//print_r($data);
	return $d;
}
public function readingAdd($v)
{
	$conn_id=$v['connection_id'];
	$new_reading=$v['new_reading'];
	$last_reading=$v['last_reading'];
	$reading_date=$v['reading_date'];
	$bill_number=$v['bill_number'];
	$bill4month=$v['bill4month'];
	$bill4year=$v['bill4year'];
	$last_date=$v['last_date'];
	//echo $bill4month=implode("/", $bill4month);
	//print_r($bill4month); echo count($bill4month); exit;
	if (count($bill4month)<=1) {
		$bill4month=$bill4month[0];
	}else{
	 $bill4month=implode("/", $bill4month);
    }
    $qury=$this->db->query("SELECT * FROM `reading_table` WHERE `billing_month` like '%$bill4month%$bill4year%'");
    $qqq=$qury->num_rows();
    if($qqq<=0):
	$billing_month=$bill4month.'/'.$bill4year;

	$qry=$this->db->query("SELECT * FROM reading_table WHERE reading_conn_id='$conn_id'");
	$dat=$qry->result_array();
	$data=$qry->num_rows();
	if($data>0){

		$arrearQ=$this->db->query("SELECT (new_reading-last_reading) as consumedUnit, bill_number, billing_month FROM reading_table WHERE payment_status='0' AND reading_conn_id='$conn_id' ");
		$arrearRow=$arrearQ->num_rows();
		if ($arrearRow>0) {
			$no_of_month=1;
			$arrearD=$arrearQ->result_array();
			$rh_bill_number=$arrearD[0]['bill_number'];
			$billing_month=$arrearD[0]['billing_month'];
			$bm=explode('/', $billing_month);
            $no_of_month=count($bm)-1;
			
			$average_unit_con=$arrearD[0]['consumedUnit']/$no_of_month;

			$unit_rates=$this->db->query("select con_con_type_id from connection_table where connection_id='$conn_id' ");
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
			           $total_amount=$total_amount*$no_of_month;
			 $lpc="SELECT charge_type as lpc, charge_amount as camount FROM charges_table Where charge_type='Late Payment Charge'";
	         $lpc1=$this->db->query($lpc);
	         $lpcRow=$lpc1->num_rows();
	         if($lpcRow>0){
	         	$lpcdata=$lpc1->result_array();
	         	$late_pay_charge=$lpcdata[0]['camount'];
	         }else{
	         	$late_pay_charge=10;
	         }
	         
	         $total_amount=$total_amount+($total_amount/$late_pay_charge);

        $selectArr=$this->db->query("SELECT arrear_amount FROM arrear_table WHERE arr_connection_id='$conn_id'");
        $dataArrRow=$selectArr->num_rows();
        if ($dataArrRow>0) {
	    $dataArr=$selectArr->result_array();
	    $arrear_amountt=$dataArr[0]['arrear_amount'];
	     $total_amount=$total_amount+$arrear_amountt;
        $q1=$this->db->query("UPDATE arrear_table SET arrear_amount = '$total_amount' WHERE arr_connection_id='$conn_id'");
        $q12=$this->db->query("UPDATE reading_history_table SET payment_status='1'  WHERE rh_bill_number='$rh_bill_number'");
        }else{
            $q1=$this->db->insert('arrear_table',['arrear_amount'=>$total_amount,'arr_connection_id'=>$conn_id]);
            $q12=$this->db->query("UPDATE reading_history_table SET payment_status='1'  WHERE rh_bill_number='$rh_bill_number'");
        }
       
        
		}
	    



		$rid=$dat[0]['reading_id'];
		 $q=$this->db->query("UPDATE reading_table SET last_reading='$last_reading', new_reading ='$new_reading', reading_date='$reading_date', reading_conn_id ='$conn_id', bill_number='$bill_number', billing_month='$billing_month', due_date='$last_date', payment_status='0' WHERE reading_id='$rid'");
	    $q1=$this->db->insert('reading_history_table',['new_reading'=>$new_reading,'last_reading'=>$last_reading, 'conn_rhistory_id'=>$conn_id,'reading_date'=>$reading_date, 'rh_bill_number'=>$bill_number, "rh_billing_month"=>$billing_month, 'rh_due_date'=>$last_date, 'payment_status'=>'0']);
	return true;
	}
	else{
      $q=$this->db->insert('reading_table',['new_reading'=>$new_reading,'last_reading'=>$last_reading, 'reading_conn_id'=>$conn_id,'reading_date'=>$reading_date,'bill_number'=>$bill_number, "billing_month"=>$billing_month,'due_date'=>$last_date]);
	$q1=$this->db->insert('reading_history_table',['new_reading'=>$new_reading,'last_reading'=>$last_reading, 'conn_rhistory_id'=>$conn_id,'reading_date'=>$reading_date, 'rh_bill_number'=>$bill_number, "rh_billing_month"=>$billing_month,'rh_due_date'=>$last_date, 'payment_status'=>'0']);
	return true;
	}
else:
	return false;
endif;
}
public function select_conn_reading($va)
{ 
	//SELECT * FROM connection_table c join reading_table r on c.connection_id=r.reading_conn_id where c.con_consumer_new_no = '$va'
	//$sql="SELECT cn.connection_id, cn.con_area_id,cn.`con_consumer_old_no`,cn.`con_consumer_new_no`,cn.`con_meter_number`,cn.`con_date`,cn.`con_status`,cs.`cons_fname`,cs.`cons_lname`,cs.`cons_father_name`,cs.`cons_email`, cs.`cons_dob`,cs.`cons_gender`,cs.`cons_phone_number`,cs.`cons_cell_number`,cs.`cons_cnic`, cs.`cons_permanent_address`,cs.`cons_current_address`,ct.`con_type_name`, ar.`area_name` FROM (((connection_table cn INNER JOIN consumer_table cs ON cn.`con_consumer_id`= cs.consumer_id) INNER JOIN area_table ar ON ar.area_id = cn.`con_area_id`) INNER JOIN connection_type_table ct ON ct.con_type_id = cn.`con_con_type_id`) where cn.`con_consumer_new_no`='$va' ORDER BY `cs`.`consumer_id` ASC";
	$sql="SELECT * FROM (((connection_table cn INNER JOIN consumer_table cs ON cn.`con_consumer_id`= cs.consumer_id) INNER JOIN area_table ar ON ar.area_id = cn.`con_area_id`) INNER JOIN connection_type_table ct ON ct.con_type_id = cn.`con_con_type_id`) where cn.`con_consumer_new_no`='$va' ORDER BY `cs`.`consumer_id` ASC";
	$qry=$this->db->query($sql);
	$data=$qry->result_array();
	return $data;
}
public function select_bank_charge()
{
	$sql="SELECT * FROM charges_table Where charge_type='Bank Charge'";
	$qry=$this->db->query($sql);
	$data=$qry->result_array();
	return $data;

}
public function select_late_pay_charge()
{
	$sql="SELECT charge_type as lpc, charge_amount as camount FROM charges_table Where charge_type='Late Payment Charge'";
	$qry=$this->db->query($sql);
	$data=$qry->result_array();
	return $data;

}

public function select_arrear($id)
{
	$sql="SELECT arrear_amount FROM arrear_table Where arr_connection_id='$id'";
	$qry=$this->db->query($sql);
	$row=$qry->num_rows();
	if ($row>0) {
		$data=$qry->result_array();
	    return $data[0]['arrear_amount'];
	}else{
		return 0;
	}
	
}
public function reading_No_of_month($id)
{
	$sql1=$this->db->query("select connection_id, con_consumer_new_no from connection_table inner join reading_table on connection_id= reading_conn_id where reading_id=$id");
    $cons_id=$sql1->result_array();
    $va=$cons_id[0]['connection_id'];
    $sql="SELECT r.rh_billing_month FROM reading_history_table r inner join connection_table c on r.conn_rhistory_id=c.connection_id where r.conn_rhistory_id='$va' order by `reading_history_id` Desc limit 1";
    $qry=$this->db->query($sql);
	$data=$qry->result_array();
	$row=$qry->num_rows();
	if($row>0):
	return $data[0]['rh_billing_month'];
    else:
	return "3/3";
	endif;
}
public function reading_history_of($id)
{
	$sql1=$this->db->query("select con_consumer_new_no from connection_table inner join reading_table on connection_id= reading_conn_id where reading_id=$id");
    $cons_new_no=$sql1->result_array();
    $va=$cons_new_no[0]['con_consumer_new_no'];
	$sql="SELECT * FROM reading_history_table r inner join connection_table c on r.conn_rhistory_id=c.connection_id where c.con_consumer_new_no='$va' order by `reading_history_id` Desc limit 3";
	$qry=$this->db->query($sql);
	$data=$qry->result_array();
	return $data;
}
public function select_id_of_connection($id)
{
	$qry=$this->db->query("select connection_id from connection_table inner join reading_table on connection_id = reading_conn_id where reading_id=$id");
	$data=$qry->result_array();
	$d=$data[0]['connection_id'];
	//print_r($data);
	return $d;
}
public function view_bill_reading_all()
 { //  $sql1=$this->db->query("select con_consumer_new_no from connection_table inner join reading_table on connection_id= reading_conn_id ");
//     $cons_new_no=$sql1->result_array();
//     $va=$cons_new_no[0]['con_consumer_new_no'];
	$sql="SELECT * FROM (((connection_table cn INNER JOIN consumer_table cs ON cn.`con_consumer_id`= cs.consumer_id) INNER JOIN area_table ar ON ar.area_id = cn.`con_area_id`) INNER JOIN connection_type_table ct ON ct.con_type_id = cn.`con_con_type_id`)  ORDER BY `cs`.`consumer_id` ASC";
	$qry=$this->db->query($sql);
	$data=$qry->result_array();
	return $data;
}
public function view_bill_reading($id)
{   $sql1=$this->db->query("select con_consumer_new_no from connection_table inner join reading_table on connection_id= reading_conn_id where reading_id=$id");
    $cons_new_no=$sql1->result_array();
    $va=$cons_new_no[0]['con_consumer_new_no'];
	$sql="SELECT * FROM (((connection_table cn INNER JOIN consumer_table cs ON cn.`con_consumer_id`= cs.consumer_id) INNER JOIN area_table ar ON ar.area_id = cn.`con_area_id`) INNER JOIN connection_type_table ct ON ct.con_type_id = cn.`con_con_type_id`) where cn.`con_consumer_new_no`='$va' ORDER BY `cs`.`consumer_id` ASC";
	$qry=$this->db->query($sql);
	$data=$qry->result_array();
	return $data;
}
public function showPaymentDetail($id)
{
	$sql="SELECT * FROM (((payment_table p INNER JOIN connection_table c ON p.`payee_conn_id`= c.connection_id) INNER JOIN consumer_table cn ON c.con_consumer_id = cn.`consumer_id`) INNER JOIN bill_collection_point_table cp ON cp.`bill_collection_point_id` = p.`payment_point_id`) where payment_id='$id' ORDER BY p.`payment_id` DESC";
	$qry=$this->db->query($sql);
	$rows=$qry->num_rows();
	if($rows>0){
		$data=$qry->result_array();
	    return $data;
	}else{
		return 0;
	}
}
public function billpaymentEdit($data)
{
	return 0;
}
public function showAllPaymentDetails()
{
	$sql="SELECT * FROM (((payment_table p INNER JOIN connection_table c ON p.`payee_conn_id`= c.connection_id) INNER JOIN consumer_table cn ON c.con_consumer_id = cn.`consumer_id`) INNER JOIN bill_collection_point_table cp ON cp.`bill_collection_point_id` = p.`payment_point_id`) ORDER BY p.`payment_id` DESC";
	$qry=$this->db->query($sql);
	$rows=$qry->num_rows();
	if($rows>0){
		$data=$qry->result_array();
	    return $data;
	}else{
		return 0;
	}
	
}
public function billpayment($v)
{
	//print_r($v); exit;
	$bill_collection_point=$v['bill_collection_point'];
	$bill_no=$v['bill_no'];
	$bill_paid_date=$v['bill_paid_date'];
	$paid_amount=$v['paid_amount'];
	$time_payment=$v['time_payment'];
	         $bc="SELECT * FROM charges_table Where charge_type='Bank Charge'";
	         $bcqry=$this->db->query($bc);
	         $bcdata=$bcqry->result_array();
			 $bank_charge=$bcdata[0]['charge_amount'];
			 $paid_amount= $paid_amount-$bank_charge;

  $qry=$this->db->query("SELECT * FROM reading_table WHERE bill_number='$bill_no' and payment_status='0'");
	$dat=$qry->result_array();
	$rows=$qry->num_rows();
	if($rows>0){
			 $no_of_month=1;
		     $reading_id=$dat[0]['reading_id'];
		     $reading_conn_id=$dat[0]['reading_conn_id'];
		     $new_reading=$dat[0]['new_reading'];
		     $last_reading=$dat[0]['last_reading'];
		     $billing_month=$dat[0]['billing_month'];
		     $bm=explode('/', $billing_month);
             $no_of_month=count($bm)-1;
		     $consumedUnit=$new_reading-$last_reading;

		     
			$average_unit_con=$consumedUnit/$no_of_month;

			$unit_rates=$this->db->query("select con_con_type_id from connection_table where connection_id='$reading_conn_id' ");
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
			           $total_amount=$total_amount*$no_of_month;
		 if($time_payment=='late'){
				 $lpc="SELECT charge_type as lpc, charge_amount as camount FROM charges_table Where charge_type='Late Payment Charge'";
		         $lpc1=$this->db->query($lpc);
		         $lpcRow=$lpc1->num_rows();
		         if($lpcRow>0){
		         	$lpcdata=$lpc1->result_array();
		         	$late_pay_charge=$lpcdata[0]['camount'];
		         }else{
		         	$late_pay_charge=10;
		         }
		         $total_amount=$total_amount+($total_amount/$late_pay_charge);
	        }
	         
	         
	         //$total_amount=$total_amount;
	         //echo $total_amount.'/'.$paid_amount; exit;
	         if($total_amount<=$paid_amount){
			 

		    $qry2=$this->db->query("SELECT * FROM arrear_table WHERE arr_connection_id='$reading_conn_id'");
			$dat2=$qry2->result_array();
			$rows2=$qry2->num_rows();
			if($rows2>0){
				 $arrear_id=$dat2[0]['arrear_id'];
				 $arrear_amount=$dat2[0]['arrear_amount']+$total_amount;
				 //echo $arrear_amount.'/'.$paid_amount; exit;
				 if($arrear_amount>=$paid_amount){
				 	$paid_amount1=$arrear_amount-$paid_amount;
				 	//echo $paid_amount1;exit;
				 if($paid_amount1==0){
				 	$this->db->query("DELETE  FROM arrear_table WHERE arrear_id='$arrear_id'");
				 }else{
			    	$this->db->query("UPDATE  arrear_table SET arrear_amount='$paid_amount1' WHERE arrear_id='$arrear_id'");
				 	}

			$this->db->query("INSERT INTO payment_table ( paid_amount, payment_date, payee_conn_id, payment_point_id, bill_no) VALUES ('$paid_amount','$bill_paid_date', '$reading_conn_id','$bill_collection_point', '$bill_no')");
			$q=$this->db->query("UPDATE reading_table SET payment_status='1' WHERE reading_id='$reading_id'");
		    $q1=$this->db->query("UPDATE reading_history_table SET payment_status='2' WHERE rh_bill_number='$bill_no'");
			return true;
				 }else{
				 	// $paid_amount1=$paid_amount-$arrear_amount;
				 	
				 	// $this->db->query("DELETE  FROM arrear_table WHERE arrear_id='$arrear_id'");
				 	// $this->db->query("INSERT INTO payment_table ( paid_amount, payment_date, payee_conn_id, payment_point_id, bill_no) VALUES ('$paid_amount','$bill_paid_date', '$reading_conn_id','$bill_collection_point' , '$bill_no')");

				 	return false;
				 }
				 // $this->db->query("INSERT INTO payment_table ( paid_amount, payment_date, payee_conn_id, payment_point_id , bill_no) VALUES ('$paid_amount','$bill_paid_date', '$reading_conn_id','$bill_collection_point', '$bill_no')");
				 // $q=$this->db->query("UPDATE reading_table SET payment_status='1' WHERE reading_id='$reading_id'");
		   //  $q1=$this->db->query("UPDATE reading_history_table SET payment_status='2' WHERE rh_bill_number='$bill_no'");
			}elseif($total_amount==$paid_amount){ 
				$this->db->query("INSERT INTO payment_table ( paid_amount, payment_date, payee_conn_id, payment_point_id, bill_no) VALUES ('$paid_amount','$bill_paid_date', '$reading_conn_id','$bill_collection_point', '$bill_no')");
				$q=$this->db->query("UPDATE reading_table SET payment_status='1' WHERE reading_id='$reading_id'");
		    $q1=$this->db->query("UPDATE reading_history_table SET payment_status='2' WHERE rh_bill_number='$bill_no'");
				return true;
			}else{
				return false;
			}}else{
				return false;
			}
		  // return true;
	}
	else{
	// $qry1=$this->db->query("SELECT * FROM reading_history_table WHERE rh_bill_number='$bill_no' and payment_status='0'");
	// $dat1=$qry1->result_array();
	// $rows1=$qry1->num_rows();
	// if($rows1>0){
	// 	   $reading_history_id=$dat1[0]['reading_history_id'];
	// 	   $reading_conn_id=$dat1[0]['conn_rhistory_id'];
	// 	   $q1=$this->db->query("UPDATE reading_history_table SET payment_status='2' WHERE reading_history_id='$reading_history_id'");
	// 	   $this->db->query("INSERT INTO payment_table ( paid_amount, payment_date, payee_conn_id, payment_point_id, bill_no) VALUES ('$paid_amount','$bill_paid_date', '$reading_conn_id','$bill_collection_point', '$bill_no')");
	// 	   return true;
	// }else{
	// 	return false;
	// }
		return false;
			}
}
public function connection_load_charge($v)
{
	return false;
// 	$conn_id=$v['connection_id'];
	
// 	$bill_number=$v['bill_number'];
// 	$bill4month_cl=$v['bill4month_cl'];
// 	$bill4year_cl=$v['bill4year_cl'];
// 	$load_charge_unit=$v['load_charge_unit'];
// 	$reason_load_charge=$v['reason_load_charge'];
// 	//echo $bill4month=implode("/", $bill4month);
// 	//print_r($bill4month); echo count($bill4month); exit;
// 	if (count($bill4month_cl)<=1) {
// 		$bill4month_cl=$bill4month_cl[0];
// 	}else{
// 	 $bill4month_cl=implode("/", $bill4month_cl);
//     }
// 	$billing_month=$bill4month_cl.'/'.$bill4year_cl;
// // echo $billing_month;exit;
// 	$qry=$this->db->query("SELECT * FROM reading_table WHERE reading_conn_id='$conn_id'");
// 	$dat=$qry->result_array();
// 	$data=$qry->num_rows();
// 	if($data>0){

// 		$arrearQ=$this->db->query("SELECT (new_reading-last_reading) as consumedUnit, bill_number FROM reading_table WHERE payment_status='0' AND reading_conn_id='$conn_id' ");
// 		$arrearRow=$arrearQ->num_rows();
// 		if ($arrearRow>0) {
// 			$arrearD=$arrearQ->result_array();
// 			$rh_bill_number=$arrearD[0]['bill_number'];

// 			$no_of_month=1;
// 			$average_unit_con=$arrearD[0]['consumedUnit']/$no_of_month;

// 			$unit_rates=$this->db->query("select con_con_type_id from connection_table where connection_id='$conn_id' ");
// 	        $n=$unit_rates->result_array();
// 	        $m=$n[0]['con_con_type_id'];

// 	        $select_unit_rates="SELECT  t.`unit_range_from`, t.`unit_range_to`, t.`per_unit_rate`FROM `tariff_table` t inner join connection_type_table c on t.`t_conn_type_id`=c.con_type_id  where c.con_type_id='$m' ORDER BY unit_range_from";
// 	       $queryRate=$this->db->query($select_unit_rates);
// 	       $datum=$queryRate->result_array();

// 			$total_amount=0;
// 			            foreach($datum as $rate):
// 			            	if($average_unit_con==0) break;
// 			          		if($rate['unit_range_to']!='above'):
// 			          			$next= ($rate['unit_range_to']-$rate['unit_range_from'])+1;
// 			                    if($average_unit_con>=$next):
// 			                        $average_unit_con=$average_unit_con-$next;
// 			                        $rates=$next*$rate['per_unit_rate'];
			                        
// 			                    elseif($average_unit_con<$next):
// 			                        $rates=$average_unit_con*$rate['per_unit_rate'];
// 			                        $total_amount+=$rates;
// 			                        break;
// 			                    endif;
// 			                else:
// 			                    $rates= $average_unit_con*$rate['per_unit_rate'];
// 			                endif;
			                          
// 			               $total_amount+=$rates; 
// 			           endforeach;
// 			 $lpc="SELECT charge_type as lpc, charge_amount as camount FROM charges_table Where charge_type='Late Payment Charge'";
// 	         $lpc1=$this->db->query($lpc);
// 	         $lpcRow=$lpc1->num_rows();
// 	         if($lpcRow>0){
// 	         	$lpcdata=$lpc1->result_array();
// 	         	$late_pay_charge=$lpcdata[0]['camount'];
// 	         }else{
// 	         	$late_pay_charge=10;
// 	         }
	         
// 	         $total_amount=$total_amount+($total_amount/$late_pay_charge);

//         $selectArr=$this->db->query("SELECT arrear_amount FROM arrear_table WHERE arr_connection_id='$conn_id'");
//         $dataArrRow=$selectArr->num_rows();
//         if ($dataArrRow>0) {
// 	    $dataArr=$selectArr->result_array();
// 	    $arrear_amountt=$dataArr[0]['arrear_amount'];
// 	     $total_amount=$total_amount+$arrear_amountt;

//         $q1=$this->db->query("UPDATE arrear_table SET arrear_amount = '$total_amount' WHERE arr_connection_id='$conn_id'");
        
//         $q12=$this->db->query("UPDATE reading_history_table SET payment_status='1'  WHERE rh_bill_number='$rh_bill_number'");
//         }else{
//             $q1=$this->db->insert('arrear_table',['arrear_amount'=>$total_amount,'arr_connection_id'=>$conn_id]);
//             $q12=$this->db->query("UPDATE reading_history_table SET payment_status='1'  WHERE rh_bill_number='$rh_bill_number'");
//         }
       
        
// 		}
	    



// 		$rid=$dat[0]['reading_id'];
// 		 $q=$this->db->query("UPDATE reading_table SET last_reading='$last_reading', new_reading ='$new_reading', reading_date='$reading_date', reading_conn_id ='$conn_id', bill_number='$bill_number', billing_month='$billing_month', due_date='$last_date', payment_status='0' WHERE reading_id='$rid'");
	   
// 	return true;
// 	}
// 	else{
// 	$q1=$this->db->insert('reading_history_table',['new_reading'=>$new_reading,'last_reading'=>$last_reading, 'conn_rhistory_id'=>$conn_id,'reading_date'=>$reading_date, 'rh_bill_number'=>$bill_number, "rh_billing_month"=>$billing_month,'rh_due_date'=>$last_date, 'payment_status'=>'0']);
// 	return true;
// 	}
}
}//class
?>