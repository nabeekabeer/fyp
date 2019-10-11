<?php
function storeReading($User,$newReading) {
		$con = mysqli_connect('localhost', 'root', '');
        $db = mysqli_select_db($con,'fyp');
        $result = mysqli_query($con,"INSERT INTO reading_table VALUES('$User','$newReading')");

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


//Get JSON posted by Android Application

$json = $_POST["readingJSON"];
//Remove Slashes

if (get_magic_quotes_gpc()){
$json = stripslashes($json);

}

//Decode JSON into an Array

$data = json_decode($json);

//Util arrays to create response JSON
$a=array();
$b=array();
//Loop through an Array and insert data read from JSON into MySQL DB

for($i=0; $i<count($data) ; $i++)
{

$res = storeReading($data[$i]->userName,$data[$i]->newReading);

    if($res){

        $b["id"] = $data[$i]->userId;

        $b["status"] = 'yes';

        array_push($a,$b);

    }else{
        $b["id"] = $data[$i]->userId;
        $b["status"] = 'no';

        array_push($a,$b);

    }
}

//Post JSON response back to Android Application

echo json_encode($a);
?>