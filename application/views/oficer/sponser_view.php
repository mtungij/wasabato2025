<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

    <div id="main-content" class="profilepage_2 blog-page">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url("admin/index"); ?>"><i class="icon-home"></i></a></li>
                            
                            <li class="breadcrumb-item active"><?php echo $this->lang->line("loan") ?></li>
                            <li class="breadcrumb-item active">Gualantors Information</li>
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
                <div class="col-lg-12 col-md-12">

                    <div class="card">
                        <div class="row profile_state">
                            <div class="col-lg-6 col-6">
                                <div class="body">
                                    <i class="fa fa-thumbs-up"></i>
                                     <div class="profile-image"> <img src="<?php echo base_url().'assets/img/male.jpeg'; ?>" class="rounded-circle" alt="customer image" style="width: 135px;height: 135px;">
                                      </div>
                                    <small><?php echo $customer->f_name; ?> <?php echo $customer->m_name; ?> <?php echo $customer->l_name; ?></small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="body">
                                    <i class="fa fa-star"></i>
                                   <div class="profile-image"> <img src="<?php echo base_url().'assets/img/sig.jpg'; ?>" class="rounded-circle" alt="Gualantors image" style="width: 135px;height: 135px;">
                                      </div>
                                    <small><?php echo $this->lang->line("signature_menu"); ?></small>
                                </div>
                            </div>
                           
                            
                        </div>
                    </div>
                </div>

                  
                <div class="col-lg-12">
                    <div class="card">
                          <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover j-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th><?php echo $this->lang->line("customer_name_menu"); ?></th>
                                            <th><?php echo $this->lang->line("phone_number_menu"); ?></th>
                                            <th><?php echo $this->lang->line("employee_menu"); ?></th>
                                            <th><?php echo $this->lang->line("branch_menu"); ?></th>
                                            <th><?php echo $this->lang->line("district_menu"); ?></th>
                                            <th><?php echo $this->lang->line("ward_menu"); ?></th>
                                            <th><?php echo $this->lang->line("street_menu"); ?></th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php //foreach ($loan_category as $loan_categorys): ?>
                                        <tr>
                                            <td><?php echo $customer->f_name; ?> <?php echo $customer->m_name; ?> <?php echo $customer->l_name; ?></td>
                                            <td><?php echo $customer->phone_no; ?></td>
                                            <td><?php echo $customer->empl_name; ?></td>
                                            <td><?php echo $customer->blanch_name; ?></td>
                                            <td><?php echo $customer->district; ?></td>
                                            <td><?php echo $customer->ward; ?></td>
                                            <td><?php echo $customer->street; ?></td>
                                        </tr>
                               <?php //endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <?php if(@$sponser->customer_id == TRUE){ ?>
               
                <div class="col-lg-12">
                    <div class="card">
                          <div class="body">
                            <div class="header">
                              <h2><?php echo $this->lang->line("Gualantors_List_menu"); ?></h2>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover j-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th><?php echo $this->lang->line("full_name_menu"); ?></th>
                                            <th><?php echo $this->lang->line("phone_number_menu"); ?></th>
                                            <th><?php echo $this->lang->line("relationship"); ?></th>
                                            <th><?php echo $this->lang->line("action_menu"); ?></th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach($sponsers_data as $sponsers_datas): ?>
                                        <tr>
                                            <td><?php echo $sponsers_datas->sp_name; ?> <?php echo $sponsers_datas->sp_mname; ?> <?php echo $sponsers_datas->sp_lname; ?></td>
                                            <td><?php echo $sponsers_datas->sp_phone_no; ?></td>
                                            <td><?php echo $sponsers_datas->sp_relation; ?></td>
                                            <td><a href="" class="btn btn-sm btn-icon btn-pure btn-primary on-default m-r-5 button-edit"
                                            data-toggle="modal" data-target="#addcontact1<?php echo $sponsers_datas->sp_id; ?>" data-original-title="Edit"><i class="icon-pencil"></i>
                                        </a>
                                       
                                    </td>
                                </tr>

                <div class="modal fade" id="addcontact1<?php echo $sponsers_datas->sp_id; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel"><?php echo $this->lang->line("update_menu"); ?></h6>
            </div>
     <?php echo form_open("oficer/modify_sponser/{$sponsers_datas->sp_id}/{$sponsers_datas->customer_id}"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                             <div class="col-lg-4 col-6">
                          <span><?php echo $this->lang->line("first_name_menu"); ?>:</span>
                            <input type="text" class="form-control" id="sp_name" value="<?php echo $sponsers_datas->sp_name ?>" placeholder="First name" name="sp_name" autocomplete="off">
                        </div>
                               <div class="col-lg-4 col-6">
                              <span><?php echo $this->lang->line("midle_name_menu"); ?>:</span>
                                <input type="text" class="form-control" id="sp_mname" value="<?php echo $sponsers_datas->sp_mname ?>" placeholder="Enter Middle name" name="sp_mname" autocomplete="off">
                            </div>
                                 <div class="col-lg-4 col-6">
                      <span><?php echo $this->lang->line("last_name_menu"); ?>:</span>
                        <input type="text" class="form-control" value="<?php echo $sponsers_datas->sp_lname ?>" id="sp_lname" placeholder="Enter Last name" name="sp_lname" autocomplete="off">
                    </div>
                    <div class="col-lg-6 col-6">
                      <span><?php echo $this->lang->line("phone_number_menu"); ?>:</span>  
                        <input type="number" class="form-control" value="<?php echo $sponsers_datas->sp_phone_no ?>" id="sp_phone_no" placeholder="Enter Phone number" name="sp_phone_no" autocomplete="off">
                    </div>
                   
                     <div class="col-lg-6 col-12">
                      <span><?php echo $this->lang->line("relationship"); ?>:</span>  
                        <input type="text" class="form-control" id="sp_relation" value="<?php echo $sponsers_datas->sp_relation ?>" placeholder="Enter Reationship With Customer" name="sp_relation" autocomplete="off">
                    </div>
                               
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line("update_menu"); ?></button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line("close_menu"); ?></button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

                               <?php endforeach; ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <?php }else{
                 ?>

                 <?php } ?>


                                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $this->lang->line("guarantorsinfo_menu"); ?></h2>
                        </div>
                        <div class="body">
            <?php echo form_open("oficer/create_sponser/{$customer->customer_id}"); ?>
                            <div class="row">

    <div class="col-lg-4 col-6">
      <span><?php echo $this->lang->line("first_name_menu"); ?>:</span>
        <input type="text" class="form-control" id="sp_name" placeholder="<?php echo $this->lang->line("first_name_menu"); ?>" name="sp_name" autocomplete="off">
    </div>

    <div class="col-lg-4 col-6">
      <span><?php echo $this->lang->line("midle_name_menu"); ?>:</span>
        <input type="text" class="form-control" id="sp_mname" placeholder="<?php echo $this->lang->line("midle_name_menu"); ?>" name="sp_mname" autocomplete="off">
    </div>

    <input type="hidden" name="customer_id"  id="customer_id" value="<?php echo $customer->customer_id; ?>">
    <input type="hidden" name="comp_id" id="comp_id" value="<?php echo $customer->comp_id; ?>">

    <div class="col-lg-4 col-6">
      <span><?php echo $this->lang->line("last_name_menu"); ?>:</span>
        <input type="text" class="form-control" id="sp_lname" placeholder="<?php echo $this->lang->line("last_name_menu"); ?>" name="sp_lname" autocomplete="off">
    </div>
    <div class="col-lg-6 col-6">
      <span><?php echo $this->lang->line("phone_number_menu"); ?>:</span>  
        <input type="number" class="form-control" id="sp_phone_no" placeholder="<?php echo $this->lang->line("phone_number_menu"); ?>" name="sp_phone_no" autocomplete="off">
    </div>
   
     <div class="col-lg-6 col-12">
      <span><?php echo $this->lang->line("relationship"); ?>:</span>  
        <input type="text" class="form-control" id="sp_relation" placeholder="<?php echo $this->lang->line("relationship"); ?>" name="sp_relation" autocomplete="off">
    </div>
      </div>
    </div>
    <br>

    <div class="text-center">
    <button type="submit" class="btn btn-primary"><i class="icon-drawer"><?php echo $this->lang->line("save_menu"); ?></i></button>
       <?php if (@$data_loan_desc->loan_status == 'open' || @$data_loan_desc->loan_status == 'reject' || @$data_loan_desc->loan_status == 'out' || @$data_loan_desc->loan_status == 'withdrawal') {
        ?>
    <a href="<?php echo base_url("oficer/loan_applicationForm/{$customer->customer_id}"); ?>" class="btn btn-primary"><?php echo $this->lang->line("skip_menu"); ?></a>
    <?php }else{ ?>
    <a href="<?php echo base_url("oficer/loan_applicationForm/{$customer->customer_id}"); ?>" class="btn btn-primary"><?php echo $this->lang->line("skip_menu"); ?></a>
    <?php } ?>
    </div>
                            
                            <?php echo form_close();  ?>
                        </div>
                    </div>
                </div> 

        
                  
                    
                </div>
            </div>
        </div>
   



