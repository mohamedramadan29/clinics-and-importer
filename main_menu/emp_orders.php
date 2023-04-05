<?php
$stmt = $connect->prepare("UPDATE notification SET status = 1 WHERE emp_id=? AND name='accept_order' OR name='reject_order'");
$stmt->execute(array($_SESSION['emp_id']));
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Emp Orders </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Orders</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- DOM/Jquery table start -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="main.php?dir=main_menu&page=report" class="btn btn-primary"> Add New Order <i class="fa fa-plus"></i> </a>
                    </div>
                    <?php
                    if (isset($_SESSION['success_message'])) {
                        $message = $_SESSION['success_message'];
                        unset($_SESSION['success_message']);
                    ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i><?php echo $message; ?></th5>
                        </div>

                    <?php
                    }
                    ?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="my_table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th>Menu Num</th>
                                        <th>Supplier</th>
                                        <th>Date From</th>
                                        <th>Date to</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_SESSION['emp_id'])) {
                                        $emp_id = $_SESSION['emp_id'];
                                    } elseif (isset($_GET['emp_id'])) {
                                        $emp_id = $_GET['emp_id'];
                                    }

                                    $stmt = $connect->prepare("SELECT order_date_from,order_date_to, menu_num,pres_id,pres_show FROM breakfast_order WHERE emp_id=? GROUP BY order_date_from,order_date_to,menu_num,pres_id,pres_show");

                                    $stmt->execute(array($emp_id));
                                    $allorders = $stmt->fetchAll();
                                    $i = 0;
                                    foreach ($allorders as $order) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td> <?php echo $i; ?> </td>
                                            <td> <?php echo  $order['menu_num']; ?> </td>
                                            <td> <?php echo  $order['pres_id']; ?> </td>
                                            <td> <?php echo  $order['order_date_from']; ?> </td>
                                            <td> <?php echo  $order['order_date_to']; ?> </td>
                                            <td>
                                                <?php
                                                if ($order['pres_show'] == 0) {
                                                ?>
                                                    <a href="main.php?dir=main_menu&page=send_order&from=<?php echo $order['order_date_from']; ?>&to=<?php echo $order['order_date_to']; ?>" class="btn btn-primary btn-sm">
                                                        Send Order <i class='fa fa-plane'></i> </a>
                                                <?php
                                                } else {
                                                ?>
                                                    <button class="btn btn-success btn-sm"> Success Send <i class="fa fa-check"></i> </button>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if ($order['menu_num'] == 1) {
                                                ?>
                                                    <a href="main.php?dir=main_menu&page=emp_edit_order&from=<?php echo $order['order_date_from']; ?>&to=<?php echo $order['order_date_to']; ?>&emp_id=<?php echo $emp_id; ?>" class="btn btn-warning btn-sm"> Edit Order <i class='fa fa-pen'></i> </a>
                                                <?php
                                                } elseif ($order['menu_num'] == 2) {
                                                ?>
                                                    <a href="main.php?dir=main_menu&page=emp_edit_order2&from=<?php echo $order['order_date_from']; ?>&to=<?php echo $order['order_date_to']; ?>&emp_id=<?php echo $emp_id; ?>" class="btn btn-warning btn-sm"> Edit Order <i class='fa fa-pen'></i> </a>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if (isset($_SESSION['admin_id'])) {
                                                ?>
                                                    <a href="main.php?dir=main_menu&page=delete_order&from=<?php echo $order['order_date_from']; ?>&to=<?php echo $order['order_date_to']; ?>" class="btn btn-danger btn-sm"> Delete Order <i class='fa fa-trash'></i> </a>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>