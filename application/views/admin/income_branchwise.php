<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

<?php
// Initialize total variables
$total_customer = 0;
$total_amount = 0;
?>

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url("admin/index"); ?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Report</li>
                        <li class="breadcrumb-item active">Today Income</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>FAINI SIKU</h2>
                        <div class="pull-right">
                            <a href="javascript:;" class="btn btn-primary btn-sm"><i class="icon-printer">Print</i></a>
                        </div>    
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom">
                                <thead class="thead-primary">
                                    <tr>
                                        <th>S/no</th>
                                        <th>TAWI</th>
                                        <th>FAINI JUMLA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($income_branchwise as $index => $income): ?>
                                    
                                    <tr>
                                        <td><?= ($index + 1) ?></td>
                                        <td><?= htmlspecialchars($income->blanch_name) ?></td>
                                        <td><?= number_format($income->total_receve_amount) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

<?php include('incs/footer.php'); ?>
