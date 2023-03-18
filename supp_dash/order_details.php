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
                        <h1> Order Details </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Order Details</li>
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
                                                <th>Day </th>
                                                <th>option1</th>
                                                <th>option1_qt</th>
                                                <th>option2</th>
                                                <th>option2_qt</th>
                                                <th>option3</th>
                                                <th>option3_qt</th>
                                                <th>Special</th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt = $connect->prepare("SELECT * FROM breakfast_order  WHERE pres_id=? AND order_date_from =? AND order_date_to=?");
                                            $stmt->execute(array($sup_id, $from, $to));
                                            $allorders = $stmt->fetchAll();
                                            $i = 0;
                                            foreach ($allorders as $order) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <?php  ?>
                                                    <td> <?php echo $i; ?> </td>
                                                    <td> <?php echo $order['day']; ?> </td>
                                                    <td> <?php echo $order['option1']; ?> </td>
                                                    <td> <?php echo $order['option1_qt']; ?> </td>
                                                    <td> <?php echo $order['option2']; ?> </td>
                                                    <td> <?php echo $order['option2_qt']; ?> </td>
                                                    <td> <?php echo $order['option3']; ?> </td>
                                                    <td> <?php echo $order['option3_qt']; ?> </td>
                                                    <td> <?php echo $order['special']; ?> </td>
                                                    <td>
                                                        <a href="main.php?dir=main_menu&page=emp_edit_order&from=<?php echo $order['order_date_from']; ?>&to=<?php echo $order['order_date_to']; ?>" class="btn btn-warning btn-sm"> View Details <i class='fa fa-eye'></i> </a>
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