<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bill Collection Points</title>
  <?php include_once("includes/htmlFile.php"); ?>
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
 
  <?php //include_once("./home.php");?>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
  <?php require 'header.php'; ?>
  <?php require 'footer.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
          <?php if (isset($id)) { updateCollectionPoint($id, $rpname);}else{ addNew(@$mge);}?>

    <div class="card mb-3 mt-4" style="border: 1px solid;">
        <div class="card-header">
          <i class="fa fa-table"></i> <b>Bill Collection Points</b> </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="btn-dark">
                <tr>
                  <th>S.No</th>
                  <th>Collection Point Name</th>
                  <!-- <th>Cheque No</th> -->
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; if(isset($points)): foreach ($points as $k):?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?= $k['bill_collection_point_name']?></td>
                    <td>

                      <?php 
                      $id=$k['bill_collection_point_id'];
                      $n=$k['bill_collection_point_name'];
                      echo form_open("billController/updateCollectionPoints");
                      echo form_input(['type'=>'hidden','name'=>'receiving_point_name',"value"=>"$n"]);
                      echo form_input(['type'=>'hidden','name'=>'id',"value"=>"$id"]);
                      echo form_input(['type'=>'submit','name'=>'sub',"value"=>"Edit",'class'=>'btn btn-primary btn-sm']);
                     // echo anchor("billController/updateCollectionPoints/$id/$n","Edit",['class'=>'btn btn-primary btn-sm']); 


                      ?>
                      &nbsp;&nbsp;
                       <?php //echo anchor("billController/deleteColloctionPoint/$id",'Delete',['class'=>'btn btn-danger btn-sm']);
                       echo form_close();?>
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
  <?php echo "<h4 style='color:red;'>".@$mge."</h4>"; ?>
<div class="container">
    <div class="card card-register mx-auto mt-3" style="border: 1px solid;">
      
      <div class="card-header"><h3 style="text-align: center;">Add New Bill Receiving Point</h3></div>
      <div class="card-body">
        <?php echo form_open('billController/addRecievingPoint'); ?>
        <?php //if(isset($mge)){ echo $mge;}else{ echo 'nothing';};?>
          <div class="form-group">
              <div class="col-md-12">
                <label for="exampleInputEmail1"><b>Point Name</b></label>
                <!--input type="text" name="area_name" value="" class="form-control"-->
                <?php echo form_input(['type'=>'text','name'=>'receiving_point_name','placeholder'=>'Receiving Point Name',"value"=>"",'class'=>'form-control','title'=>'Receiving Point name','required'=>"true"]);
                echo "<p style='color:red;'>".form_error("receiving_point_name"," ")."</p>"; ?>
              </div>
               <!-- <div class="col-md-12">
                <label for="exampleInputEmail1"><b>Scroll Id/Cheque No</b></label>
                <!-input type="text" name="area_name" value="" class="form-control"-->
                <?php //echo form_input(['type'=>'text','name'=>'cheque_no','placeholder'=>'Scroll Id/Cheque No',"value"=>"",'class'=>'form-control','title'=>'Scroll Id/Cheque No']);
                // echo "<p style='color:red;'>".form_error("cheque_no"," ")."</p>"; ?>
              <!--</div> -->
            <!--button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button-->
            
              <div class="modal-footer">
                    <?php
                      echo form_submit(['name'=>'add_btn_point', 'value'=>'save','class'=>'btn btn-primary btn-block col-md-2']);
                       ?>
                 
            
           </div>
           <?php  echo form_close();?>
          </div>
        </div>
    </div>
  </div>
  <?php
} //end addNew


function updateCollectionPoint($id,$name1)
{?>
<?php echo "<h4 style='color:red;'>".@$mge."</h4>"; ?>
<div class="container">
    <div class="card card-register mx-auto mt-3" style="border: 1px solid;">
      
      <div class="card-header"><h3 style="text-align: center;">Edit Bill Receiving Point</h3></div>
      <div class="card-body">
        <?php echo form_open('billController/updateCollectionPoint1'); ?>
        <?php //if(isset($mge)){ echo $mge;}else{ echo 'nothing';};?>
          <div class="form-group">
              <div class="col-md-12">
                <label for="exampleInputEmail1"><b>Point Name</b></label>
                <!--input type="text" name="area_name" value="" class="form-control"-->
                <?php echo form_input(['type'=>'text','name'=>'receiving_point_name','placeholder'=>'Receiving Point Name',"value"=>"$name1",'class'=>'form-control','title'=>'Receiving Point name','required'=>"true"]);
                echo form_input(['type'=>'hidden','name'=>'id','placeholder'=>'Receiving Point Name',"value"=>"$id",'class'=>'form-control','title'=>'Receiving Point name']);
                echo "<p style='color:red;'>".form_error("receiving_point_name"," ")."</p>"; ?>
              </div>            
              <div class="modal-footer">
                    <?php
                      echo form_submit(['name'=>'upd_btn_point', 'value'=>'save','class'=>'btn btn-primary btn-block col-md-2']);
                       ?>            
           </div>
           <?php  echo form_close();?>
          </div>
        </div>
    </div>
  </div>
  <?php
}?>
<?php include_once("includes/jqueryFile.php"); ?>