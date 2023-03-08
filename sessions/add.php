<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Add New Session </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"> Add New Session </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">New Session</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="" name="" method="post" action="">
                        <div class="card-body">
                            <div class="select_year_monthe d-flex justify-content-around align-items-center">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Select Year </label>
                                    <select required name="year" class="form-control select2" style="min-width: 150px;">
                                        <?php
                                        // Set the start year and end year for the dropdown
                                        $startYear = date('Y') - 10;
                                        $endYear = date('Y') + 10;
                                        // Loop through each year and add it as an option in the dropdown
                                        for ($i = $startYear; $i <= $endYear; $i++) {
                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Select Month</label>
                                    <select required name="month" class="select2 form-control" style="min-width: 150px;">
                                        <?php
                                        for ($i = 1; $i <= 12; $i++) {
                                            $month = date('F', mktime(0, 0, 0, $i, 1));
                                            echo '<option value="' . $i . '">' . $month . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button style="min-width: 150px;" type="submit" name="select_year_month" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['select_year_month'])) {
                        $year = $_POST['year'];
                        $month = $_POST['month'];
                        // Get the number of days in the selected month
                        $numDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                    ?>
                        <form action="" method="post" name="insert_day_month">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> Day </th>
                                        <th> Date </th>
                                        <th> breakfast Session </th>
                                        <th> lunch Session </th>
                                        <th> dinner Session </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($day = 1; $day <= $numDays; $day++) {
                                        $year = $_POST['year'];
                                        $month = $_POST['month'];
                                        $date = date_create("$year-$month-$day");
                                        $dayName = date_format($date, "l"); // Get the day name
                                        $dateDay = date_format($date, "d-m-Y"); // Get the date day in the format "d-m-Y"
                                    ?>
                                        <tr>
                                            <td> <input type="text" name="day_name[]" class="form-control" value="<?php echo $dayName ?>">
                                                <input type="hidden" name="year[]" value="<?php echo $year ?>">
                                                <input type="hidden" name="month[]" value="<?php echo $month ?>">
                                            </td>
                                            <td> <input type="text" name="date_day[]" class="form-control" value="<?php echo $dateDay ?>"> </td>
                                            <td> <input type="text" name="break_session[]" class="form-control"> </td>
                                            <td> <input type="text" name="lunch_session[]" class="form-control"> </td>
                                            <td> <input type="text" name="dinner_session[]" class="form-control"> </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!--
                            <p style="font-weight: bold; margin-left:20px"> Total sessions :: 100 Session </p>
                                    -->
                            <br>
                            <button type="submit" name='insert_days' class="btn btn-primary text-center d-block" style="margin-left:20px"> Save <i class="fa fa-save"></i> </button>
                            <br>
                        </form>
                    <?php
                    }
                    ?>
                    <br>
                    <br>
                    <?php
                    if (isset($_POST['insert_days'])) {
                        $year = $_POST['year'];
                        $month = $_POST['month'];
                        $day_name = $_POST['day_name'];
                        $date_day = $_POST['date_day'];
                        $break_session = $_POST['break_session'];
                        $lunch_session = $_POST['lunch_session'];
                        $dinner_session = $_POST['dinner_session'];
                        $data = array();
                        for ($i = 0; $i < count($day_name); $i++) {
                            $row = array(
                                'year' => $year[$i],
                                'month' => $month[$i],
                                'day_name' => $day_name[$i],
                                'date_day' => $date_day[$i],
                                'break_session' => $break_session[$i],
                                'lunch_session' => $lunch_session[$i],
                                'dinner_session' => $dinner_session[$i],
                            );
                            array_push($data, $row);
                        }
                        foreach ($data as $row) {
                            $year = $row['year'];
                            $month = $row['month'];
                            $day_name = $row['day_name'];
                            $date_day = $row['date_day'];
                            $break_session = $row['break_session'];
                            $lunch_session = $row['lunch_session'];
                            $dinner_session = $row['dinner_session'];
                            $stmt = $connect->prepare('INSERT INTO sessions (session_year,session_month,day_name,day_date,break_session,lunch_session,dinner_session)
                            VALUES(:zyear,:zmonth,:zday_name,:zday_date,:zbreak,:zlunch,:zdinner)
                            ');
                            $stmt->execute(array(
                                'zyear' => $yaer,
                                'zmonth' => $month,
                                'zday_name' => $day_name,
                                'zday_date' => $date_day,
                                'zbreak' => $break_session,
                                'zlunch' => $lunch_session,
                                'zdinner' => $dinner_session,
                            ));
                        }
                        if ($stmt) {
                            $_SESSION['success_message'] = "session Added successfully ";
                            header('Location:main?dir=sessions&page=report');
                        }
                    }
                    ?>

                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>