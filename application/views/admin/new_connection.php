<!DOCTYPE html>
<html lang="en">
<?php //session_start();?>
<head>
  <title>new connection</title>
  <script src="<?php echo base_url('asset/jQuery/jquery.min.js')?>" ></script>


  <script  type="text/javascript">
$.noConflict();
 (function($){
$(document).ready(function(){
//$('tr:even').css('background','#CCCCCC');
//$('tr:odd').css('background','#aaaaaa');
$('#closeBtn').click(function(){
  $('#card-header-msg').hide();
});


$('#search_cnic').keyup(function() {
    $('span.error-keyup-1').hide();
    $('span.error-keyup-2').hide();
    $('span.error-keyup-3').hide();
    var inputVal = $(this).val();
    var numericReg = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;
    if(!numericReg.test(inputVal)) {
        $('#spanbtn').after('<span class="error error-keyup-1" style="color:red;">&nbsp; &nbsp; Numeric characters only.</span>');
        $('#span_cnic').hide();
   }//else if($('#search_cnic').val().length!=13)
   // {
   //  $('span.error-keyup-1').hide();
   //  $('span.error-keyup-3').hide();
   //  $('#search_cnic').focus();
   //  $('#search_cnic').css('border-color','red');
   //  $('#spanbtn').after('<span class="error error-keyup-2" style="color:red;">&nbsp; &nbsp;Invalid CNIC.</span>');
   //  return false;
   // }
});
 
  $('#search_btn').click(function(){
  $('span.error-keyup-1').hide();
  $('span.error-keyup-2').hide();
  $('span.error-keyup-3').hide();
   var cnic=$('#search_cnic').val();
   if(cnic=="")
   {
    $('#search_cnic').focus();
    $('#search_cnic').css('border-color','red');
    $('#spanbtn').after('<span class="error error-keyup-3" style="color:red;">&nbsp; This field must be filled...!</span>');
    return false;
   }else if(cnic.length<13)
   {
    $('#search_cnic').focus();
    $('#search_cnic').css('border-color','red');
    $('#spanbtn').after('<span class="error error-keyup-2" style="color:red;">&nbsp; &nbsp;Invalid CNIC, length is less than 13.</span>');
    return false;
   }else if(cnic.length>13){
    $('#search_cnic').focus();
    $('#search_cnic').css('border-color','red');
    $('#spanbtn').after('<span class="error error-keyup-2" style="color:red;">&nbsp; &nbsp;Invalid CNIC, Length is greater than 13</span>');
    return false;
   }
   else{
    $('#search_cnic').css('border-color','green');
    return true;
   }
   //$('#test3').remove();
    //$("#test3").val("Dolly Duck");
    });

    $('#createNum').click(function(){
     var sea=$('#areaselect').val();
     if (sea=="") {
        $('#areaselect').focus();
        $('#areaselect').css('border-color','red');
     }else{
        $("#test3").val(sea+"<?php echo uniqid();?>");
      }

    });
    
});
})(jQuery);
</script>
  <?php include_once("includes/htmlFile.php"); ?>
  <?php //include_once("./home.php");?>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
  <?php require 'header.php'; ?>
  <?php require 'footer.php'; ?>
    <div class="content-wrapper">
    <div class="container-fluid">
<?php
//unset($_SESSION['cons_cnic']); 
 echo @$mge;
