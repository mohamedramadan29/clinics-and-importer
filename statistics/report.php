    <style>
        @media print {
            #export-btn {
                display: none !important;
            }
        }
    </style>

    <?php
    if (isset($_SESSION['emp_id'])) {
        $emp_id = $_SESSION['emp_id'];
    } elseif (isset($_GET['emp_id'])) {
        $emp_id = $_GET['emp_id'];
    }
    ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Month Statistics </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Month Statistics </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">

            <!-- DOM/Jquery table start -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="info">
                                <?php
                                $stmt = $connect->prepare("SELECT * FROM meal_value WHERE emp_id=?");
                                $stmt->execute(array($emp_id));
                                $price = $stmt->fetch();
                                ?>
                                <form action="" method="post">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="bg bg-primary"> Breakfast Value </th>
                                                <th class="bg bg-warning"> Lunch Value </th>
                                                <th class="bg bg-info"> Dinner Value </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> <input type="number" name="break_value" class="form-control" value="<?php echo $price['break_value']; ?>"> </td>
                                                <td> <input type="number" name="lunch_value" class="form-control" value="<?php echo $price['lunch_value']; ?>"> </td>
                                                <td> <input type="number" name="dinner_value" class="form-control" value="<?php echo $price['dinner_value']; ?>"> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="submit" name="meal_price" class="btn btn-primary btn-sm"> Save & Update <i class="fa fa-save"></i> </button>
                                </form>
                                <?php
                                if (isset($_POST['meal_price'])) {
                                    $break_value = $_POST['break_value'];
                                    $lunch_value = $_POST['lunch_value'];
                                    $dinner_value = $_POST['dinner_value'];
                                    $stm = $connect->prepare('SELECT * FROM meal_value WHERE emp_id=?');
                                    $stmt->execute(array($emp_id));
                                    $meal_data = $stmt->fetch();
                                    $count = $stmt->rowCount();
                                    if ($count > 0) {
                                        $stmt = $connect->prepare("UPDATE meal_value SET break_value=?, lunch_value=?, dinner_value=? WHERE emp_id=?");
                                        $stmt->execute(array($break_value, $lunch_value, $dinner_value, $emp_id));
                                    } else {
                                        $stmt = $connect->prepare("INSERT INTO meal_value (break_value, lunch_value, dinner_value , emp_id) 
                                        VALUES (:zbreak,:zlunch,:zdinner,:zemp_id)");
                                        $stmt->execute(array(
                                            'zbreak' => $break_value,
                                            'zlunch' => $lunch_value,
                                            'zdinner' => $dinner_value,
                                            'zemp_id' => $emp_id,
                                        ));
                                    }
                                    if ($stmt) {
                                        header('Location:main?dir=statistics&page=report');
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="info">
                                <form class="" name="" method="post" action="">
                                    <div class="card-body">
                                        <div class="select_year_monthe d-flex justify-content-around align-items-center">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Select Year </label>
                                                <select required name="year" class="form-control select2" style="min-width: 120px;">
                                                    <?php
                                                    // Set the start year and end year for the dropdown
                                                    $startYear = date('Y');
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
                                                <select required name="month" class="select2 form-control" style="min-width: 120px;">
                                                    <?php
                                                    for ($i = 1; $i <= 12; $i++) {
                                                        $month = date('F', mktime(0, 0, 0, $i, 1));
                                                        echo '<option value="' . $i . '">' . $month . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button style="min-width: 120px; margin-top:25px;" type="submit" name="select_year_month" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12">
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['select_year_month'])) {
                        $year = $_POST['year'];
                        $month = $_POST['month'];
                        $month = sprintf('%02d', $month);
                    ?>
                        <!--<div id="print">-->
                        <div id="table-to-export">
                            <div class="row">
                                <div class="col-6">
                                    <table class="table table-bordered">
                                        <?php
                                        $stmt = $connect->prepare("SELECT * FROM emplyees WHERE id=?");
                                        $stmt->execute(array($emp_id));
                                        $emp_data = $stmt->fetch();
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th> Clinic Name : </th>
                                                <th style="background-color: #2ff382 !important;"> <?php echo $emp_data['clinic_name']; ?> </th>
                                            </tr>
                                            <tr>
                                                <th> Code : </th>
                                                <th style="background-color: #2ff382 !important;"> <?php echo $emp_data['clinic_code']; ?> </th>
                                            </tr>
                                            <tr>
                                                <th> Month : </th>
                                                <th style="background-color: #2ff382 !important;"> <?php echo $month; ?> </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-6">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th> Breakfast : </th>
                                                <th style="background-color: #2ff382 !important;"> <?php echo $price['break_value']; ?> </th>
                                            </tr>
                                            <tr>
                                                <th> Lunch : </th>
                                                <th style="background-color: #2ff382 !important;"> <?php echo $price['lunch_value']; ?> </th>
                                            </tr>
                                            <tr>
                                                <th> Dinner : </th>
                                                <th style="background-color: #2ff382 !important;"> <?php echo $price['dinner_value']; ?> </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive dt-responsive">
                                    <table id="" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="background-color: #f1f1f1 !important;"> Date </th>
                                                <th style="background-color: #f1f1f1 !important;"> Day </th>
                                                <th style="background-color: #f1f1f1 !important;"> Breakfast Meals </th>
                                                <th style="background-color: #f1f1f1 !important;"> Shift 1 Tx. </th>
                                                <th style="background-color: #f1f1f1 !important;"> Lunch Meals </th>
                                                <th style="background-color: #f1f1f1 !important;"> Shift 2 Tx. </th>
                                                <th style="background-color: #f1f1f1 !important;"> Dinner Meals </th>
                                                <th style="background-color: #f1f1f1 !important;"> Shift 3 Tx. </th>
                                                <th style="background-color: #f1f1f1 !important;"> Meals total.</th>
                                                <th style="background-color: #f1f1f1 !important;"> Tx. Total </th>
                                                <th style="background-color: #f1f1f1 !important;"> Total cost </th>
                                                <th style="background-color: #f1f1f1 !important;"> Gap </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // تعريف المتغيرات الرئيسية
                                            $breakfast_total = 0;
                                            $lunch_total = 0;
                                            $dinner_total = 0;
                                            $break_session_total = 0;
                                            $lunch_session_total = 0;
                                            $dinner_session_total = 0;
                                            $sum_meal_total = 0;
                                            $sum_session_total = 0;
                                            $all_price_total = 0;
                                            $gpa_total = 0;
                                            // START MEAL VALUE
                                            $break_value = $price['break_value'];
                                            $lunch_value = $price['lunch_value'];
                                            $dinner_value = $price['dinner_value'];
                                            // END MEAL VALUE 
                                            $emp_id = $emp_id;
                                            $stmt = $connect->prepare("SELECT * FROM breakfast_order WHERE MONTH(STR_TO_DATE(date_day, '%W %d %M %Y')) = ? AND emp_id=?");
                                            $stmt->execute(array($month, $emp_id));
                                            $result = $stmt->fetchAll();
                                            $stmt = $connect->prepare("SELECT * FROM sessions WHERE session_month=? AND year = ? AND emp_id = ?");
                                            $stmt->execute(array($month, $year, $emp_id));
                                            $alloption = $stmt->fetchAll();
                                            $i = 0;
                                            foreach ($alloption as $option) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td style="background-color: #f1f1f1 !important;"><?php echo $i; ?></td>
                                                    <td style="background-color: #f1f1f1 !important;"><?php
                                                                                                        $date = new DateTime($option['day_date']);
                                                                                                        $dayName = $date->format('D');
                                                                                                        echo $dayName ?></td>
                                                    <?php
                                                    // عرض نتائج الطلبات في الصف الحالي إذا تطابق التاريخ
                                                    $found_data = false; // تعيين متغير لتحديد ما إذا كانت هناك بيانات في الصف الحالي
                                                    foreach ($result as $order) {
                                                        $date_day = date('d-m-Y', strtotime($order['date_day']));
                                                        if ($date_day == $option['day_date']) {
                                                            $found_data = true; // تحديث متغير العثور على البيانات إلى "صحيح"
                                                            $breakfast_sum = intval($order['option1_qt']) + intval($order['option2_qt']) + intval($order['option3_qt']);
                                                            $lunch_sum = intval($order['option4_qt']) + intval($order['option5_qt']) + intval($order['option6_qt']);
                                                            $dinner_sum = intval($order['option7_qt']) + intval($order['option8_qt']) + intval($order['option9_qt']);
                                                            $sum_meal = $breakfast_sum + $lunch_sum + $dinner_sum;
                                                            $sum_session = intval($option['break_session']) + intval($option['lunch_session']) + intval($option['dinner_session']);
                                                            $gpa = $sum_meal - $sum_session;
                                                            // get total price
                                                            $break_price = $breakfast_sum * $break_value;
                                                            $lunch_price = $lunch_sum * $lunch_value;
                                                            $dinner_price = $dinner_sum * $dinner_value;
                                                            $all_price = $break_price + $lunch_price + $dinner_price;
                                                            // حساب مجموعات العمود
                                                            $breakfast_total += $breakfast_sum;
                                                            $lunch_total += $lunch_sum;
                                                            $dinner_total += $dinner_sum;
                                                            $break_session_total += intval($option['break_session']);
                                                            $lunch_session_total += intval($option['lunch_session']);
                                                            $dinner_session_total += intval($option['dinner_session']);
                                                            $sum_meal_total += $sum_meal;
                                                            $sum_session_total += $sum_session;
                                                            $all_price_total += $all_price;
                                                            $gpa_total += $gpa;
                                                    ?>
                                                            <td><?php echo $breakfast_sum; ?></td>
                                                            <td><?php echo $option['break_session']; ?></td>
                                                            <td><?php echo $lunch_sum; ?></td>
                                                            <td><?php echo $option['lunch_session']; ?></td>
                                                            <td><?php echo $dinner_sum; ?></td>
                                                            <td><?php echo $option['dinner_session']; ?></td>
                                                            <td><?php echo $sum_meal; ?></td>
                                                            <td><?php echo $sum_session ?></td>
                                                            <td><?php echo $all_price; ?></td>
                                                            <td <?php if ($gpa == 0) { ?> style="background-color: #f1c40f !important;" <?php
                                                                                                                                    } elseif ($gpa > 0) {
                                                                                                                                        ?> style="background-color: #e74c3c !important;" <?php
                                                                                                                                                                                        } elseif ($gpa < 0) {
                                                                                                                                                                                            ?> style="background-color: #27ae60 !important;" <?php
                                                                                                                                                                                                                                            } ?>><?php echo $gpa; ?></td>
                                                        <?php
                                                        }
                                                    }
                                                    if (!$found_data) { // إذا لم يتم العثور على البيانات، قم بإضافة الأعمدة الفارغة
                                                        ?>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    <?php
                                                    }
                                                    ?>
                                                </tr>
                                                <!-- إظهار مجموعات العمود في النهاية -->

                                            <?php
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="2" style="font-weight: bold;">Total:</td>
                                                <td style="font-weight: bold;"><?php echo $breakfast_total; ?></td>
                                                <td style="font-weight: bold;"><?php echo $break_session_total; ?></td>
                                                <td style="font-weight: bold;"><?php echo $lunch_total; ?></td>
                                                <td style="font-weight: bold;"><?php echo $lunch_session_total; ?></td>
                                                <td style="font-weight: bold;"><?php echo $dinner_total; ?></td>
                                                <td style="font-weight: bold;"><?php echo $dinner_session_total; ?></td>
                                                <td style="font-weight: bold;"><?php echo $sum_meal_total; ?></td>
                                                <td style="font-weight: bold;"><?php echo $sum_session_total; ?></td>
                                                <td style="font-weight: bold;"><?php echo $all_price_total; ?></td>
                                                <td style="font-weight: bold;"><?php echo $gpa_total; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary text-center" id="print_Button" onclick="printDiv()"> <i class="fa fa-print"></i> Export As Pdf </button>
                            <button id="export-btn" class="btn btn-warning text-center"> <i class="fa fa-file-excel"></i> Export to Excel </button>
                            <a class="btn btn-danger text-center" href="main.php?dir=statistics&page=delete_month&emp_id=<?php echo $emp_id; ?>&month=<?php echo $month; ?>"> <i class="fa fa-trash"></i> Delete Month Data </a>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('table-to-export').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
    <script>
        document.getElementById("export-btn").addEventListener("click", exportToExcel);

        function exportToExcel() {
            // Get the HTML table element
            var table = document.getElementById("table-to-export");

            // Convert the HTML table to a workbook object
            var workbook = XLSX.utils.table_to_book(table);

            // Convert the workbook object to a binary Excel file
            var binaryFile = XLSX.write(workbook, {
                bookType: "xlsx",
                type: "binary"
            });

            // Download the binary file as an Excel file
            saveAs(
                new Blob([s2ab(binaryFile)], {
                    type: "application/octet-stream"
                }),
                "export.xlsx"
            );
        }

        // Utility function to convert a string to an ArrayBuffer
        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i < s.length; i++) {
                view[i] = s.charCodeAt(i) & 0xff;
            }
            return buf;
        }
    </script>