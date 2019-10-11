<!DOCTYPE html>
<html lang="en">

<head>
  <title>add new connection type</title>
  <?php include_once("includes/htmlFile.php"); ?>
  <?php //include_once("./home.php");?>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
  <?php require 'header.php'; ?>
  <?php require 'footer.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
          <?php if (isset($updct)) { updateCt($updct, @$mge);}else{ addNew(@$mge);}?>

    <div class="card mb-3 mt-4" style="border: 1px solid; ">
        <div class="card-header">
          <i class="fa fa-table"></i> <b>Connection Types</b> </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="btn-dark">
                <tr>
                  <th>S.No</th>
                  <th>Connection Type</th>
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
                <?php $i=1; if(isset($con_type_detail)): foreach ($con_type_detail as $k):?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?= $k['con_type_name']?></td>
                    <td>

                      <?php 
                      $id=$k['con_type_id'];
                      $n=$k['con_type_name'];
                      echo anchor("myController/updateConnType?edit_id=$id","Edit",['class'=>'btn btn-primary btn-sm']); 

                      ?>
                              <!--pop updct-->
           <!--    <div class="modal fade" id="DeleteConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            </div> -->
                      &nbsp;&nbsp;
                       <!--i class="btn btn-danger" data-toggle="modal" data-target="#DeleteConfirm">Delete</i-->
                       <?php //echo anchor("myController/deleteConnType?del_id=$id",'Delete',['class'=>'btn btn-danger btn-sm']);?>
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
    <div class="card card-register mx-auto mt-3" style="border: 1px solid; ">
      <?php echo "<h4 style='color:red;'>".@$mge."</h4>"; ?>
      <div class="card-header"><h3 style="text-align: center;">Add New Connection Type</h3></div>
      <div class="card-body">
        <?php echo form_open('myController/addConnectionTpye'); ?>
        <?php //if(isset($mge)){ echo $mge;}else{ echo 'nothing';};?>
          <div class="form-group">
              <div class="col-md-12">
                <label for="exampleInputEmail1"><b>Type Name</b></label>
                <!--input type="text" name="area_name" value="" class="form-control"-->
                <?php echo form_input(['type'=>'text','name'=>'con_type_name','placeholder'=>'Connection Type Name',"value"=>"",'class'=>'form-control','title'=>'connection type name',"required"=>'true']);
                echo "<p style='color:red;'>".form_error("con_type_name"," ")."</p>"; ?>
              </div>
            <!--button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button-->
            
              <div class="modal-footer">
                    <?php
                      echo form_submit(['name'=>'add_conn_type', 'value'=>'save','class'=>'btn btn-primary btn-block col-md-2']);
                       ?>
                 
            
           </div>
           <?php  echo form_close();?>
          </div>
        </div>
    </div>
  </div>
  <?php
} //end addNew


function updateCt($ap,$mge)
{?>
<div class="container">
    <div class="card card-register mx-auto mt-2" style="border: 1px solid; ">
      <?php echo "<h4 style='color:red;'>".@$mge."</h4>"; ?>
      <div class="card-header"><h3 style="text-align: center;">Edit Connection Type</h3></div>
      <div class="card-body">
        <?php echo form_open('myController/updateConnType'); ?>
          <div class="form-group">
              <div class="col-md-12">
                <label ><b>Connection Type Name</b></label>
                <?php //print_r($area_detail);
                  foreach ($ap as $u) {
                    $ctname=$u['con_type_name'];
                    $conId=$u['con_type_id'];
                  }
                  
                ?>
                <?php echo form_input(['type'=>'hidden','name'=>'con_type_id',"value"=>"$conId",'class'=>'form-control']);?>
                <!--input type="text" name="area_name" value="" class="form-control"-->
                <?php echo form_input(['type'=>'text','name'=>'con_type_name',"value"=>"$ctname",'class'=>'form-control','required'=>'true','title'=>'connection type name']);
                echo "<p style='color:red;'>".form_error("con_type_name"," ")."</p>"; ?>
              </div>
            <!--button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button-->
           <div class="modal-footer">
            <?php
            echo form_submit(['name'=>'con_t', 'value'=>'save','class'=>'btn btn-primary btn-block col-md-2']);
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