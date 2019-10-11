<!DOCTYPE html>
<html lang="en">

<head>
  <title>Meter type</title>
  <?php include_once("includes/htmlFile.php"); ?>
 
  <?php //include_once("./home.php");?>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
  <?php require 'header.php'; ?>
  <?php require 'footer.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
          <?php if (isset($updmt)) { updateMt($updmt, @$mge);}else{ addNew(@$mge);}?>

    <div class="card mb-3 mt-4" style="border: 1px solid;">
        <div class="card-header">
          <i class="fa fa-table"></i> <b>Meter Types</b> </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="btn-dark">
                <tr>
                  <th>S.No</th>
                  <th>Meter Type</th>
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
                <?php $i=1; if(isset($meter_type_detail)): foreach ($meter_type_detail as $k):?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?= $k['meter_type_name']?></td>
                    <td>

                      <?php 
                      $id=$k['meter_type_id'];
                      $n=$k['meter_type_name'];
                      echo anchor("myController/updateMeterType?edit_id=$id","Edit",['class'=>'btn btn-primary btn-sm']); 

                      ?>
                              <!--pop updct-->
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
                    <?= //?del_id=$id
                    anchor("myController/deleteConnType?del_id=$id",'Yes',['class'=>'btn btn-danger']);?>
                  </div>
                </div>
              </div>
            </div>
                      &nbsp;&nbsp;
                       <!--i class="btn btn-danger" data-toggle="modal" data-target="#DeleteConfirm">Delete</i-->
                       <!-- <?= anchor("myController/deleteMeterType?del_id=$id",'Delete',['class'=>'btn btn-danger btn-sm']);?> -->
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
      <div class="card-header"><h3 style="text-align: center;">Add New Meter Type</h3></div>
      <div class="card-body">
        <?php echo form_open('myController/addMeterTpye'); ?>
        <?php //if(isset($mge)){ echo $mge;}else{ echo 'nothing';};?>
          <div class="form-group">
              <div class="col-md-12">
                <label for="exampleInputEmail1"><b>Type Name</b></label>
                <!--input type="text" name="area_name" value="" class="form-control"-->
                <?php echo form_input(['type'=>'text','name'=>'meter_type_name','placeholder'=>'Meter Type Name',"value"=>"",'class'=>'form-control','title'=>'meter type name','required'=>"true"]);
                echo "<p style='color:red;'>".form_error("meter_type_name"," ")."</p>"; ?>
              </div>
            <!--button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button-->
            
              <div class="modal-footer">
                    <?php
                      echo form_submit(['name'=>'add_meter_type', 'value'=>'save','class'=>'btn btn-primary btn-block col-md-2']);
                       ?>
                 
            
           </div>
           <?php  echo form_close();?>
          </div>
        </div>
    </div>
  </div>
  <?php
} //end addNew


function updateMt($ap,$mge)
{?>
<div class="container">
    <div class="card card-register mx-auto mt-2" style="border: 1px solid;">
      <?php echo "<h4 style='color:red;'>".@$mge."</h4>"; ?>
      <div class="card-header"><h3 style="text-align: center;">Edit Meter Type</h3></div>
      <div class="card-body">
        <?php echo form_open('myController/updateMeterType'); ?>
          <div class="form-group">
              <div class="col-md-12">
                <label ><b>Meter Type Name</b></label>
                <?php //print_r($area_detail);
                  foreach ($ap as $u) {
                    $mtname=$u['meter_type_name'];
                    $mtId=$u['meter_type_id'];
                  }
                  
                ?>
                <?php echo form_input(['type'=>'hidden','name'=>'meter_type_id',"value"=>"$mtId",'class'=>'form-control']);?>
                <!--input type="text" name="area_name" value="" class="form-control"-->
                <?php echo form_input(['type'=>'text','name'=>'meter_type_name',"value"=>"$mtname",'class'=>'form-control','title'=>'meter type name','required'=>"true"]);
                echo "<p style='color:red;'>".form_error("meter_type_name"," ")."</p>"; ?>
              </div>
            <!--button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button-->
           <div class="modal-footer">
            <?php
            echo form_submit(['name'=>'meter_t', 'value'=>'save','class'=>'btn btn-primary btn-block col-md-2']);
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