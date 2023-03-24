            <?php
            $year = $_GET['year'];
            $month = $_GET['month'];

            ?>
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Sessions </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sessions </li>
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
                                    <a href="main.php?dir=sessions&page=add" type="button" class="btn btn-primary"> Add New Session <i class="fa fa-plus"></i> </a>
                                </div>
                                <div style="font-weight:bold" class="alert alert-success">
                                    Sum Sessions In Month ::

                                    <?php

                                    $stmt = $connect->prepare("SELECT MONTH(day_date) AS month, SUM(break_session + lunch_session + dinner_session) AS total FROM sessions WHERE emp_id=? AND session_month=? AND year=? GROUP BY MONTH(day_date)");
                                    $stmt->execute(array($_SESSION['emp_id'], $month, $year));
                                    $rowdata = $stmt->fetchAll();
                                    // Output the totals
                                    foreach ($rowdata as $row) {
                                        $month_num = $row["month"];
                                        $total = $row["total"];
                                        $month_name = date("F", strtotime("2000-$month_num-01"));
                                        echo " $total<br>";
                                    }
                                    ?>
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
                                    <div class="table-responsive dt-responsive">
                                        <table id="my_table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Month </th>
                                                    <th>Dat </th>
                                                    <th>Date </th>
                                                    <th>Break Session </th>
                                                    <th>lunch Session </th>
                                                    <th>Dinner Session </th>
                                                    <th>Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                // $stmt = $connect->prepare("SELECT  day_name FROM sessions GROUP BY  session_month");
                                                $stmt = $connect->prepare("SELECT * FROM sessions WHERE emp_id=? AND year=? AND session_month=?");
                                                $stmt->execute(array($_SESSION['emp_id'], $year, $month));
                                                $allitems = $stmt->fetchAll();
                                                $i = 0;
                                                foreach ($allitems as $item) {
                                                    $i++;
                                                ?>
                                                    <tr>
                                                        <td> <?php echo $i; ?> </td>
                                                        <td> <?php
                                                                $month_num = $item['session_month']; // example month number
                                                                $month_name = date("F", strtotime("2000-$month_num-01"));
                                                                echo $month_name; ?> </td>
                                                        <td> <?php echo $item['day_name']; ?> </td>
                                                        <td> <?php echo $item['day_date']; ?> </td>
                                                        <td> <?php echo $item['break_session'] ?> </td>
                                                        <td> <?php echo $item['lunch_session'] ?> </td>
                                                        <td> <?php echo $item['dinner_session'] ?> </td>
                                                        <td>
                                                            <button type="button" class="btn btn-success btn-sm waves-effect" data-toggle="modal" data-target="#edit-Modal_<?php echo $item['id'] ?>"> Edit <i class="fa fa-pen"></i> </button>
                                                            <!--<a href="main.php?dir=items&page=delete&item_id=<?php echo $item['id']; ?>" class="confirm btn btn-danger btn-sm"> Delete <i class="fa fa-trash"></i> </a> -->
                                                        </td>
                                                    </tr>
                                                    <!-- EDIT NEW CATEGORY MODAL   -->
                                                    <div class="modal fade" id="edit-Modal_<?php echo $item['id'] ?>" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title"> Edit Day Session </h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="post" action="main.php?dir=sessions&page=edit">
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <input type='hidden' name="item_id" value="<?php echo $item['id']; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="Company-2" class="block">breakfast Sessions</label>
                                                                            <input type="text" name="break_session" class="form-control" value="<?php echo $item['break_session'] ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="Company-2" class="block">lunch Sessions</label>
                                                                            <input type="text" name="lunch_session" class="form-control" value="<?php echo $item['lunch_session'] ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="Company-2" class="block">Dinner Sessions</label>
                                                                            <input type="text" name="dinner_session" class="form-control" value="<?php echo $item['dinner_session'] ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                                        <button type="submit" name="edit_cat" class="btn btn-primary waves-effect waves-light "> Edit </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
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