<!DOCTYPE html>
<html lang="en">

<head>
  <title>charges</title>
  <?php include_once("includes/htmlFile.php"); ?>
  <?php //include_once("./home.php");?>
  <script src="<?php echo base_url('asset/jQuery/jquery.min.js')?>" ></script>
  <script  type="text/javascript">
$.noConflict();
 (function($){
$(document).ready(function(){
    $('#closeBtn').click(function(){
      $('#card-header-msg').hide();
    });
  });
})(jQuery);
</script>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
  <?php require 'header.php'; ?>
  <?php require 'footer.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
<?php if (isset($upd)) { updateArea($upd, @$mge);}else{ addNew(@$mge);}?>

<div class="card mb-3 mt-4" style="border: 1px solid;">
        <div class="card-header">
          <i class="fa fa-table"></i> <b>Charges Detail</b> </div>
   
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="3">
              <thead class="btn-dark">
                <tr>
                  <th>S.No</th>
                  <th>Charge Type Name</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <!--tfoot>
                <tr>
                  <th>Area Name</th>
                  <th>Area Code</th>
                  <th>Action</th>
                </tr>
              </tfoot-->
              <tbody>
                <?php $i=1; if(isset($charges)): foreach ($charges as $k):?>
                  <tr>
                      <td><?php echo $i++;?></td>
                      <td><?= $k['charge_type']?></td>
                      <td><?= $k['charge_amount']?></td>
                      <td>
                        <?php 
                        $id=$k['charges_id'];
                        echo anchor("myController/updateCharge?edit_id=$id","Edit",['class'=>'btn btn-primary btn-sm']); ?>
                        &nbsp;&nbsp;
                         <!--i class="btn btn-danger" data-toggle="modal" data-target="#DeleteConfirm">Delete</i-->
                          <?php //anchor("myController/deleteArea?del_id=$id",'Delete',['class'=>'btn btn-danger btn-sm']);?>
                      </td>
                  </tr>
                <?php endforeach; endif;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
   </div>
</div>
    <?php 
function addNew($mge)
{?>
<div class="container">
    <div class="card card-register mx-auto mt-3" style="border: 1px solid;">
      <?php echo "<h4 style='color:red;'>".@$mge."</h4>"; ?>
      <div class="card-header"><h3 style="text-align: center;">Add Charge</h3></div>
      <div class="card-body">
        <?php echo form_open('myController/addCharge'); ?>
        <?php //if(isset($mge)){ echo $mge;}else{ echo 'nothing';};?>
          <div class="form-group">
              <div class="col-md-12">
                <label for="exampleInputEmail1"><b>Charge Type Name</b></label>
                <!--input type="text" name="area_name" value="" class="form-control"-->
                <?php echo form_input(['type'=>'text','name'=>'ct_name','placeholder'=>'Enter Charge Type Name',"value"=>"",'class'=>'form-control','title'=>'area name','required'=>"true"]);
                echo "<p style='color:red;'>".form_error("ct_name"," ")."</p>"; ?>
              </div>
              <div class="col-md-12">
                <label for="exampleInputEmail1"><b>Charged Amount</b></label>
                <?php 
                  echo form_input(['type'=>'text', 'name'=>'ct_amount','placeholder'=>'Enter Amount','class'=>'form-control','required'=>"true" ,'title'=>'area code']);
                  echo "<p style='color:red;'>".form_error("ct_amount"," ")."</p>"; ?>
              </div>
            <!--button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button-->
          <div class="modal-footer">
            <?php
            echo form_submit(['name'=>'add_ct', 'value'=>'save','class'=>'btn btn-primary btn-block col-md-2']);
             ?>
           </div>
           <?php  echo form_close();?>
          </div>
        </div>
    </div>
  </div>
  <?php
} //end addNew
function updateArea($ap,$mge)
{?>
<div class="container">
    <div class="card card-register mx-auto mt-2" style="border: 1px solid;">
      <?php echo "<h4 style='color:red;'>".@$mge."</h4>"; ?>
      <div class="card-header"><h3 style="text-align: center;">Edit Charge</h3></div>
      <div class="card-body">
        <?php echo form_open('myController/updateCharge'); ?>
          <div class="form-group">
              <div class="col-md-12">
                <label ><b>Charge Type Name</b></label>
                <?php //print_r($area_detail);
                  foreach ($ap as $u) {
                    $charge_name=$u['charge_type'];
                    $charge_amount=$u['charge_amount'];
                    $cid=$u['charges_id'];
                  }
                  //echo $areaname;
                ?>
                <?php echo form_input(['type'=>'hidden','name'=>'area_id',"value"=>"$cid",'class'=>'form-control','title'=>'area name','required'=>"true"]);?>
                <!--input type="text" name="area_name" value="" class="form-control"-->
                <?php echo form_input(['type'=>'text','name'=>'area_name',"value"=>"$charge_name",'class'=>'form-control','title'=>'area name']);
                echo "<p style='color:red;'>".form_error("area_name"," ")."</p>"; ?>
              </div>
              <div class="col-md-12">
                <label for="exampleInputEmail1"><b>Amount</b></label>
                <?php 
                  echo form_input(['type'=>'text', 'name'=>'area_code',"value"=>"$charge_amount",'class'=>'form-control','title'=>'area code','required'=>"true"]);
                  echo "<p style='color:red;'>".form_error("area_code"," ")."</p>"; ?>
              </div>
            <!--button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button-->
           <div class="modal-footer">
            <?php
            echo form_submit(['name'=>'add_area', 'value'=>'save','class'=>'btn btn-primary btn-block col-md-2']);
             ?>
           </div>
           <?php  echo form_close();?>
          </div>
        </div>
    </div>
  </div>
  <?php
}?>
<?php include_once("includes/jqueryFile.php");
?>
</body>
</html>