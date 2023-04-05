        <?php
        $stmt = $connect->prepare("UPDATE notification SET status = 1 WHERE emp_id = ? AND name = ? AND status = 0");
        $stmt->execute(array($_SESSION['emp_id'],"goal_progress"));
        ?>
        
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Clients </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Clients</li>
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
                                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#add-Modal"> Add New client <i class="fa fa-plus"></i> </button>
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
                                                <th>Patient Name</th>
                                                <th>Progress in patient behaviour</th>
                                                <th>Goal Achieving TimeLine </th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt = $connect->prepare("SELECT * FROM clients WHERE emp_id=?");
                                            $stmt->execute(array($_SESSION['emp_id']));
                                            $allclient = $stmt->fetchAll();
                                            $i = 0;
                                            foreach ($allclient as $client) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td> <?php echo $i; ?> </td>
                                                    <td> <?php echo  $client['patient_name']; ?> </td>
                                                    <td>
                                                        <?php
                                                        if ($client['goal_progress'] == "The Patient Has Not Started Yet") {
                                                            $progress = 0;
                                                        } elseif ($client['goal_progress'] == "Patient start - monitor Progress") {
                                                            $progress = 20;
                                                        } elseif ($client['goal_progress'] == "Patient started working on the goal - stage of encouragement & monitoring") {
                                                            $progress = 40;
                                                        } elseif ($client['goal_progress'] == "Patient achieved 50% of the smart goals") {
                                                            $progress = 60;
                                                        } elseif ($client['goal_progress'] == "Almost all goals were achieved by the patient") {
                                                            $progress = 80;
                                                        } elseif ($client['goal_progress'] == "Smart goals done - Maintaning behaviours and pushing further") {
                                                            $progress = 100;
                                                        }
                                                        ?>
                                                        <span style="font-weight: bold;"><?php echo $progress; ?> % </span>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress; ?>%">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $start_date = $client['start_date'];
                                                        $end_date = $client['goal_end_date'];
                                                        $today_date = date("Y-m-d"); // التاريخ الحالي
                                                        $total_days = abs(strtotime($end_date) - strtotime($start_date)) / 86400; // عدد الأيام الإجمالي
                                                        $remaining_days = abs(strtotime($end_date) - strtotime($today_date)) / 86400; // عدد الأيام المتبقية
                                                        $percentage = round((($total_days - $remaining_days) / $total_days) * 100); // نسبة التقدم
                                                        $days_required = $client['days_required'];
                                                        if ($percentage == 100) {
                                                            $stmt = $connect->prepare("UPDATE clients SET percentage = 1 WHERE id=?");
                                                            $stmt->execute(array($client['id']));
                                                            if ($stmt) {
                                                                $stmt = $connect->prepare("SELECT * FROM notification WHERE name=? AND order_id=?");
                                                                $stmt->execute(array("goal_progress", $client['id']));
                                                                $count = $stmt->rowCount();
                                                                if ($count > 0) {
                                                                } else {
                                                                    $stmt = $connect->prepare("INSERT INTO notification (emp_id,name,noti_desc ,order_id, date)
                                                                VALUES(:zemp_id,:zname,:znoti_desc ,:zorder_id, :zdate)
                                                                ");
                                                                    $stmt->execute(array(
                                                                        "zname" => "goal_progress",
                                                                        "zemp_id" => $_SESSION['emp_id'],
                                                                        "znoti_desc" => "Client " . $client['patient_name'] . " Complete Goal Progress",
                                                                        "zorder_id" => $client['id'],
                                                                        "zdate" => date("Y-m-d")
                                                                    ));
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                        <span style="font-weight: bold;"><?php echo $percentage; ?> % </span>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage; ?>%">
                                                                <span class="sr-only">70% Complete (success)</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm waves-effect" data-toggle="modal" data-target="#edit-Modal_<?php echo $client['id']; ?>"> Edit <i class='fa fa-pen'></i> </button>
                                                        <a href="main.php?dir=clients&page=delete&patient_id=<?php echo $client['id']; ?>" class="confirm btn btn-danger btn-sm"> Delete <i class='fa fa-trash'></i> </a>
                                                    </td>
                                                </tr>
                                                <!-- EDIT NEW CATEGORY MODAL   -->
                                                <div class="modal fade" id="edit-Modal_<?php echo $client['id']; ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"> edit Cleint </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="main.php?dir=clients&page=edit" method="post" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Patient Name</label>
                                                                        <input type="hidden" name="id" value="<?php echo $client['id']; ?>">
                                                                        <input required id="Company-2" name="patient_name" type="text" class="form-control required" value="<?php echo $client['patient_name']; ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Actifation Measure</label>
                                                                        <select name="artifation_measure" id="" class="select2 form-control">
                                                                            <option value=""> -- Select -- </option>
                                                                            <option <?php if ($client['artifation_measure'] == "Level 1 ( disengaged & overwhelmed )") echo "selected"; ?> value="Level 1 ( disengaged & overwhelmed )"> Level 1 ( disengaged & overwhelmed ) </option>
                                                                            <option <?php if ($client['artifation_measure'] == "Level 2 ( Becoming aware, but still struggling )") echo "selected"; ?> value="Level 2 ( Becoming aware, but still struggling )"> Level 2 ( Becoming aware, but still struggling ) </option>
                                                                            <option <?php if ($client['artifation_measure'] == "Level 3 ( The patient taking action )") echo "selected"; ?> value="Level 3 ( The patient taking action )"> Level 3 ( The patient taking action ) </option>
                                                                            <option <?php if ($client['artifation_measure'] == "Level 4 ( Maintaning behaviours and pushing further )") echo "selected"; ?> value="Level 4 ( Maintaning behaviours and pushing further )"> Level 4 ( Maintaning behaviours and pushing further ) </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Statement Of Willingness To Change </label>
                                                                        <select name="willingness" id="" class="select2 form-control">
                                                                            <option value=""> -- Select -- </option>
                                                                            <option <?php if ($client['willingness'] == "The patient in stage 1 ( Precontemplation )") echo "selected"; ?> value="The patient in stage 1 ( Precontemplation )"> The patient in stage 1 ( Precontemplation ) </option>
                                                                            <option <?php if ($client['willingness'] == "The patient in stage 2 ( Contemplation )") echo "selected"; ?> value="The patient in stage 2 ( Contemplation )"> The patient in stage 2 ( Contemplation ) </option>
                                                                            <option <?php if ($client['willingness'] == "The patient in stage 3 ( Preparation )") echo "selected"; ?> value="The patient in stage 3 ( Preparation )"> The patient in stage 3 ( Preparation ) </option>
                                                                            <option <?php if ($client['willingness'] == "The patient in stage 4 ( Acion & maintenance )") echo "selected"; ?> value="The patient in stage 4 ( Acion & maintenance )"> The patient in stage 4 ( Acion & maintenance ) </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Days Required To Achieve Goal</label>
                                                                        <input required id="Company-2" name="days_required" type="number" class="form-control required" value="<?php echo $client['days_required']; ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block"> smart goals progress </label>
                                                                        <select name="goal_progress" id="" class="select2 form-control">
                                                                            <option value=""> -- Select -- </option>
                                                                            <option <?php if ($client['goal_progress'] == "The Patient Has Not Started Yet") echo "selected"; ?> value="The Patient Has Not Started Yet"> The Patient Has Not Started Yet </option>
                                                                            <option <?php if ($client['goal_progress'] == "Patient start - monitor Progress") echo "selected"; ?> value="Patient start - monitor Progress"> Patient start - monitor Progress </option>
                                                                            <option <?php if ($client['goal_progress'] == "Patient started working on the goal - stage of encouragement & monitoring") echo "selected"; ?> value="Patient started working on the goal - stage of encouragement & monitoring"> Patient started working on the goal - stage of encouragement & monitoring </option>
                                                                            <option <?php if ($client['goal_progress'] == "Patient achieved 50% of the smart goals") echo "selected"; ?> value="Patient achieved 50% of the smart goals"> Patient achieved 50% of the smart goals </option>
                                                                            <option <?php if ($client['goal_progress'] == "Almost all goals were achieved by the patient") echo "selected"; ?> value="Almost all goals were achieved by the patient"> Almost all goals were achieved by the patient </option>
                                                                            <option <?php if ($client['goal_progress'] == "Smart goals done - Maintaning behaviours and pushing further") echo "selected"; ?> value="Smart goals done - Maintaning behaviours and pushing further"> Smart goals done - Maintaning behaviours and pushing further </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block"> Smart Goals </label>
                                                                        <textarea name="smart_goals" id="" class="form-control"><?php echo $client['smart_goals']; ?></textarea>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                                    <button type="submit" name="add_cat" class="btn btn-primary waves-effect waves-light ">Save</button>
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

                        <!-- ADD NEW CATEGORY MODAL   -->
                        <div class="modal fade" id="add-Modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"> Add Client </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="main.php?dir=clients&page=add" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Patient Name</label>
                                                <input required id="Company-2" name="patient_name" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Actifation Measure</label>
                                                <select name="artifation_measure" id="" class="select2 form-control">
                                                    <option value=""> -- Select -- </option>
                                                    <option value="Level 1 ( disengaged & overwhelmed )"> Level 1 ( disengaged & overwhelmed ) </option>
                                                    <option value="Level 2 ( Becoming aware, but still struggling )"> Level 2 ( Becoming aware, but still struggling ) </option>
                                                    <option value="Level 3 ( The patient taking action )"> Level 3 ( The patient taking action ) </option>
                                                    <option value="Level 4 ( Maintaning behaviours and pushing further )"> Level 4 ( Maintaning behaviours and pushing further ) </option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Statement Of Willingness To Change </label>
                                                <select name="willingness" id="" class="select2 form-control">
                                                    <option value=""> -- Select -- </option>
                                                    <option value="The patient in stage 1 ( Precontemplation )"> The patient in stage 1 ( Precontemplation ) </option>
                                                    <option value="The patient in stage 2 ( Contemplation )"> The patient in stage 2 ( Contemplation ) </option>
                                                    <option value="The patient in stage 3 ( Preparation )"> The patient in stage 3 ( Preparation ) </option>
                                                    <option value="The patient in stage 4 ( Acion & maintenance )"> The patient in stage 4 ( Acion & maintenance ) </option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Days Required To Achieve Goal</label>
                                                <input required id="Company-2" name="days_required" type="number" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block"> smart goals progress </label>
                                                <select name="goal_progress" id="" class="select2 form-control">
                                                    <option value=""> -- Select -- </option>
                                                    <option value="The Patient Has Not Started Yet"> The Patient Has Not Started Yet </option>
                                                    <option value="Patient start - monitor Progress"> Patient start - monitor Progress </option>
                                                    <option value="Patient started working on the goal - stage of encouragement & monitoring"> Patient started working on the goal - stage of encouragement & monitoring </option>
                                                    <option value="Patient achieved 50% of the smart goals"> Patient achieved 50% of the smart goals </option>
                                                    <option value="Almost all goals were achieved by the patient"> Almost all goals were achieved by the patient </option>
                                                    <option value="Smart goals done - Maintaning behaviours and pushing further"> Smart goals done - Maintaning behaviours and pushing further </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block"> Smart Goals </label>
                                                <textarea name="smart_goals" id="" class="form-control"></textarea>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                            <button type="submit" name="add_cat" class="btn btn-primary waves-effect waves-light ">Save</button>
                                        </div>
                                    </form>
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