<!DOCTYPE html>
<html lang="en">

<head>
  <title>add new Employee type</title>
  <?php include_once("includes/htmlFile.php"); ?>
  <?php //include_once("./home.php");?>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
  <?php require 'header.php'; ?>
  <?php require 'footer.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
          <?php if (isset($updet)) { updateEmpT($updet, @$mge);}else{ addNew(@$mge);}?>

    <div class="card mb-3 mt-4" style="border: 1px solid; ">
        <div class="card-header">
          <i class="fa fa-table"></i> <b>Employee Types</b> </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="btn-dark">
                <tr>
                  <th>S.No</th>
                  <th>Employee Type</th>
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
                <?php $i=1;
                 if(isset($emp_type_detail)): foreach ($emp_type_detail as $k):?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?= $k['emp_type_name']?></td>
                    <td>
                      <?php 
                      $id=$k['emp_type_id'];
                      echo anchor("myController/updateEmpType?edit_id=$id","Edit",['class'=>'btn btn-primary btn-sm']); ?>
                      &nbsp;&nbsp;
                       <!--i class="btn btn-danger" data-toggle="modal" data-target="#DeleteConfirm">Delete</i-->
                       <?php //echo anchor("myController/deleteEmpType?del_id=$id",'Delete',['class'=>'btn btn-danger btn-sm']);?>
                    </td>
                  </tr>
              <!-- <div class="modal fade" id="DeleteConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Alert!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <?php //echo anchor("myController/deleteEmpType?del_id=$id",'Yes',['class'=>'btn btn-danger']);?>
                  </div>
                </div>
              </div>
            </div> -->
                
                 <?php endforeach; endif;?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- <div class="card-footer text-muted">Updated <?php echo date("l"); //print strftime('%c'); //$_SERVER['REQUEST_TIME']?> at <?php echo date("h:i:sa"); echo  " ".date("d/m/Y")?></div> -->
      </div>
   </div>
</div>

<?php 
function addNew($mge)
{?>
<div class="container">
    <div class="card card-register mx-auto mt-3" style="border: 1px solid; ">
      <?php echo "<h4 style='color:red;'>".@$mge."</h4>"; ?>
      <div class="card-header"><h3 style="text-align: center;">Add New Employee Type</h3></div>
      <div class="card-body">
        <?php echo form_open('myController/addEmpTpye'); ?>
        <?php //if(isset($mge)){ echo $mge;}else{ echo 'nothing';};?>
          <div class="form-group">
              <div class="col-md-12">
                <label for="exampleInputEmail1"><b>Type Name</b></label>
                <!--input type="text" name="area_name" value="" class="form-control"-->
                <?php echo form_input(['type'=>'text','name'=>'emp_type_name','placeholder'=>'Employee Type Name',"value"=>"",'class'=>'form-control','title'=>'Employee type name','required'=>'true']);
                echo "<p style='color:red;'>".form_error("emp_type_name"," ")."</p>"; ?>
              </div>
            <!--button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button-->
            
              <div class="modal-footer">
                    <?php
                      echo form_submit(['name'=>'add_emp_type', 'value'=>'save','class'=>'btn btn-primary btn-block col-md-2']);
                       ?>
                 
            
           </div>
           <?php  echo form_close();?>
          </div>
        </div>
    </div>
  </div>
  <?php
} //end addNew


function updateEmpT($ap,$mge)
{?>
<div class="container">
    <div class="card card-register mx-auto mt-2" style="border: 1px solid; ">
      <?php echo "<h4 style='color:red;'>".@$mge."</h4>"; ?>
      <div class="card-header"><h3 style="text-align: center;">Edit Employee Type</h3></div>
      <div class="card-body">
        <?php echo form_open('myController/updateEmpType'); ?>
          <div class="form-group">
              <div class="col-md-12">
                <label ><b>Employee Type Name</b></label>
                <?php //print_r($area_detail);
                  foreach ($ap as $u) {
                    $etname=$u['emp_type_name'];
                    $emptId=$u['emp_type_id'];
                  }
                  
                ?>
                <?php echo form_input(['type'=>'hidden','name'=>'emp_type_id',"value"=>"$emptId",'class'=>'form-control']);?>
                <!--input type="text" name="area_name" value="" class="form-control"-->
                <?php echo form_input(['type'=>'text','name'=>'emp_type_name',"value"=>"$etname",'class'=>'form-control','title'=>'Employee type name','required'=>"true"]);
                echo "<p style='color:red;'>".form_error("emp_type_name"," ")."</p>"; ?>
              </div>
            <!--button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button-->
           <div class="modal-footer">
            <?php
            echo form_submit(['name'=>'emp', 'value'=>'save','class'=>'btn btn-primary btn-block col-md-2']);
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