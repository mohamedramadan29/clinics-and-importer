<?php

$from_date = $_GET['from'];
$to_date = $_GET['to'];
$emp_id = $_SESSION['emp_id'];
$stmt = $connect->prepare("SELECT * FROM emplyees WHERE id=?");
$stmt->execute(array($emp_id));
$emp_new_data = $stmt->fetch();
$stmt = $connect->prepare("UPDATE  breakfast_order SET pres_show = 1 WHERE order_date_from=? AND order_date_to=? AND emp_id=?");
$stmt->execute(array($from_date, $to_date, $emp_id));

if ($stmt) {
    $stmt = $connect->prepare("INSERT INTO sup_notification (supp_id, emp_id, name , noti_desc , date)
    value(?, ? , ? , ? , ?)");
    $stmt->execute(array($emp_new_data['pres_id'], $emp_id, "Add New Order", "Have New Order By => " . $emp_new_data['emp_name'], date("Y-m-d")));
}
header("location:main.php?dir=main_menu&page=emp_orders");
