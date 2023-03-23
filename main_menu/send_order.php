<?php

$from_date = $_GET['from'];
$to_date = $_GET['to'];
$emp_id = $_SESSION['emp_id'];
$stmt = $connect->prepare("UPDATE  breakfast_order SET pres_show = 1 WHERE order_date_from=? AND order_date_to=? AND emp_id=?");
$stmt->execute(array($from_date,$to_date,$emp_id));
header("location:main.php?dir=main_menu&page=emp_orders");
