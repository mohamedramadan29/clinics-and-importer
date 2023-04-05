<style>
    @media print {
        #print_Button {
            display: none;
        }
    }
</style>
<?php
if (isset($_SESSION['supp_id'])) {
    $supp_id = $_SESSION['supp_id'];
} elseif (isset($_GET['supp_id'])) {
    $supp_id = $_GET['supp_id'];
}
if (isset($_GET["id"]) && is_numeric($_GET['id'])) {
    $day_id = $_GET['id'];
    $stmt = $connect->prepare("SELECT * FROM  breakfast_order WHERE id = ?");
    $stmt->execute(array($day_id));
    $day_details = $stmt->fetch();
    //echo $day_details['emp_id'];
    $count = $stmt->rowCount();
    if ($count > 0) { ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    $date = date('Y-m-d');
                    if (isset($_POST['accept_order'])) {
                        $stmt = $connect->prepare("UPDATE breakfast_order SET status = 1 WHERE id=?");
                        $stmt->execute(array($day_id));
                        if ($stmt) {
                            $stmt = $connect->prepare("INSERT INTO notification (emp_id,name,noti_desc,date,order_id)
                            VALUE(:zemp_id,:zname,:znoti_desc,:zdate,:zorder_id)
                            ");
                            $stmt->execute(array(
                                'zemp_id' => $day_details['emp_id'],
                                'zname' => "accept_order",
                                'znoti_desc' => "Supplier Accepted For " . $day_details['date_day'] . " Request",
                                "zdate" => $date,
                                "zorder_id" => $day_id
                            ));
                    ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p> <i class="icon fas fa-check"></i> Accepted </p>
                            </div>
                        <?php
                        }
                    }
                    if (isset($_POST['send_reason'])) {
                        $reason = $_POST['reject_reason'];
                        $stmt = $connect->prepare("UPDATE breakfast_order SET status = 2 ,  reject_reason = ?  WHERE id=?");
                        $stmt->execute(array($reason, $day_id));
                        if ($stmt) {
                            $stmt = $connect->prepare("INSERT INTO notification (emp_id,name,noti_desc,date,order_id,reject_reason)
                            VALUE(:zemp_id,:zname,:znoti_desc,:zdate,:zorder_id,:zreject_reason)
                            ");
                            $stmt->execute(array(
                                'zemp_id' => $day_details['emp_id'],
                                'zname' => "reject_order",
                                'znoti_desc' => "Supplier Reject Order In  " . $day_details['date_day'] . " Request",
                                "zdate" => $date,
                                "zorder_id" => $day_id,
                                "zreject_reason" => $reason
                            ));
                        ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p> <i class="icon fas fa-check"></i> Reason Send </p>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Print Weekly Order </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"> Print Weekly Order </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- DOM/Jquery table start -->
        <?php
        $stmt = $connect->prepare("SELECT * FROM presentions WHERE id = ? ");
        $stmt->execute(array($supp_id));
        $sup_data = $stmt->fetch();
        $stmt = $connect->prepare("SELECT * FROM emplyees WHERE id = ?  ");
        $stmt->execute(array($day_details['emp_id']));
        $emp_data = $stmt->fetch();
        // echo $emp_data['emp_name'];
        ?>
        <section class="content">
            <div class="container">
                <div class="card">
                    <div id="print" class="report2">
                        <div class="row">
                            <div class="col-6">
                                <p style="padding: 10px;
    margin-top: 30px;
    font-weight: 500;
    background-color: #f1f1f1 !important;
    text-align: center;
    border: 2px solid #ababab;
    border-radius: 10px 0;
    margin-left: 10px;">الطلب الاسبوعية | Weekly Order</p>
                            </div>
                            <div class="col-6" style="text-align: center;">
                                <img style="height: 90px; text-align:center;" src="uploads/pres_logo/<?php echo $sup_data['logo']; ?>" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td style="background-color:#f1f1f1 !important;"> Clinic Code </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f1f1f1 !important;"> Customer Name </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f1f1f1 !important;"> Details </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f1f1f1 !important;"> Weekly Number </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f1f1f1 !important;"> From </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f1f1f1 !important;"> To </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f1f1f1 !important;"> Ordered By </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f1f1f1 !important;"> Phone </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f1f1f1 !important;"> Day </td>
                                    </tr>

                                </table>
                            </div>
                            <div class="col-4">
                                <table class="table table-bordered   text-center">
                                    <tr>
                                        <td> <?php echo $emp_data['clinic_code']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $emp_data['clinic_name']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td> توريد اغذية صحية / Healthy Foods Supplies </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php
                                            // تاريخ بداية الأسبوع
                                            $start_of_week = $day_details['order_date_from'];

                                            // تحويل التاريخ إلى الصيغة المناسبة
                                            $start_of_week_timestamp = strtotime($start_of_week);

                                            // الحصول على رقم الأسبوع في الشهر باستخدام تاريخ بداية الأسبوع
                                            $current_week_number_in_month = intval(date('W', $start_of_week_timestamp)) - intval(date('W', strtotime(date('Y-m-01', $start_of_week_timestamp)))) + 1;

                                            echo  $current_week_number_in_month;


                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <?php echo $day_details['order_date_from']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td> <?php echo $day_details['order_date_to']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td> <?php echo $emp_data['emp_name']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td> <?php echo $emp_data['emp_phone']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $day_details['date_day']; ?>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                            <div class="col-4">
                                <table class="table table-bordered table-striped text-right">
                                    <tr>
                                        <td style="background-color:#f1f1f1 !important;"> رقم العيادة </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f1f1f1 !important;"> اسم العميل </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f1f1f1 !important;"> التفاصيل </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f1f1f1 !important;"> رقم الاسبوع </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f1f1f1 !important;"> من </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f1f1f1 !important;"> الي </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f1f1f1 !important;"> اسم مقدم الطلب </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f1f1f1 !important;"> الهاتف </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f1f1f1 !important;"> تاريخ اليوم </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-12">
                                <div class="table1 table-responsive">
                                    <div class="card-header bg bg-secondary">
                                        <p class="card-title" style="text-align: center !important;"> Breakfast / الأفطار </p>
                                    </div>
                                    <table class="table table-bordered table-responsive card-body">
                                        <thead>
                                            <tr>
                                                <th> option1 </th>
                                                <th> option2 </th>
                                                <th> option3 </th>
                                                <th> special </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                    $option1 =  $day_details['option1'];
                                                    if ($option1 != "" && $option1 != null) {
                                                        $options = explode(',', $option1);
                                                        foreach ($options as $option) {
                                                            $stmt = $connect->prepare("SELECT * FROM items WHERE id=?");
                                                            $stmt->execute(array($option));
                                                            $item = $stmt->fetch();
                                                    ?>
                                                            <li style="list-style: none;"> <?php echo $item['item_name']; ?> </li>
                                                            <hr>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "No Options";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $option1 =  $day_details['option2'];
                                                    if ($option1 != "" && $option1 != null) {
                                                        $options = explode(',', $option1);
                                                        foreach ($options as $option) {
                                                            $stmt = $connect->prepare("SELECT * FROM items WHERE id=?");
                                                            $stmt->execute(array($option));
                                                            $item = $stmt->fetch();
                                                    ?>
                                                            <li style="list-style: none;"> <?php echo $item['item_name']; ?> </li>
                                                            <hr>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "No Options";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $option1 =  $day_details['option3'];
                                                    if ($option1 != "" && $option1 != null) {
                                                        $options = explode(',', $option1);
                                                        foreach ($options as $option) {
                                                            $stmt = $connect->prepare("SELECT * FROM items WHERE id=?");
                                                            $stmt->execute(array($option));
                                                            $item = $stmt->fetch();
                                                    ?>
                                                            <li style="list-style: none;"> <?php echo $item['item_name']; ?> </li>
                                                            <hr>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "No Options";
                                                    }
                                                    ?>
                                                </td>
                                                <td> <?php echo $day_details['special']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td> <?php echo $day_details['option1_qt']; ?> </td>
                                                <td> <?php echo $day_details['option2_qt']; ?> </td>
                                                <td> <?php echo $day_details['option3_qt']; ?></td>
                                                <td> </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="font-weight: bold;"> Total </td>
                                                <td style="font-weight: bold;"> <?php echo  intval($day_details['option1_qt']) +
                                                                                    intval($day_details['option2_qt'])
                                                                                    + intval($day_details['option3_qt']); ?> </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="table1 table-responsive">
                                    <div class="card-header bg bg-info">
                                        <p class="card-title"> Lunch / الغداء </p>
                                    </div>
                                    <table class="table table-bordered table-responsive card-body">
                                        <thead>
                                            <tr>
                                                <th> option1 </th>
                                                <th> option2 </th>
                                                <th> option3 </th>
                                                <th> special </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                    $option1 =  $day_details['option4'];
                                                    if ($option1 != "" && $option1 != null) {
                                                        $options = explode(',', $option1);
                                                        foreach ($options as $option) {
                                                            $stmt = $connect->prepare("SELECT * FROM items WHERE id=?");
                                                            $stmt->execute(array($option));
                                                            $item = $stmt->fetch();
                                                    ?>
                                                            <li style="list-style: none;"> <?php echo $item['item_name']; ?> </li>
                                                            <hr>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "No Options";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $option1 =  $day_details['option5'];
                                                    if ($option1 != "" && $option1 != null) {
                                                        $options = explode(',', $option1);
                                                        foreach ($options as $option) {
                                                            $stmt = $connect->prepare("SELECT * FROM items WHERE id=?");
                                                            $stmt->execute(array($option));
                                                            $item = $stmt->fetch();
                                                    ?>
                                                            <li style="list-style: none;"> <?php echo $item['item_name']; ?> </li>
                                                            <hr>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "No Options";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $option1 =  $day_details['option6'];
                                                    if ($option1 != "" && $option1 != null) {
                                                        $options = explode(',', $option1);
                                                        foreach ($options as $option) {
                                                            $stmt = $connect->prepare("SELECT * FROM items WHERE id=?");
                                                            $stmt->execute(array($option));
                                                            $item = $stmt->fetch();
                                                    ?>
                                                            <li style="list-style: none;"> <?php echo $item['item_name']; ?> </li>
                                                            <hr>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "No Options";
                                                    }

                                                    ?>
                                                </td>
                                                <td> <?php echo $day_details['special2']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td> <?php echo $day_details['option4_qt']; ?> </td>
                                                <td> <?php echo $day_details['option5_qt']; ?> </td>
                                                <td> <?php echo $day_details['option6_qt']; ?></td>
                                                <td> </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="font-weight: bold;"> Total </td>
                                                <td style="font-weight: bold;"> <?php echo  intval($day_details['option4_qt']) +
                                                                                    intval($day_details['option5_qt'])
                                                                                    + intval($day_details['option6_qt']); ?> </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="table1 table-responsive">
                                    <div class="card-header bg bg-success">
                                        <p class="card-title"> Dinner / العشاء </p>
                                    </div>
                                    <table class="table table-bordered table-responsive card-body">
                                        <thead>
                                            <tr>
                                                <th> option1 </th>
                                                <th> option2 </th>
                                                <th> option3 </th>
                                                <th> special </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                    $option1 =  $day_details['option7'];
                                                    if ($option1 != "" && $option1 != null) {
                                                        $options = explode(',', $option1);
                                                        foreach ($options as $option) {
                                                            $stmt = $connect->prepare("SELECT * FROM items WHERE id=?");
                                                            $stmt->execute(array($option));
                                                            $item = $stmt->fetch(); ?>
                                                            <li style="list-style: none;"> <?php echo $item['item_name']; ?> </li>
                                                            <hr>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "No Options";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $option1 =  $day_details['option8'];
                                                    if ($option1 != "" && $option1 != null) {
                                                        $options = explode(',', $option1);
                                                        foreach ($options as $option) {
                                                            $stmt = $connect->prepare("SELECT * FROM items WHERE id=?");
                                                            $stmt->execute(array($option));
                                                            $item = $stmt->fetch(); ?>
                                                            <li style="list-style: none;"> <?php echo $item['item_name']; ?> </li>
                                                            <hr>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "No Options";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $option1 =  $day_details['option9'];
                                                    if ($option1 != "" && $option1 != null) {
                                                        $options = explode(',', $option1);
                                                        foreach ($options as $option) {
                                                            $stmt = $connect->prepare("SELECT * FROM items WHERE id=?");
                                                            $stmt->execute(array($option));
                                                            $item = $stmt->fetch(); ?>
                                                            <li style="list-style: none;"> <?php echo $item['item_name']; ?> </li>
                                                            <hr>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "No Options";
                                                    }

                                                    ?>
                                                </td>
                                                <td> <?php echo $day_details['special3']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td> <?php echo $day_details['option7_qt']; ?> </td>
                                                <td> <?php echo $day_details['option8_qt']; ?> </td>
                                                <td> <?php echo $day_details['option9_qt']; ?></td>
                                                <td> </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="font-weight: bold;"> Total </td>
                                                <td style="font-weight: bold;"> <?php echo  intval($day_details['option7_qt']) +
                                                                                    intval($day_details['option8_qt'])
                                                                                    + intval($day_details['option9_qt']); ?> </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row no-print">
                        <div class="col-12">
                            <?php
                            // تاريخ اليوم
                            $today = time();

                            // تاريخ الموعد
                            $appointment_date = strtotime($day_details['date_day']);

                            // حساب الفرق بين التاريخين بالثواني
                            $difference = $appointment_date - $today;

                            // حساب عدد الساعات المتبقية حتى الموعد
                            $hours_remaining = floor($difference / (60 * 60));

                            // عرض الزر فقط إذا كانت الفترة المتبقية أقل من 12 ساعة
                            ?>
                            <form action="" method="post">
                                <button class="btn btn-primary" id="print_Button" onclick="printDiv()"> <i class="fa fa-print"></i>Print</button>
                                <?php if ($day_details['status'] == 0 && $hours_remaining <= 12) { ?>
                                    <button class="btn btn-success" type="submit" name="accept_order"> Accept Order </button>
                                    <button class="btn btn-danger" type="button" name="" id="reject_order"> Reject Order </button>
                                    <br>
                                    <div class="reject_reason" id="reject_reason" style="display: none;">
                                        <br>
                                        <textarea name="reject_reason" class="form-control" placeholder="Please Enter Reason"></textarea>
                                        <br>
                                        <button required type="submit" class="btn btn-primary" name="send_reason"> Send Reason </button>
                                    </div>
                                <?php
                                } ?>
                            </form>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
<?php
    } else {
        header('Location:main?dir=supp_dash&page=report');
    }
} else {
    header('Location:main?dir=supp_dash&page=report');
}
?>


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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $("document").ready(function() {
        $("#reject_order").click(function() {
            $("#reject_reason").show();
        })
    });
</script>