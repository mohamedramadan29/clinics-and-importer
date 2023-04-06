<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Daily Orders  </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Daily Details</li>
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
                                        <th> Day </th>
                                        <th> Date </th>
                                        <th> Emp Name </th>
                                        <th> Status </th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $date =  date('l j F Y');
                                    $stmt = $connect->prepare("SELECT * FROM breakfast_order  WHERE  date_day = ? AND pres_id = ?");
                                    $stmt->execute(array($date, $_SESSION['supp_id']));
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
                                            $stmt = $connect->prepare("SELECT * FROM emplyees WHERE id=?");
                                            $stmt->execute(array($order['emp_id']));
                                            $emp_data = $stmt->fetch();
                                            echo $emp_data['emp_name']; ?> </td>
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
                                                <a href="main.php?dir=supp_dash&page=day_details&id=<?php echo $order['id']; ?>&supp_id=<?php echo $_SESSION['supp_id'] ?>" class="btn btn-info btn-sm"> Day Details <i class='fa fa-eye'></i> </a>
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