<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url("admin/index"); ?>"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active"><?php echo $this->lang->line("report_menu"); ?></li>
                            <li class="breadcrumb-item active"><?php echo $this->lang->line("saving_menu"); ?></li>
                        </ul>
                    </div>            
                 
                </div>
            </div>
                  <?php if ($das = $this->session->flashdata('massage')): ?> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="alert alert-dismisible alert-success"> <a href="" class="close">&times;</a> 
                                    <?php echo $das;?> </div> 
                            </div> 
                        </div> 
                    <?php endif; ?>
                    <?php if ($das = $this->session->flashdata('error')): ?> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="alert alert-dismisible alert-danger"> <a href="" class="close">&times;</a> 
                                    <?php echo $das;?> </div> 
                            </div> 
                        </div> 
                    <?php endif; ?>
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $this->lang->line("saving_menu"); ?></h2>
                        </div>
                        <div class="body">
                            <?php echo form_open("oficer/create_saving_deposit"); ?>
                        <div class="row">

                <div class="col-lg-4 col-6">
                    <span>*<?php echo $this->lang->line("provider_menu"); ?>:</span>
                <select class="form-control" name="provider"  required>
                <option value=""><?php echo $this->lang->line("provider_menu"); ?> </option>
                <?php foreach ($acount as $accounts): ?>
                <option value="<?php echo $accounts->receive_trans_id; ?>"><?php echo $accounts->account_name; ?> </option>
                <?php endforeach; ?>
                    </select>
                 </div>

                 <div class="col-lg-4 col-6">
                    <span>*<?php echo $this->lang->line("agent_menu"); ?>:</span>
                <input type="text" name="agent" autocomplete="off" class="form-control" placeholder="<?php echo $this->lang->line("agent_menu"); ?>" required>
                 </div>


                <div class="col-lg-4 col-6">
                <span>*<?php echo $this->lang->line("amount_menu"); ?></span>
            <input type="number" name="amount" autocomplete="off" class="form-control" placeholder="<?php echo $this->lang->line("amount_menu"); ?>" required>
                </div>
                <div class="col-lg-6 col-6">
                <span>*<?php echo $this->lang->line("ref_no_menu"); ?></span>
            <input type="text" name="ref_no" autocomplete="off" placeholder="<?php echo $this->lang->line("ref_no_menu"); ?>" class="form-control" required>
                </div>
                    <div class="col-lg-6 col-6">
                <span>*<?php echo $this->lang->line("time_menu"); ?></span>
            <input type="time" name="time" autocomplete="off" placeholder="Enter Reference Number" class="form-control" required>
                </div>
                <div class="col-lg-12 col-12">
                <span>*<?php echo $this->lang->line("description_menu"); ?></span>
            <textarea type="text" name="description" rows="3" autocomplete="off" placeholder="<?php echo $this->lang->line("description_menu"); ?>" class="form-control" required></textarea>
                </div>
                <input type="hidden" name="comp_id" value="<?php echo $empl_data->comp_id; ?>">
                <!-- <input type="hidden" name="" value="<?php //echo $empl_data->empl_id; ?>"> -->
                <input type="hidden" name="blanch_id" value="<?php echo $empl_data->blanch_id; ?>">
            <!-- <input type="hidden" name="empl" value=""> -->
                <?php $day = date("Y-m-d"); ?>
            <input type="hidden" name="date" value="<?php echo $day;?>">
                                
                                </div>
                                 <br>
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="icon-drawer"><?php echo $this->lang->line("save_menu"); ?></i></button>
                                </div>
                            
                            <?php echo form_close();  ?>
                        </div>
                    </div>
                </div>
            


                 


                <div class="col-lg-12">
                    <div class="card">
                         <div class="header">
                            <h2><?php echo $this->lang->line("saving_list_menu"); ?></h2> 
                            <div class="pull-right">
                             <!--  <a href="" class="btn btn-sm btn-icon btn-pure btn-primary on-default m-r-5 button-edit"
                                            data-toggle="modal" data-target="#addcontact1" data-original-title="Edit"><i class="icon-calendar"></i>Filter</a>  -->
                            </div>   
                             </div>
                          <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                                <th><?php echo $this->lang->line("provider_menu"); ?></th>
                                                <th><?php echo $this->lang->line("agent_menu"); ?></th>
                                                <th><?php echo $this->lang->line("amount_menu"); ?> </th>
                                                <th><?php echo $this->lang->line("ref_no_menu"); ?></th>
                                                <th><?php echo $this->lang->line("time_menu"); ?></th>
                                                <th><?php echo $this->lang->line("status_menu"); ?></th>
                                                <th><?php echo $this->lang->line("date_menu"); ?></th>
                                                <th><?php echo $this->lang->line("action_menu"); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($saving_deposit as $saving_deposits): ?>
                                        <tr>
                                            <td><?php echo $saving_deposits->account_name; ?></td>
                                            <td><?php echo $saving_deposits->agent; ?></td>
                                            <td><?php echo number_format($saving_deposits->amount); ?></td>
                                            <td><?php echo $saving_deposits->ref_no; ?></td>
                                            <td><?php echo $saving_deposits->time; ?></td>
                                            <td>
                                               <?php if ($saving_deposits->status == 'open') {
                                         ?>
                                         <a href="javascript:;" class="badge badge-danger">Not Checked</a>
                                        <?php }elseif ($saving_deposits->status == 'close') {
                                         ?>
                                     <a href="javascript:;" class="badge badge-success">Checked</a>
                                         <?php } ?>
                                        <?php //echo $miamalas->status; ?>
                                                    
                                                </td>
                                            <td><?php echo $saving_deposits->date; ?></td>
                                            <td>
                                         <?php if ($saving_deposits->status == 'open') {
                                         ?>
                                    <a href="<?php echo base_url("oficer/check_miamala/{$saving_deposits->id}"); ?>" class="btn btn-primary btn-sm" onclick="return confirm('<?php echo $this->lang->line("confirm_menu"); ?>')"><i class="icon-pencil"></i></a>
                                    
                                    <?php }elseif ($saving_deposits->status == 'close') {
                                     ?>
                                    <a href="<?php echo base_url("oficer/uncheck_miamala/{$saving_deposits->id}"); ?>" class="btn btn-success btn-sm" onclick="return confirm('<?php echo $this->lang->line("confirm_menu"); ?>')"><i class="icon-pencil"></i></a>
                                    <?php } ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tr>
                                        <td><b><?php echo $this->lang->line("total_menu"); ?>:</b></td>
                                        <td></td>
                                        <td><b><?php echo number_format($total_saving->total_amount_saving); ?></b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div> 


             
            </div>
        </div>
    </div>
