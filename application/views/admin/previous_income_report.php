
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $compdata->comp_name; ?> | NON DEDUCTED INCOME REPORT</title>
</head>
<body>

<div id="container">
<div style='width: 100%;align-items: center; display: flex;justify-content:space-between;flex-direction: row;'>
</div>
<style>
.pull{
text-align: center;
/*  margin-top: 100px;
margin-bottom: 0px;
margin-right: 150px;
margin-left: 80px;*/

}
</style>
<style>
.display{
display: flex;

}
</style>

    <style>
 .c {
   text-transform: uppercase;
   }
    
    </style>



<table  style="border: none">
<tr style="border: none">
<td style="border: none">


<div style="width: 20%;">
<img src="<?php echo base_url().'assets/img/'.$compdata->comp_logo ?>" style="width: 100px;height: 80px;">
</div> 

</td>
<td style="border: none">
<div class="pull">
<p style="font-size:14px;" class="c"> <b><?php echo $compdata->comp_name; ?></b><br>
<b><?php echo $compdata->adress; ?></b> <br>
<?php //$day = date("d-m-Y"); ?>
</p>
<p style="font-size:12px;text-align:center;" class="c"><b>
    <?php if (@$blanch_data->blanch_name == FALSE) {
     ?>
     ALL BRANCH
 <?php }else{ ?>
    <?php echo @$blanch_data->blanch_name; ?> 
    <?php } ?>
    
    - PREVIOUS INCOME REPORT / From : <?php echo $from; ?> To : <?php echo $to; ?></b></p>

</div>
</td>
</tr>
</table>

<div id="body">
<style> 
table {
font-family: arial, sans-serif;
border-collapse: collapse;
width: 100%;
}

td, th {
border: 1px solid #dddddd;
text-align: left;
padding: 5px;
}

tr:nth-child(even) {
background-color: ;
}

</style>
</head>
<body>

<hr>



<table>
                                    <thead class="thead-primary">
                                        <tr>
                                               <th>Branch Name</th>
                                                <th>Customer Name</th>
                                                <th>Loan Aproved</th>
                                                <th>Incomes Type</th>
                                                <th>Income Amount</th>
                                                <th>User Employee</th>
                                                <th>Date</th>
                                                <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                   
                                    
                                              <?php $no = 1; ?>
                                    <?php foreach ($data as $datas): ?>
                                              <tr>
                                    <td><?php echo $datas->blanch_name; ?></td>
                                    <td><?php //echo number_format($detail_incomes->loan_aprove); ?></td>
                                    <td><?php //echo $detail_incomes->blanch_name; ?></td>
                                    <td><?php //echo $detail_incomes->inc_name; ?></td>
                                    <td><?php //echo number_format($detail_incomes->receve_amount); ?></td>
                                    <td><?php //if ($detail_incomes->empl_name == FALSE) {
                                     ?>
                                     -
                                 <?php //}else{ ?>
                                        <?php //echo $detail_incomes->empl_name; ?>
                                        <?php //} ?>
                                    </td>
                                    <td><?php //echo $detail_incomes->receve_day; ?></td>
                               <!--  <td>
                               
                                </td> -->                                                                                   
                                 </tr>
                          <?php $customer_income = $this->queries->get_previous_income_blanch($from,$to,$datas->blanch_id); ?>
                           <?php foreach ($customer_income as $customer_incomes): ?>
                                <tr>
                                <td><?php //echo $datas->blanch_name; ?></td>
                                    <td><?php echo $customer_incomes->f_name; ?> <?php echo $customer_incomes->m_name; ?> <?php echo $customer_incomes->l_name; ?></td>
                                    <td><?php echo number_format($customer_incomes->loan_aprove); ?></td>
                                    <td><?php echo $customer_incomes->inc_name; ?></td>
                                    <td><?php echo number_format($customer_incomes->receve_amount); ?></td>
                                    <td><?php if ($customer_incomes->empl_name == FALSE) {
                                     ?>
                                     -
                                 <?php }else{ ?>
                                        <?php echo $customer_incomes->empl_name; ?>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $customer_incomes->receve_day; ?></td>
                               <!--  <td>
                                <a href="<?php //echo base_url("admin/delete_receved_prev/{$customer_incomes->receved_id}") ?>" class="btn btn-sm btn-icon btn-pure btn-danger on-default m-r-5 button-edit" data-original-title="Delete" onclick="return confirm('Are You Sure?')"><i class="icon-trash"></i>
                                        </a>
                                </td> -->                                                                                   
                                 </tr>
                              
                                 <?php endforeach; ?>
                                 <?php $total_receive = $this->queries->get_total_blanch_income($from,$to,$datas->blanch_id); ?>
                              <?php foreach ($total_receive as $total_receives): ?>
                                 <tr>
                                <td><b>TOTAL BRANCH</b></td>
                                    <td><?php //echo $customer_incomes->f_name; ?> <?php //echo $customer_incomes->m_name; ?> <?php //echo $customer_incomes->l_name; ?></td>
                                    <td><?php //echo number_format($total_receives->total_receive); ?></td>
                                    <td></td>
                                    <td><b><?php echo number_format($total_receives->total_receive); ?></b></td>
                                    <td>
                                    </td>
                                    <td></td>
                               <!--  <td>
                                <a href="<?php //echo base_url("admin/delete_receved_prev/{$customer_incomes->receved_id}") ?>" class="btn btn-sm btn-icon btn-pure btn-danger on-default m-r-5 button-edit" data-original-title="Delete" onclick="return confirm('Are You Sure?')"><i class="icon-trash"></i>
                                        </a>
                                </td> -->                                                                                   
                                 </tr>
                                 <?php endforeach; ?>
                                 <?php endforeach; ?>
                                 <tr>
                                   <td><b>GENERAL TOTAL</b></td>
                                    <td><?php //echo $customer_incomes->f_name; ?> <?php //echo $customer_incomes->m_name; ?> <?php //echo $customer_incomes->l_name; ?></td>
                                    <td><?php //echo number_format($total_receives->total_receive); ?></td>
                                    <td></td>
                                    <td><b><?php echo number_format($sum_income->total_receved_blanch); ?></b></td>
                                    <td>
                                    </td>
                                    <td></td>
                               <!--  <td>
                                <a href="<?php //echo base_url("admin/delete_receved_prev/{$customer_incomes->receved_id}") ?>" class="btn btn-sm btn-icon btn-pure btn-danger on-default m-r-5 button-edit" data-original-title="Delete" onclick="return confirm('Are You Sure?')"><i class="icon-trash"></i>
                                        </a>
                                </td> -->                                                                                   
                                 </tr>
                                    
                                </table>
</div>

</div>

</body>
</html>