if(!isset($_SESSION['cons_cnic'])){?>
    <div class="container" id="search_consumer">
      <div class="card card-register mx-auto mt-5" style="border: 1px solid; box-shadow: 5px 5px #888888;">
        <div class="card-header text-center"><h3>Consumer Registration </h3></div>
        <div class="card-body">
          <?php echo form_open('myController/searchConCNIC'); ?>
            
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <label for="exampleInputEmail1"><b>Consumer CNIC Number </b> (without dash, 13 charachters only)</label>
                  <div class="input-group">
                  <?php echo form_input(['type'=>'text', 'name'=>'cons_cnic','placeholder'=>'Enter CNIC Like 1233312341233',"title"=>"Enter Consumer CNIC Number",'class'=>'form-control col-md-10',"onkeypress"=>"return event.charCode>=48 && event.charCode<=57",'id'=>"search_cnic"]);?>
                  <button class="btn btn-primary" name="submitSearch" id="search_btn" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
              </div>
              <br><span class="input-group-btn" id="spanbtn"></span>
                  <!-- <input class="form-control col-md-12" id= type="text" aria-describedby="emailHelp" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="Enter CNIC Like (12333-1234123-3)" title="Enter Consumer CNIC Number" name="cons_cnic" >
                 <div class="modal-footer">
                  <input  class="btn btn-success btn-block col-md-2" id="search_btn"  type="submit" value="search" title="search consumer">
                 </div> -->
                 
                </div>
            </div>
           <?php  echo form_close();?><hr>
        </div>
      </div>
    </div>
  </div>

<?php 
}
if(isset($area_detail) and isset($con_type_detail) and isset($meter_type_detail))
 { 
  //addNewConnectionToExistingConsumer($area_detail,$con_type_detail,$meter_type_detail);
   // newConsumerRegistration($area_detail,$con_type_detail,$meter_type_detail);

  if(isset($t)){
    if(!$t){
          newConsumerRegistration($area_detail,$con_type_detail,$meter_type_detail);
         }
      else if($t){
        addNewConnectionToExistingConsumer($area_detail,$con_type_detail,$meter_type_detail);
      } //endelseif
  } //endif
}


