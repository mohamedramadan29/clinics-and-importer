<?php
if (isset($_GET['from'])) {
    $from = $_GET['from'];
}
if (isset($_GET['to'])) {
    $to = $_GET['to'];
}
$stmt = $connect->prepare('SELECT * FROM breakfast_order WHERE order_date_from = ? AND order_date_to=? AND emp_id=?');
$stmt->execute([$from, $to, $_SESSION['emp_id']]);
$count = $stmt->rowCount();
if ($count > 0) {
    $stmt = $connect->prepare('DELETE FROM breakfast_order WHERE order_date_from = ? AND order_date_to=? AND emp_id=?');
    $stmt->execute([$from, $to, $_SESSION['emp_id']]);
    if ($stmt) {
        $_SESSION['success_message'] = " Deleted successfully ";
        header('Location:main?dir=main_menu&page=emp_orders');
    }
}
