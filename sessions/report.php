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
                                                    <th>Year </th>
                                                    <th> Month </th>
                                                    <th>Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // $stmt = $connect->prepare("SELECT  day_name FROM sessions GROUP BY  session_month");
                                                $stmt = $connect->prepare("SELECT session_month, year  FROM sessions WHERE emp_id=? GROUP BY session_month, year");
                                                $stmt->execute(array($_SESSION['emp_id']));
                                                $allitems = $stmt->fetchAll();
                                                $i = 0;
                                                foreach ($allitems as $item) {
                                                    $i++;
                                                ?>
                                                    <tr>
                                                        <td> <?php echo $i; ?> </td>
                                                        <td> <?php echo $item['year']; ?> </td>
                                                        <td> <?php echo $item['session_month']; ?> </td>
                                                        <td>
                                                            <a href="main.php?dir=sessions&page=session_details&year=<?php echo $item['year']; ?>&month=<?php echo $item['session_month']; ?>&emp_id=<?php echo $_SESSION['emp_id']; ?>" class="confirm btn btn-primary btn-sm"> Details <i class="fa fa-eye"></i> </a>
                                                            <a href="main.php?dir=sessions&page=delete&year=<?php echo $item['year']; ?>&month=<?php echo $item['session_month']; ?>&emp_id=<?php echo $_SESSION['emp_id']; ?>" class="confirm btn btn-danger btn-sm"> Delete <i class="fa fa-trash"></i> </a>
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