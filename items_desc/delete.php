<?php
if (isset($_GET['item_id']) && is_numeric($_GET['item_id'])) {
    $item_id = $_GET['item_id'];

    $stmt = $connect->prepare('SELECT * FROM  items_desc WHERE id= ?');
    $stmt->execute([$item_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM  items_desc WHERE id=?');
        $stmt->execute([$item_id]);
        if ($stmt) {
            $_SESSION['success_message'] = " Deleted successfully ";
            header('Location:main?dir=items_desc&page=report');
        }
    }
}
