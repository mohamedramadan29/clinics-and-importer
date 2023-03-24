<?php
if (isset($_GET['year']) && is_numeric($_GET['year'])) {
    $year = $_GET['year'];
    $month = $_GET['month'];
    $stmt = $connect->prepare('SELECT * FROM sessions WHERE year= ? AND session_month=? AND emp_id=?');
    $stmt->execute([$year, $month, $_SESSION['emp_id']]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM sessions WHERE year= ? AND session_month=? AND emp_id=?');
        $stmt->execute([$year, $month, $_SESSION['emp_id']]);
        if ($stmt) {
            $_SESSION['success_message'] = " Deleted successfully ";
            header('Location:main?dir=sessions&page=report');
        }
    }
}