</div>

<?php include('incs/footer.php'); ?>



<script>
$(document).ready(function(){
$('#blanch').change(function(){
var blanch_id = $('#blanch').val();
//alert(blanch_id)
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_ward_data",
method:"POST",
data:{blanch_id:blanch_id},
success:function(data)
{
$('#customer').html(data);
//$('#district').html('<option value="">All</option>');
}
});
}
else
{
$('#customer').html('<option value="">Select customer</option>');
//$('#district').html('<option value="">All</option>');
}
});



$('#customer').change(function(){
var customer_id = $('#customer').val();
 //alert(customer_id)
if(customer_id != '')
{
$.ajax({
url:"<?php echo base_url(); ?>oficer/fetch_data_vipimioData",
method:"POST",
data:{customer_id:customer_id},
success:function(data)
{
$('#loan').html(data);
//$('#malipo_name').html('<option value="">select center</option>');
}
});
}
else
{
$('#loan').html('<option value="">Select Active loan</option>');
//$('#malipo_name').html('<option value="">chagua vipimio</option>');
}
});

// $('#social').change(function(){
//  var district_id = $('#social').val();
//  if(district_id != '')
//  {
//   $.ajax({
//    url:"<?php echo base_url(); ?>user/fetch_data_malipo",
//    method:"POST",
//    data:{district_id:district_id},
//    success:function(data)
//    {
//     $('#malipo_name').html(data);
//     //$('#malipo').html('<option value="">chagua malipo</option>');
//    }
//   });
//  }
//  else
//  {
//   //$('#vipimio').html('<option value="">chagua vipimio</option>');
//   $('#malipo_name').html('<option value="">chagua vipimio</option>');
//  }
// });


});
</script>



 <div class="modal fade" id="addcontact1" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Filter Transaction Income</h6>
            </div>
            <?php echo form_open(""); ?>
            <div class="modal-body">
                <div class="row clearfix">
                    <?php $date = date("Y-m-d"); ?>
                    <div class="col-md-6">
                    <span>From:</span>
                    <input type="date" class="form-control" value="<?php echo $date; ?>" name="from" required>    
                    </div>
                    <div class="col-md-6">
                    <span>To:</span>
                    <input type="date" class="form-control" name="to" value="<?php echo $date; ?>" required>           
                    </div>
                    <input type="hidden" name="blanch_id" value="<?php echo $_SESSION['blanch_id']; ?>">
                    <input type="hidden" name="comp_id" value="<?php echo $empl_data->comp_id; ?>">
            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Filter</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


