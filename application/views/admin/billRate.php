<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bill Rate</title>
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
})(jQuery);</script>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
  <?php require 'header.php'; ?>
  <?php require 'footer.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="card mb-3 mt-4" >
       <?php echo @$mge; ?>
       </div>
<?php //print_r($con_type);exit;
 if (isset($upd)) { updatBillrate($upd, @$mge,@$UconTname);}else{ addNew(@$mge,$con_type);}?>

<div class="card mb-3 mt-4" style="border: 1px solid;">
        <div class="card-header">
          <i class="fa fa-table"></i> <b>Bill Rates</b> </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="3">
              <thead class="btn-dark">
                <tr>
                  <th>S.No</th>
                  <th>Connection Type</th>
                  <th>Unit Range</th>
                  <th>Per Unit Rate</th>
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
                <?php $i=1; if(isset($bill_rate_detail)): foreach ($bill_rate_detail as $k):?>
                  <tr>
                      <td><?php echo $i++;?></td>
                      <td><?= $k['con_type_name']?></td>
                      <td><?= $k['unit_range_from']?> To <?= $k['unit_range_to']?></td>
                      <td><?= $k['per_unit_rate']?></td>

                      <td>
                        <?php 
                        $id=$k['tariff_id'];
                        $et=$k['con_type_name'];
                        echo anchor("myController/updateBillRate?edit_id=$id & et_ctname=$et","Edit",['class'=>'btn btn-primary btn-sm']); ?>
                        &nbsp;&nbsp;
                         <!--i class="btn btn-danger" data-toggle="modal" data-target="#DeleteConfirm">Delete</i-->
                         <?php //echo anchor("myController/delete_bill_rate?del_id=$id",'Delete',['class'=>'btn btn-danger btn-sm']);?>
                      </td>
                  </tr>

              <div class="modal fade" id="DeleteConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Alert!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body"> Are you sure to delete this?</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <?= anchor("myController/deleteArea?del_id=$id",'Yes',['class'=>'btn btn-danger']);?>
                  </div>
                </div>
              </div>
            </div>
                
                   
                 <?php endforeach; endif;?>
              </tbody>
            </table>
          </div>
        </div>
        
      </div>
   </div>
</div>
    <?php 
