<?php
$from = $_GET['from'];
$to = $_GET['to'];
$sup_id = $_GET['sup_id'];
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Print Weekly Order </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"> Print Weekly Order </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- DOM/Jquery table start -->
<?php

$stmt = $connect->prepare("SELECT * FROM presentions WHERE id = ? ");
$stmt->execute(array($_SESSION['supp_id']));
$sup_data = $stmt->fetch();


$stmt = $connect->prepare("SELECT * FROM emplyees WHERE pres_id = ? ");
$stmt->execute(array($sup_data['id']));
$emp_data = $stmt->fetch();
?>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <div class="col-6">
                    <p style="padding: 20px;padding-top: 30px;font-weight: 500;">الطلب الاسبوعية | Weekly Order</p>
                </div>
                <div class="col-6">
                    <img style="height: 90px;" src="uploads/pres_logo/<?php echo $sup_data['logo']; ?>" alt="">
                </div>
            </div>
            <div class="row">

                <div class="col-4">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td> Clinic Code </td>
                        </tr>
                        <tr>
                            <td> Customer Name </td>
                        </tr>
                        <tr>
                            <td> Details </td>
                        </tr>
                        <tr>
                            <td> Weekly Number </td>
                        </tr>
                        <tr>
                            <td> From </td>
                        </tr>
                        <tr>
                            <td> To </td>
                        </tr>
                        <tr>
                            <td> Ordered By </td>
                        </tr>
                        <tr>
                            <td> Phone </td>
                        </tr>
                         
                    </table>
                </div>
                <div class="col-4">
                    <table class="table table-bordered table-striped text-center">
                        <tr>
                            <td> <?php echo $emp_data['clinic_code']; ?> </td>
                        </tr>
                        <tr>
                            <td><?php echo $emp_data['clinic_name']; ?> </td>
                        </tr>
                        <tr>
                            <td> توريد اغذية صحية / Healthy Foods Supplies </td>
                        </tr>
                        <tr>
                            <td> 2 </td>
                        </tr>
                        <tr>
                            <td> <?php echo $from; ?> </td>
                        </tr>
                        <tr>
                            <td>  <?php echo $to; ?> </td>
                        </tr>
                        <tr>
                            <td> <?php echo $emp_data['emp_name']; ?> </td>
                        </tr>
                        <tr>
                            <td> <?php echo $emp_data['emp_phone']; ?> </td>
                        </tr>
                        
                    </table>
                </div>
                <div class="col-4">
                    <table class="table table-bordered table-striped text-right">
                        <tr>
                            <td> رقم العيادة </td>
                        </tr>
                        <tr>
                            <td> اسم العميل </td>
                        </tr>
                        <tr>
                            <td> التفاصيل </td>
                        </tr>
                        <tr>
                            <td> رقم الاسبوع </td>
                        </tr>
                        <tr>
                            <td> من </td>
                        </tr>
                        <tr>
                            <td> الي </td>
                        </tr>
                        <tr>
                            <td> اسم مقدم الطلب </td>
                        </tr>
                        <tr>
                            <td> الهاتف </td>
                        </tr>
                        
                    </table>
                </div>
            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>