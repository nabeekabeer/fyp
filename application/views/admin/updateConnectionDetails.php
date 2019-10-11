<!DOCTYPE html>
<html lang="en">
<?php //session_start();?>
<head>
  <title>edit Connection Info</title>
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

//     $('#search_cnum').keyup(function() {
//     $('span.error-keyup-1').hide();
//     $('span.error-keyup-2').hide();
//     $('span.error-keyup-3').hide();
//     var inputVal = $(this).val();
//     var numericReg = /^\d*[0-9][A-Z](|.\d*[0-9][A-Z]|,\d*[0-9][A-Z])?$/;
//     var charc=/([A-Z])\w+$/;
//     if(!numericReg.test(inputVal) && !charc.test(inputVal)) {
//         $('#spanbtn').after('<span class="error error-keyup-1" style="color:red;">&nbsp; &nbsp; Numeric characters and Capital Alphabats only.</span>');
//         $('#span_cnic').hide();
//    }
// });

    $('#search_btn').click(function(){
  $('span.error-keyup-1').hide();
  $('span.error-keyup-2').hide();
  $('span.error-keyup-3').hide();
   var cn=$('#search_cnum').val();
   if(cn=="")
   {
    $('#search_cnum').focus();
    $('#search_cnum').css('border-color','red');
    $('#spanbtn').after('<span class="error error-keyup-3" style="color:red;">&nbsp; This field must be filled...!</span>');
    return false;
   }else if(cn.length<11)
   {
    $('#search_cnum').focus();
    $('#search_cnum').css('border-color','red');
    $('#spanbtn').after('<span class="error error-keyup-2" style="color:red;">&nbsp; &nbsp;Invalid Consumer Number or length is less than 11.</span>');
    return false;
   }else if(cn.length>11){
    $('#search_cnum').focus();
    $('#search_cnum').css('border-color','red');
    $('#spanbtn').after('<span class="error error-keyup-2" style="color:red;">&nbsp; &nbsp;Invalid Consumer Number or Length is greater than 11</span>');
    return false;
   }
   else{
    $('#search_cnic').css('border-color','green');
    return true;
   }
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
   
<?php echo @$mge;
if(!@$t):
?>
<div class="container" id="search_consumer">
      <div class="card card-register mx-auto mt-5" style="border: 1px solid; box-shadow: 5px 5px #888888;">
        <div class="card-header text-center"><h3>Search Connection Detail</h3></div>
        <div class="card-body">
          <?php echo form_open('myController/searchConnByCNum'); ?>
            
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <label for="exampleInputEmail1"><b>Consumer New Number </b> (11 charachters only Like 180213MA4D7)</label>
                  <div class="input-group">
                  <?php echo form_input(['type'=>'text', 'name'=>'cons_new_num','placeholder'=>'Enter Consumer Number Like 180213MA4DR',"title"=>"Enter Consumer Number",'class'=>'form-control col-md-10', "onkeypress"=>"return  event.charCode>=48  && event.charCode<=90 ",'id'=>"search_cnum"]);?>
                  <button class="btn btn-primary" name="submit_SearchCN" id="search_btn" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
              </div>
              <br><span class="input-group-btn" id="spanbtn"></span>
                </div>
            </div>
           <?php  echo form_close();?><hr>
        </div>
      </div>
    </div>
  </div>


      <?php unset($_SESSION['cons_new_num']); else: foreach($conn_detail_to_update as $v):?>
      <div class="container">
      <div class="card card-register mx-auto mt-5" style="border: 1px solid; ">
        <div class="card-header text-center"><h3>Modify Connection Detail</h3></div>
        <div class="card-body">
          <hr>
          <?php echo form_open_multipart('myController/updateConnectionDetail2'); ?>
           <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputName"><b>Select Area</b></label>
                  <select class="form-control" required='true' id="areaselect" name="cons_area" aria-describedby="nameHelp">
                    <option value="">--select one--</option> 
                  <?php  $i=1; if(isset($area_detail)): foreach ($area_detail as $k):?>
                  <option value="<?php echo $k['area_id'];?>" <?php if($k['area_id']==$v['con_area_id']){
                      echo "selected";
                  }?> >
                    <?php echo $k['area_name'];?>
                  </option>
                <?php endforeach; endif;?>
                  </select>
                  <?php echo "<p style='color:red;'>".form_error("cons_area"," ")."</p>";?>
                </div>
               
               <div class="col-md-6" >
                    <label ><b>Consumer Old Number</b></label>
                      <input class="form-control"  type="text"  name="cons_old_number"  required='true' value="<?php echo $v['con_consumer_old_no'];?>" disabled>
                      <input class="form-control"  type="hidden"  name="cons_old_number"  value="<?php echo $v['con_consumer_old_no'];?>">
                      <input class="form-control"  type="hidden"  name="connection_idd"  value="<?php echo $v['connection_id'];?>">
              </div>
            </div>
          </div>
            <div class="form-group">
              <div class="form-row">
                  <div class="col-md-6">
                  <label for="exampleInputEmail1"><b>Connection Type</b></label>
                  <select required='true' class="form-control" name="cons_conn_type">
                    <option value="">--select one--</option>
                    <?php  $i=1; if(isset($con_type_detail)): foreach ($con_type_detail as $k):?>
                      <option value="<?php echo $k['con_type_id'];?>" <?php if($k['con_type_id']==$v['con_con_type_id']){
                      echo "selected";
                  }?>>
                        <?php echo $k['con_type_name'];?>
                      </option>
                    <?php endforeach; endif;?>
                  </select>
                  <?php echo "<p style='color:red;'>".form_error("cons_conn_type"," ")."</p>";?>
                </div>

                <div class="col-md-6">
                  <label for="exampleConfirmPassword"><b>Connection Date (y/m/d)</b></label>
                  <input required='true' class="form-control" id="exampleConfirmPassword" type="date"  title="date of connection" name="cons_conn_date" value="<?php echo $v['con_date'];?>" >
                  <?php echo "<p style='color:red;'>".form_error("cons_conn_date"," ")."</p>";?>
                </div>
            
          </div>
          </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputPassword1"><b>Meter Number</b></label>
                  <input required='true' class="form-control" name="cons_meter_no" type="text" value="<?php echo $v['con_meter_number'];?>">
                  <?php echo "<p style='color:red;'>".form_error("cons_meter_no"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputEmail1"><b>Meter Type</b></label>
                    <select  required='true' class="form-control" name="cons_meter_type" aria-describedby="emailHelp" title="Select Meter Type">
                      <option value="">--select one--</option>
                      <?php  $i=1; if(isset($meter_type_detail)): foreach ($meter_type_detail as $k):?>
                  <option value="<?php echo $k['meter_type_id'];?>" <?php if($k['meter_type_id']==$v['cons_meter_type_id']){
                      echo "selected";
                  }?>>
                    <?php echo $k['meter_type_name'];?>
                  </option>
                <?php endforeach; endif;?>
                    </select>
                    <?php echo "<p style='color:red;'>".form_error("cons_meter_type"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                 <label for="exampleInputLastName"><b>Connection close/open</b></label>
                  <div >
                  <input  type="radio" required='true' name="conn_status" <?php if($v['con_status']=='0'){ echo 'checked';};?> value="0" >&nbsp; open &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  type="radio" <?php if($v['con_status']=='1'){ echo 'checked';};?> name="conn_status" required='true' value="1" > &nbsp;close</div>
                  <?php echo "<p style='color:red;'>".form_error("conn_status"," ")."</p>";?>
                </div>
              </div>
            </div>
            <hr>
            <div class="modal-footer">
             <?php
                echo form_submit(['name'=>'modify_connection', 'value'=>'save','class'=>'btn btn-primary btn-block col-md-2','data-target'=>'#cirm_connection','data-toggle'=>'modal']); ?>
            </div>
           <?php  echo form_close(); //endforeach;?>
           <hr>
        </div>
      </div>
    </div>
<?php endforeach; endif;?>

    </div>
  </div>
  <?php include_once("includes/jqueryFile.php"); ?>
</body>
</html>