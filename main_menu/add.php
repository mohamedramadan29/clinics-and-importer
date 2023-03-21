<!-------------------------- START TEST -------------------------->
<?php
$days = array("saturday", "sunday", "monday", "tuesday", "wednesday", "thursday");
if (isset($_POST['save1'])) {
    $date_from = $_POST['date_from'];
    $date = $date_from;
    $date_timestamp = strtotime($date); // تحويل التاريخ إلى الصيغة الداخلية للتاريخ في PHP
    $new_date_timestamp = strtotime("+5 day", $date_timestamp); // زيادة 5 أيام على التاريخ المحدد
    $new_date = date("l j F Y", $new_date_timestamp); // إعادة تنسيق التاريخ بالصيغة المطلوبة
    $date_to = $new_date;
    $supp_id = $_POST['supp_id'];
    $emp_id = $_SESSION['emp_id'];
    foreach ($days as $day) {
        $new_date = date('Y-m-d', strtotime($date_from . ' +1 day'));
        $special = $_POST[$day . '_special'];
        $special2 = $_POST[$day . '_special2'];
        $special3 = $_POST[$day . '_special3'];
        if (isset($_POST[$day . '_option1'])) {
            $option1 = implode(',', $_POST[$day . '_option1']);
        } else {
            $option1 = '';
        }
        if ($_POST[$day . '_option2']) {
            $option2 = implode(',', $_POST[$day . '_option2']);
        } else {
            $option2 = '';
        }
        if ($_POST[$day . '_option3']) {
            $option3 = implode(',', $_POST[$day . '_option3']);
        } else {
            $option3 = '';
        }
        if ($_POST[$day . '_option4']) {
            $option4 = implode(',', $_POST[$day . '_option4']);
        } else {
            $option4 = '';
        }
        if ($_POST[$day . '_option5']) {
            $option5 = implode(',', $_POST[$day . '_option5']);
        } else {
            $option5 = '';
        }
        if ($_POST[$day . '_option6']) {
            $option6 = implode(',', $_POST[$day . '_option6']);
        } else {
            $option6 = '';
        }
        if ($_POST[$day . '_option7']) {
            $option7 = implode(',', $_POST[$day . '_option7']);
        } else {
            $option7 = '';
        }
        if ($_POST[$day . '_option8']) {
            $option8 = implode(',', $_POST[$day . '_option8']);
        } else {
            $option8 = '';
        }
        if ($_POST[$day . '_option9']) {
            $option9 = implode(',', $_POST[$day . '_option9']);
        } else {
            $option9 = '';
        }
        $option1_qt = $_POST[$day . '_option1_qt'];
        $option2_qt = $_POST[$day . '_option2_qt'];
        $option3_qt = $_POST[$day . '_option3_qt'];
        $option4_qt = $_POST[$day . '_option4_qt'];
        $option5_qt = $_POST[$day . '_option5_qt'];
        $option6_qt = $_POST[$day . '_option6_qt'];
        $option7_qt = $_POST[$day . '_option7_qt'];
        $option8_qt = $_POST[$day . '_option8_qt'];
        $option9_qt = $_POST[$day . '_option9_qt'];
        $stmt = $connect->prepare("INSERT INTO breakfast_order (menu_num,meal_type,day,option1,option1_qt,
        option2,option2_qt,option3,option3_qt,special,option4,option4_qt,option5,option5_qt,option6,option6_qt,special2
        ,option7,option7_qt,option8,option8_qt,option9,option9_qt,special3,order_date_from,order_date_to,emp_id,pres_id,date_day)
         value(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([
            1, 'breakfast', $day, $option1, $option1_qt, $option2, $option2_qt,
            $option3, $option3_qt, $special, $option4, $option4_qt, $option5, $option5_qt, $option6, $option6_qt, $special2, $option7, $option7_qt,
            $option8, $option8_qt, $option9, $option9_qt, $special3, $date_from, $date_to, $emp_id, $supp_id, $new_date
        ]);
    }
    if ($stmt) {
        $_SESSION['success_message'] = " Order Added ";
        header('Location:main?dir=main_menu&page=report');
    }
    //header("location:main.php?dir=main_menu&page=report");
}


?>