<?php
if (isset($_GET['option_id']) && is_numeric($_GET['option_id'])) {
    $option_id = $_GET['option_id'];

    $stmt = $connect->prepare('SELECT * FROM options WHERE id= ?');
    $stmt->execute([$option_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM options WHERE id=?');
        $stmt->execute([$option_id]);
        if ($stmt) {  
          $_SESSION['success_message'] = " Deleted successfully ";
            header('Location:main?dir=menus&page=report'); 
        }
    }
}
