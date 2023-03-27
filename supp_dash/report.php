        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Orders </h1>
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
                                                <!--<th>Supplier</th>-->
                                                <th>Date From</th>
                                                <th>Date to</th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt = $connect->prepare("SELECT order_date_from,order_date_to, menu_num,pres_id FROM breakfast_order  WHERE pres_id=? AND pres_show = 1 GROUP BY order_date_from,order_date_to,menu_num,pres_id");
                                            $stmt->execute(array($_SESSION['supp_id']));
                                            $allorders = $stmt->fetchAll();
                                            $i = 0;
                                            foreach ($allorders as $order) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td> <?php echo $i; ?> </td>
                                                    <td> <?php echo  $order['menu_num']; ?> </td>
                                                    <!-- <td> <?php echo  $order['pres_id']; ?> </td> -->
                                                    <td> <?php echo  $order['order_date_from']; ?> </td>
                                                    <td> <?php echo  $order['order_date_to']; ?> </td>
                                                    <td>
                                                        <a href="main.php?dir=supp_dash&page=order_details&from=<?php echo $order['order_date_from']; ?>&to=<?php echo $order['order_date_to']; ?>&sup_id=<?php echo $order['pres_id']; ?>" class="btn btn-warning btn-sm"> View Details <i class='fa fa-eye'></i> </a>
                                                        <!--   <a href="main.php?dir=supp_dash&page=print_order&from=<?php echo $order['order_date_from']; ?>&to=<?php echo $order['order_date_to']; ?>&sup_id=<?php echo $order['pres_id']; ?>" class="btn btn-warning btn-sm"> Print Weekly Order <i class='fa fa-eye'></i> </a> -->
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