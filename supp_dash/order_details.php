        <?php
        $stmt = $connect->prepare("UPDATE sup_notification SET status = 1 WHERE status = 0 AND supp_id = ? AND name = ?");
        $stmt->execute(array($_SESSION['supp_id'], "Edit Order"));

        $from = $_GET['from'];
        $to = $_GET['to'];
        $sup_id = $_GET['sup_id'];
        $emp_id = $_GET['emp_id'];
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
                                <div class="row" style="margin-bottom: 15px;">
                                    <div class="col-6">
                                        <div>
                                            <label for=""> Start Date :: </label>
                                            <input disabled type="text" class="form-control" value="<?php echo $from; ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for=""> End Date :: </label>
                                            <input disabled type="text" class="form-control" value="<?php echo $to; ?>">
                                        </div>
                                    </div>


                                </div>
                                <div class="table-responsive">
                                    <table id="my_table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Day </th>
                                                <th> Date </th>
                                                <th> Status </th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt = $connect->prepare("SELECT * FROM breakfast_order  WHERE emp_id = ? AND pres_id=? AND order_date_from =? AND order_date_to=?");
                                            $stmt->execute(array($emp_id, $sup_id, $from, $to));
                                            $allorders = $stmt->fetchAll();
                                            $i = 0;
                                            foreach ($allorders as $order) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <?php  ?>
                                                    <td> <?php echo $i; ?> </td>
                                                    <td> <?php echo $order['day']; ?> </td>
                                                    <td> <?php echo $order['date_day']; ?> </td>
                                                    <td> <?php
                                                            if ($order['status'] == 0) {
                                                            ?>
                                                            <button class="btn btn-warning btn-sm"> Not approved yet </button>
                                                        <?php
                                                            } elseif ($order['status'] == 1) { ?>
                                                            <button class="btn btn-success btn-sm"> approved </button>
                                                        <?php
                                                            } else {
                                                        ?>
                                                            <button class="btn btn-danger btn-sm"> Rejected </button>
                                                            <p> <?php echo $order['reject_reason']; ?> </p>

                                                        <?php
                                                            }

                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="main.php?dir=supp_dash&page=day_details&id=<?php echo $order['id']; ?>&supp_id=<?php echo $sup_id; ?>" class="btn btn-info btn-sm"> Day Details <i class='fa fa-eye'></i> </a>
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