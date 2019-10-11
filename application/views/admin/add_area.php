<!DOCTYPE html>
<html lang="en">

<head>
  <title>add new area</title>
  <?php include_once("includes/htmlFile.php"); ?>
  <?php //include_once("./home.php");?>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
  <?php require 'header.php'; ?>
  <?php require 'footer.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
<?php if (isset($upd)) { updateArea($upd, @$mge);}else{ addNew(@$mge);}?>

<div class="card mb-3 mt-4" style="border: 1px solid;">
        <div class="card-header">
          <i class="fa fa-table"></i> <b>Existing Area Detail</b> </div>
   
        <div class="card-body" >
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="3">
              <thead class="btn-dark">
                <tr>
                  <th>S.No</th>
                  <th>Area Name</th>
                  <th>Area Code</th>
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
                <?php $i=1; if(isset($area_detail)): foreach ($area_detail as $k):?>
                  <tr>
                      <td><?php echo $i++;?></td>
                      <td><?= $k['area_name']?></td>
                      <td><?= $k['area_code']?></td>
                      <td align='center'>
                        <?php 
                        $id=$k['area_id'];
                        echo anchor("myController/updateArea?edit_id=$id","Edit",['class'=>'btn btn-primary btn-sm']); ?>
                        &nbsp;&nbsp;
                         <!--i class="btn btn-danger" data-toggle="modal" data-target="#DeleteConfirm">Delete</i-->
                         <!--  <?= anchor("myController/deleteArea?del_id=$id",'Delete',['class'=>'btn btn-danger btn-sm']);?> -->
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
        <!-- <div class="card-footer text-muted">Updated yesterday at 11:59 PM</div> -->
      </div>
   </div>
</div>
    <?php 
function addNew($mge)
{?>
<div class="container">
    <div class="card card-register mx-auto mt-3" style="border: 1px solid;">
      <?php echo "<h4 style='color:red;'>".@$mge."</h4>"; ?>
      <div class="card-header"><h3 style="text-align: center;">Add New Area</h3></div>
      <div class="card-body">
        <?php echo form_open('myController/newArea'); ?>
        <?php //if(isset($mge)){ echo $mge;}else{ echo 'nothing';};?>
          <div class="form-group">
              <div class="col-md-12">
                <label for="exampleInputEmail1"><b>Area Name</b></label>
                <!--input type="text" name="area_name" value="" class="form-control"-->
                <?php echo form_input(['type'=>'text','name'=>'area_name','placeholder'=>'Enter Area Name',"value"=>"",'class'=>'form-control','title'=>'area name','required'=>"true"]);
                echo "<p style='color:red;'>".form_error("area_name"," ")."</p>"; ?>
              </div>
              <div class="col-md-12">
                <label for="exampleInputEmail1"><b>Area Code</b></label>
                <?php 
                  echo form_input(['type'=>'text', 'name'=>'area_code','placeholder'=>'Enter Area Code','class'=>'form-control','required'=>"true" ,'title'=>'area code']);
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
} //end addNew
function updateArea($ap,$mge)
{?>
<div class="container">
    <div class="card card-register mx-auto mt-2" style="border: 1px solid;">
      <?php echo "<h4 style='color:red;'>".@$mge."</h4>"; ?>
      <div class="card-header"><h3 style="text-align: center;">Edit Area</h3></div>
      <div class="card-body">
        <?php echo form_open('myController/updateArea'); ?>
          <div class="form-group">
              <div class="col-md-12">
                <label ><b>Area Name</b></label>
                <?php //print_r($area_detail);
                  foreach ($ap as $u) {
                    $areaname=$u['area_name'];
                    $areacode=$u['area_code'];
                    $areaid=$u['area_id'];
                  }
                  //echo $areaname;
                ?>
                <?php echo form_input(['type'=>'hidden','name'=>'area_id','placeholder'=>'Enter Area Name',"value"=>"$areaid",'class'=>'form-control','title'=>'area name','required'=>"true"]);?>
                <!--input type="text" name="area_name" value="" class="form-control"-->
                <?php echo form_input(['type'=>'text','name'=>'area_name','placeholder'=>'Enter Area Name',"value"=>"$areaname",'class'=>'form-control','title'=>'area name']);
                echo "<p style='color:red;'>".form_error("area_name"," ")."</p>"; ?>
              </div>
              <div class="col-md-12">
                <label for="exampleInputEmail1"><b>Area Code</b></label>
                <?php 
                  echo form_input(['type'=>'text', 'name'=>'area_code','placeholder'=>'Enter Area Code',"value"=>"$areacode",'class'=>'form-control','title'=>'area code','required'=>"true"]);
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