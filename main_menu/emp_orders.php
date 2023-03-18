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
                                            $stmt = $connect->prepare("SELECT order_date_from,order_date_to, menu_num,pres_id FROM breakfast_order GROUP BY order_date_from,order_date_to,menu_num,pres_id");
                                            $stmt->execute();
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
                                                        <a href="main.php?dir=main_menu&page=emp_edit_order&from=<?php echo $order['order_date_from']; ?>&to=<?php echo $order['order_date_to']; ?>" class="btn btn-warning"> Edit Order  <i class='fa fa-pen'></i> </a>
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