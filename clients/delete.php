<?php
if (isset($_GET['patient_id']) && is_numeric($_GET['patient_id'])) {
    $patient_id = $_GET['patient_id'];
    $stmt = $connect->prepare('SELECT * FROM clients WHERE id= ?');
    $stmt->execute([$patient_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM clients WHERE id=?');
        $stmt->execute([$patient_id]);
        if ($stmt) {
            $_SESSION['success_message'] = " Deleted successfully ";
            header('Location:main?dir=clients&page=report');
        }
    }
}
