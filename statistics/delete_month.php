<?php
$emp_id = $_GET['emp_id'];
$month = $_GET['month'];
$stmt = $connect->prepare('SELECT * FROM sessions WHERE session_month=? AND emp_id=?');
$stmt->execute([$month, $emp_id]);
$count1 = $stmt->rowCount();
$stmt = $connect->prepare("SELECT * FROM breakfast_order WHERE MONTH(STR_TO_DATE(date_day, '%W %d %M %Y')) = ? AND emp_id=?");
$stmt->execute(array($month, $emp_id));
$count2 = $stmt->rowCount();
if ($count1 > 0 && $count2 > 0) {
    $stmt = $connect->prepare('DELETE FROM sessions WHERE session_month=? AND emp_id=?');
    $stmt->execute([$month, $emp_id]);
    $stmt = $connect->prepare("DELETE FROM breakfast_order WHERE MONTH(STR_TO_DATE(date_day, '%W %d %M %Y')) = ? AND emp_id=?");
    $stmt->execute([$month, $emp_id]);
    if ($stmt) {
        $_SESSION['success_message'] = " Deleted successfully ";
        header('Location:main.php?dir=statistics&page=report&emp_id=' . $emp_id);
    }
} else {
    header('Location:main.php?dir=statistics&page=report&emp_id=' . $emp_id);
}
