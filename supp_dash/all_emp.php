        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Employees </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Employees</li>
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
                                                <th>Employee </th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_SESSION['supp_id'])) {
                                                $supp_id = $_SESSION['supp_id'];
                                            } elseif (isset($_GET['supp_id'])) {
                                                $supp_id = $_GET['supp_id'];
                                            }
                                            $stmt = $connect->prepare("SELECT emp_id,pres_id FROM breakfast_order WHERE pres_id=? AND pres_show = 1 GROUP BY emp_id,pres_id");
                                            $stmt->execute(array($supp_id));
                                            $allorders = $stmt->fetchAll();
                                            $i = 0;
                                            foreach ($allorders as $order) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td> <?php echo $i; ?> </td>

                                                    <td> <?php 
                                                    $stmt = $connect->prepare("SELECT * FROM emplyees WHERE id=?");
                                                    $stmt->execute(array($order['emp_id']));
                                                    $emp_data = $stmt->fetch();
                                                    echo  $emp_data['emp_name']; ?> </td>
                                                    <td>
                                                        <a href="main.php?dir=supp_dash&page=report&sup_id=<?php echo $order['pres_id'];?>&emp_id=<?php echo $order['emp_id']; ?>" class="btn btn-warning btn-sm"> Show Orders <i class='fa fa-eye'></i> </a>
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