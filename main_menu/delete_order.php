<?php
if (isset($_GET['from'])) {
    $from = $_GET['from'];
}
if (isset($_GET['to'])) {
    $to = $_GET['to'];
}
if (isset($_SESSION['emp_id'])) {
    $emp_id = $_SESSION['emp_id'];
} elseif (isset($_GET['emp_id'])) {
    $emp_id = $_GET['emp_id'];
}
$stmt = $connect->prepare('SELECT * FROM breakfast_order WHERE order_date_from = ? AND order_date_to=? AND emp_id=?');
$stmt->execute([$from, $to, $emp_id]);
$count = $stmt->rowCount();
if ($count > 0) {
    /*
    $stmt = $connect->prepare('DELETE FROM breakfast_order WHERE order_date_from = ? AND order_date_to=? AND emp_id=?');
    $stmt->execute([$from, $to, $_SESSION['emp_id']]);*/
    $stmt = $connect->prepare("UPDATE breakfast_order SET archieve = 1 WHERE order_date_from = ? AND order_date_to=? AND emp_id=?");
    $stmt->execute([$from, $to, $emp_id]);
    if ($stmt) {
        $_SESSION['success_message'] = " Deleted successfully ";
        header('Location:main?dir=main_menu&page=emp_orders&emp_id='.$emp_id);
    }
}
