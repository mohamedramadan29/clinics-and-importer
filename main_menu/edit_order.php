<!-------------------------- START TEST -------------------------->
<?php
$days = array("saturday", "sunday", "monday", "tuesday", "wednesday", "thursday");
if (isset($_POST['save1'])) {
    $date_from = $_POST['date_from'];
    $date_to = $_POST['date_to'];

    //$date_from = date('Y-m-d', strtotime($_POST['date_from']));
    //$date_to = date('Y-m-d', strtotime($_POST['date_to']));
    $supp_id = isset($_POST['supp_id']) ? $_POST['supp_id'] : '';
    $emp_id = isset($_SESSION['emp_id']) ? $_SESSION['emp_id'] : '';

    if (empty($emp_id)) {
        echo "Employee ID is not set";
        exit;
    }
    foreach ($days as $day) {
        
        $special = isset($_POST[$day . '_special']) ? $_POST[$day . '_special'] : '';
        $special2 = isset($_POST[$day . '_special2']) ? $_POST[$day . '_special2'] : '';
        $special3 = isset($_POST[$day . '_special3']) ? $_POST[$day . '_special3'] : '';
        echo $special;
        echo $special2;
        $option1 = isset($_POST[$day . '_option1']) ? implode(',', $_POST[$day . '_option1']) : '';
        $option2 = isset($_POST[$day . '_option2']) ? implode(',', $_POST[$day . '_option2']) : '';
        $option3 = isset($_POST[$day . '_option3']) ? implode(',', $_POST[$day . '_option3']) : '';
        $option4 = isset($_POST[$day . '_option4']) ? implode(',', $_POST[$day . '_option4']) : '';
        $option5 = isset($_POST[$day . '_option5']) ? implode(',', $_POST[$day . '_option5']) : '';
        $option6 = isset($_POST[$day . '_option6']) ? implode(',', $_POST[$day . '_option6']) : '';
        $option7 = isset($_POST[$day . '_option7']) ? implode(',', $_POST[$day . '_option7']) : '';
        $option8 = isset($_POST[$day . '_option8']) ? implode(',', $_POST[$day . '_option8']) : '';
        $option9 = isset($_POST[$day . '_option9']) ? implode(',', $_POST[$day . '_option9']) : '';

        $option1_qt = isset($_POST[$day . '_option1_qt']) ? $_POST[$day . '_option1_qt'] : '';
        $option2_qt = isset($_POST[$day . '_option2_qt']) ? $_POST[$day . '_option2_qt'] : '';
        $option3_qt = isset($_POST[$day . '_option3_qt']) ? $_POST[$day . '_option3_qt'] : '';
        $option4_qt = isset($_POST[$day . '_option4_qt']) ? $_POST[$day . '_option4_qt'] : '';
        $option5_qt = isset($_POST[$day . '_option5_qt']) ? $_POST[$day . '_option5_qt'] : '';
        $option6_qt = isset($_POST[$day . '_option6_qt']) ? $_POST[$day . '_option6_qt'] : '';
        $option7_qt = isset($_POST[$day . '_option7_qt']) ? $_POST[$day . '_option7_qt'] : '';
        $option8_qt = isset($_POST[$day . '_option8_qt']) ? $_POST[$day . '_option8_qt'] : '';
        $option9_qt = isset($_POST[$day . '_option9_qt']) ? $_POST[$day . '_option9_qt'] : '';

        $stmt = $connect->prepare("UPDATE breakfast_order SET menu_num=?,meal_type=?,day=?,option1=?,option1_qt=?,
        option2=?,option2_qt=?,option3=?,option3_qt=?,special=?,option4=?,option4_qt=?,option5=?,option5_qt=?,option6=?,option6_qt=?,special2=?
        ,option7=?,option7_qt=?,option8=?,option8_qt=?,option9=?,option9_qt=?,special3=? WHERE order_date_from=? AND order_date_to=? AND emp_id=?");
        $stmt->execute([
            1, 'breakfast', $day, $option1, $option1_qt, $option2, $option2_qt,
            $option3, $option3_qt, $special, $option4, $option4_qt, $option5, $option5_qt, $option6, $option6_qt, $special2, $option7, $option7_qt,
            $option8, $option8_qt, $option9, $option9_qt, $special3, $date_from, $date_to, $emp_id
        ]);
    }
    if ($stmt) {
        $_SESSION['success_message'] = " Order Updated ";
        // header('Location:main?dir=main_menu&page=report');
    }
    //header("location:main.php?dir=main_menu&page=report");
}


?>