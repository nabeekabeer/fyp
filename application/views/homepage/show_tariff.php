  <title>Tariffs</title>
  <?php  include_once("includes/htmlFile.php"); ?>
  <?php include_once('includes/hpheader.php');?>
<script src="<?php //echo base_url('asset/jQuery/jquery.min.js')?>" ></script>
<section>
    <?php foreach($con_ty as $ke):?>
   <div class="col-lg-3 pull-right">
          <div class="card mb-3" style="box-shadow: 5px 5px #888888;">
            <div class="card-header">
              <i class="fa fa-table"></i> <b><?= $ke['con_type_name']?></b> </div>
              <div class="list-group list-group-flush small list-group-item list-group-item-action">
                <div class="media">
                  <div class="media-body">
                    <table class="text-center">
                      <tr>
                        <td>Unit Range</td>
                        <td>Rates (RS)</td>
                      </tr>
                      <?php  
                        $id=$ke['con_type_id']; 
                         $tariffs=$controll->show_conection_type($id); 
                        $i=1; if(isset($tariffs)): foreach ($tariffs as $k):?>
                        <tr>
                          <?php if($k['unit_range_to']=='-'): ?>
                            <td><strong>All</strong></td>
                          <td><strong><?= $k['per_unit_rate']?></strong>&nbsp;</td>
                          <?php else: ?>
                          <td><strong><?= $k['unit_range_from']?>&nbsp;to&nbsp;
                            <?= $k['unit_range_to']?></strong></td>
                          <td><strong><?= $k['per_unit_rate']?></strong>&nbsp;</td>
                        <?php endif; ?>
                        </tr>
                    <?php endforeach; endif;?>
                    </table>
                  </div>
                </div>
            </div>
          </div>
          </div><?php endforeach;?>
</section>
<?php include_once("includes/jqueryFile.php");?>

    
