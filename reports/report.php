<style>
    @media print {
        #print_Button {
            display: none;
        }
    }
</style>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Reports </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"> Report </li>
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
                        <h3 class="card-title">New Report </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="" name="" method="post" action="">
                        <div class="card-body">
                            <div class="select_year_monthe d-flex justify-content-around align-items-center">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Select Month</label>
                                    <select required name="month" class="select2 form-control" style="min-width: 250px;">
                                        <?php
                                        for ($i = 1; $i <= 12; $i++) {
                                            $month = date('F', mktime(0, 0, 0, $i, 1));
                                        ?>
                                            <option value="<?php echo $i; ?>"> <?php echo $month; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button style="min-width: 150px;" type="submit" name="select_year_month" class="btn btn-primary"> Show Report </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['select_year_month'])) {
                        $month = $_POST['month'];
                        $emp_id = $_SESSION['emp_id'];
                        $stmt = $connect->prepare("SELECT * FROM breakfast_order WHERE MONTH(STR_TO_DATE(date_day, '%W %d %M %Y')) = ? AND emp_id=?");
                        $stmt->execute(array($month, $emp_id));
                        $result = $stmt->fetchAll();
                        $count = $stmt->rowCount();
                        if ($count > 0) {
                            /* get employee data */
                            $stmt = $connect->prepare("SELECT * FROM emplyees WHERE id=?");
                            $stmt->execute(array($_SESSION['emp_id']));
                            $emp_data = $stmt->fetch();
                            /* get supplier logo  */
                            $stmt = $connect->prepare("SELECT * FROM presentions WHERE id=?");
                            $stmt->execute(array($emp_data['pres_id']));
                            $sup_data = $stmt->fetch();
                    ?>
                            <div id="print">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center;"> <img style="height: 90px;" src="uploads/pres_logo/<?php echo $sup_data['logo']; ?>" alt=""> </th>
                                        <th style="text-align: center; padding-top: 45px;"> <?php echo  $emp_data['clinic_name']; ?> </th>
                                        <th style="text-align: center;"> <img style="height: 90px;" src="uploads/pres_logo/diavare.png" alt=""> </th>
                                    </tr>
                                </table>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> Date </th>
                                            <th> Day </th>
                                            <th> breakfast </th>
                                            <th> lunch </th>
                                            <th> dinner </th>
                                            <th> Comments </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total_breakfast = 0;
                                        $total_lunch = 0;
                                        $total_dinner = 0;
                                        foreach ($result as $row) {
                                            // Retrieve the date, day, breakfast, lunch, dinner, and comments for each row
                                            $date = $row['date_day'];
                                            $day = date('l', strtotime($date));
                                            $option1_qt = intval($row['option1_qt']);
                                            $option2_qt = intval($row['option2_qt']);
                                            $option3_qt = intval($row['option3_qt']);
                                            $option4_qt = intval($row['option4_qt']);
                                            $option5_qt = intval($row['option5_qt']);
                                            $option6_qt = intval($row['option6_qt']);
                                            $option7_qt = intval($row['option7_qt']);
                                            $option8_qt = intval($row['option8_qt']);
                                            $option9_qt = intval($row['option9_qt']);
                                            $breakfast = $option1_qt + $option2_qt + $option3_qt;
                                            $lunch = $option4_qt + $option5_qt + $option6_qt;
                                            $dinner = $option7_qt + $option8_qt + $option9_qt;
                                            $total_breakfast += $breakfast;
                                            $total_lunch += $lunch;
                                            $total_dinner += $dinner;
                                        ?>
                                            <tr>
                                                <td> <?php echo $date; ?> </td>
                                                <td> <?php echo $day; ?> </td>
                                                <td> <?php echo $breakfast; ?> </td>
                                                <td> <?php echo $lunch; ?> </td>
                                                <td> <?php echo $dinner; ?> </td>
                                                <td> </td>
                                            </tr>

                                        <?php
                                        }
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td style="background-color: #e74c3c; font-weight:bold"> Total </td>
                                            <td style="  font-weight:bold"> <?php echo $total_breakfast; ?> </td>
                                            <td style="  font-weight:bold"> <?php echo $total_lunch; ?> </td>
                                            <td style="  font-weight:bold"> <?php echo $total_dinner; ?> </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="text-center text-bold"> Dietition </p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-center text-bold"> Signature </p>
                                    </div>

                                </div>
                            </div>
                            <button class="btn btn-primary text-center" id="print_Button" onclick="printDiv()"> <i class="fa fa-print"></i>Print</button>
                        <?php
                        } else {
                        ?>
                            <p class="alert alert-danger"> No data Found </p>
                    <?php
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

<script type="text/javascript">
    function printDiv() {
        var printContents = document.getElementById('print').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>