<?php include('incs/footer.php'); ?>



<script>
    function getDate(data){
  let now = new Date();
  let bod = (new Date(data));

  let age = now.getFullYear() - bod.getFullYear();
   let _age = document.querySelector("#age");
   _age.value = age;
 //alert(age)
}
</script>


<script>
$(document).ready(function(){
$('#blanch').change(function(){
var blanch_id = $('#blanch').val();
//alert(blanch_id)
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_employee_blanch",
method:"POST",
data:{blanch_id:blanch_id},
success:function(data)
{
$('#empl').html(data);
//$('#district').html('<option value="">All</option>');
}
});
}
else
{
$('#empl').html('<option value="">Select Employee</option>');
//$('#district').html('<option value="">All</option>');
}
});



// $('#customer').change(function(){
// var customer_id = $('#customer').val();
//  //alert(customer_id)
// if(customer_id != '')
// {
// $.ajax({
// url:"<?php echo base_url(); ?>admin/fetch_data_vipimioData",
// method:"POST",
// data:{customer_id:customer_id},
// success:function(data)
// {
// $('#loan').html(data);
// //$('#malipo_name').html('<option value="">select center</option>');
// }
// });
// }
// else
// {
// $('#loan').html('<option value="">Select Active loan</option>');
// //$('#malipo_name').html('<option value="">chagua vipimio</option>');
// }
// });

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