//end if

  function newConsumerRegistration($area_detail,$con_type_detail,$meter_type_detail)
{
  
  ?>

    <div class="container">
      <div class="card card-register mx-auto mt-9" style="border: 1px solid;">
         <div class="card-header">
          <h3>New Consumer Registration</h3></div>
        <div class="card-body">
          <hr>
         <?php //myController/newConnection
          echo form_open_multipart('myController/newConnection'); ?>
            
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="exampleInputName"><b>First Name</b></label>
                    <input class="form-control" name="cons_fname" type="text" aria-describedby="nameHelp" placeholder="Enter first name" title="Enter Your First Name" required="true">
                    <?php echo "<p style='color:red;'>".form_error("cons_fname"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Last Name</b></label>
                  <input class="form-control" name="cons_lname" type="text" aria-describedby="nameHelp" title="Enter Your Last Name" placeholder="Enter last name" required="true">
                  <?php echo "<p style='color:red;'>".form_error("cons_lname"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputName"><b>Father/Husband Name</b></label>
                  <input class="form-control" name="cons_fathername" type="text" aria-describedby="nameHelp" placeholder="Enter Father/Husband Name" title="Enter Father/Husband Name" required="true">
                  <?php echo "<p style='color:red;'>".form_error("cons_fathername"," ")."</p>";?>
                </div>
                 <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Gender</b></label>
                  <div class="form-control">
                  <input  type="radio" name="cons_gender" value="male" required="true">&nbsp; Male  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  type="radio" name="cons_gender" value="female" required="true" > &nbsp;Female</div>
                  <?php echo "<p style='color:red;'>".form_error("cons_gender"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Date of Birth</b></label>
                  <input class="form-control" required="true" name="cons_dob"  type="date"  title="select D.O.B">
                  <?php echo "<p style='color:red;'>".form_error("cons_dob"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>CNIC</b></label>
                  <?php $cnic= $_SESSION['cons_cnic'];?>
                  <input class="form-control" name="cons_cnic1" required="true" type="text" aria-describedby="nameHelp" value="<?php echo $cnic;?>" title="Enter CNIC" placeholder="CNIC" disabled>
                  <input class="form-control"  type="hidden" name="cons_cnic1" value="<?php echo $cnic;?>" >
                  <?php echo "<p style='color:red;'>".form_error("cons_cnic1"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputName"><b>Phone</b></label>
                  <input class="form-control" required="true" name="cons_phone" type="text" aria-describedby="nameHelp" placeholder="Enter Phone" title="Enter Phone">
                  <?php echo "<p style='color:red;'>".form_error("cons_phone"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Cell Number</b></label>
                  <input class="form-control" required="true" name="cons_cellnumber" type="text" aria-describedby="nameHelp" title="Enter Your Cell Number" placeholder="Enter Cell Number">
                  <?php echo "<p style='color:red;'>".form_error("cons_cellnumber"," ")."</p>";?>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputName"><b>Permanent Address</b></label>
                  <textarea class="form-control" name="cons_permanent_address" aria-describedby="nameHelp" placeholder="Enter Permanent Address" title="Enter Permanent Address" required="true"></textarea>
                  <?php echo "<p style='color:red;'>".form_error("cons_permanent_address"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Current Address</b></label>
                  <textarea class="form-control" name="cons_current_address" aria-describedby="nameHelp" title="Enter Current Address" placeholder="Enter Current Address" required="true"></textarea>
                  <?php echo "<p style='color:red;'>".form_error("cons_current_address"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                <label for=""><b>Email address</b> (Optional)</label>
                <input class="form-control" name="cons_email" type="text" aria-describedby="emailHelp" placeholder="Enter email" title="Enter Your Email">
            </div>
            <!--  <div class="col-md-6">
                <label for=""><b>Consumer Photo</b> (Optional)</label>
                <input class="form-control" name="cons_img" type="file" aria-describedby="emailHelp" required="true" >
              <!
                <input class="btn btn-primary" name="step2" type="submit" value="Next Step"> 
            </div> -->
          
          </div>
        </div>
        <?php 
          // if (isset($_POST['step2'])) {
          //   $_SESSION['cons_detail']=array('product_name'=>$data['pro_name'],'price'=>$data['price'],'pro_img'=>$data['pro_image'], 'quantity'=>$quantity);
          // }
        ?>
            <hr>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-4">
                  <label for="exampleInputName"><b>Select Area</b></label>
                  <select class="form-control" required="true" id="areaselect" name="cons_area" aria-describedby="nameHelp">
                    <option value="">--select one--</option> 
                  <?php  $i=1; if(isset($area_detail)): foreach ($area_detail as $k):?>
                  <option value="<?php echo $k['area_id'];?>">
                    <?php echo $k['area_name'];?>
                  </option>
                <?php endforeach; endif;?>
                  </select>
                  <?php echo "<p style='color:red;'>".form_error("cons_area"," ")."</p>";?>
                </div>
               
               <div class="col-md-4" >
                    <label for="exampleInputEmail1"><b>Old Consumer Number</b></label>
                      <input class="form-control" required="true" type="text" aria-describedby="emailHelp" name="cons_old_number" placeholder="Enter Consumer Old Number" value="">
                      <?php echo "<p style='color:red;'>".form_error("cons_old_number"," ")."</p>";?>
              </div>
              <div class="col-md-4" >
                    <label for="exampleInputEmail1"><b>New Consumer Number</b></label><?php $cd=date('ymd'); $ccdd= $cd.random_number(4);?>
                    <input class="form-control" required="true"  type="text" aria-describedby="emailHelp" placeholder="Create Consumer Number" title="Consumer Number"  id="test3" disabled="true" value="<?php echo $ccdd;?>">
                    <input class="form-control"  type="hidden"  id="test3" name="cons_new_number" value="<?php echo $ccdd;?>">
                    <?php echo "<p style='color:red;'>".form_error("cons_new_number"," ")."</p>";?>
              </div>
                <!-- <div style="float: left;" >
                <input  class="btn btn-success" id="createNum" type="button" value="create" title="create consumer number">
                </div> -->
            </div>
          </div>
            <div class="form-group">
              <div class="form-row">
                  <div class="col-md-6">
                  <label for="exampleInputEmail1"><b>Connection Type</b></label>
                  <select class="form-control" required="true" id="exampleInputEmail1" aria-describedby="emailHelp" title="Enter Connection Type" name="cons_conn_type">
                    <option value="">--select one--</option>
                    <?php  $i=1; if(isset($con_type_detail)): foreach ($con_type_detail as $k):?>
                      <option value="<?php echo $k['con_type_id'];?>">
                        <?php echo $k['con_type_name'];?>
                      </option>
                    <?php endforeach; endif;?>
                  </select>
                  <?php echo "<p style='color:red;'>".form_error("cons_conn_type"," ")."</p>";?>
                </div>

                <div class="col-md-6">
                  <label for="exampleConfirmPassword"><b>Connection Date (y/m/d)</b></label>
                  <?php //$cdate= date('Y/m/d');
                   // $cdate = date("m/d/Y G:ia");
                  ?>
                  <input class="form-control" required="true" id="exampleConfirmPassword" type="date"  title="date of connection" name="cons_conn_date" >
                  <?php echo "<p style='color:red;'>".form_error("cons_conn_date"," ")."</p>";?>
                </div>
            
          </div>
          </div>
            <!-- <div class="form-group">
              <label for="exampleInputEmail1"><b>Charges</b></label>
              <div class="form-row">
                <div class="col-md-6">
                  <input class="form-control" id="exampleInputEmail1" type="checkbox" aria-describedby="emailHelp" title="Surcharge"> Surcharge
                </div>
                <div class="col-md-6"> Bank Charge
                  <input class="form-control" id="exampleInputEmail1" type="checkbox"  title="Bank Charge">
                </div>
              </div>
            </div> -->
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputPassword1"><b>Meter Number</b></label>
                  <input class="form-control" name="cons_meter_no" type="text" placeholder="Meter Number" title="Enter Meter">
                  <?php echo "<p style='color:red;'>".form_error("cons_meter_no"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputEmail1"><b>Meter Type</b></label>
                    <select class="form-control" name="cons_meter_type" aria-describedby="emailHelp" title="Select Meter Type">
                      <option value="">--select one--</option>
                      <?php  $i=1; if(isset($meter_type_detail)): foreach ($meter_type_detail as $k):?>
                  <option value="<?php echo $k['meter_type_id'];?>">
                    <?php echo $k['meter_type_name'];?>
                  </option>
                <?php endforeach; endif;?>
                    </select>
                    <?php echo "<p style='color:red;'>".form_error("cons_meter_type"," ")."</p>";?>
                </div>
              </div>
            </div>
            <hr>
            <div class="modal-footer">
             <?php
                echo form_submit(['name'=>'add_new_connection', 'value'=>'Register','class'=>'btn btn-primary btn-block col-md-2','data-target'=>'#cirm_connection','data-toggle'=>'modal']); ?>
            </div>
           <?php  echo form_close();?>
           <hr>
        </div>
      </div>
    </div>

<?php
//unset($_SESSION['cons_cnic']);  
}
//new registration function closed 
function random_number($maxlength = 17) {
    // $chary = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",
    //                 "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
    //                 "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
  $chary = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
                    "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
    $return_str = "";
    for ( $x=0; $x<=$maxlength; $x++ ) {
        $return_str .= $chary[rand(0, count($chary)-1)];
    }
    return $return_str;
}
function addNewConnectionToExistingConsumer($area_detail,$con_type_detail,$meter_type_detail)
 {
   ?>
   <?php echo @$mge;?>
   <div class="container">
      <div class="card card-register mx-auto mt-5" style="border: 1px solid;">
        <div class="card-header"><h3>Add Connection To <?php echo $_SESSION['cons_cnic'];?></h3></div>
        <div class="card-body">
          <hr>
          <?php echo form_open_multipart('myController/newConnection'); ?>
           <div class="form-group">
              <div class="form-row">
                <div class="col-md-4">
                  <label for="exampleInputName"><b>Select Area</b></label>
                  <select class="form-control" required="true" id="areaselect" name="cons_area" aria-describedby="nameHelp">
                    <option value="">--select one--</option> 
                  <?php  $i=1; if(isset($area_detail)): foreach ($area_detail as $k):?>
                  <option value="<?php echo $k['area_id'];?>">
                    <?php echo $k['area_name'];?>
                  </option>
                <?php endforeach; endif;?>
                  </select>
                  <?php echo "<p style='color:red;'>".form_error("cons_area"," ")."</p>";?>
                </div>
               
               <div class="col-md-4" >
                    <label for="exampleInputEmail1"><b>Old Consumer Number</b></label>
                      <input class="form-control" required="true" type="text" aria-describedby="emailHelp" name="cons_old_number" placeholder="Enter Consumer Old Number" value="">
                      <?php echo "<p style='color:red;'>".form_error("cons_old_number"," ")."</p>";?>
              </div>
              <div class="col-md-4" >
                    <label for="exampleInputEmail1"><b>New Consumer Number</b></label><?php $cd=date('ymd'); $ccdd= $cd.random_number(4);?>
                    <input class="form-control" required="true"  type="text" aria-describedby="emailHelp" placeholder="Create Consumer Number" title="Consumer Number"  id="test3" disabled="true" value="<?php echo $ccdd;?>">
                    <input class="form-control"  type="hidden"  id="test3" name="cons_new_number" value="<?php echo $ccdd;?>">
                    <?php echo "<p style='color:red;'>".form_error("cons_new_number"," ")."</p>";?>
              </div>
                <!-- <div style="float: left;" >
                <input  class="btn btn-success" id="createNum" type="button" value="create" title="create consumer number">
                </div> -->
            </div>
          </div>
            <div class="form-group">
              <div class="form-row">
                  <div class="col-md-6">
                  <label for="exampleInputEmail1"><b>Connection Type</b></label>
                  <select class="form-control" required="true" id="exampleInputEmail1" aria-describedby="emailHelp" title="Enter Connection Type" name="cons_conn_type">
                    <option value="">--select one--</option>
                    <?php  $i=1; if(isset($con_type_detail)): foreach ($con_type_detail as $k):?>
                      <option value="<?php echo $k['con_type_id'];?>">
                        <?php echo $k['con_type_name'];?>
                      </option>
                    <?php endforeach; endif;?>
                  </select>
                  <?php echo "<p style='color:red;'>".form_error("cons_conn_type"," ")."</p>";?>
                </div>

                <div class="col-md-6">
                  <label for="exampleConfirmPassword"><b>Connection Date (y/m/d)</b></label>
                  <?php //$cdate= date('Y/m/d');
                   // $cdate = date("m/d/Y G:ia");
                  ?>
                  <input class="form-control" required="true" id="exampleConfirmPassword" type="date"  title="date of connection" name="cons_conn_date" >
                  <?php echo "<p style='color:red;'>".form_error("cons_conn_date"," ")."</p>";?>
                </div>
            
          </div>
          </div>
            <!-- <div class="form-group">
              <label for="exampleInputEmail1"><b>Charges</b></label>
              <div class="form-row">
                <div class="col-md-6">
                  <input class="form-control" id="exampleInputEmail1" type="checkbox" aria-describedby="emailHelp" title="Surcharge"> Surcharge
                </div>
                <div class="col-md-6"> Bank Charge
                  <input class="form-control" id="exampleInputEmail1" type="checkbox"  title="Bank Charge">
                </div>
              </div>
            </div> -->
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputPassword1"><b>Meter Number</b></label>
                  <input class="form-control" name="cons_meter_no" type="text" placeholder="Meter Number" required="true" title="Enter Meter">
                  <?php echo "<p style='color:red;'>".form_error("cons_meter_no"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputEmail1"><b>Meter Type</b></label>
                    <select class="form-control" required="true" name="cons_meter_type" aria-describedby="emailHelp" title="Select Meter Type">
                      <option value="">--select one--</option>
                      <?php  $i=1; if(isset($meter_type_detail)): foreach ($meter_type_detail as $k):?>
                  <option value="<?php echo $k['meter_type_id'];?>">
                    <?php echo $k['meter_type_name'];?>
                  </option>
                <?php endforeach; endif;?>
                    </select>
                    <?php echo "<p style='color:red;'>".form_error("cons_meter_type"," ")."</p>";?>
                </div>
              </div>
            </div>
            <hr>
            <div class="modal-footer">
             <?php
                echo form_submit(['name'=>'add_to_existing_connection', 'value'=>'Register','class'=>'btn btn-primary btn-block col-md-2','data-target'=>'#cirm_connection','data-toggle'=>'modal']); ?>
            </div>
           <?php  echo form_close();?>
           <hr>
        </div>
      </div>
    </div>

   <?php
  // unset($_SESSION['cons_cnic']);
 }//existing function closed

?>
</div> <!--container fluid close-->
</div>

  <!--Pop up-->
   <!--  <div class="modal fade" id="confirm_connection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirm!</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "OK" below if you are confirmed consumer registration.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="">OK</a>
          </div>
        </div>
      </div>
    </div> -->
   <?php include_once("includes/jqueryFile.php"); ?>
</body>
</html>