<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url("ad/index"); ?>"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Report</li>
                            <li class="breadcrumb-item active">Loan Collection</li>
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
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                         <div class="header">
                            <h2>Loan Collection</h2>
                            <div class="pull-right">
                                <a href="" data-toggle="modal" data-target="#addcontact2" class="btn btn-primary"><i class="icon-calendar">Filter</i></a>
                            </div>    
                         </div>
                          <div class="body">

                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                        <th>Branch Name</th>
                                        <th>Customer Name</th>
                                        <th>Employee</th>
                                        <th>Loan Amount</th>
                                        <th>Duration Type</th>
                                        <th>Collection</th>
                                        <th>Paid Amount</th>
                                        <th>Remain Amount</th>
                                        <th>Penart Amount</th>
                                        <th>Loan status</th>
                                        <th>Withdrawal Date </th>
                                        <th>End  Date </th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       <?php $no = 1 ?>        
                          <?php foreach ($loan_collection as $loan_collections): ?>
                                              <tr>
                                    <td><?php echo $loan_collections->blanch_name; ?></td> 
                                    <td class="c">
                                       <?php echo $loan_collections->f_name; ?> <?php echo $loan_collections->m_name; ?> <?php echo $loan_collections->l_name; ?>
                                    </td>
                                    <td class="c">
                                        <?php if ($loan_collections->username == TRUE) {
                                         ?>
                                       <?php echo $loan_collections->username; ?> 
                                    <?php }else{ ?>
                                        Admin
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($loan_collections->loan_int); ?>
                                    </td>
                                    <td><?php if ($loan_collections->day == 1) {
                                                 echo "Daily";
                                             ?>
                                            <?php }elseif($loan_collections->day == 7){
                                                  echo "Weekly";
                                             ?>
                                            
                                        <?php }elseif($loan_collections->day == 30 || $loan_collections->day == 31 || $loan_collections->day == 29 || $loan_collections->day == 28){
                                                echo "Monthly"; 
                                            ?>
                                            <?php } ?></td>
                                    <td><?php echo number_format($loan_collections->restration); ?></td> 
                                    <td><?php echo number_format($loan_collections->total_depost); ?></td> 
                                    <td>
                                        <?php if ($loan_collections->total_depost > $loan_collections->loan_int) {
                                         ?>
                                         0
                                        <?php }else{?>
                                        <?php echo number_format($loan_collections->loan_int - $loan_collections->total_depost); ?>
                                            <?php } ?>
                                        </td> 
                                    <td>
                                        <?php if ($loan_collections->penart_paid > $loan_collections->total_penart_amount) {
                                         ?>
                                         0
                                        <?php }else{ ?>
                                        <?php echo number_format($loan_collections->total_penart_amount - $loan_collections->penart_paid); ?>
                                            <?php } ?>
                                        </td>
                                        <td>
                                        <?php if ($loan_collections->loan_status == 'open') {
                                         ?>
                                        <a href="javascript:;" class="badge badge-warning">Pending</a>
                                        <?php }elseif($loan_collections->loan_status == 'aproved'){ ?>
                                          <a href="javascript:;" class="badge badge-info">Aproved</a>
                                            <?php }elseif($loan_collections->loan_status == 'withdrawal'){ ?>
                                             <a href="javascript:;" class="badge badge-primary">Active</a>
                                                <?php }elseif($loan_collections->loan_status == 'done'){ ?>
                                                <a href="javascript:;" class="badge badge-success">Done</a>
                                                    <?php }elseif ($loan_collections->loan_status == 'out') { ?>
                                            <a href="javascript:;" class="badge badge-danger">Default</a>
                                                        
                                                    <?php }elseif($loan_collections->loan_status == 'disbarsed'){ ?> 
                                                <a href="javascript:;" class="badge badge-secondary">Disbursed</a>
                                                <?php } ?>
                                            
                                        </td> 
                                    <td><?php echo $loan_collections->loan_stat_date; ?></td> 
                                    <td><?php echo substr($loan_collections->loan_end_date, 0,10); ?></td> 
                                                                                                               
                                   </tr>
  
                      <?php endforeach; ?>
                                
                                    </tbody>
                                    <tr>
                                    <td><b>TOTAL:</b></td>
                                    <td></td>
                                    <td></td>
                                    <td><b><?php echo number_format($loan_total->total_loan); ?></b></td>
                                    <td></td>
                                    <td><b><?php //echo number_format($total_receved->total_depost); ?></b></td>
                                    <td><b>
                                        <?php if ($depost_loan->total_loan_depost > $loan_total->total_loan) {
                        ?>
                        <?php echo number_format($loan_total->total_loan); ?> <b style="color:red;">(<?php echo number_format($depost_loan->total_loan_depost - $loan_total->total_loan) ?>)</b>
                        <?php }else{ ?>
                        <?php echo number_format($depost_loan->total_loan_depost); ?>
                        <?php } ?>
                                    </b>
                                </td>
                                <td><b>
                            <?php if ($depost_loan->total_loan_depost > $loan_total->total_loan) {
                         ?>
                         0 <b style="color:red;">(<?php echo $depost_loan->total_loan_depost - $loan_total->total_loan ?>)</b>
                        <?php }else{ ?>
                        <?php echo number_format($loan_total->total_loan - $depost_loan->total_loan_depost); ?>
                            <?php } ?></b>
                        </td>
                            <td>
                        <?php if ($penart_paid->total_penart_paid > $penart->penart_amount) {
                         ?>
                        0 <b style="color:red;">(<?php echo number_format($penart_paid->total_penart_paid - $penart->penart_amount); ?>)</b>
                        <?php }else{ ?>
                        <?php echo number_format($penart->penart_amount - $penart_paid->total_penart_paid); ?>
                        <?php } ?>
                            </td>
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


 <div class="modal fade" id="addcontact2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Filter Loan Collection</h6>
            </div>
            <?php echo form_open("admin/search_loanSatatus"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-md-6 col-6">
                    <span>Select Branch</span>
                    <select type="number" class="form-control" name="blanch_id" required>
                        <option value="">--select Branch--</option>
                        <?php foreach ($blanch as $blanchs): ?>
                        <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?></option>
                        <?php endforeach; ?>
                    </select>           
                    </div>
                    <div class="col-md-6 col-6">
                    <span>Select Loan Status</span>
                    <select type="text" name="loan_status" class="form-control" required>
                        <option value="">Select Loan Status</option>
                        <option value="open">PENDING</option>
                        <option value="aproved">APROVED</option>
                        <option value="disbarsed">DISBURSED</option>
                        <option value="withdrawal">ACTIVE</option>
                        <option value="done">DONE</option>
                        <option value="out">DEFALT</option>
                    </select>           
                    </div>
                 <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">   
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