function addNew($mge,$con_type)
{?>
<div class="container">
    <div class="card card-register mx-auto mt-3" style="border: 1px solid;">
      <div class="card-header"><h3 style="text-align: center;">Bill Rates</h3></div>
      <div class="card-body">
        <?php echo form_open('myController/addbillRate'); ?>
        <?php //if(isset($mge)){ echo $mge;}else{ echo 'nothing';}emp_type;?>
          <div class="form-group">
            <div class="col-md-12">
                <label for="exampleInputName"><b>Select Connection Type</b></label>
                <select class="form-control" id="exampleInputName" aria-describedby="nameHelp" name="select_conn_type" required="true">
                  <option value="" >--select one--</option>
                  <?php  $i=1; if(isset($con_type)): foreach ($con_type as $k):?>
                  <option value="<?php echo $k['con_type_id'];?>">
                    <?php echo $k['con_type_name'];?>
                  </option>
                <?php endforeach; endif;?>
                </select>
                <?php echo "<p style='color:red;'>".form_error("select_conn_type"," ")."</p>"; ?>
              </div>
              <div class="col-md-12">
                <label for="exampleInputEmail1"><b>Unit Range From</b></label>
                <!--input type="text" name="area_name" value="" class="form-control"-->
                <?php echo form_input(['type'=>'text','name'=>'unit_range_from','placeholder'=>'Unit Range From',"value"=>"",'class'=>'form-control','title'=>'Unit Range From','required'=>"true"]);
                echo "<p style='color:red;'>".form_error("unit_range_from"," ")."</p>"; ?>
              </div>
              <div class="col-md-12">
                <label for="exampleInputEmail1"><b>Unit Range To</b></label>
                <?php 
                  echo form_input(['type'=>'text', 'name'=>'unit_range_to','placeholder'=>'Unit Range To','class'=>'form-control','title'=>'Unit Range To','required'=>"true"]);
                  echo "<p style='color:red;'>".form_error("unit_range_to"," ")."</p>"; ?>
              </div>
              <div class="col-md-12">
                <label for="exampleInputEmail1"><b>Per Unit Rate</b></label>
                <?php 
                  echo form_input(['type'=>'text', 'name'=>'per_unit_rate','placeholder'=>'Unit Rate','class'=>'form-control','title'=>'Unit Rate','required'=>"true"]);
                  echo "<p style='color:red;'>".form_error("per_unit_rate"," ")."</p>"; ?>
              </div>
            <!--button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button-->
          <div class="modal-footer">
            <?php
            echo form_submit(['name'=>'add_bill_rate', 'value'=>'save','class'=>'btn btn-primary btn-block col-md-2']);
             ?>
           </div>
           <?php  echo form_close();?>
          </div>
        </div>
    </div>
  </div>
  <?php
} //end addNew
function updatBillrate($ap,$mge,$UconTname)
{?>
<div class="container">
    <div class="card card-register mx-auto mt-2" style="border: 1px solid;">
      <?php echo "<h4 style='color:red;'>".@$mge."</h4>"; ?>
      <div class="card-header"><h3 style="text-align: center;">Edit Unit Rates for 
        <?php echo @$UconTname; ?></h3></div>
      <div class="card-body">
        <?php echo form_open('myController/updateBillRate'); ?>
          <div class="form-group">
                <?php //print_r($area_detail);
                  foreach ($ap as $u) {
                    $uid=$u['tariff_id'];
                    $urf=$u['unit_range_from'];
                    $urt=$u['unit_range_to'];
                    $pur=$u['per_unit_rate'];
                  }
                  //echo $areaname;
                ?>
               <div class="col-md-12">
                <label for="exampleInputEmail1"><b>Unit Range From</b></label>
                <?php echo form_input(['type'=>'hidden','name'=>'tariff_id',"value"=>"$uid",'class'=>'form-control']);?>
                <!--input type="text" name="area_name" value="" class="form-control"-->
                <?php echo form_input(['type'=>'text','name'=>'unit_range_from','placeholder'=>'Unit Range From',"value"=>"$urf",'class'=>'form-control','title'=>'Unit Range From','required'=>"true"]);
                echo "<p style='color:red;'>".form_error("unit_range_from"," ")."</p>"; ?>
              </div>
              <div class="col-md-12">
                <label for="exampleInputEmail1"><b>Unit Range To</b></label>
                <?php 
                  echo form_input(['type'=>'text', 'name'=>'unit_range_to','placeholder'=>'Unit Range To','class'=>'form-control','required'=>"true","value"=>"$urt",'title'=>'Unit Range To']);
                  echo "<p style='color:red;'>".form_error("unit_range_to"," ")."</p>"; ?>
              </div>
              <div class="col-md-12">
                <label for="exampleInputEmail1"><b>Per Unit Rate</b></label>
                <?php 
                  echo form_input(['type'=>'text', 'name'=>'per_unit_rate','placeholder'=>'Unit Rate','required'=>"true","value"=>"$pur",'class'=>'form-control','title'=>'Unit Rate']);
                  echo "<p style='color:red;'>".form_error("per_unit_rate"," ")."</p>"; ?>
              </div>
            <!--button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button-->
           <div class="modal-footer">
            <?php
            echo form_submit(['name'=>'update br', 'value'=>'save','class'=>'btn btn-primary btn-block col-md-2']);
             ?>
           </div>
           <?php  echo form_close();?>
          </div>
        </div>
    </div>
  </div>
  <?php
}
    ?>
<?php include_once("includes/jqueryFile.php"); ?>
</body>
</html>
