<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class AndroidController extends CI_Controller
{
	public function viewDetailsSync()
	{
	  $this->load->view("syncAndroidData/viewuser");
	}
	public function insertReading(){

		$this->load->model("admin/adminModel",'am');
		//Get JSON posted by Android Application

		 $json = $_POST["readingJSON"];
		

		 if (get_magic_quotes_gpc()){
		 $json = stripslashes($json);

		 }

		//Decode JSON into an Array

		$data = json_decode($json);

		//Util arrays to create response JSON
		$a=array();
		$b=array();
		//Loop through an Array and insert data read from JSON into MySQL DB

		//$res = $this->am->storeReading(1, '1803239N1QJ','200');
		
		    // if($res){
		    // 	$b["id"] = '1';
		    //     $b["status"] = 'yes';

		    //     array_push($a,$b);

		    // }else{
		    // 	$b["id"] = '1';
		    //     $b["status"] = 'no';

		    //     array_push($a,$b);

		    // }

		for($i=0; $i<count($data) ; $i++)
		{
			
		$res = $this->am->storeReading($data[$i]->readingId, $data[$i]->consumerNewNumber,$data[$i]->newReading);
			//$res = $this->am->storeReading(1,	'180220VYJDL' , 123);
		    if($res){
		    	$b["id"] = $data[$i]->readingId;
		        $b["status"] = 'yes';

		        array_push($a,$b);

		    }else{
		    	$b["id"] = $data[$i]->readingId;
		        $b["status"] = 'no';

		        array_push($a,$b);

		    }
		}
		$mes['jsonData']=$a;
		//echo json_encode($jsonData);
      $this->load->view("syncAndroidData/encodeJsonDataToAndroid",$mes);
		

	}

}?>