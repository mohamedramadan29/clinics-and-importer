<?php
if (isset($_GET['pre_id']) && is_numeric($_GET['pre_id'])) {
    $pre_id = $_GET['pre_id'];
    $stmt = $connect->prepare('SELECT * FROM presentions WHERE id= ?');
    $stmt->execute([$pre_id]);
    $data = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) {
        $image_link = "uploads/pres_logo/" . $data['logo'];
        if (file_exists($image_link)) {
            // delete image
            unlink($image_link);
            $stmt = $connect->prepare('DELETE FROM presentions WHERE id=?');
            $stmt->execute([$pre_id]);
            if ($stmt) {
                $_SESSION['success_message'] = " Deleted successfully ";
                header('Location:main?dir=setting&page=report_pre');
            }
        }
    }
}
